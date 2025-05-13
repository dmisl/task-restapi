<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Tinify\Client;
use Tinify\Tinify;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Drivers\Gd\Encoders\JpegEncoder;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class UserService
{
    public function getAll()
    {
        return User::all();
    }

    public function getPaginatedUsers(int $count, int $page): LengthAwarePaginator
    {
        $paginator = User::with('position')->orderBy('id', 'asc')->paginate($count, ['*'], 'page', $page);
        
        if($paginator->isEmpty())
        {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'Page not found',
                ], 404)
            );
        }

        return $paginator;
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if(!$user)
        {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'User not found',
                ], 404)
            );
        }

        return $user;
    }

    public function proceedImage(UploadedFile $image)
    {
        $fileName = $image->getClientOriginalName();

        $manager = new ImageManager(new Driver);

        $img = $manager->read($image->getPathname());

        $x = intval(($img->width() / 2) - (70 / 2));
        $y = intval(($img->height() / 2) - (70 / 2));

        $cropped = $img->crop(70, 70, $x, $y);

        $cropped = $cropped->encode(new JpegEncoder());

        \Tinify\setKey(config('services.tinify.key'));
        $img = \Tinify\fromBuffer($cropped);

        $path = 'photos/'.bin2hex(random_bytes(8)).$fileName;

        Storage::disk('public')->put($path, $img->toBuffer());

        return $path;
    }
}
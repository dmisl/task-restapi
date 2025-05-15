<?php

namespace Database\Factories;

use App\Models\Position;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerFactory::create('uk_UA');

        $domains = [
            'gmail.com', 'ukr.net'
        ];

        $ukrName = $faker->name('uk_UA');

        // $url = basename('https://i.pravatar.cc/100?img=' . rand(1, 70));

        // $response = Http::get($url);

        // $path = 'photos/'.bin2hex(random_bytes(8)).$url;

        // Storage::disk('public')->put($path, $response->body());

        return [
            'name' => Str::slug($ukrName, ' '),
            'email' => Str::slug($ukrName, '_').rand(1000, 9999)."@".$domains[array_rand($domains)],
            'phone' => '+380' . $faker->numerify('#########'),
            'position_id' => Position::all()->random()->id,
            'photo' => 'https://i.pravatar.cc/100?img=' . rand(1, 70),
        ];
    }
}

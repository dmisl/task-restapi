<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dmisl - beautiful web designer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="d-flex vh-100 justify-content-center align-items-center gap-3">

    <div class="card col-4 mb-5">
        <div class="card-body">

            <h2>Create new user</h2>

            <form action="{{ route('api.users.store') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">
        
                <input name="name" placeholder="name">
                <input name="phone" placeholder="phone">
                <input name="email" placeholder="email">
                <input type="file" name="photo">
                <p class="m-0 p-0" style="height: 5px;">position id</p>
                <select name="position_id">
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->id }} - {{ $position->name }}</option>
                    @endforeach
                </select>

                <input name="token" placeholder="token">
        
                <button type="submit">send</button>
        
            </form>

        </div>
    </div>

    <div class="card col-6">
        <div class="card-body">
            
            <h2>Users List</h2>

            <div class="row">
                @foreach ($users as $user)
                    <div class="col-12 col-md-6 mb-4">
                        <div class="d-flex align-items-start border-bottom pb-2" style="font-size: 10px;">
                            <div class="me-3">
                                @if ($user->photo)
                                    <img src="{{ asset('storage/'.$user->photo) }}" alt="{{ $user->name }}" class="rounded" width="70" height="70" style="object-fit: cover;">
                                @endif
                            </div>
                            <div>
                                <p class="m-0 fs-6">{{ $user->name }}</p>
                                <p class="m-0 fs-7"><strong>Email:</strong> {{ $user->email }}</p>
                                <p class="m-0 fs-7"><strong>Phone:</strong> {{ $user->phone }}</p>
                                <p class="m-0 fs-7"><strong>Position ID:</strong> {{ $user->position_id }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex flex-column align-items-center mt-4">
                {{ $users->links() }}
            </div>

        </div>
    </div>

</body>
</html>
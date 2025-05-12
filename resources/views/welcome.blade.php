<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">

        {{ $errors }}

        <input name="name" placeholder="name">
        <input name="phone" placeholder="phone">
        <input name="email" placeholder="email">
        <input type="file" name="photo">
        <select name="position_id">
            
        </select>

        <button type="submit">send</button>

    </form>
</body>
</html>
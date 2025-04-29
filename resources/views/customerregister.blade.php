<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <h2>Store Info</h2>
        <input type="text" name="store_name" placeholder="Store Name" required><br>
        <input type="text" name="store_location" placeholder="Store Location" required><br>
        <input type="text" name="store_contact" placeholder="Store Contact"><br>
        <input type="email" name="store_email" placeholder="Store Email"><br>

        <h2>Customer Info</h2>
        <input type="text" name="first_name" placeholder="First Name" required><br>
        <input type="text" name="last_name" placeholder="Last Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone" placeholder="Phone"><br>
        <input type="password" name="password" placeholder="Password" required><br>

        <button type="submit">Register</button>
    </form>

</body>

</html>

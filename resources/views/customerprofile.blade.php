<!DOCTYPE html>
<html>

<head>
    <title>Customer Profile</title>
</head>

<body>
    <h1>Welcome, {{ auth('customer')->user()->first_name }}!</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h2>Customer Information</h2>
    <ul>
        <li>Full Name: {{ $customer->first_name }} {{ $customer->last_name }}</li>
        <li>Email: {{ $customer->email }}</li>
        <li>Phone: {{ $customer->phone }}</li>
    </ul>

    <h2>Store Information</h2>
    <ul>
        <li>Store Name: {{ $customer->store->store_name }}</li>
        <li>Location: {{ $customer->store->store_location }}</li>
        <li>Contact: {{ $customer->store->store_contact }}</li>
        <li>Email: {{ $customer->store->store_email }}</li>
    </ul>

</body>

</html>

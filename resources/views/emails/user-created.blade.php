<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
</head>
<body>

<h2>Welcome, {{ $user->first_name }} {{ $user->last_name }}!</h2>

<p>Your account has been successfully created with the following details:</p>

<ul>
    <li>Email: {{ $user->email }}</li>
    <li>Role: {{ ucfirst($user->role) }}</li>
</ul>

<p>You can now log in to the system using the link below:</p>

<p>
    <a href="{{ url('/login') }}" style="background-color:#1D4ED8; color:white; padding:10px 20px; text-decoration:none; border-radius:5px">
        Click here to log in
    </a>
</p>

<p>Thank you!</p>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
</head>
<body>

<h2>Welcome, {{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}!</h2>

<p>Your account has been successfully created with the following details:</p>

<ul>
    <li>Email: {{ $user->email }}</li>
    <li>Role: {{ ucfirst($user->role) }}</li>
</ul>

<p><a href="{{ $resetUrl }}" style="background-color:#1D4ED8; color:white; padding:10px 20px; text-decoration:none; border-radius:5px">Set Your Password</a></p>
<p>This link will expire soon, so please complete your setup as soon as possible.</p>


<p>Regards,<br>The Admin Team</p>

</body>
</html>

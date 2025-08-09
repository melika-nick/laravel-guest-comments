<?php ?>

    <!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
<h1>Admin Login</h1>

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>
</body>
</html>



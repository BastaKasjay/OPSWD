<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 180px;
            height: 100vh;
            background-color: #639D7F;
            padding-top: 1rem;
        }

        .sidebar a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            display: block;
            border-radius: 4px;
            margin-bottom: 4px;
        }

        .sidebar a:hover {
            background-color: #4e7c62;
        }

        .dropdown-menu {
            background-color: #aee0c1;
            border: none;
        }

        .dropdown-menu a {
            color: #fff;
        }

        .main {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h5 class="text-white text-center">Admin</h5>
        <a href="{{ route('clients.index') }}">Client Management</a>
        <a href="#">System Management</a>
        <a href="#">User Management</a>
        <a href="#">Reports</a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    <div class="main">
        <h1>Welcome to BAICS</h1>
        <p>This is your dashboard homepage.</p>
    </div>

    <!-- Bootstrap JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

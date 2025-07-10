<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAICS Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --mint-green-900: #639D7F;
            --mint-green-500: #aee0c1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Inter', sans-serif;
            background-color: var(--mint-green-900);
        }

        .login-wrapper {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .login-left {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 500px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            height: 60px;
            margin-bottom: 10px;
        }

        .logo h2 {
            color: var(--mint-green-900);
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 14px;
            color: #444;
            margin-bottom: 0;
        }

        .login-form {
            width: 100%;
            max-width: 300px;
        }

        .login-form .form-control {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .recover {
            font-size: 13px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .recover a {
            color: var(--mint-green-900);
            text-decoration: none;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: var(--mint-green-900);
            border: none;
            color: white;
            font-size: 15px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: var(--mint-green-500);
            color: var(--mint-green-900);
        }

        .login-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            min-height: 500px;
        }

        @media (max-width: 768px) {
            .login-box {
                flex-direction: column;
            }
            
            .login-right {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <div class="row g-0 h-100">
                <div class="col-md-6 login-left">
                    <div class="logo">
                        <img src="capitol.png" alt="Capitol Logo" />
                        <h2>BAICS</h2>
                        <p>Management System</p>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf
                        <input type="text" name="username" class="form-control" placeholder="Username" required />
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                        
                        <div class="recover">
                            Forgot your account? <a href="#">Recover here.</a>
                        </div>
                        
                        <button type="submit" class="btn login-btn">Login</button>
                    </form>
                </div>
                
                <div class="col-md-6 login-right p-0">
                    <img src="dji_fly_20250527_9291 AM_372_1748314528355_photo.jpg" alt="People Receiving Aid" />
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

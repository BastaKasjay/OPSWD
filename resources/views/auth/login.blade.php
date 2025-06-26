<!DOCTYPE html>
<html lang="en">

<head>
     <div class="login-wrapper">
  <div class="login-box">
    <div class="login-left">
      <div class="logo">
        <img src="capitol.png" alt="capitol Logo" />
        <h2>BAICS</h2>
        <p>Management System</p>
      </div>
        <form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
        <div class="recover">
          Forgot your account? <a href="#">Recover here.</a>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
    <div class="login-right">
      <img src="dji_fly_20250527_9291 AM_372_1748314528355_photo.jpg" alt="People Receiving Aid" />
    </div>
  </div>
</div>

    <title>BAICS Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
        
        };
    </script>
    <style>* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body, html {
  height: 100%;
  font-family: Arial, sans-serif;
  background-color: #639D7F;
}

.login-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  padding: 20px;
}

.login-box {
  display: flex;
  width: 900px;
  background-color: #fff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.login-left, .login-right {
  flex: 1;
}

.login-left {
  padding: 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
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
  color: #639D7F;
  font-size: 26px;
  font-weight: bold;
}

.logo p {
  font-size: 14px;
  color: #444;
}

form {
  width: 100%;
  max-width: 300px;
}

form input {
  width: 100%;
  padding: 12px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
}

.recover {
  font-size: 13px;
  margin-bottom: 20px;
  color: #333;
}

.recover a {
  color: #639D7F;
  text-decoration: none;
}

form button {
  width: 100%;
  padding: 12px;
  background-color: #639D7F;
  border: none;
  color: white;
  font-size: 15px;
  font-weight: bold;
  border-radius: 6px;
  cursor: pointer;
}

form button:hover {
  background-color: #aee0c1;
}

.login-right img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>

</head>

</body>

</html>

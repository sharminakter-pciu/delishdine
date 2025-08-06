<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sign Up | Delish Dine</title>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background: #fffaf0;
      margin: 0;
    }
    .container {
      width: 100%;
      max-width: 400px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #f4a261;
      border: none;
      border-radius: 5px;
      color: black;
      font-weight: bold;
      cursor: pointer;
    }
    .login-link {
      text-align: center;
      margin-top: 15px;
    }
    .login-link a {
      color: #f4a261;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Create an Account</h2>
    <form action="Register.php" method="POST">
		<input type="text" name ="fullname" placeholder="fullname" required />
      <input type="text" name="username" placeholder="Username" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Sign Up</button>
    </form>
    <div class="login-link">
      Already have an account? <a href="login.html">Login here</a>
    </div>
  </div>

</body>
</html>

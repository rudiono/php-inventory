<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
<title>Halaman Login Sistem</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<div class="form">
  <div class="header"><h2>LOGIN SISTEM INVENTORY</h2></div>
  <div class="login">
    <form action="ceklogin.php" method="post">
      <ul>
        <li>
          <span class="un"><i class="fa fa-user"></i></span><input type="text" name="username" required class="text" placeholder="Username..."/>
        </li>
        <li>
          <span class="un"><i class="fa fa-lock"></i></span><input type="password" name="password" required class="text" placeholder="Password..."/>
        </li>
        <li>
          <input type="submit" value="LOGIN" class="btn">
        </li>
      </ul>
    </form>
  </div><br/>
</div>
</body>
</html>

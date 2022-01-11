<?php
include "db.php";
if ($_POST){
    $email=$_POST["email"];
    $password=hash("ripemd160",$_POST["password"]);
    $query = $db->query("SELECT * FROM users WHERE email = '{$email}' AND password='{$password}' ")->fetch(PDO::FETCH_ASSOC);
if ($query){
    session_start();
    $_SESSION['name']=$query['name'];
    $_SESSION['email']=$query['email'];
    header("location:dashboard.php");
}
}


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sign In</title>
  <link href="Assets/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="Assets/bootstrap-4.3.1/css/signin.css" rel="stylesheet" />
</head>
<body class="text-center">
<main class="form-signin">
  <form class="form-signin" method="post" action="" style="background: #fff">
    <h1 class="h3 mb-3 fw-normal">Lütfen Giriş Yapın</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" placeholder="E-mail">

    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Şifre">

    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Beni Hatırla
      </label>
    </div>

    <button class="w-100 btn-lg btn-primary" type="submit">Giriş Yap</button>
    <a href="register.php" class="text-secondary">Kayıt Ol</a>
  </form>
</main>


<script src="Assets/bootstrap-4.3.1/js/jquery-3.4.1.min.js"></script>
<script src="Assets/bootstrap-4.3.1/js/popper.min.js"></script>
<script src="Assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
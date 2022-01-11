<?php

include 'db.php';
$message = "";
if($_POST){


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = hash('ripemd160',$_POST['password']);

    $query = $db->query("SELECT email FROM users WHERE email = '{$email}'")->fetch(PDO::FETCH_ASSOC);


    if(!$query){
        $query = $db->prepare("INSERT INTO users SET
    name = ?,
    email = ?,
    password = ?
    ");

        $insert = $query->execute(array(
            $name,$email, $password
        ));

        if ( $insert ){

            $message = "Kayıt işlemi başarılı";
        }
    }else{
        $message = "E-posta daha önce kaydedilmiş";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
  <link href="Assets/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="Assets/bootstrap-4.3.1/css/signin.css" rel="stylesheet" />
</head>
<body class="text-center" >
<form class="form-signin" method="post" action="" style="background-color:white">
  <h1 class="h3 mb-3 fw-normal">Hesap Oluştur</h1>
  <div class="form-floating">
    <input type="text" class="form-control" name="name" placeholder="İsim Soyisim">
  </div>
  <br>
  <div class="form-floating">
    <input type="email" class="form-control" name="email" placeholder="E-mail">
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" name="password" placeholder="Şifre">
  </div>
  <button class=" btn-lg btn-success btn-block" type="submit">Kayıt Ol</button>
    <span class="alert-success" ><?php echo $message ?></span>
    <a href="sign_in.php" class="text-secondary">Giriş Yap</a>
</form>



<script src="Assets/bootstrap-4.3.1/js/jquery-3.4.1.min.js"></script>
<script src="Assets/bootstrap-4.3.1/js/popper.min.js"></script>
<script src="Assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
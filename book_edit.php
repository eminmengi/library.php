<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location:sign_in.php");
}
$title = "Kitap Düzenle";
include "inc/header.php";
include "db.php";
$id = $_GET['id'];
$message="";
$control=true;
if ($_POST){
    $bookname=$_POST['bookname'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $newname=$_POST['cover'];
    if ( $bookname != "" && $author != "" && $isbn != "" ){
        if ($_FILES["cover"]['name'] !="") {
            $direc = "covers";
            $dosyaUzantisi = pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION);
            $name= md5(uniqid(rand()));
            $newname=$name.".".$dosyaUzantisi;
            $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $direc . DIRECTORY_SEPARATOR . $newname;
            if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png" && $dosyaUzantisi != "jpeg") {
                $message= "Sadece jpg, png ve jpeg uzantılı dosyalar yüklenebilir.";
                $newname="";
                $control=false;
            } else {
                $result = move_uploaded_file($_FILES["cover"]["tmp_name"], $yuklemeYeri);
                $message.= $result ? "Resim başarıyla yüklendi" : "Hata oluştu";}}
        $cover=$newname;
        if ($control){
            $query = $db->prepare("UPDATE books SET
            bookname = ?,
            author = ?,
            isbn = ?,
            cover = ?
            WHERE id = ?");
            $update = $query->execute(array($bookname, $author, $isbn,$cover,$id
            ));
            if ( $update ){
                $message = "güncelleme başarılı!";
            }else{
                $message = "Hata Oluştu";
            }}
    }else{
        $message="Lütfen zorunlu alanları doldurun.";}}
?>
<div class="container-fluid">
    <div class="row">
        <?php include 'inc/navbar.php'?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php
            $query = $db->query("SELECT * FROM books WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
            if ( $query ){ ?>
                <h2>Kitap Ekle</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="bookname">Kitap Adı <span style="color: red">*</span></label>
                        <input type="text" id="bookname" value="<?php echo $query["bookname"] ?>" class="form-control" name="bookname" placeholder="Kitap Adı">
                    </div>
                    <div class="form-group">
                        <label for="author">Yazar<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="author"value="<?php echo $query["author"] ?>" name="author" placeholder="Yazar">
                    </div>
                    <div class="form-group">
                        <label for="isbn">İSBN Numarası<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="isbn" name="isbn"value="<?php echo $query["isbn"] ?>" placeholder="İSBN Numarası">
                    </div>
                    <div class="form-group">
                        <label for="cover">Kitap Kapağı</label>
                        <input type="file" class="form-control" name="cover" accept="image/png, image/jpg, image/jpeg" id="cover">
                    </div>
                    <input type="hidden" name="cover" value="<?php echo $query["cover"] ?>" >

                    <button type="submit" class="btn btn-success">Düzenle</button>
                    <span class="alert-success"><?php echo $message;?> </span>
                </form>
            <?php }
            ?>
        </main>
    </div>
</div>
<?php include 'inc/footer.php'?>

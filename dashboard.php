<?php
session_start();
include 'db.php';
$title = "Dashboard";

$query = $db->query("SELECT * FROM books", PDO::FETCH_ASSOC);



 include 'inc/header.php'?>

<div class="container-fluid">
    <div class="row">
       <?php include 'inc/navbar.php'?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


            <h2>Kitaplar</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Kitap Adı</th>
                        <th scope="col">Yazar</th>
                        <th scope="col">Kapak Görseli</th>
                        <th scope="col">İSBN Numarası</th>
                        <th scope="col">Eylem</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if ( $query->rowCount() ){
                        foreach( $query as $row ){  ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['bookname'] ?></td>
                                <td><?php echo $row['author'] ?></td>
                                <td><img style="width: 100px" src="covers/<?php echo $row['cover'] ?>" alt=""></td>
                                <td><?php echo $row['isbn'] ?></td>
                                <td><a href="book_delete.php?id=<?php echo $row['id'] ?>">Sil</a> <a href="book_edit.php?id=<?php echo $row['id'] ?>">Düzenle</a></td>

                            </tr>
                    <?php
                        }
                    }
                    ?>


                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include 'inc/footer.php'?>

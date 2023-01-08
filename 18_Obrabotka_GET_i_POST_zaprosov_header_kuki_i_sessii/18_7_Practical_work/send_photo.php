<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Form</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Отправка фото на сервер!</h1>
        <?php
        if(!isset($_SESSION['count_download'])){
            $_SESSION['count_download'] = 0;
        }
        if(isset($_FILES['photo'])){
            try{
                if($_FILES['photo']['size'] > 2097152){
                    throw new Exception('Файл слишком большой!');
                }
                if($_FILES['photo']['type'] != 'image/jpeg' && $_FILES['photo']['type'] != 'image/png'){
                    throw new Exception('Не верный формат фото!');
                }
                if($_SESSION['count_download'] > 1){
                    throw new Exception('Количество отправок файла в одной сессии больше 1');
                }
                move_uploaded_file($_FILES['photo']['tmp_name'], './images/' . $_FILES['photo']['name']);
                $_SESSION['count_download']++;
                $img = './images/' . $_FILES['photo']['name'];
                header('location: ' . $img);
            }
            catch (Exception $e){
                echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
            }
        }
        ?>
        <form method="post" action="send_photo.php" enctype="multipart/form-data">
            <div class="mb-3">
                <input class="form-control" name="photo" type="file"  aria-label="Title">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
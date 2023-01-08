<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


if($_FILES['photo']){
    try{
        move_uploaded_file($_FILES['photo']['tmp_name'], './' . $_FILES['photo']['name']);
        ?>
        <img src='<?='./' . $_FILES['photo']['name']?>' />
<?php
    }
    catch (Exception $e){
        echo $e->getMessage();
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Form POST</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Отправка фото на сервер!</h1>
            <form method="post" action="18_3_Poluchenie_fajlov_massiv_FILES.php" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Нужно выбрать файл</label>
                    <input class="form-control" name="photo" type="file"  aria-label="Title">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <pre>
                <?php var_dump($_FILES);?>
            </pre>

        </div>
    </div>
</body>
</html>
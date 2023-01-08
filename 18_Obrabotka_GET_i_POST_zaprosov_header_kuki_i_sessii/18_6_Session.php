<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$sent = 0;

if(!isset($_SESSION['sent'])){
    $_SESSION['sent'] = 0;
}
else{
    if(isset($_POST['form-checker'])){
        $_SESSION['sent']++;
    }
}

$sent = $_SESSION['sent'];

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
        <h1>Form COOKIE</h1>
        <p>Форма заполнялась: <?=$sent?> раз.</p>
        <form method="post" action="18_6_Session.php">
            <input type="hidden" name="form-checker" value="1">

<!--            <div class="mb-3">-->
<!--                <label for="exampleInputPassword1" class="form-label">Title</label>-->
<!--                <input value="" class="form-control" name="title" type="text" placeholder="title" aria-label="Title">-->
<!--            </div>-->
<!---->
<!--            <div class="mb-3">-->
<!--                <label for="exampleFormControlTextarea1" class="form-label">Text</label>-->
<!--                <textarea class="form-control" id="text" name="text" rows="3"></textarea>-->
<!--            </div>-->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
</body>
</html>

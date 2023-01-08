
<?php
if(isset($_POST['title']) && !empty($_POST['title'])){
    setcookie('form-send', 1);
}
if(isset($_COOKIE['form-send']) && $_COOKIE['form-send'] == 1){
    echo 'Форма уже отправлена';
}
else{
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
            <form method="post" action="18_5_Cookie.php">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Title</label>
                    <input value="" class="form-control" id="title" name="title" type="text" placeholder="title" aria-label="Title">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Text</label>
                    <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</body>
</html>
<?php
}
?>
<?php
require_once 'autoload.php';
use ClassTelegraphText as NN;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Form</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Form</h1>
            <form method="post" action="input_text.php">
                <?php
                if($_POST){
                    if(strlen($_POST['author']) > 0 && strlen($_POST['email']) > 0 && strlen($_POST['text']) <= 500){
                        var_dump($_POST) . PHP_EOL;
                        $objFileStorage = new FileStorage();
                        $objTelegraphText = new NN\TelegraphText('test_text_file.txt');

                        $objTelegraphText->author = $_POST['author'];
                        $objTelegraphText->published = date("Y-m-d");
                        $objTelegraphText->text = $_POST['text'];

                        //--------- создание -------------
                        $slugReturn = $objFileStorage->create($objTelegraphText);
                        //--------- создание -------------
                        if($slugReturn){
                            echo '<div class="alert alert-success" role="alert">Данные успешно отправлены!</div>';
                        }
                    }
                    else{
                        echo '<div class="alert alert-danger" role="alert">Ошибка при заполнении формы!</div>';
                    }
                }
                ?>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author</label>
                    <input class="form-control" id="author" name="author" type="text" placeholder="Author" aria-label="Author">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@mail.ru" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We will never share your email with anyone else. But this is not accurate</div>
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
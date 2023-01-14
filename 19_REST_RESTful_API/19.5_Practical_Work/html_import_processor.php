<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>HtmlProcessor form</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>HtmlProcessor form</h1>
        <form method="post" action="html_import_processor.php">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Введите адрес сайта</label>
                <input value="" class="form-control" name="siteUrl" type="text" placeholder="Site-url" aria-label="Site-url">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if($_POST){
            $curl = curl_init($_POST['siteUrl']); // Инициализируем CURL и передаем ему сразу url
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Для возврата результата передачи в качестве строки из curl_exec() вместо прямого вывода в браузер.
            //curl_setopt($curl, CURLOPT_HEADER, true); // Показываем заголовки
            //curl_setopt($curl, CURLOPT_NOBODY, true); // Возвращаем только заголовки
            //curl_setopt($curl, CURLOPT_HTTPGET, true); //для сброса метода HTTP-запроса на метод GET. Так как GET используется по умолчанию, этот параметр необходим только в случае, если метод запроса был ранее изменён.
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Следуем за редиректом
            $array_to_json = array('raw_text' => curl_exec($curl)); // Создаем массив для преобразования его в JSON
            $json = json_encode($array_to_json); // Преобразовываем массив в - JSON
            curl_close($curl); // Закрываем дескриптор

            $curl2 = curl_init('http://localhost/welcome/19_REST_RESTful_API/19.5_Practical_Work/HtmlProcessor.php');
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl2, CURLOPT_POSTFIELDS, $json);
            echo curl_exec($curl2);
            curl_close($curl2);
        }
        ?>
    </div>
</div>
</body>
</html>
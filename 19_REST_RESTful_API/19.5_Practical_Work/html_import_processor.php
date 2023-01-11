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
    </div>
</div>

<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

    $url = 'https://mastersuper.ru/';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPGET, 1);
    curl_setopt($curl, CURLOPT_PORT, 443);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $array_to_json = array('raw_text' => curl_exec($curl));
    $json = json_encode($array_to_json);

    // Create a CURLStringFile object
    $cstringfile = new CURLStringFile('test upload contents','test.txt','text/plain');

    // Assign POST data
    $data = array('test_string' => $cstringfile);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    
    var_dump($cstringfile);
    var_dump($_POST);

?>

</body>
</html>
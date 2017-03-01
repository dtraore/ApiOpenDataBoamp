<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API - POCKET</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/api.js"></script>
</head>
<body>
    <form>
        <input type="text" placeholder="vous cherchez" id="query" name="query">
        <input type="button" name="search" id="search">
    </form>

    <?php
    require_once 'Model/Callback.php';
    require_once 'Model/API.php';
    //use Model\API;
     $api = new \Model\API();
    $test = $api->getAll('loi');

    //$items = $test['content']['item'];
    //$items = array_splice($items, count($items)-10);
    var_dump($test);
    //$results = $api->getAnnonces($items);
    $api->closeCurl();
    //var_dump($results);
    ?>
</body>
</html>
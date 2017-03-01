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
    require_once 'Model/API.php';
     $api = new API();
    $test = $api->getAll('loi');

    $string = 'http://schemas.journal-officiel.gouv.fr/schemabook/boamp/Boamp_v110.xsd';
    $pos = strpos($string, '.xsd');
    if ($pos)
    {
        $stock = substr($string,$pos-4,4);
    }

    var_dump($stock, $test['content']);
    $results = $api->getAnnonce('11-40989', 'v110');
    $api->closeCurl();
    var_dump($results);
    ?>
</body>
</html>
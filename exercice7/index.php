<?php
    $date = new DateTime();
    // pour le fuseau horaire
    $timeUtc = new DateTimeZone('Europe/Paris');
    $date->setTimezone($timeUtc);
    var_dump($date);
    $inter = new DateInterval('P22D');
    $date->add($inter);
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partie 9 exercice 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-secondary">

<p class="text-center mt-5 text-warning fs-2">
    La date du jour + 20 jours :
</p>
<p class="text-center mt-1 text-white fs-2">
    <?=$date->format('d-m-Y');?>
</p>

</body>
</html>
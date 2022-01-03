<?php
    // avec fonctions
    $date1 = time();
    $date2 = strtotime("2016-5-16");
    $daysNumberCalcul = $date1 - $date2;
    $totalDays = floor($daysNumberCalcul/86400);

    // avec l'objet DateTime
    $since = '2016-5-16';
    $d = new DateTime();
    $d2 = new DateTime($since);
    $diff = ($d2->diff($d));
    var_dump($diff);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partie 9 exercice 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark">

<p class="text-center mt-5 text-warning fs-2">
    Nombre de jours qui sépare la date du jour avec le 16 mai 2016 :
</p>
<p class="text-center mt-1 text-white fs-2">
    <?=$totalDays;?>
</p>

<p class="text-center mt-5 text-warning fs-2">
    Avec DateTime
</p>
<p class="text-center mt-1 text-white fs-2">
    <?=$diff->days;?>
</p>
<p class="text-center mt-1 text-white fs-4">Il y a également dans cette même période
<span class="text-warning"><?=$diff->y;?></span> années et <span class="text-warning"><?=$diff->m;?></span> mois qui se sont écoulées.
</p>


</body>
</html>
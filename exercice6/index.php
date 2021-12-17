<?php
$number = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partie 9 exercice 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark">

<p class="text-center mt-5 text-warning fs-2">
    nombre de jours dans le mois de Février :
</p>
<p class="text-center mt-1 text-white fs-2">
    <?=$number;?>
</p>

</body>
</html>
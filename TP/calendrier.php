<?php
    $month = htmlspecialchars($_GET['month']); //Mois choisi par l'utilisateur    
    $year = htmlspecialchars($_GET['years']);  //Année choisie par l'utilisateur
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); //Nombre de jours du mois choisi par l'utilisateur    
    $firstDayMonth = date("N", mktime(0, 0, 0, $month, 1, $year));  //1er jour du mois choisi par l'utilisateur
    $lastDayMonth = date("N", mktime(0, 0, 0,$month, $daysInMonth, $year)); //dernier jour du mois choisi par l'utilsateur

    $lastMonth = $month - 1;
    if ($lastMonth < 1) {
        $lastMonth = 12;
    }
    $NumberOfDayOfLastMonth = cal_days_in_month(CAL_GREGORIAN, $lastMonth, $year);
    // var_dump($NumberOfDayOfLastMonth);
    // $lastDaysPreviousMonth = date("N", mktime(0, 0, 0,$lastMonth, $NumberOfDayOfLastMonth, $year));
    
    

    $days = [];
    $monthInString = [
        "01" => 'Janvier',
        "02" => 'Février',
        "03" => 'Mars',
        "04" => 'Avril',
        "05" => 'Mai',
        "06" => 'Juin',
        "07" => 'Juillet',
        "08" => 'Août',
        "09" => 'Septembre',
        "10" => 'Octobre',
        "11" => 'Novembre',
        "12" => 'Décembre',
    ];

    $datemonth = $monthInString[$month];
    // var_dump($datemonth);


    $crossSymbol = "";

    for ($i = $firstDayMonth - 2; $i >= 0; $i--) {
        array_push($days, $NumberOfDayOfLastMonth-$i);
    }
    
    for ($i = 1; $i <= $daysInMonth; $i++) {
        array_push($days, $i);  
    }

    for ($i = $lastDayMonth; $i < 7 ; $i++) {
        array_push($days, $crossSymbol);  
    }
$week = count($days) / 7;

$event = [
    '25-12' => 'Noel',
    '21-11' => 'Anniversaire Gary',
    '18-07' => 'Anniversaire Louna',
    '28-05' => 'Anniversaire mon coeur'
];

// $nextMonth = ($month + 1 > 12) ? 1 : $month;

$nextMonth = $month + 1;
$nextYear = $year;
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear += 1;
};

if ($nextMonth < 10) {
    $nextMonth =  '0'.$nextMonth;
}

// $previousMonth = ($month - 1 < 1) ? 12 : $month;

$previousMonth = $month - 1;
$previousYear = $year;
if ($previousMonth < 1) {
    $previousMonth = 12;
    $previousYear -= 1;
};

if ($previousMonth < 10) {
    $previousMonth =  '0'.$previousMonth;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partie 9 TP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-secondary">

        <!-- Mois et année sélectionné par l'utilisateur -->
<h1 class="text-center text-light m-1"><?=$datemonth.' '.$year;?></h1>

<div class="container p-0">
        <!-- mois précédent et suivant -->
    <div class="d-flex justify-content-center">
        <a href="calendrier.php?month=<?=$previousMonth;?>&years=<?=$previousYear?>" class="btn btn-info m-3">&lt</a>
        <a href="calendrier.php?month=<?=$nextMonth;?>&years=<?=$nextYear;?>" class="btn btn-info m-3">&gt</a>
    </div>
</div>

        <!-- Calendrier -->
        
<div class="container p-0 ">
    <div class="table-responsive d-flex justify-content-center">     
        <table class="table table-bordered table-dark table-sm m-0 p-3 w-75">
            <thead class="thead-light text-center">
                <tr>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                    <th>Dimanche</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $increment = 0;
                    for ($w = 1; $w <= $week; $w++) { ?>
                        <tr>
                            <?php                           
                                for ($i = 1; $i <= 7; $i++) { 
                                    $value = $days[$increment];
                                    if ($value < 10) {
                                        $value = '0'.$value;
                                    } else {
                                        $value;
                                    }
                                    $increment++;
                                    $changeBg = "bg-white";
                                    if (isset($event[$value.'-'.$month])) {
                                        $eventColor = "text-info";
                                        $changeBg = "bg-white";
                                    }else {
                                        $eventColor = "text-warning";
                                        $changeBg = "table-dark";
                                    }
                                    if ($value == 0) {
                                        $value = '';
                                        $changeBg ="bg-secondary";
                                    }
                                    ?>
                                    <td class="<?=$eventColor;?> <?=$changeBg;?> p-3 text-center"> 
                                        <?=$event["$value-$month"] ?? $value?>                                       
                                    </td>
                            <?php  }
                            ?>
                        </tr>
                    <?php
                    }                   
                ?>    
            </tbody>
        </table>
    </div> 
</div>
    
</body>
</html>
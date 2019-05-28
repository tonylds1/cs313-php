<?php
$greetings = [
    'Good Morning Visitor',
    'Good Afternoon Visitor',
    'Good Evening Visitor',
];

$date = new DateTime();
$hour = (int) $date->format('H');
$index = 0;
if ($hour > 18) {
    $index = 2;
} else if ($hour > 12) {
    $index = 1;
}

$statement = 'Hi! I am the server in '. $date->getTimezone()->getName()
    . '. Here it is ' . $date->format('H:i')
    . '. So, ' . $greetings[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tony´s Home Page for CS313 Web Engineering II</title>
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:400,700%7CBitter:400,400italic,700&amp;subset=latin,latin" media="all">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class='container d-flex flex-column col-6  '>
        <div id="header justify-content-end">
            <a href="assignments" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">See Week Exercices</a>
        </div>
        <div id='my-picture'>
            <div id='me-bra'> <img src="img/me-bra.png" alt="Tony Moraes"></div>
            <div id='me-usa'> <img src="img/me-usa.png" alt="Tony Moraes"></div>
            <div id='me-img'> <img src="img/me.png" alt="Tony Moraes"></div>
        </div>
        <div id='slogan' class='justify-content-center'>
            <p class='align-self-center'>HOME FOR WEB ENGINEERING II COURSE</p>
        </div>
        <div id='my-name' class='align-self-center'>
            Tony Moraes
        </div>
        <div id='about-me' class='justify-content-center'>
            <p class='text-center'>
                Brazilian php coder. Eager for agile management. Actually Scrum Master at Vox Tecnologia.
                I dont have enough time for games but I would love to spent sometimes with CS-Global.
            </p>
        </div>
        <hr>
        <?php echo $statement; ?>
    </div>
</body>
</html>
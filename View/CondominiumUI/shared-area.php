<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tony´s Home Page for CS313 Web Engineering II</title>
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:400,700%7CBitter:400,400italic,700&amp;subset=latin,latin" media="all">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class='container d-flex flex-column col-6  '>
        <div id="header justify-content-end">
            <a href="assignments" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">See Week Exercices</a>
        </div>

        <div class="justify-content-center search-box">
            <h1><?=$sharedArea->getName(); ?></h1>
            <div id="header justify-content-end">
                <a href="shared-area/delete/<?=$sharedArea->getId(); ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Delete</a>
                <a href="shared-area/update/<?=$sharedArea->getId(); ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Update</a>
            </div>

        </div>
    </div>
</body>
</html>
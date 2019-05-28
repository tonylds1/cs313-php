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

        <div class="justify-content-center">
            <form method="post" action="week05">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name='id' placeholder="ID">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name='name' placeholder="Description">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="justify-content-center">
            <ul>
        <?php foreach ($list as $sharedArea): ?>
            <li><?=$sharedArea->getId();?> - <?=$sharedArea->getName();?></li>
        <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
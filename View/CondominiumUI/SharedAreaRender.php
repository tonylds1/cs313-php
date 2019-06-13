<?php

namespace Simplex;

class SharedAreaRender implements IRender
{
    private $path;

    /**
     * BaseRender constructor.
     */
    public function __construct(string $path)
    {
        $this->path = '../View/CondominiumUi/'.$path;
    }

    public function render()
    {
?>
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
                <?php include $this->path; ?>
            </div>
        </body>
        </html>
<?php
    }
}
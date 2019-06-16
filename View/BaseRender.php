<?php

namespace View;

use cs313\Controllers\AbstractSimplexController;
use Simplex\SessionHandler;

class BaseRender implements IRender
{
    private $render;
    private $vars;

    /**
     * BaseRender constructor.
     */
    public function __construct(IRender $render, $vars = [])
    {
        $this->vars = $vars;
        $this->render = $render;
    }

    public function render(array $vars = [])
    {
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tony´s Home Page for CS313 Web Engineering II</title>
            <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:400,700%7CBitter:400,400italic,700&amp;subset=latin,latin" media="all">
            <link rel="stylesheet" href="/css/style.css">
            <link rel="stylesheet" href="/css/bootstrap.min.css">
            <link rel="stylesheet" href="/css/font-awesome.min.css">
            <script src="/js/jquery-3.4.1.min.js"></script>
            <script src="/js/bootstrap.min.js"></script>
        </head>
        <body>
        <?php (new NavRender())->render($this->vars); ?>
        <?php if (isset($this->vars[SessionHandler::ERROR])): ?>
            <div class="alert alert-warning">
                <strong>Error!</strong> <?= $this->vars[SessionHandler::ERROR] ?>
            </div>
        <?php endif; ?>
            <div class='container d-flex flex-column col-6 '>
                <?php $this->render->render($this->vars); ?>
            </div>
        </body>
        </html>
<?php
        return ob_get_clean();
    }
}

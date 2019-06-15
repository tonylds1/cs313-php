<?php

namespace View;

use cs313\Controllers\AbstractSimplexController;
use Simplex\SessionHandler;

class NavRender implements IRender
{
    private $options;

    /**
     * BaseRender constructor.
     */
    public function __construct()
    {
        $this->options = [
            new NavElement('/front.php/assignments', 'Assignments', null),
            new NavElement('/front.php/communication/list', 'Communications', null),
            new NavElement('/front.php/shared-areas/list', 'Shared Areas', 0)
        ];
    }

    public function render(array $vars = [])
    {
?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php foreach ($this->options as $path => $label): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$path; ?>"><?=$label;?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="login" placeholder="Login" aria-label="Login">
                    <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                </form>
            </div>
        </nav>
<?php
    }
}

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
            new NavElement('/front.php/shared-area/list', 'Shared Areas', 0)
        ];
    }

    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);
?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php foreach ($this->options as $item): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$item->getHref(); ?>"><?=$item->getLabel();?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php if ($loggedUser) : ?>
                <div class="my-2 my-lg-0">
                    <span class="fa fa-user-md"></span> Welcome <strong><?= $loggedUser->getPerson()->getFullName(); ?></strong>
                    <a class="nav-link" href="/front.php/condominium/list"><span class="fa fa-sign-out"></span>Logout</a>
                </div>
                <?php else: ?>
                <form class="form-inline my-2 my-lg-0" action="/front.php/authentication/login" method="post">
                    <input class="form-control mr-sm-2" name="login" type="login" placeholder="Login" aria-label="Login">
                    <input class="form-control mr-sm-2" name='password' type="password" placeholder="Password" aria-label="Password">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                </form>
                <?php endif; ?>
            </div>
        </nav>
<?php
    }
}

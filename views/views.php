<?php

require_once('libs/smarty/Smarty.class.php');
class Views
{


    public $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
        $this->smarty->assign("User", AuthHelper::userLogged());
        $this->smarty->assign("usuario", AuthHelper::userName());

        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1200)) {
            session_destroy(); // destruye la sesión, y vuelve al login
            header("Location: " . BASE_URL . "inicio");
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}

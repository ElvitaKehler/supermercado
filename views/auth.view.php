<?php


require_once('views.php');

class AuthView extends Views
{


    public function showFormUser($error = null)
    {
        $this->smarty->assign("error", $error);
        $this->smarty->display('ShowFormUser.tpl');
    }

    public function showFormRegistroUser($error = null)
    {
        $this->smarty->assign("error", $error);
        $this->smarty->display('showFormRegUser.tpl');
    }

    public function viewUsers($usuarios)
    {
        $this->smarty->assign("usuarios", $usuarios);
        $this->smarty->display('showUsers.tpl');
    }

    public function showFormEditUser($usuario)
    {

        $this->smarty->assign("usuar", $usuario);
        $this->smarty->display('editUser.tpl');
    }
    public function showformreestablecer()
    {
        $this->smarty->display('restcontra.tpl');
    }
}

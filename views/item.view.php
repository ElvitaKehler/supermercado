<?php

require_once('views.php');

class ItemView extends Views
{


    public function items($rubros)
    {
        $this->smarty->assign("listarubros", $rubros);
        $this->smarty->display('items.tpl');
    }

    public function showError($msg)
    {
        $this->smarty->assign("mensaje", $msg);
        $this->smarty->display('showError.tpl');
    }

    public function deleteItem($rubros)
    {
        $this->smarty->assign("listarubros", $rubros);
        $this->smarty->display('items.tpl');
    }


    public function showFormEdit($item)
    {
        $this->smarty->assign("item", $item);
        $this->smarty->display('editItem.tpl');
    }

    public function ShowFormByItem()
    {
        $this->smarty->display('ShowFormItems.tpl');
    }

    public function ErrorAlCargarItem()
    {
        $this->smarty->display('errorCargaItem.tpl');
    }

    public function ErrorItemRepetido()
    {
        $this->smarty->display('errorItemRepetido.tpl');
    }
    public function errorAlBorrarRubro()
    {
        $this->smarty->display('errorrubroconproductos.tpl');
    }
}

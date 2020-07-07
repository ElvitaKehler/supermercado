<?php


require_once('views.php');


class ProductView extends Views
{


    public function showHome()
    {
        $this->smarty->display('home.tpl');
    }

    public function showProduct($productos)
    {
        $this->smarty->assign("listaProductos", $productos);
        $this->smarty->display('showProduct.tpl');
    }

    public function showProductRubros($productos, $imag)
    {
        $this->smarty->assign("listProductsByItem", $productos);
        $this->smarty->assign("imagenes", $imag);
        $this->smarty->display('showProductRubros.tpl');
    }

    public function ViewOne($id)
    {
        $this->smarty->assign("identif", $id);
        $this->smarty->display('ViewOne.tpl');
    }

    public function ShowFormByProduct($id)
    {
        $this->smarty->assign("listarubros", $id);
        $this->smarty->display('ShowFormProductos.tpl');
    }


    public function showFormEditProduct($producto)
    {
        $this->smarty->assign("producto", $producto);
        $this->smarty->display('editProduct.tpl');
    }

    public function ErrorAlCargarProd()
    {
        $this->smarty->display('errorCargaProduct.tpl');
    }

    public function ProductoRepetido()
    {
        $this->smarty->display('errorProductoRepetido.tpl');
    }

    public function errorAlBorrarProducto($msg)
    {
        $this->smarty->assign("mensaje", $msg);
        $this->smarty->display('showError.tpl');
    }
}

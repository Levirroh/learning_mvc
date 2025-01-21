<?php


class Core
{
    public function start($urlGet)
    {
        $acao = 'index';

        if (isset($urlGet['pagina'])) {// se a pagina existe
            $controller = ucfirst($urlGet['pagina'].'Controller');// no url vai ter "site.com/?pagina", isso serve para que todos os sites comecem com o pagina no começo, pode ser inserido outras palavras também.
        } else {// se nao tiver o parametro pagina no urlGet ele carrega automaticamente a página Home
            $controller = 'HomeController';
        }
        // Na variável $pagina, estamos salvando o urlGet da página


        if (!class_exists($controller)) {
            $controller = 'ErroController';
        }


        if (isset($urlGet['id']) && $urlGet['id'] != null) {
            $id = $urlGet['id'];
            echo $id;
        } else {
            $id = null;
            echo $id;
        }

        call_user_func_array(array(new $controller, $acao), array($id));

    }
}

?>
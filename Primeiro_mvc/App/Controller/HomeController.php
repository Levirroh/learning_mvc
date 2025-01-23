<?php

Class HomeController{
    public function index(){
        try {
            $collectPostagens = Postagem::selecionaTodos();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader); // cria um objeto "fileSystemLoader" que carrega a pasta com as views, a qual está referenciada ali
            $template = $twig->load('home.html'); // carregará a view da home.html

            $parametros = array(); // coleta o valor para ser usado como "variável" usando {{variavel}} no código html
            $parametros['postagens'] = $collectPostagens;


            $conteudo = $template->render($parametros);
            echo $conteudo;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>
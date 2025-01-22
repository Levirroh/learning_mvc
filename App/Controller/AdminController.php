<?php

Class AdminController{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('admin.html'); 

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }


    public function create(){
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('create.html'); 

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function insert(){
         
    }

}
?>


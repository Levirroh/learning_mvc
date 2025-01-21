<?php

Class PostController{
    public function index($params){

        try {
            $postagem = Postagem::selecionaPorId($params);

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader); 
            $template = $twig->load('single.html'); 

            $parametros = array(); 
            $parametros['titulo'] = $postagem->titulo_postagem;
            $parametros['conteudo'] = $postagem->conteudo_postagem;


            $conteudo = $template->render($parametros);
            echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
?>


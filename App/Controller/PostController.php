<?php

Class PostController{
    public function index($params){

        try {
            $postagem = Postagem::selecionaPorId($params);
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader); 
            $template = $twig->load('single.html'); 

            $parametros = array(); 
            $parametros['id'] = $postagem->id_postagem;
            $parametros['titulo'] = $postagem->titulo_postagem;
            $parametros['conteudo'] = $postagem->conteudo_postagem;

            $parametros['comentarios'] = $postagem->comentarios;


            $conteudo = $template->render($parametros);
            echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function addComent(){
        try{
            Comentario::inserir($_POST);
            echo '<script>alert("Comentário inserido com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=post&id='.$_POST['id'].'"</script>';
        }
        catch(Exception $e){
            echo '<script>alert("Publicação inserida com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=post&id='.$_POST['id'].'"</script>';

        }
    }

}
?>


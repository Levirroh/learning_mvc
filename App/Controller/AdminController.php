<?php

Class AdminController{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('admin.html'); 

        $objPostagens = Postagem::selecionaTodos();

        $parametros = array();
        $parametros['postagens'] = $objPostagens;

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
        try{
            Postagem::insert($_POST);
        
            echo '<script>alert("Publicação inserida com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=admin&metodo=index"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao inserir publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=admin&metodo=create"</script>';
        }
    }
    public function change($paramId){
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('update.html'); 

        $post = Postagem::selecionaPorId($paramId);

        $parametros = array();
        $parametros['id'] = $post->id_postagem;
        $parametros['titulo'] = $post->titulo_postagem;
        $parametros['conteudo'] = $post->conteudo_postagem;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    public function update()
    {
        try{
            Postagem::update($_POST);
            echo '<script>alert("Publicação alterada com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=admin&metodo=index"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao alterar a publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
        }

    }

    public function delete($paramId)
    {
        try{
             Postagem::delete($paramId);
            echo '<script>alert("Publicação deletada com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=admin&metodo=index"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao deletar a publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/?pagina=admin&metodo=index"</script>';
        }
       
    }

}
?>


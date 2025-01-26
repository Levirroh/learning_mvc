<?php


class UsuarioController{
    public function index(){
        try{
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('usuario.html'); 

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    public function create(){
        try{
            Usuario::insert( $_POST);
        
            echo '<script>alert("Usuário criado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao criar usuário publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/?pagina=usuario&metodo=index"</script>';
        }
    }

}
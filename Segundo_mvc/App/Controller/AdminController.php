<?php


class AdminController{
    public function index(){
        try{
        $collectUsuario = Usuario::selecionaTodos();
        
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('admin.html'); 

        $parametros = array();
        $parametros['usuarios'] = $collectUsuario;

        $conteudo = $template->render($parametros);
        echo $conteudo;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    public function create(){
        try{
            Tarefa::insert( $_POST);
        
            echo '<script>alert("Publicação inserida com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao inserir publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/?pagina=admin&metodo=index"</script>';
        }
    }
    public function delete($idTarefa){
        $con = Connection::getConn();
        
        try{
            Tarefa::delete($idTarefa);
            echo '<script>alert("Publicação deletada com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao deletar publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        }
    }
}
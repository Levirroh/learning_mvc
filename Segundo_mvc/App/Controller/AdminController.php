<?php


class AdminController{
    public function index(){
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('admin.html'); 

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;

    }
        public function create(){
            try{
                Tarefa::insert($_POST);
            
                echo '<script>alert("Publicação inserida com sucesso!");</script>';
                echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
            } catch(Exception $e){
                echo '<script>alert("Erro ao inserir publicação");</script>';
                echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/?pagina=admin&metodo=index"</script>';
            }
        }

}
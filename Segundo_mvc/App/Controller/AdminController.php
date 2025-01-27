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
        try{
            Tarefa::delete($idTarefa);
            echo '<script>alert("Publicação deletada com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao deletar publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        }
    }
    public function update(){        
        
        try{
            Tarefa::update($_POST);
            echo '<script>alert("Publicação alterada com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao alterar publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        }
    }
    public function change($idTarefa){        
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('update.html'); 

        $tarefa = Tarefa::selecionaPorId($idTarefa);

        $parametros = array();
        $parametros['id_tarefa'] = $tarefa->id_tarefa;
        $parametros['descricao_tarefa'] = $tarefa->descricao_tarefa;
        $parametros['setor_tarefa'] = $tarefa->setor_tarefa;
        $parametros['id_usuario'] = $tarefa->fk_usuario;
        $parametros['usuario_tarefa'] = $tarefa->nome_usuario;
        $parametros['prioridade_tarefa'] = $tarefa->prioridade_tarefa;


        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    public function changeStatus(){        
        
        try{
            Tarefa::updateStatus($_POST);
            echo '<script>alert("Publicação alterada com sucesso!");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        } catch(Exception $e){
            echo '<script>alert("Erro ao alterar publicação");</script>';
            echo '<script>location.href="http://localhost/learning_mvc/Segundo_mvc/"</script>';
        }
        
    }
}
<?php

Class HomeController{
    public function index(){
        try {
            // echo 'Home';
            $collectPostagems = Postagem::selecionaTodos();
            var_dump($collectPostagems);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>
<?php
//Core
require_once "App/Core/Core.php";


//Controllers
require_once "App/Controller/ErroController.php";
require_once "App/Controller/HomeController.php";
require_once "App/Controller/AdminController.php";
require_once "App/Controller/UsuarioController.php";


//Model
require_once "App/Model/Tarefa.php";
require_once "App/Model/Usuario.php";


//Database
require_once "lib/database/connection.php";

//Vendor
require_once 'vendor/autoload.php'; //  pega todos os arquivos da pasta vendor automaticamente

$template = file_get_contents('App/Template/estrutura.html');

ob_start(); // inicia ob
// tudo que tem dentro ele joga pra variavel saida, por exemplo o nome da página "Home"
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();

ob_end_clean();// termina ob

$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
// se ele encontrar a string (1), quero que substitua o valor dela por (2), quando o assunto for template (3)
echo $tplPronto; // mostra a tela do estrutura.html pela variável


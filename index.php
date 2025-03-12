<?php
include 'header.php';

$pagina = $_GET['aaa'];

switch($pagina){
    case 'home':include 'views/home.php'; break;
    case 'contatos': include 'views/contacts.php'; break;
    case 'login': include 'views/login.php'; break; 
    default: include 'views/home.php'; break;
}


include 'footer.php';
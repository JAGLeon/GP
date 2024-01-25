<?php

    if(!isset($_SESSION)){
        session_start();
    }
    
    require_once 'Libs/app.php';
    $app = new App();

?>
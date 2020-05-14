<?php
    require_once("inc/Header.php");    
    $session->logout();
    redirect("Index.php");  
    require_once("inc/Footer.php");
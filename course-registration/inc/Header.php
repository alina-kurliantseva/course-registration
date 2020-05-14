<?php
    ob_start();
    require_once("init.php");
?>
<!DOCTYPE html>
<html lang="en" style="position: relative; min-height: 100%;">
<head>
    <title>Alina Kurliantseva | Course Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PHP, CSS, Bootstrap, Adobe Photoshop">
    <meta name="keywords" content="PHP, CSS, Bootstrap, Adobe Photoshop"> 
    <link rel="stylesheet" href="./inc/bootstrap.min.css"/>
</head>

<body style="padding-top: 50px; margin-bottom: 60px;">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>   
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="Index.php">Home</a></li>
                        <li><a href="CourseSelection.php">Course Selection</a></li> 
                        <li><a href="CurrentRegistration.php">Current Registration</a></li>
                        <?php
                            if($session->is_signed_in()) {                        
                                echo "<li><a href='Logout.php'>Log Out</a></li>";
                            } else {
                                echo "<li><a href='Login.php'>Log In</a></li>";
                            }                    
                        ?>
                    </ul>
                </div>
            </div>  
        </div>
    </nav>
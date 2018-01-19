<?php

    /*
    Author: Brian, Kevin, Sonie
    017/16/2018
    handles routing using fat free framework*/

    //Require the autoload file
    require_once('vendor/autoload.php');
    session_start();

    //require("../config_campsambica.php");

    try{
        //instantiate a database object
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    //Create an instance of the Base class
    $f3 = Base::instance();

    $f3->set('DEBUG', 3);

    
    $f3->route('GET /', function($f3) {
                $view = new View;

                    $usernameCheck = $_SESSION['username'];
                    $passwordCheck = $_SESSION['password'];
                    if($usernameCheck == null || $passwordCheck == null){
                        $f3->reroute('/login');
                    }
                echo $view->render('pages/login.html');
    });

           
    require("./indexRequire/brian.php");
    require("./indexRequire/kevin.php");
    require("./indexRequire/sonie.php");

    //Run fat free
    $f3->run();
?>
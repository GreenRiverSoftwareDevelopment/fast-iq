<?php

    /*
    Author: Brian, Kevin, Sonie
    01/16/2018
    handles routing using fat free framework*/

    //Require the autoload file
    require_once('vendor/autoload.php');
    session_start();

    require("../config_fast-iq.php");
    
    try
    {
        //instantiate a database object
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        echo "PDOEXCEPTION WAS CAUGHT HERE!";
    }

    //Create an instance of the Base class
    $f3 = Base::instance();

    $f3->set('DEBUG', 3);
    $categoryDB = new CategoryDB();
    $unitDB = new UnitDB();
    $exerciseDB = new ExerciseDB();

    
    $f3->route('GET /', function($f3)
    {

        //$usernameCheck = $_SESSION['username'];
        //$passwordCheck = $_SESSION['password'];
        //if($usernameCheck == null || $passwordCheck == null){
        //    $f3->reroute('/login');
        //}
        $view = new View;
                    
        echo $view->render('pages/login.php');
    });
    
    $f3->route('GET /category', function($f3)
    {
        $categories =  $GLOBALS['categoryDB']->allCategories();
        $f3->set('categories', $categories);
        echo Template::instance()->render('pages/category_page.html');
    });
    
    $f3->route('GET /exercises', function($f3)
    {
        echo Template::instance()->render('pages/exercise_page.html');
    });
    
    $f3->route('GET /units', function($f3)
    {
        echo Template::instance()->render('pages/unit_page.html');
    });

           
    require("./indexRequire/brian.php");
    require("./indexRequire/kevin.php");
    require("./indexRequire/sonie.php");

    //Run fat free
    $f3->run();
?>
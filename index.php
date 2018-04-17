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
    }

    //Create an instance of the Base class
    $f3 = Base::instance();

    $f3->set('DEBUG', 3);
    
    $categoryDB = new CategoryDB();
    $unitDB = new UnitDB();
    $exerciseDB = new ExerciseDB();
    $memberDB = new MemberDB();
    $studentDB = new StudentsDB();
    $gradeDB = new GradesDB();

    //$f3->route('GET /', function($f3)
    //{
    //
    //    //$usernameCheck = $_SESSION['username'];
    //    //$passwordCheck = $_SESSION['password'];
    //    //if($usernameCheck == null || $passwordCheck == null){
    //    //    $f3->reroute('/login');
    //    //}
    //    $view = new View;
    //                
    //    echo $view->render('pages/login.php');
    //});
    
    $f3->route('GET /angularTest', function($f3)
    {
        $view = new View;
        echo $view->render('pages/angularTest.html');
    });
    
    $f3->route('GET /', function($f3)
    {
        $categories =  $GLOBALS['categoryDB']->allCategories();
        $students =  $GLOBALS['studentDB']->allStudents();
        $exercises =  $GLOBALS['exerciseDB']->allExercises();
        
        $f3->set('categories', $categories);
        $f3->set('students', $students);
        $f3->set('exercises', $exercises);
        echo Template::instance()->render('pages/category_page_two.html');
    });
    
            $f3->route('GET /categoryBackend', function($f3)
            {
                $usernameCheck = $_SESSION['username'];
                $passwordCheck = $_SESSION['password'];
                if($usernameCheck == null || $passwordCheck == null)
                {
                    $f3->reroute('/');
                }
                
                $categories =  $GLOBALS['categoryDB']->allCategories();
                $f3->set('categories', $categories);
                echo Template::instance()->render('pages/category_backend.html');
            });
    
    //$f3->route('GET /units', function($f3)
    //{
    //    $units =  $GLOBALS['unitDB']->unitsByCategory($_SESSION['categoryID']);
    //    
    //    $categoryName = $GLOBALS['categoryDB']->getCategoryByID($_SESSION['categoryID']);
    //    
    //    $f3->set('categoryName', $categoryName);
    //    $f3->set('units', $units);
    //    echo Template::instance()->render('pages/unit_page.html');
    //});
    
            $f3->route('GET /unitsBackend', function($f3)
            {
                $usernameCheck = $_SESSION['username'];
                $passwordCheck = $_SESSION['password'];
                if($usernameCheck == null || $passwordCheck == null)
                {
                    $f3->reroute('/');
                }
                
                $units =  $GLOBALS['unitDB']->unitsByCategory($_SESSION['categoryID']);
                
                $categoryName = $GLOBALS['categoryDB']->getCategoryByID($_SESSION['categoryID']);
                
                $f3->set('categoryName', $categoryName);
                $f3->set('units', $units);
                echo Template::instance()->render('pages/unit_backend.html');
            });
    
    //$f3->route('GET /exercises', function($f3)
    //{
    //    $exercises =  $GLOBALS['exerciseDB']->exercisesByUnit($_SESSION['unitID']);
    //            
    //    $unitName = $GLOBALS['unitDB']->getUnitByID($_SESSION['unitID']);
    //            
    //    $f3->set('categoryID', $_SESSION['categoryID']);
    //    $f3->set('unitName', $unitName);
    //    $f3->set('exercises', $exercises);
    //    echo Template::instance()->render('pages/exercise_page.html');
    //});
    
            $f3->route('GET /exercisesBackend', function($f3)
            {
                $usernameCheck = $_SESSION['username'];
                $passwordCheck = $_SESSION['password'];
                if($usernameCheck == null || $passwordCheck == null)
                {
                    $f3->reroute('/');
                }
                
                $exercises =  $GLOBALS['exerciseDB']->exercisesByUnit($_SESSION['unitID']);
                
                $unitName = $GLOBALS['unitDB']->getUnitByID($_SESSION['unitID']);
                
                $f3->set('categoryID', $_SESSION['categoryID']);
                $f3->set('unitName', $unitName);
                $f3->set('exercises', $exercises);
                echo Template::instance()->render('pages/exercise_backend.html');
            });
            
            $f3->route('POST /studentGrade', function($f3)
            {
                $GLOBALS['gradeDB']->updateGrade($_POST['student'], $_POST['exercise'], $_POST['grade']);
                $f3->reroute('/');
            });
            
            $f3->route('POST /studentAttendance', function($f3)
            {
                $GLOBALS['studentDB']->updateStudent($_POST['student'], $_POST['daysMissed']);
                $f3->reroute('/');
            });
            
            $f3->route('GET /studentInfo', function($f3)
            {
                $students = $GLOBALS['studentDB']->allStudents();
                $grades = $GLOBALS['gradeDB']->allGrades();
                
                $f3->set('students', $students);
                $f3->set('grades', $grades);
                echo Template::instance()->render('pages/student_info.html');
            });
    

           
    require("./indexRequire/brian.php");
    require("./indexRequire/kevin.php");
    require("./indexRequire/sonie.php");

    //Run fat free
    $f3->run();
?>

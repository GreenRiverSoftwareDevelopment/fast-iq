<?php

        $f3->route('POST /addCategory/@id', function($f3, $params)
        {
            $GLOBALS['categoryDB']->addCategory($_POST['category_name'], $_POST['category_image']);
            $f3->reroute('/categoryBackend');
        });
        
            $f3->route('POST /editCategory/@id', function($f3, $params)
            {
                $GLOBALS['categoryDB']->editCategory($_POST['category_name'], $_POST['category_image'], $params['id']);
                $f3->reroute('/categoryBackend');
            });
            
                $f3->route('GET /deleteCategory/@id', function($f3, $params)
                {
                    $GLOBALS['categoryDB']->deleteCategory($params['id']);
                    $f3->reroute('/categoryBackend');
                });
        
        $f3->route('POST /addUnit/@id', function($f3, $params)
        {
            $GLOBALS['unitDB']->addUnit($_POST['unit_name'], $_SESSION['categoryID']);
            $f3->reroute('/unitsBackend');
        });
        
            $f3->route('POST /editUnit/@id', function($f3, $params)
            {
                $GLOBALS['unitDB']->editUnit($_POST['unit_name'], $params['id']);
                $f3->reroute('/unitsBackend');
            });
            
                $f3->route('GET /deleteUnit/@id', function($f3, $params)
                {
                    $GLOBALS['unitDB']->deleteUnit($params['id']);
                    $f3->reroute('/unitsBackend');
                });
                
        $f3->route('POST /addExercise/@id', function($f3, $params)
        {
            $GLOBALS['exerciseDB']->addExerciseName($_SESSION['unitID'], $_POST['exercise_name']);
            $f3->reroute('/exercisesBackend');
        });
        
            $f3->route('POST /editExercise/@id', function($f3, $params)
            {
                $GLOBALS['exerciseDB']->editExerciseName($params['id'], $_POST['exercise_name']);
                $f3->reroute('/exercisesBackend');
            });
            
                $f3->route('GET /deleteExercise/@id', function($f3, $params)
                {
                    $GLOBALS['exerciseDB']->deleteExercise($params['id']);
                    $f3->reroute('/exercisesBackend');
                });

    $f3->route('GET /exercises/@id', function($f3, $params)
    {
            $_SESSION['unitID'] = $params['id'];
        $f3->reroute('/exercises');
    });
    
            $f3->route('GET /exercisesBackend/@id', function($f3, $params)
            {
                    $_SESSION['unitID'] = $params['id'];
                $f3->reroute('/exercisesBackend');
            });
     
    $f3->route('GET /units/@id', function($f3, $params)
    {
            $_SESSION['categoryID'] = $params['id'];
        $f3->reroute('/units');
    });
    
            $f3->route('GET /unitsBackend/@id', function($f3, $params)
            {
                    $_SESSION['categoryID'] = $params['id'];
                $f3->reroute('/unitsBackend');
            });
            
    $f3->route('GET /exerciseSummary/@id', function($f3, $params)
    {
            $_SESSION['exerciseID'] = $params['id'];
        $f3->reroute('/exerciseSummary');
    });
    
            $f3->route('GET /exerciseSummaryBackend/@id', function($f3, $params)
            {
                    $_SESSION['exerciseID'] = $params['id'];
                $f3->reroute('/exerciseSummaryBackend');
            });
            
    $f3->route('POST /login', function($f3)
    {
        $usernameAttempt = $_POST['username'];
        $userPasswordAttempt = $_POST['password'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $userExists = $GLOBALS['memberDB']->adminNameExists($usernameAttempt, $userPasswordAttempt);
        
        if($userExists)
        {
            $f3->reroute('/categoryBackend');
        }
        else
        {
            $f3->reroute('/');
        }
    });

    $f3->route('GET /logout', function($f3)
    {
        session_destroy();
        $f3->reroute('/');
    });
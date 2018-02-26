<?php
    $f3->route('GET /exerciseSummary', function($f3)
    {
        $exercise = $GLOBALS['exerciseDB']->getExerciseByID($_SESSION['exerciseID']);
        
        $f3->set('unitID', $_SESSION['unitID']);
        $f3->set('exercise', $exercise);
        echo Template::instance()->render('pages/exercise_summary_page.html');
    });
    
    
     $f3->route('GET /exerciseSummaryBackend', function($f3)
            {
                $usernameCheck = $_SESSION['username'];
                $passwordCheck = $_SESSION['password'];
                if($usernameCheck == null || $passwordCheck == null)
                {
                    $f3->reroute('/');
                }
                
                $exercises =  $GLOBALS['exerciseDB']->exercisesByUnit($_SESSION['unitID']);
                
                $unitName = $GLOBALS['unitDB']->getUnitByID($_SESSION['unitID']);
                
                $exercise = $GLOBALS['exerciseDB']->getExerciseByID($_SESSION['unitID']);
                
                $f3->set('categoryID', $_SESSION['categoryID']);
                $f3->set('unitName', $unitName);
                $f3->set('exercises', $exercises);
                $f3->set('exercise', $exercise);
                echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
     
     
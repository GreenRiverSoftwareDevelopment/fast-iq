<?php

        $f3->route('POST /addCategory/@id', function($f3, $params)
        {
            $GLOBALS['categoryDB']->addCategory($_POST['category_name'], $_POST['category_image']);
            $f3->reroute('/categoryBackend');
        });
        
            //$f3->route('POST /editCategory/@id', function($f3, $params)
            //{
            //    $GLOBALS['categoryDB']->editCategory($_POST['category_name'], $params['id']);
            //    $f3->reroute('/categoryBackend');
            //});

                $f3->route('POST /deleteCategory', function($f3, $params)
                {
                        $idArray = $_POST['category_id'];
                        for($i = 0; $i < count($idArray); ++$i)
                        {
                             $GLOBALS['categoryDB']->deleteCategory($idArray[$i]);   
                        }
                        $f3->reroute('/categoryBackend');
                });
                
                    $f3->route('POST /editCategoryNames', function($f3, $params)
                    {
                        $categoryArray = $_POST['category_name'];
                        $idArray = $_POST['category_id'];
                        for($i = 0; $i < count($categoryArray); ++$i)
                        {
                             $GLOBALS['categoryDB']->editCategory($categoryArray[$i], $idArray[$i]);   
                        }
                        $f3->reroute('/categoryBackend');
                    });
        
        $f3->route('POST /addUnit/@id', function($f3, $params)
        {
            $GLOBALS['unitDB']->addUnit($_POST['unit_name'], $_SESSION['categoryID']);
            $f3->reroute('/unitsBackend');
        });
        
            //$f3->route('POST /editUnit/@id', function($f3, $params)
            //{
            //    $GLOBALS['unitDB']->editUnit($_POST['unit_name'], $params['id']);
            //    $f3->reroute('/unitsBackend');
            //});
            
                $f3->route('GET /deleteUnit/@id', function($f3, $params)
                {
                    $GLOBALS['unitDB']->deleteUnit($params['id']);
                    $f3->reroute('/unitsBackend');
                });
                
                    $f3->route('POST /editUnitNames', function($f3, $params)
                    {
                        $unitArray = $_POST['unit_name'];
                        $idArray = $_POST['unit_id'];
                        for($i = 0; $i < count($unitArray); ++$i)
                        {
                             $GLOBALS['unitDB']->editUnit($unitArray[$i], $idArray[$i]);   
                        }
                        $f3->reroute('/unitsBackend');
                    });
                
        $f3->route('POST /addExercise/@id', function($f3, $params)
        {
            $GLOBALS['exerciseDB']->addExerciseName($_SESSION['unitID'], $_POST['exercise_name']);
            $f3->reroute('/exercisesBackend');
        });
        
            //$f3->route('POST /editExercise/@id', function($f3, $params)
            //{
            //    $_SESSION['exercise_id'] = $params['id'];
            //    $GLOBALS['exerciseDB']->editExerciseName($params['id'], $_POST['exercise_name']);
            //    $f3->reroute('/exercisesBackend');
            //});
            
                $f3->route('GET /deleteExercise/@id', function($f3, $params)
                {
                    $GLOBALS['exerciseDB']->deleteExercise($params['id']);
                    $f3->reroute('/exercisesBackend');
                });
                
                    $f3->route('POST /editExerciseNames', function($f3, $params)
                    {
                        $exerciseArray = $_POST['exercise_name'];
                        $idArray = $_POST['exercise_id'];
                        for($i = 0; $i < count($exerciseArray); ++$i)
                        {
                             $GLOBALS['exerciseDB']->editExerciseName($idArray[$i], $exerciseArray[$i]);   
                        }
                        $f3->reroute('/exercisesBackend');
                    });

    //$f3->route('GET /exercises/@id', function($f3, $params)
    //{
    //        $_SESSION['unitID'] = $params['id'];
    //    $f3->reroute('/exercises');
    //});
    
            $f3->route('GET /exercisesBackend/@id', function($f3, $params)
            {
                    $_SESSION['unitID'] = $params['id'];
                $f3->reroute('/exercisesBackend');
            });
     
    //$f3->route('GET /units/@id', function($f3, $params)
    //{
    //        $_SESSION['categoryID'] = $params['id'];
    //    $f3->reroute('/units');
    //});
    
            $f3->route('GET /unitsBackend/@id', function($f3, $params)
            {
                    $_SESSION['categoryID'] = $params['id'];
                $f3->reroute('/unitsBackend');
            });
            
    //$f3->route('GET /exerciseSummary/@id', function($f3, $params)
    //{
    //        $_SESSION['exerciseID'] = $params['id'];
    //    $f3->reroute('/exerciseSummary');
    //});
    
            $f3->route('GET /exerciseSummaryBackend/@id', function($f3, $params)
            {
                    $_SESSION['exerciseID'] = $params['id'];
                              $questions_array = explode(',', $exercise['exercise_questions']);
               $f3->set('questions_array', $questions_array);
     //           
                $f3->reroute('/exerciseSummaryBackend');
            });
            
    $f3->route('POST /login', function($f3)
    {
        $cost = 10; //Cost of generating has. The higher the value the more secure, but the slower the load of the server.
        $usernameAttempt = $_POST['username'];
        $userPasswordAttempt = $_POST['password'];

        
        
        $usergrabbed = $GLOBALS['memberDB']->memberByUsername($usernameAttempt);
        
         $hashPasswordVerify = password_verify($userPasswordAttempt , $usergrabbed['password']);
        $usernameExists = $GLOBALS['memberDB']->memberByUsername($usernameAttempt);
        
        
       
        if($hashPasswordVerify && $usernameExists)
        {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
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

<?php
    $f3->route('GET /exerciseSummary', function($f3)
    {
        $exercise = $GLOBALS['exerciseDB']->getExerciseByID($_SESSION['exerciseID']);
        
        $f3->set('unitID', $_SESSION['unitID']);
        $f3->set('exercise', $exercise);
        echo Template::instance()->render('pages/exercise_summary_page.html');
    });
    
    
     //$f3->route('GET /exerciseSummaryBackend/@id', function($f3, $params)
     //       {
     //           
     //           $_SESSIONS['exerciseID'] = $params['id'];
     //           
     //           
     //           
     //           
     
     //           
     //           $f3->reroute('/exerciseSummaryBackend');
     //       });
     
     $f3->route('GET /exerciseSummaryBackend', function($f3){
          
        $usernameCheck = $_SESSION['username'];
                $passwordCheck = $_SESSION['password'];
                if($usernameCheck == null || $passwordCheck == null)
                {
                    $f3->reroute('/');
                }
        
        
        
                
                $exercises =  $GLOBALS['exerciseDB']->exercisesByUnit($_SESSION['unitID']);
                
                $unitName = $GLOBALS['unitDB']->getUnitByID($_SESSION['unitID']);
                
                $exercise = $GLOBALS['exerciseDB']->getExerciseByID($_SESSION['exerciseID']);
                
                 $questions_array = explode(',', $exercise['exercise_questions']);
               $f3->set('questions_array', $questions_array);
                $f3->set('categoryID', $_SESSION['categoryID']);
                $f3->set('unitName', $unitName);
                $f3->set('exercises', $exercises);
                $f3->set('exercise', $exercise);
                
                //setting exercise id 
                $f3->set('exerciseID', $_SESSION['exerciseID']);
                $youtubeLink = $exercise['exercise_video'];
            $youtubeEmbededCode = substr($youtubeLink, strpos($youtubeLink, "=") + 1); 
            $video = '<iframe width="700" height="480" src="https://www.youtube.com/embed/'.$youtubeEmbededCode.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
            $f3->set('youtubeEmbededCode', $youtubeEmbededCode);
                
            
        echo Template::instance()->render('pages/exercise_summary_backend.html');
     });
     
     
        
            $f3->route('GET|POST /editExerciseSummary/@id', function($f3, $params)
            {
                
                $GLOBALS['exerciseDB']->editExerciseSummary($params['id'], $_POST['exercise_summary']);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                $f3->reroute('/exerciseSummaryBackend');
                
                //echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
            
            $f3->route('GET|POST /editExerciseVideo/@id', function($f3, $params)
            {
                
                $GLOBALS['exerciseDB']->editExerciseVideo($params['id'], $_POST['videolink']);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                $f3->reroute('/exerciseSummaryBackend');
                
                //echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
            
            $f3->route('GET|POST /editExerciseImage/@id', function($f3, $params)
            {
                
                $GLOBALS['exerciseDB']->editExerciseImage($params['id'], $_POST['imagelink']);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                $f3->reroute('/exerciseSummaryBackend');
                
                //echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
             
             $f3->route('GET|POST /editExerciseQuestion/@id', function($f3, $params)
            {
                
                $GLOBALS['exerciseDB']->editExerciseQuestion($params['id'], $_POST['question']);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                $f3->reroute('/exerciseSummaryBackend');
                
                //echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
            
     
     
     
     
     
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
            $allVideoLinks = $GLOBALS['exerciseDB']->allVideoLinks($_SESSION['exerciseID']);
            $unitName = $GLOBALS['unitDB']->getUnitByID($_SESSION['unitID']);
            
            $exercise = $GLOBALS['exerciseDB']->getExerciseByID($_SESSION['exerciseID']);
            
            $categoryName = $GLOBALS['categoryDB']->getCategoryByID($_SESSION['categoryID']);
            
            
            
            $f3->set('categoryName', $categoryName);
            
             $questions_array = explode(',', $exercise['exercise_questions']);
             
             
             
            $f3->set('questions_array', $questions_array);
            $f3->set('unitID', $_SESSION['unitID']);
            $f3->set('categoryID', $_SESSION['categoryID']);
            $f3->set('unitName', $unitName);
            $f3->set('exercises', $exercises);
            $f3->set('exercise', $exercise);
            
            
            
            //setting exercise id 
            $f3->set('exerciseID', $_SESSION['exerciseID']);
            $youtubeLink = $exercise['exercise_video'];
            $links = $allVideoLinks['videoId']['link'];
            //$youtubeEmbededCode = substr($youtubeLink, strpos($youtubeLink, "=") + 1); 
            //$video = '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$youtubeEmbededCode.'" width="100%" height="460px" allowfullscreen></iframe>';
            //$f3->set('youtubeEmbededCode', $youtubeEmbededCode);
            //$f3->set('videoLinkExcercises', $links);
                
            
            $youtubeLink = $exercise['exercise_video'];
            $youtubeEmbededCode = substr($youtubeLink, strpos($youtubeLink, "=") + 1);
            $splitTwoEqualSigns = explode("=", $youtubeEmbededCode);
            $splitByAndSymbol = explode("&", $youtubeEmbededCode);
            $linkWeNeed = $splitByAndSymbol[0];
            $video = '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$linkWeNeed.'" width="100%" height="460px" allowfullscreen></iframe>';
            $f3->set('youtubeEmbededCode', $linkWeNeed);
            $f3->set('videoLinkExcercises', $allVideoLinks);
            
        echo Template::instance()->render('pages/exercise_summary_backend.html');
     });
     
     
        
            $f3->route('GET|POST /editExerciseSummary/@id', function($f3, $params)
            {
                
                $GLOBALS['exerciseDB']->editExerciseSummary($params['id'], $_POST['exercise_summary']);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                
                $newVideoLink = $_POST['newlink'];
                $linksArray = $_POST['videolink'];
                
                
                if(!empty($newVideoLink)){
                    $exercise = $GLOBALS['exerciseDB']->addVidelink($params['id'], $newVideoLink);
                
                }
                
                
                foreach( $linksArray as $link){
                    $GLOBALS['exerciseDB']->editExerciseVideo($params['id'], $link);
                
                }
                
                $GLOBALS['exerciseDB']->editExerciseImage($params['id'], $_POST['imagelink']);
                
                function trim_value(&$value) 
                { 
                    $value = trim($value); 
                }
                
                $unmodifiedArray = $_POST['questions'];
                
                array_walk($unmodifiedArray, 'trim_value');
                $questionsArrayWithSpacesDeleted = array_filter($unmodifiedArray);
                $questions = implode(',', $questionsArrayWithSpacesDeleted);
                
                echo $_POST["questions"][0];
                echo "<br>";
                echo $_POST["questions"][1];
                echo "<br>";
                echo $_POST["questions"][2];
                $GLOBALS['exerciseDB']->editExerciseQuestion($params['id'], $questions);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                //$f3->reroute('/exerciseSummaryBackend');
                //print_r($_POST['questions']);
                //echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
            
            //$f3->route('GET|POST /editExerciseVideo/@id', function($f3, $params)
            //{
            //    $newVideoLink = $_POST['videolink'];
            //    $exercise = $GLOBALS['exerciseDB']->addVidelink($params['id'], $newVideoLink);
            //    
            //    $GLOBALS['exerciseDB']->editExerciseVideo($params['id'], $_POST['videolink']);
            //    //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
            //    
            //    $f3->reroute('/exerciseSummaryBackend');
            //    
            //    //echo Template::instance()->render('pages/exercise_summary_backend.html');
            //});
            
            $f3->route('GET|POST /editExerciseImage/@id', function($f3, $params)
            {
                
                $GLOBALS['exerciseDB']->editExerciseImage($params['id'], $_POST['imagelink']);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                $f3->reroute('/exerciseSummaryBackend');
                
                //echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
             
             $f3->route('GET|POST /editExerciseQuestion/@id', function($f3, $params)
            {
                function trim_value(&$value) 
                { 
                    $value = trim($value); 
                }
                
                $unmodifiedArray = $_POST['questions'];
                
                array_walk($unmodifiedArray, 'trim_value');
                $questionsArrayWithSpacesDeleted = array_filter($unmodifiedArray);
                $questions = implode(',', $questionsArrayWithSpacesDeleted);
                
                $GLOBALS['exerciseDB']->editExerciseQuestion($params['id'], $questions);
                //$id, $exercise_name, $exercise_summary, $exercise_image, $exercise_video, $exercise_questions
                $f3->reroute('/exerciseSummaryBackend');
                
                //echo Template::instance()->render('pages/exercise_summary_backend.html');
            });
            
     
     
     
     
     

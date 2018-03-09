<?php

    $f3->route('POST /loginCheck', function($f3)
    {
        $usernameAttempt = $_POST['username'];
        $userPasswordAttempt = $_POST['password'];
        $userExists = $GLOBALS['memberDB']->adminNameExists($usernameAttempt, $userPasswordAttempt);
        
        if($userExists){
            $_SESSION['username'] = $usernameAttempt;
            echo "Welcome " . $_SESSION['username'];
        }
        else{
            echo "User does not Exist";
        }
        
        
    });
    
    $f3->route('POST /createAdmin', function($f3)
    {
        $cost = 10; //Cost of generating has. The higher the value the more secure, but the slower the load of the server.
        $usernameCreated = $_POST['username'];
        $passwordCreated = $_POST['password'];
        
        $hashedPassword = password_hash($passwordCreated , PASSWORD_DEFAULT, ["cost" => $cost]) ; //Creates the hashed password.
        $hashPasswordVerify = password_verify($passwordCreated , $hashedPassword);
        $memberCreated = $GLOBALS['memberDB']->addMember($usernameCreated, $hashedPassword);
        
        echo  "User has been created";
        //var_dump($hashPasswordVerify);
        
        
    });
    
        $f3->route('GET /categorySecond', function($f3)
    {
         $categories =  $GLOBALS['categoryDB']->allCategories();
        $f3->set('categories', $categories);
        
        $exercise = $GLOBALS['exerciseDB']->getExerciseByID($params['id']);
                    
        $questions_array = explode(',', $exercise['exercise_questions']);
        $f3->set('questions_array', $questions_array);
       
        $testPassedVar = $_SESSION['passedVar'];
        $_SESSION['testName'] = $_SESSION['passedVar'];
        
        // echo ' <select id="subcategory-select">';
        foreach($categories as $category)
        {
              
              /*        
            echo "<option value=\"{$category['category_id']}\">";
            echo $category['category_name'];
            echo "</option>";      
             echo $category['category_id'];
             */
        }
        
    //echo '<br />';
       // var_dump($categories);
       // echo '</select>';
       
       // var_dump($categories);

        
        echo Template::instance()->render('pages/category_page_two.html');
    });
        
        
    $f3->route('GET /grabUnits/@id', function($f3, $params)
    {
         $units =  $GLOBALS['unitDB']->unitsByCategory($params['id']);
        $f3->set('units', $units);
        
        
        //echo ' <select id="subcategory-select">';
        echo '<option disabled selected>Please select</option>';
        foreach($units as $unit)
        {
              
                      
            echo "<option value=\"{$unit['unit_id']}\">";
            echo $unit['unit_name'];
            echo "</option>";
            
            
           
             
        }
        
        //echo '<br />';
       
        //var_dump($categories);
       // echo '</select>';
       
       // var_dump($categories);

           // $_SESSION['passedVar'] = "We were passedddddddddddddddYYYYYYYYYYYYYYYYYYYSdfdfd"; 
       //echo Template::instance()->render('pages/category_page_two.html');
    });
    
        $f3->route('GET /grabExercise/@id', function($f3, $params)
    {
         $exercises =  $GLOBALS['exerciseDB']->exercisesByUnit($params['id']);
        $f3->set('exercise', $exercises);
        
        
        //echo ' <select id="subcategory-select">';
        echo '<option disabled selected>Please select</option>';
        foreach($exercises as $exercise)
        {
              
                      
            echo "<option value=\"{$exercise['exercise_id']}\">";
            echo $exercise['exercise_name'];
            echo "</option>";
                     
        }
        
        //echo '<br />';
       
        //var_dump($categories);
       // echo '</select>';
       
       // var_dump($categories);

           // $_SESSION['passedVar'] = "We were passedddddddddddddddYYYYYYYYYYYYYYYYYYYSdfdfd"; 
       //echo Template::instance()->render('pages/category_page_two.html');
    });
        
        
    $f3->route('GET /summaryExercise/@id', function($f3, $params)
    {
        $summaryEntries =  $GLOBALS['exerciseDB']->getExerciseByID($params['id']);
        $f3->set('exercise', $summaryEntries);
        
            echo '<br>';
            echo'<h3 class="text-center">'.$summaryEntries['exercise_summary'].'</h3>';
            echo '<br>';
                     
        
        
        //echo '<br />';
       
        //var_dump($categories);
       // echo '</select>';
       
       // var_dump($categories);

           // $_SESSION['passedVar'] = "We were passedddddddddddddddYYYYYYYYYYYYYYYYYYYSdfdfd"; 
       //echo Template::instance()->render('pages/category_page_two.html');
    });
    
    
    $f3->route('GET /videoExercise/@id', function($f3, $params)
    {
        $summaryEntries =  $GLOBALS['exerciseDB']->getExerciseByID($params['id']);
        $f3->set('exercise', $summaryEntries);
        
            $youtubeLink = $summaryEntries['exercise_video'];
            $youtubeEmbededCode = substr($youtubeLink, strpos($youtubeLink, "=") + 1);
            echo '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$youtubeEmbededCode.'" width="100%" height="460px" allowfullscreen></iframe>';
                     
        
        
        //echo '<br />';
       
        //var_dump($categories);
       // echo '</select>';
       
       // var_dump($categories);

           // $_SESSION['passedVar'] = "We were passedddddddddddddddYYYYYYYYYYYYYYYYYYYSdfdfd"; 
       //echo Template::instance()->render('pages/category_page_two.html');
    });
    
    $f3->route('GET /questionsExercise/@id', function($f3, $params)
    {
        $exercise = $GLOBALS['exerciseDB']->getExerciseByID($params['id']);
                    
        $questions_array = explode(',', $exercise['exercise_questions']);
        $f3->set('questions_array', $questions_array);
        
        foreach($questions_array as $question)
        {
            echo '<li class="list-group-item"><h3>'.$question.'</h3></li>';
        }
            
        
    });
    
    $f3->route('GET /pictureExercise/@id', function($f3, $params)
    {
        $exercise = $GLOBALS['exerciseDB']->getExerciseByID($params['id']);
        
        echo '<img src="'.$exercise['exercise_image'].'" class="img-fluid" alt="Responsive image">';
        
            
        
    });

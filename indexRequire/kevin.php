<?php

    $f3->route('POST /loginCheck', function($f3)
    {
        $usernameAttempt = $_POST['username'];
        $userPasswordAttempt = $_POST['password'];
        $userExists = $GLOBALS['memberdb']->adminNameExists($usernameAttempt, $userPasswordAttempt);
        
        if($userExists){
            $_SESSION['username'] = $usernameAttempt;
            echo "Welcome " . $_SESSION['username'];
        }
        else{
            echo "User does not Exist";
        }
        
        
    });
    
        $f3->route('GET /categorySecond', function($f3)
    {
         $categories =  $GLOBALS['categoryDB']->allCategories();
        $f3->set('categories', $categories);
       
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
        
        echo '<br />';
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

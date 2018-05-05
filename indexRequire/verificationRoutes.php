<?php

    $f3->route('POST /verifyLogin', function($f3)
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
            echo 1;
        }
        else
        {
            echo 0;
        }

    });
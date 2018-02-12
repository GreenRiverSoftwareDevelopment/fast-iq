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
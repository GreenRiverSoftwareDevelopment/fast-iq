<?php

    $f3->route('GET /login', function($f3)
    {
        echo Template::instance()->render('pages/login.html');
    });
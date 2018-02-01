<?php
    $f3->route('GET /exercises/@id', function($f3, $params)
    {
            $exercises =  $GLOBALS['exerciseDB']->exercisesByUnit($params['id']);
            $f3->set('exercises', $exercises);
        echo Template::instance()->render('pages/exercise_page.html');
    });
     
    $f3->route('GET /units/@id', function($f3, $params)
    {
            $units =  $GLOBALS['unitDB']->unitsByCategory($params['id']);
            $f3->set('units', $units);
        echo Template::instance()->render('pages/unit_page.html');
    });
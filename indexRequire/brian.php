<?php
    $f3->route('GET /exercises/@id', function($f3, $params)
    {
            $_SESSION['unitID'] = $params['id'];
        $f3->reroute('/exercises');
    });
     
    $f3->route('GET /units/@id', function($f3, $params)
    {
            $_SESSION['categoryID'] = $params['id'];
        $f3->reroute('/units');
    });
    $f3->route('GET /exerciseSummary/@id', function($f3, $params)
    {
            $_SESSION['exerciseID'] = $params['id'];
        $f3->reroute('/exerciseSummary');
    });
<?php
    $f3->route('GET /exerciseSummary', function($f3)
    {
        $exerciseName = $GLOBALS['exerciseDB']->getExerciseByID($_SESSION['exerciseID']);
        
        $f3->set('unitID', $_SESSION['unitID']);
        $f3->set('exerciseName', $exerciseName);
        echo Template::instance()->render('pages/exercise_summary_page.html');
    });
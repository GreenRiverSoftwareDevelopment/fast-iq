<?php
    $f3->route('GET /exerciseSummary', function($f3)
    {
        $exercise = $GLOBALS['exerciseDB']->getExerciseByID($_SESSION['exerciseID']);
        
        $f3->set('unitID', $_SESSION['unitID']);
        $f3->set('exercise', $exercise);
        echo Template::instance()->render('pages/exercise_summary_page.html');
    });
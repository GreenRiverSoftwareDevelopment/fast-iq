<?php
    $f3->route('GET /exerciseSummary', function($f3)
    {
        echo Template::instance()->render('pages/exercise_summary_page.html');
    });
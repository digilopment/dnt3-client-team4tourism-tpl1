<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;

class articleListModulController
{
    public function run()
    {
        $rest = new Rest();
        $db = new DB();
        $poll_id = $rest->webhook(2);
        $question_id = $rest->webhook(4);
        $poll_input_name = 'poll_' . $poll_id . '_' . $question_id;
        (new DntLibrary\Base\Dnt)->render(__DIR__ . '/tpl.php');
    }
}

$modul = new articleListModulController();
$modul->run();

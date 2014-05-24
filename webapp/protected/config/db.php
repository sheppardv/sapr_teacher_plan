<?php

switch(SERVER_TYPE){
    case 'danylo-vbox':
        $db_conf = array(
            'connectionString' => 'mysql:host=localhost;dbname=sapr_teacher_plan',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        );
        break;

    //production
    default:
        $db_conf = array(
            'connectionString' => 'mysql:host=localhost;dbname=chat_assistant',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'new-password',
            'charset' => 'utf8'
        );
        break;
}

return $db_conf;
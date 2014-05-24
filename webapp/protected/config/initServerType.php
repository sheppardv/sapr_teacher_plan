<?php

if(!defined('SERVER_TYPE')){
    switch(php_uname('n')){
        case 'DANYLO-THINKPAD':
        case 'ubuntu12':
            define('SERVER_TYPE', 'danylo-vbox');
            break;
        default:
            define('SERVER_TYPE', 'production');
            break;
    }
}
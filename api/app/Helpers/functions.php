<?php

date_default_timezone_set('Asia/Shanghai');

/**
 * 
 * @return int status
 */
function timeJudge() {
    $timeList = [
        'TIME_END_FIRST_COLLECT',
        'TIME_END_FIRST_MATCH',
        'TIME_END_SECOND_COLLECT',
        'TIME_END_SECOND_MATCH',
        'TIME_EXPIRE'
    ];
    $now = new DateTime;
    for ($i = 4; $i > -1; $i--) {
        $dateTime = new DateTime(env($timeList[$i]));
        if ($now >= $dateTime) {
            return $i + 1;
        }
    }
    return 0;
}

function generatePassword() {
    // return strtoupper(substr(hash('sha256', mt_rand()), mt_rand(0, 56), 6));
    $set = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0, $psw = ''; $i < 6; $i++) {
        $psw .= $set[mt_rand(0, 35)];
    }
    return $psw;
}
<?php

declare(strict_types = 1);

function is_input_empty(string $username, string $pwd, string $firstname, string $surname, string $gender, int $DOBday, int $DOBmonth, int $DOByear) { 
    if (empty($username) || empty($pwd) || empty($firstname) || empty($surname) || empty($gender) || $DOBday === '00' || $DOBmonth === '00' || $DOByear === '0000') {
        return true;
    } else {
        return false;
    }
}

function is_username_invalid(string $username) {
    if (!filter_var($username, FILTER_VALIDATE_EMAIL) && !preg_match('/^[0-9]{10}+$/', $username)) {
        return true;
    } else {
        return false; 
    }
}

function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo , $username)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $username, string $pwd, string $firstname, string $surname, string $gender, int $DOBday, int $DOBmonth, int $DOByear) {
    set_user($pdo, $username, $pwd, $firstname, $surname, $gender, $DOBday, $DOBmonth, $DOByear);
}
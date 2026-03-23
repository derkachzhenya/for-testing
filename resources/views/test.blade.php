<?php

$user = new stdClass();
$user->email = "test@example.com";

$email = $user?->email;

var_dump($email);
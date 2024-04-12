<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:01front.php');

?>
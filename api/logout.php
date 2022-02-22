<?php
session_start();

unset($_SESSION[$_POST['user']]);
?>
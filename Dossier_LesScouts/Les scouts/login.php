<?php
    session_start();

    if(isset($_COOKIE['login'])){
        $_SESSION['id'] = $_COOKIE['login'];
        if(isset($_COOKIE['habilitation'])){
            $_SESSION['habilitation'] = $_COOKIE['habilitation'];
        }
    }
?>
<?php
session_start();
//            $id = 10;
//            $_SESSION["user_id"] = $id;
//
//                           session_start();
//            echo $_SESSION["user_id"];
//            echo $_SESSION["email"];
 $_SESSION["email"] = Auth::user()->email;

//            session_destroy();
?>
@include('checkedData')

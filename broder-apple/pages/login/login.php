<?php
    include '../../db.php';
    
    $user = filter_input(INPUT_POST, "user");
    $password = filter_input(INPUT_POST,  "password");

    $userTb = new User();

    $res = $userTb->login_user($user, $password);

    echo $res;
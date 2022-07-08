<?php


function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}


function getMyPermission($id)
{
    switch ($id) {
        case 1:
            return 'examinationBranch';
            break;
        case 2:
            return 'mainStoreClark';
            break;
        case 3:
            return 'viceChancellor';
            break;

        default:
            return 'student';
            break;
    }
}


?>

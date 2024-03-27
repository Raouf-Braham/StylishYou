<?php

include('../functions/myfunctions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        redirect("../index.php", "You're not authorized to access this page");
    }
}

else{

    redirect("../Login_Form/register.php", "Login to continue");

}


?>
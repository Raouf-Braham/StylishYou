<?php

include('functions/redirect.php');

if (!isset($_SESSION['auth'])) 
{
    redirect("Login_Form/register.php","Log In To Continue !");
}
?> 
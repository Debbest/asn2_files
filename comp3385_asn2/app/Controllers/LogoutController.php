<?php
use config\SessionHandler;
class LogoutController
{
    public function __construct($method)
   {
        //destroy session
        SessionHandler::destroySession();

        header('Location: ./');
    }
}
<?php

class ErrorHandler
{
    public function register()
    {
        set_error_handler([$this, 'errorHandler']);
    }
    public function errorHandler(){
        return true;
    }
}
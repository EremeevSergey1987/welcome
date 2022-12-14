<?php

require_once '../interfaces/LoggerInterface.php';
require_once '../interfaces/EventListenerInterface.php';
require_once '../entities/View.php';

/**
 * public function attachEvent - присвоить событию обработчик
 * public function deTouchEvent - убрать обработчик события.
 */
abstract class User implements EventListenerInterface{
    protected int $id;
    protected string $name;
    protected string $role;
    abstract function getTextsToEdit(): void;
    public function attachEvent(string $nameMethod, callable $functionName): void
    {

    }
    public function deTouchEvent (string $nameMethod): void
    {

    }
}
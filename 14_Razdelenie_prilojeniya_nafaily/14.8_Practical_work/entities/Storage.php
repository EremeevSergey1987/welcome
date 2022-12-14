<?php

abstract class Storage implements LoggerInterface, EventListenerInterface{
    abstract function create (&$objTelegraphText);
    abstract function read ($slugSearch);
    abstract function update ($slugUpdete, $titleUpdete, $objTelegraphText);
    abstract function delete ($slugDelete);
    abstract function list ();

    public function logMessage(string $textError) : void
    {
        // Добавить текст в лог
    }
    public function lastMessages(int $countMessage): array
    {
        // Вернуть количество сообщений которое указано в $countMessage
        return [];

    }
    public function attachEvent(string $classMethodName, callable $function): void
    {

    }
    // убрать обработчик события.
    public function deTouchEvent (string $nameMethod): void
    {

    }
}
<?php
interface EventListenerInterface {
    // присвоить событию обработчик
    public function attachEvent(string $nameMethod, callable $functionName): void;
    // убрать обработчик события.
    public function deTouchEvent (string $nameMethod): void;
}
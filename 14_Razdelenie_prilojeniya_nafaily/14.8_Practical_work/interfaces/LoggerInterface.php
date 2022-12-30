<?php
interface LoggerInterface {
    // Записать сообщение в лог.
    public function logMessage(string $textError): void;
    // Получить список последних сообщений из лога.
    public function lastMessages(int $countMessage): array;
}
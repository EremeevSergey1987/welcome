<?php
function exception_handler(Throwable $exception)
{
    return $exception->getMessage();
}
set_exception_handler('exception_handler');

throw new Exception('Неперехваченное исключение');
echo "Не выполнено\n";

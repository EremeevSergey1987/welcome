<?php

class MyTestException extends Exception {

}

throw new MyTestException('TRY TO CALL');

phpinfo();
echo 'ok';
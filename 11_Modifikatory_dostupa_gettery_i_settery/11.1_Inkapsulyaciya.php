<?php

class Bank {
    private $accounts = [];
    private $corrAccount;
    private $bankCode;

    public function __consruct($corrAccount, $bankCode)
    {
        $this->corrAccount = $corrAccount;
        $this->bankCode = $bankCode;

    }

    public function createAccount($accNomber)
    {
        $this->accounts[] = $accNomber;

    }
    public function showAccountsList()
    {
        print_r($this->accounts);
    }
}

$sberBank = new Bank('111', 'SB_222');
$sberBank->createAccount('1111111111');
$sberBank->createAccount('8888888888');


$alfaBank = new Bank('333', 'AL_444');
$alfaBank->createAccount('7777777777');
$alfaBank->createAccount('6666666666');

$alfaBank->corrAccount = '111';

$alfaBank->showAccountsList();

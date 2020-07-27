<?php
class AccountModel extends Db
{
    public function getAccountList()
    {
        // Bước 2: Tạo câu query
        $sql = parent::$connection->prepare('SELECT * FROM accounts');
        return parent::select($sql);
    }
    public function addAccount($accountUser, $accountPassword)
    {
        $sql = parent::$connection->prepare('INSERT INTO `accounts`(`account_id`, `account_user`, `account_password`, `account_role`) VALUES (Null,?,?,2)');
        $sql->bind_param('ss', $accountUser,$accountPassword);
        return $sql->execute();
    }
}

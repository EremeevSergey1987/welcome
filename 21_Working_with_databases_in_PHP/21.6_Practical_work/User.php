<?php
class User{
    public function __CONSTRUCT(){

    }
    public function create($assocArray)
    {

    }
    public function update($id, $assocArray)
    {

    }
    public function delete($id)
    {

    }
    public function list()
    {
        $connection = new PDO("mysql:host=localhost;dbname=users_db;charset=utf8",'root','prestigio1987');
        $statement = $connection->query('SELECT * FROM Users');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}

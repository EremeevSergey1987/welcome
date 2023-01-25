<?php
class User{
    public function __CONSTRUCT(){

    }
    public function create($array_params) : void
    {
        $connection = new PDO("mysql:host=localhost;dbname=users_db;charset=utf8",'root','prestigio1987');
        $statement = $connection->prepare("INSERT INTO `Users`(`id`, `first_name`, `last_name`, `age`, `email`, `date_created`) VALUES(null, :first_name, :last_name, :age, :email, :date_created)");
        $statement->execute(['first_name' => $array_params['first_name'], 'last_name' => $array_params['last_name'], 'email' => $array_params['email'], 'age' => $array_params['age'], 'date_created' => $array_params['date_created']]);
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
        return $statement->fetchAll();
    }
}

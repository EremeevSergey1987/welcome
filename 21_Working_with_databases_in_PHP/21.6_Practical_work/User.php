<?php
class User{
    public static $connection = NULL;
    public function __CONSTRUCT(){
        self::$connection = new PDO("mysql:host=localhost;dbname=users_db;charset=utf8",'root','prestigio1987');
    }
    public function create($array_params) : void
    {
        $statement = self::$connection->prepare("INSERT INTO `Users`(`id`, `first_name`, `last_name`, `age`, `email`, `date_created`) VALUES(null, :first_name, :last_name, :age, :email, :date_created)");
        $statement->execute(['first_name' => $array_params['first_name'], 'last_name' => $array_params['last_name'], 'email' => $array_params['email'], 'age' => $array_params['age'], 'date_created' => $array_params['date_created']]);
    }
    public function update($id, $array_params) : void
    {
        $statement = self::$connection->prepare("UPDATE Users SET first_name=:first_name, last_name=:last_name, email=:email, age=:age, date_created=:date_created WHERE id=:id;");
        $statement->execute(['first_name' => $array_params['first_name'], 'last_name' => $array_params['last_name'], 'email' => $array_params['email'], 'age' => $array_params['age'], 'date_created' => $array_params['date_created'], 'id'=> $id]);

    }
    public function delete($id) : void
    {
        $statement = self::$connection->prepare("DELETE FROM Users WHERE id = :id");
        $statement->execute(['id' => $id]);
    }
    public function list() : array
    {
        $statement = self::$connection->query('SELECT * FROM Users');
        $statement->execute();
        return $statement->fetchAll();
    }
}
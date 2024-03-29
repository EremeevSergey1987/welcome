<?php
include_once 'User.php';
$UserObj = new User();
$list_users = $UserObj->list();
$UserObj->delete($_GET['dell']);
if(!empty($_GET)){
header('location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Users</title>
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        if (isset($_POST['edit'])) {
            try{
                if(strlen($_POST['first_name']) == 0){
                    throw new Exception('Ошибка редактирования! Нужно указать имя!');
                }
                if(strlen($_POST['last_name']) == 0){
                    throw new Exception('Ошибка редактирования! Нужно указать фамилию!');
                }
                if(strlen($_POST['age']) == 0){
                    throw new Exception('Ошибка редактирования! Нужно указать возраст!');
                }
                if(strlen($_POST['email']) == 0){
                    throw new Exception('Ошибка редактирования! Нужно указать электронную почту!');
                }
                $UserObj->update($_POST['id'], $_POST);
                $_POST = array();
                header('location: index.php');
            }
            catch (Exception $e){
                echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
            }
        }
        ?>
        <h1>Users <i class="bi bi-person-fill"></i></h1>
        <h2>list all users</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">first_name</th>
                <th scope="col">last_name</th>
                <th scope="col">email</th>
                <th scope="col">age</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php foreach($list_users AS $item => $value):?>
            <tr>
                <th scope="row"><?=$value['id']?></th>
                <td><?=$value['first_name']?></td>
                <td><?=$value['last_name']?></td>
                <td><?=$value['email']?></td>
                <td><?=$value['age']?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_<?=$value['id']?>">Edit <i class="bi bi-gear"></i></button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDell_<?=$value['id']?>">Delete <i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php foreach($list_users AS $item => $value):?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal_<?=$value['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="index.php">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit user <?=$value['first_name']?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <input name="id" type="hidden"  value="<?=$value['id']?>">
                                <input name="edit" type="hidden"  value="1">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">first_name</label>
                                    <input name="first_name" value="<?=$value['first_name']?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="ivan">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">last_name</label>
                                    <input name="last_name" value="<?=$value['last_name']?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ivanov">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">email</label>
                                    <input name="email" value="<?=$value['email']?>" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">age</label>
                                    <input name="age" value="<?=$value['age']?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="33">
                                    <input name="date_created" type="hidden"  value="<?=(new \DateTime())->format('Y-m-d H:i:s');?>">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalDell_<?=$value['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Подтверждение удаления</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Вы действительно хотите удалить пользователя с именем <?=$value['first_name']?>?</p>
                            <p class="text-danger">Это действие невозможно отменить!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет, оставить пользователя</button>
                            <a class="btn btn-danger" href="index.php?dell=<?=$value['id']?>">Да, удалить!</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <h2>Insert new user</h2>
        <?php
        if (isset($_POST['new_user'])) {
            try{
                if(strlen($_POST['first_name']) == 0){
                    throw new Exception('Нужно указать имя!');
                }
                if(strlen($_POST['last_name']) == 0){
                    throw new Exception('Нужно указать фамилию!');
                }
                if(strlen($_POST['age']) == 0){
                    throw new Exception('Нужно указать возраст!');
                }
                if(strlen($_POST['email']) == 0){
                    throw new Exception('Нужно указать электронную почту!');
                }
                $UserObj->create($_POST);
                $_POST = array();
                echo '<meta http-equiv="refresh" content="0">';
            }
            catch (Exception $e){
                echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
            }
        }
        ?>
        <form action="index.php" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">first_name</label>
            <input name="first_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="ivan" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];}?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">last_name</label>
            <input name="last_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ivanov" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];}?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">email</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">age</label>
            <input name="age" type="tel" class="form-control" id="exampleFormControlInput1" placeholder="33" value="<?php if(isset($_POST['age'])){echo $_POST['age'];}?>">
            <input name="date_created" type="hidden"  value="<?=(new \DateTime())->format('Y-m-d H:i:s');?>">
        </div>
            <input name="new_user" type="hidden"  value="1">
            <button type="submit" class="btn btn-success">Add user <i class="bi bi-person-fill"></i></button>
        </form>
    </div>
</div>
<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">© 2022 Company, Inc</p>
    </footer>
</div>
</body>
</html>
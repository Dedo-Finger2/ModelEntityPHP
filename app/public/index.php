<?php 
use app\database\entity\UserEntity;
use app\database\model\Post;
use app\database\model\User;

require __DIR__."/../../vendor/autoload.php";

$userEntity = new UserEntity();
$userEntity->name = "Wesley";
$userEntity->email = "wesley@gmail.com";
$userEntity->setPasswordHash("123");

$user = new User();
// $user->create($userEntity);
$users = $user->all('id_user, name, email, password');

var_dump($users);

$post = new Post();
$posts = $post->all();


<?php define('APP_ENABLED', 'mbm') ?>
<?php define('APPMODE', 'dev') ?>

<?php require_once ('../core/app/' . APP_ENABLED . '/config/main.php'); ?>
<?php require_once '../core/bootstrap.php'; ?>

Data mapper turshilt. ajillaj bgaa. gehdee functions uud n dutuu..... 
<br />
<?php
$db = M\Test\MySQLAdapter::getInstance(array('localhost', 'batmunkh', 'qweqwe123', 'test'));

// create instance of 'UserMapper' class
$userMapper = new M\Test\UserMapper($db);

// get existing user by ID
$user = $userMapper->get;
// display user data
echo 'ID: ' . $user->id . '<br />First Name: ' . $user->fname . '<br />Last Name: ' . $user->lname . '<br />Email: ' . $user->email;

// create a new user and add her to the database
$user = new M\Test\User();
$user->fname = 'Sandra';
$user->lname = 'Smith';
$user->email = 'sandra@domain.com';
$userMapper->save($user);

// update existing user
$user = $userMapper->find(5);
$user->fname = 'Sandy';
$userMapper->save($user);

// delete existing user
$userMapper->delete($user);

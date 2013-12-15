<?php define('APP_ENABLED', 'mbm') ?>
<?php define('APPMODE', 'dev') ?>

<?php require_once ('../core/app/' . APP_ENABLED . '/config/main.php'); ?>
<?php require_once '../core/bootstrap.php'; ?>
<?php echo 'Welcome!'; ?>
<br />
<?php
// create a user model
$userModel = new M\Test\UserModel(new M\Test\MySQLAdapter(array('localhost', 'batmunkh', 'qweqwe123', 'test')), new \M\Cache\FileCache());


// fetch all the users and display their data
$users = $userModel->fetchAll();


foreach ($users as $user) {
    echo $user->id.'. ';
    echo '<br /> First Name: ' . $user->fname .
    ' Last Name: ' . $user->lname .
    ' Email: ' . $user->email . '<br />';
}
print_r($users);

// insert a new user
$inserted_id = $userModel->insert(array(
    'fname' => 'Susan',
    'lname' => 'Norton',
    'email' => 'susan@domain.com'
));

// delete an existing user
$userModel->delete(($inserted_id-1));

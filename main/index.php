<?php 
require("../model/database.php");
require("../model/todo_db.php");


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'signup';
	}
}

if ($action == 'signup') {
	include('signup.php');
} else if ($action == 'login') {
	include('login.php');
} else if ($action == 'init_user') {
	$fname = filter_input(INPUT_POST, 'fname');
	$lname = filter_input(INPUT_POST, 'lname');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$birthday = filter_input(INPUT_POST, 'bday');
	$password = filter_input(INPUT_POST, 'password');
	$gender = filter_input(INPUT_POST, 'gender');

	add_user($email, $fname, $lname, $phone, $birthday, $gender, $password);
	header("Location: .?action=todo_list");
} else if ($action == 'login') {
	$email = filter_input(INPUT_POST, 'email',
		FILTER_VALIDATE_INT);
	$password = filter_input(INPUT_POST, 'password',
		FILTER_VALIDATE_INT);
	foreach ($users as $user){
		if ($user['email'] == $email){
			if ($user['password'] == $password){
				header("Location: .?action=todo_list");
			}
		}
	}
} else if ($action == 'todo_list') {
	$name = get_name($email);
	$users = get_user($email);
	$todos = get_todos($email);
	include('todo_list.php');
}
?>
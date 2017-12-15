<?php

function add_user($email, $fname, $lname, $phone, $birthday, $gender, $password) {
	global $db;
	$query = 'INSERT INTO accounts
			  (email, fname, lname, phone, birthday, gender, password)
			  VALUES
			  (:email, :fname, :lname, :phone, :birthday, :gender, :password)';
	$statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':password', $password);
    $statement->execute();    
    $statement->closeCursor(); 
}

function get_user($email) {
	global $db;
	$query = 'SELECT * FROM accounts
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;    
}

function get_name($email) {
	global $db;
	$query = 'SELECT * FROM accounts
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $account = $statement->fetch();
    $statement->closeCursor();
    $name = $account['fname'];
    return $name;    
}

function get_user_email($id) {
	global $db;
	$query = 'SELECT * FROM accounts
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();

    return $email;    
}

function get_todos($owneremail) {
	global $db;
	$query = 'SELECT * FROM todos
              WHERE owneremail = :owneremail';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->execute();
    $todos = $statement->fetchAll();
    $statement->closeCursor();
    return $todos; 
}

function add_todo($owneremail, $message, $duedate) {
	global $db;
	$query = 'INSERT INTO todos
			  (id, owneremail, createddate, duedate, message, isdone)
              VALUES
              (:id, :owneremail, :createddate, :duedate, :message, :isdone)';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->bindValue(":message", $message);
    $statement->bindValue(":duedate", $duedate);
    $statement->execute();
}

function edit_todo_message($id, $message) {
	global $db;
	$query = "UPDATE todos
			  SET message = :message
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(":message", $message);
    $statement->execute();
}

function edit_todo_date($id, $duedate) {
	global $db;
	$query = "UPDATE todos
			  SET message = :message
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':message', $message);
    $statement->execute();
    $statement->closeCursor(); 
}

function complete_todo($id, $isdone) {
	global $db;
	$query = "UPDATE todos
			  SET isdone = '1'
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $statement->closeCursor(); 
}

function delete_todo($id) {
	global $db;
    $query = 'DELETE FROM todos
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();    
    $statement->closeCursor(); 
}


?>
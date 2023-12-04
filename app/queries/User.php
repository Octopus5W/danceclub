<?php 
/**
 * 	Model User
 *  Sur ce modèle, nous traiterons toutes les requêtes liées à l'utilisateur
 */

function getAllUsers()
{
	// Retourner tous les utilisateurs	
    global $conn;
    $sql = $conn->query("SELECT * FROM users");
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function getUserById($userId)
{
	// Retourner un utilisateur en fonction de son id
	global $conn;
    $sql = $conn->query("SELECT * FROM users WHERE id= '$userId'");
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function getUserByEmail($userEmail)
{
	// Retourner un utilisateur en fonction de son email
	global $conn;
    $sql = $conn->query("SELECT * FROM users WHERE email= '$userEmail'");
    return $sql->fetchAll(PDO::FETCH_ASSOC);
	
}

function addUser($userdata)
{
	$username = $userdata['username'];
	$password = $userdata['password'];
	$mail = $userdata['email'];
	$name = $userdata['name'];
	$surname = $userdata['surname'];
	$birthday = $userdata['birthday'];
	$userdata['role']?$role = $userdata['role']:$role = "user";
	// Ajouter un utilisateur
	global $conn;
	$sql = $conn->query("INSERT INTO users (username,password,email,name,surname,birthday,role) VALUES ('$username','$password','$mail','$name','$surname','$birthday','$role')");
	
	return $sql;
}

function deleteUser($userId)
{
	// Supprimer un utilisateur en fonction de son id
	global $conn;
	$sql= $conn->query("DELETE FROM users WHERE id = '$userId'");
	return $sql;
}


function updateUser($userdata, $id){
	// modifie un utilisateur dans la db
	$username = $userdata['username'];
	$password = $userdata['password'];
	$mail = $userdata['email'];
	$name = $userdata['name'];
	$surname = $userdata['surname'];
	$role = $userdata['role'];
	global $conn;

	$sql = $conn->query("UPDATE users SET username='$username',email='$mail',name = '$name' , surname = '$surname' , role='$role'  WHERE id='$id' ");

	return $sql;
}


//function checkUserLogin($userdata)
//{
//	// verifier si l'utilisateur qui essaye de ce connecter existe dans la db
//	$usermail = $userdata['email'];
//	$userpassword= $userdata['password'];
//	global $conn;
//	$sql= $conn->query("SELECT * FROM users WHERE email = '$usermail' AND password =  '$userpassword'");
//    return $sql->fetchAll(PDO::FETCH_ASSOC);
//
//	
//}
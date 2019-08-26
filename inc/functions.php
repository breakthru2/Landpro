<?php

require_once 'config.php';

function sanitize($input) {
	$input = htmlentities(htmlspecialchars(trim($input)));
	return $input;
}

function email_sanitize($input){
	$input = htmlentities(htmlspecialchars(trim($input)));
	return $input;
}

function check_duplicate($table, $field, $input){
	global $link;

	$sql = "SELECT * FROM $table WHERE $field = '$input'";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		return true;
	}
	return false;
}

function redirect($url){
	header("Location: $url");
}

function register($post){
	global $link;
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($firstname)) {
		$firstname = sanitize($firstname);
	} else {
		$err_flag = true;
		$errors[] = "Enter your firstname";
	}

	if (!empty($lastname)) {
		$lastname = sanitize($lastname);
	} else {
		$err_flag = true;
		$errors[] = "Enter your lastname";
	}

	if (!empty($email)) {
		$tmp_email = email_sanitize($email);
		if (!check_duplicate('clients', 'email', $tmp_email)) {
			$email = $tmp_email;
		} else {
			$err_flag = true;
			$errors[] = "Sorry, This email have already been registered";
		}
	} else {
		$err_flag = true;
		$errors[] = "Please enter your email";
	}

	if (!empty($password)) {
		$password = sanitize($password);
	} else {
		$err_flag = true;
		$errors[] = "Enter your password";
	}

	if (!empty($tel)) {
		$tel = sanitize($tel);
	} else {
		$err_flag = true;
		$errors[] = "Enter your telephone";
	}

	if (!empty($address)) {
		$address = sanitize($address);
	} else {
		$err_flag = true;
		$errors[] = "Enter your address";
	}

	if ($err_flag === false) {
		$sql = "INSERT INTO clients (firstname, lastname, email, password, tel, address) VALUES ('$firstname', '$lastname', '$email', '$password', '$tel', '$address')";
		$query = mysqli_query($link, $sql);

		if ($query) {
			return true;
		}
		return false;
	}
	return $errors;
}

function login($post){
	global $link;
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($email)) {
		$email = email_sanitize($email);
	} else {
		$err_flag = true;
		$errors[] = "Please enter your email";
	}

	if (!empty($password)) {
		$password = sanitize($password);
	} else {
		$err_flag = true;
		$errors[] = "Please enter your password";
	}

	if ($err_flag === false) {
		$sql = "SELECT * FROM clients WHERE email = '$email' AND password = '$password'";
		$query = mysqli_query($link, $sql);

		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			$_SESSION['client'] = $row['client_id'];
			return $row;
		} 
		return false;
	}
	return $errors;
}

function clientProp($post, $listing_id, $client_id){
	global $link;
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($name)) {
		$name = sanitize($name);
	} else {
		$err_flag = true;
		$errors[] = "Please enter name";
	}

	if (!empty($email)) {
		$email = sanitize($email);
	} else {
		$err_flag = true;
		$errors[] = "Please enter email";
	}

	if (!empty($phone)) {
		$phone = sanitize($phone);
	} else {
		$err_flag = true;
		$errors[] = "Please enter phone";
	}

	if (!empty($message)) {
		$message = sanitize($message);
	} else {
		$err_flag = true;
		$errors[] = "Please enter message";
	}

	if ($err_flag === false) {
		$sql = "INSERT INTO client_properties (listing_id_fk, client_id_fk) VALUES ('$listing_id', '$client_id')";
		$query = mysqli_query($link, $sql);

		if ($query) {
			return true;
		}
		return false;
	}
	return $errors;
}

function selectQuery($table, $field, $id){
	global $link;

	$sql = "SELECT * FROM $table WHERE $field = '$id'";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		return $query;
	}
	return false;
}

function totalAgentProp($id){
	global $link;

	$sql = "SELECT * FROM listings WHERE agent_id_fk = '$id'";
	$query = mysqli_query($link, $sql);

	if ($query) {
		$num = mysqli_num_rows($query);
		return $num;
	}
	return false;
}

function fetchTabelData($table){
	global $link;

	$sql = "SELECT * FROM $table";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		return $query;
	}
	return false;
}
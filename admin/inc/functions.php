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
		if (!check_duplicate('agents', 'email', $tmp_email)) {
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

	if ($err_flag === false) {
		$sql = "INSERT INTO admins (firstname, lastname, email, password, tel) VALUES ('$firstname', '$lastname', '$email', '$password', '$tel')";
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
		$sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
		$query = mysqli_query($link, $sql);

		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			$_SESSION['admin'] = $row['admin_id'];
			return $row;
		} else {
			return false;
		}
	}
	return $errors;
}

function add_property($post){
	global $link;
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($description)) {
		$description = sanitize($description);
	} else {
		$err_flag = true;
		$errors[] = "Enter property description";
	}

	if (!empty($type)) {
		$type = sanitize($type);
	} else {
		$err_flag = true;
		$errors[] = "Enter property type";
	}

	if (!empty($location)) {
		$location = sanitize($location);
	} else {
		$err_flag = true;
		$errors[] = "Enter property location";
	}

	if (!empty($price)) {
		$price = sanitize($price);
	} else {
		$err_flag = true;
		$errors[] = "Enter property price";
	}

	if (!empty($video)) {
		$video = sanitize($video);
	} else {
		$err_flag = true;
		$errors[] = "Enter property video url";
	}

	if (!empty($image)) {
		$image = sanitize($image);
		// move_uploaded_file($image, "prop_uploads");
	} else {
		$err_flag = true;
		$errors[] = "Enter property image";
	}

	if (!empty($hide)) {
		$hide = sanitize($hide);
	} else {
		$err_flag = true;
		$errors[] = "Ooops! Something is wrong";
	}

	if ($err_flag === false) {
		$sql = "INSERT INTO listings (agent_id_fk, image_id, type, description, price, location, video_link) VALUES ('$hide', '$image', '$type', '$description', '$price', '$location', '$video')";
		$query = mysqli_query($link, $sql);

		if ($query) {
			return true;
		}
		return false;
	}
	return $errors;
}

function profile($id){
	global $link;

	$sql = "SELECT * FROM admins WHERE admin_id = $id";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_assoc($query);
		return $row;
	}
	return false;
}

function agentProfile($id){
	global $link;

	$sql = "SELECT * FROM agents WHERE agent_id = $id";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_assoc($query);
		return $row;
	}
	return false;
}

function lockscreen($post){
	global $link;

	$err_flag = false;
	extract($post);

	if (!empty($password)) {
		$password = sanitize($password);
	} else {
		$err_flag = true;
		$errors = "Incorrect Password, Try Again";
	}

	if ($err_flag === false) {
		$sql = "SELECT password FROM admins WHERE password = '$password'";
		$query = mysqli_query($link, $sql);

		if (mysqli_num_rows($query) > 0) {
			return true;
		}
		return false;
	}
	return $errors;
}

function getTotal($table){
	global $link;

	$sql = "SELECT * FROM $table";
	$query = mysqli_query($link, $sql);

	if ($query) {
		$total = mysqli_num_rows($query);
		return $total;
	}
	return false;
}

function fetchData($table){
	global $link;

	$sql = "SELECT * FROM $table";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		return $query;
	}
	return false;
}

function delete($table, $field, $id){
	global $link;

	$sql = "DELETE FROM $table WHERE $field = '$id'";
	$query = mysqli_query($link, $sql);

	if ($query) {
		return true;
	}
	return false;
}
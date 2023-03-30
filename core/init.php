<?php
	include('database/config.php');
	include('classes/GlobalClass.php');
	include('classes/User.php');
	include('classes/Keyword.php');
	include('classes/Response.php');

	global $pdo;

	$globalclass = new GlobalClass($pdo);
	$user = new User($pdo);
	$keyword = new Keyword($pdo);
	$response = new Response($pdo);

	session_start();

	function ErrorMessage(){
	    if(isset($_SESSION['ErrorMessage'])){
	        $output = '<div class = "alert alert-danger text-bold" role = "alert">';
	        $output .= htmlentities($_SESSION['ErrorMessage']);
	        $output .= '</div>';
	        $_SESSION['ErrorMessage'] = null;
	        return $output;
	    }

	}

	function SuccessMessage(){
	    if(isset($_SESSION['SuccessMessage'])){
	        $output = '<div class = "alert alert-success text-bold" role = "alert">';
	        $output .= htmlentities($_SESSION['SuccessMessage']);
	        $output .= '</div>';
	        $_SESSION['SuccessMessage'] = null;
	        return $output;
	    }

	}


?>
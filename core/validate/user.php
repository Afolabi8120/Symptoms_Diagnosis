<?php

	include('./core/init.php');

	if(isset($_POST['btnRegister']) AND !empty($_POST['btnRegister'])){

		$surname = $globalclass->validateInput($_POST['surname']);
		$oname = $globalclass->validateInput($_POST['oname']);
		$email = $globalclass->validateInput($_POST['email']);
		$phone = $globalclass->validateInput($_POST['phone']);
		$password = $globalclass->validateInput($_POST['password']);
		$cpassword = $globalclass->validateInput($_POST['cpassword']);

		if(empty($surname) || empty($oname) || empty($email) || empty($phone)){
			$_SESSION['ErrorMessage'] = "All Fields are Required";
		}else if(!preg_match("/^[a-z A-Z]*$/", $surname)){
			$_SESSION['SuccessMessage'] = "Use a Valid Surname";
		}else if(!preg_match("/^[a-z A-Z]*$/", $oname)){
			$_SESSION['SuccessMessage'] = "Use a Valid Name for the Other Name field";
		}else if(!preg_match("/^[0-9]*$/", $phone)){
			$_SESSION['SuccessMessage'] = "Use a Valid Phone Number";
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['ErrorMessage'] =  "Email Address is Invalid";
        }elseif($password != $cpassword){
			$_SESSION['ErrorMessage'] = "Both Password Provided Do Not Match";
		}elseif($user->checkEmail($email)){
			$_SESSION['ErrorMessage'] = "Email Address Already In Use";
		}else{

			$email = strtolower($email);

			$hash_password = sha1(md5($password));
          	$pass = substr($hash_password, 3, 12);
 			#var_dump($_POST);exit();
			if($user->register($surname,$oname,'',$email,'',$phone,'',$pass,'User') === true){
				$_SESSION['SuccessMessage'] = "Account Has Been Created Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Create Account";
			}
		}	
	}else if(isset($_POST['btnRemoveUser']) AND !empty($_POST['btnRemoveUser'])){

			$user_id = $globalclass->validateInput($_POST['user_id']);

			if($globalclass->delete('tbluser','id',$user_id)){
				$_SESSION['SuccessMessage'] = "User Removed Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Remove User";
			}

	}


?>
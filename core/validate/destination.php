<?php

	include('../core/init.php');

	if(isset($_POST['btnSaveDestination']) AND !empty($_POST['btnSaveDestination'])){

		$from = $globalclass->validateInput($_POST['from']);
		$to = $globalclass->validateInput($_POST['to']);

		if(empty($from) || empty($to)){
			$_SESSION['ErrorMessage'] = "All Fields are Required";
		}else if(!preg_match("/^[a-z A-Z]*$/", $from)){
			$_SESSION['SuccessMessage'] = "Use a Valid Name";
		}else if(!preg_match("/^[a-z A-Z]*$/", $to)){
			$_SESSION['SuccessMessage'] = "Use a Valid Name";
		}else{

			if($globalclass->addDestination($from,$to)){
				$_SESSION['SuccessMessage'] = "Destination Added Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Add Destination";
			}
		}
	}else if(isset($_POST['btnDeleteDestination']) AND !empty($_POST['btnDeleteDestination'])){

			$d_id = $globalclass->validateInput($_POST['d_id']);

			if($globalclass->delete('tbldestination','id',$d_id)){
				$_SESSION['SuccessMessage'] = "Vehicle Removed Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Remove Vehicle";
			}

	}


?>
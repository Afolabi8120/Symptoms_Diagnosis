<?php

	include('./core/init.php');

	if(isset($_POST['btnAddResponse']) AND !empty($_POST['btnAddResponse'])){

		$keyword = $globalclass->validateInput($_POST['keyword']);
		$message = $globalclass->validateInput($_POST['response']);

		if(empty($keyword) || empty($message)){
			$_SESSION['ErrorMessage'] = "All Fields are Required";
		}else{

			if($response->addResponse($keyword,$message) === true){
				$_SESSION['SuccessMessage'] = "Response Added Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Add Response";
			}
		}
	}else if(isset($_POST['btnEditResponse']) AND !empty($_POST['btnEditResponse'])){

		$res_id = $globalclass->validateInput($_POST['res_id']);
		$keyword = $globalclass->validateInput($_POST['keyword']);
		$message = $globalclass->validateInput($_POST['response']);

		if(empty($keyword) || empty($message)){
			$_SESSION['ErrorMessage'] = "All Fields are Required";
		}else{

			if($response->editResponse($res_id,$keyword,$message) === true){
				$_SESSION['SuccessMessage'] = "Response Updated Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Update Response";
			}
		}
	}
	else if(isset($_POST['btnDeleteResponse']) AND !empty($_POST['btnDeleteResponse'])){

			$response_id = $globalclass->validateInput($_POST['response_id']);

			if($globalclass->delete('tblresponse','id',$response_id)){
				$_SESSION['SuccessMessage'] = "Response Removed Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Remove Response";
			}

	}


?>
<?php

	include('./core/init.php');

	if(isset($_POST['btnAddKeyword']) AND !empty($_POST['btnAddKeyword'])){

		$name = $globalclass->validateInput($_POST['keyword']);

		if(empty($name)){
			$_SESSION['ErrorMessage'] = "All Fields are Required";
		}elseif($keyword->checkKeyword($name)){
			$_SESSION['ErrorMessage'] = "Keyword Already Exist";
		}else{

			$name = strtolower($name);

			if($keyword->addKeyword($name) === true){
				$_SESSION['SuccessMessage'] = "Keyword Added Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Add Keyword";
			}
		}
	}else if(isset($_POST['btnDeleteKeyword']) AND !empty($_POST['btnDeleteKeyword'])){

			$keyword_id = $globalclass->validateInput($_POST['keyword_id']);

			if($globalclass->delete('tblkeyword','id',$keyword_id)){
				$_SESSION['SuccessMessage'] = "Keyword Removed Successfully";
			}else{
				$_SESSION['ErrorMessage'] = "Failed To Remove Keyword";
			}

	}


?>
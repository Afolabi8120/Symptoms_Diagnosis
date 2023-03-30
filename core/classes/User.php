<?php

	class User extends GlobalClass {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

		public function checkEmail($email){
        	$stmt = $this->pdo->prepare("SELECT email FROM tbluser WHERE email = :email");
        	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        public function register($surname,$other_name,$gender,$email,$dob,$phone,$address,$password,$usertype){
			$stmt = $this->pdo->prepare("INSERT INTO tbluser (surname,other_name,gender,email,dob,phone,address,password,usertype) VALUES(:surname,:other_name,:gender,:email,:dob,:phone,:address,:password,:usertype)");
			$stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
			$stmt->bindParam(":other_name", $other_name, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":dob", $dob, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":usertype", $usertype, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updateProfile($id,$surname,$other_name,$email,$phone,$gender,$dob,$address){
			$stmt = $this->pdo->prepare("UPDATE tbluser SET surname=:surname,other_name=:other_name,email=:email,phone=:phone,gender=:gender,dob=:dob,address=:address WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
			$stmt->bindParam(":other_name", $other_name, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":dob", $dob, PDO::PARAM_STR);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updatePassword($id,$password){
			$stmt = $this->pdo->prepare("UPDATE tbluser SET password=:password WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

	}

?>
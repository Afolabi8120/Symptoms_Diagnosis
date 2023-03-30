<?php

	class GlobalClass {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

		public function validateInput($var){
			$var = htmlspecialchars($var);
			$var = trim($var);
			$var = stripcslashes($var);
			return $var;
		}

        public function getLastID(){
        	$stmt = $this->pdo->prepare("SELECT * FROM tblstudent");
        	$stmt->execute();

        	$count = $stmt->rowCount();
        	$count = $count + 1;

        	return $count;
        }

		public function delete($table,$column,$value){
			$stmt = $this->pdo->prepare("DELETE FROM `$table` WHERE `$column` = '$value' ORDER BY id");
			$stmt->execute();

			return true;
		}

		public function select($table){
        	$stmt = $this->pdo->prepare("SELECT * FROM `$table` ");
        	$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectWhere($table,$column1,$value1){
        	$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column1` = '$value1' ");
        	$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectNotUser($table,$column1,$value1,$email){
        	$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column1` = '$value1' AND email != '$email' ");
        	$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function countByOneColumn($table,$column1,$value1){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column1` = '$value1' ");
			$stmt->execute();
            
            $count = $stmt->rowCount();

        	return $count;
		}

		public function count($table){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` ");
			$stmt->execute();
            
            $count = $stmt->rowCount();

        	return $count;
		}

		public function selectByOneColumn($column,$table,$value){
        	$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value' ");
        	$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
        }

		public function login($email,$password){
			$stmt = $this->pdo->prepare("SELECT * FROM tbluser WHERE email = :email AND password = :password");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();
            
            $count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
		}

	}

?>
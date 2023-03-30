<?php

	class Response extends GlobalClass {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

        public function addResponse($keyword,$response){
			$stmt = $this->pdo->prepare("INSERT INTO tblresponse (keyword_id,response) VALUES(:keyword_id,:response)");
			$stmt->bindParam(":keyword_id", $keyword, PDO::PARAM_INT);
			$stmt->bindParam(":response", $response, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function editResponse($id,$keyword,$response){
			$stmt = $this->pdo->prepare("UPDATE tblresponse SET response=:response,keyword_id=:keyword_id WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":keyword_id", $keyword, PDO::PARAM_INT);
			$stmt->bindParam(":response", $response, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function fetchResponse(){
        	$stmt = $this->pdo->prepare("SELECT k.*, r.* FROM tblkeyword AS k INNER JOIN tblresponse AS r ON k.id = r.keyword_id ");
        	$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getResponse($keyword_id){
        	$stmt = $this->pdo->prepare("SELECT k.keyword, k.id, r.response FROM tblkeyword AS k INNER JOIN tblresponse AS r ON k.id = r.keyword_id WHERE r.keyword_id = '$keyword_id' ");
        	$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
        }

	}

?>
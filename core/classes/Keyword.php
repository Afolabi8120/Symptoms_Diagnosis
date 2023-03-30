<?php

	class Keyword extends GlobalClass {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

		public function checkKeyword($keyword){
        	$stmt = $this->pdo->prepare("SELECT keyword FROM tblkeyword WHERE keyword = :keyword");
        	$stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        public function addKeyword($keyword){
			$stmt = $this->pdo->prepare("INSERT INTO tblkeyword (keyword) VALUES(:keyword)");
			$stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

	}

?>
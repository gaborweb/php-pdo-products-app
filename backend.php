<?php

class Market extends Database{

    public function accountCheck($username, $password){

        $sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {

		    $_SESSION['username']=$username;
          
            header('Location: index.php');
        }else{
            ?>
                <html><div class='alert alert-warning'>Helytelen felhasználónév vagy jelszó!</div></html>
            <?php
        }
    }

    public function accountReg($fullname, $username, $password){

        $sql = "INSERT INTO account (fullname,username,password) VALUES (:fullname,:username,:password)";
		$query = $this->connect()->prepare($sql);
		$query->bindParam(':fullname',$fullname);
		$query->bindValue(':username',$username);
		$query->bindValue(':password',$password);
        $result = $query->execute();
        
        if ($result) {
            ?>
                <script>alert("Sikeres regisztráció!")</script>
                <script>window.location = "login.php";</script>
            <?php
        }
    }

    public function delete($id){

        $sql = "DELETE FROM vasarolttermekek WHERE id=$id";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute();
    }

    public function display(){

        $sql = "SELECT * FROM vasarolttermekek";
        $sqlData = array();
        $result = $this->connect()->query($sql);

        if ($result->rowCount()>0) {

            while ($row = $result->fetch()) {

                $sqlData[] = $row;
            }
        }

        return $sqlData;
    }

    public function insert($fields){

        $implodeColumns = implode(',', array_keys($fields));
        $implodePlaceholders = implode(', :', array_keys($fields));
        $sql = "INSERT INTO vasarolttermekek ($implodeColumns) VALUES (:".$implodePlaceholders.")";
        $stmnt = $this->connect()->prepare($sql);

        foreach ($fields as $key=>$value) {

            $stmnt->bindValue(":". $key, $value);
        }

        $stmntExec = $stmnt->execute();

        if ($stmntExec) {

            header("Location index.php");
        }
    }

    public function select($id){

        $sql = "SELECT * FROM vasarolttermekek WHERE id=$id";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute();
        $sqlData = $stmnt->fetch(PDO::FETCH_ASSOC);

        return $sqlData;
    }

    public function update($id, $fields){
		
		$st="";
		$counter=1;
		$totalFields= count($fields);
		
		foreach($fields as $key=>$value){
			
			if($counter===$totalFields){
				
				$set="$key = :".$key;
				$st=$st.$set;
			} 
			else{
				
				$set="$key = :".$key.", ";
				$st=$st.$set;
			}
		}
		
		$sql="";
		$sql.="UPDATE vasarolttermekek SET ".$st;
		$sql=substr($sql, 0, -2);
		$sql.=" WHERE id= ".$id;
		
		$stmt=$this->connect()->prepare($sql);
		
		foreach($fields as $key => $value){
			
			$stmt->bindValue(":".$key, $value);
		}
		
		$stmtExec=$stmt->execute();
		if($stmtExec){
			
			header("Location: index.php");
		}
	}
}

?>
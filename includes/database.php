<?php
class database{
	public $connection;
	private $host="localhost";
	private $user="root";
	private $pwd="";
	private $db="security";
	public function __construct(){
	$this->connect();
	}
	public function connect(){
		$this->connection=mysqli_connect($this->host,$this->user,$this->pwd,$this->db);
		if(!$this->connection){echo "Fatal Error";}
	}
	public function login($uname,$pass){
    $auth=clean($uname,$pass);
    $str="SELECT * FROM employer WHERE emp_uname='$auth[0]' AND emp_password='$auth[1]' ";
    $str_q=mysqli_query($this->connection,$str);
   	if(!$str_q){return false;}
   	return $str_q;
	}
	public function query($sql){
		$query=mysqli_query($this->connection,$sql);
		return $query;
	}
	public function getrow($query){
		$fetch=mysqli_fetch_array($query);
		return $fetch;
	}
	public function getObject($query){
		return mysqli_fetch_object($query);
	}
	public function getEmployees(){
		return $this->getrow($this->query("SELECT * FROM employee"));
	}
	public function log($uname){
		$time=date("h:m:s");
$string="$uname || Logged in at $time \n";
$file="includes/log.txt";
if($handle=fopen($file,'a'))
{
fwrite($handle,$string);
fclose($handle);
}else{echo "Failed to Open Log File"; }

	}
}
$db=new database();
function clean($name,$pass){
	stripslashes($name);
	stripslashes($pass);
	$n=str_replace('\'','','$name');
	$p=str_replace('\'','','$pass');
	return array($n,$p);
}

?>

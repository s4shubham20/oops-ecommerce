<?php 
	class Basecontroller{
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $db = 'oops';
		// private $conn;
	 	protected function db_connect(){
			$conn = new mysqli($this->host, $this->user , $this->password, $this->db);
			if(!$conn):
			 	//$echo = "Not Connected";
			else:
				// echo "Connected";
				//$echo = "Connected";
			endif;
			/* if(!$conn->connect_errno){
				return "Connected Successfully !";
			}
			else{
				return "Something went wrong";
			} */
			return $conn;
		}
	}

	class Controller extends Basecontroller{

		public function selectData($table, $field='*', $condition='', $orderby='', $ordervalue='DESC', $limit='')
		{
			$sqlQuery = "SELECT $field FROM $table ";
			if($condition != null){
				$sqlQuery .= "WHERE ";
				$count = count($condition);
				$i=1;
				foreach($condition AS  $key => $value){
					if($i==$count){
						$sqlQuery .= "$key='$value' ";
					}else{
						$sqlQuery .= "$key='$value' AND ";
					}
					$i++;
				}
			}
			if($orderby != null){
				$sqlQuery .= "ORDER BY $orderby $ordervalue ";
			}

			if($limit){
				$sqlQuery .= "LIMIT $limit";
			}
			//return $sqlQuery;
			$query = $this->db_connect()->query($sqlQuery);
			if($query->num_rows > 0){
				$fetchdata= array();
				while($fetch = $query->fetch_assoc()){
					$fetchdata[] = $fetch;
				}
				return $fetchdata;
			}
		}


		public function SelectIn($table, $field='*', $sqlColum='',$sqlKey , $condition='' ,$orderby='', $ordervalue='DESC', $limit='')
		{
			$sqlQuery = "SELECT $field FROM $table ";
			if($sqlColum != null){
				$sqlQuery .= "WHERE $sqlColum ";
			}
			if($sqlKey != null){
				$sqlQuery .= "$sqlKey ";
			}
			$query = $this->db_connect()->query($sqlQuery);
			if($query->num_rows > 0){
				$fetchdata= array();
				while($fetch = $query->fetch_assoc()){
					$fetchdata[] = $fetch;
				}
				return $fetchdata;
			}
		}

		public function mysqli_safe_string($str)
		{
			if($str != null){
				return mysqli_real_escape_string($this->db_connect(), $str);
			}
		}

		public static function SessionExist()
		{
			if(!empty($_SESSION['email'])){
				return true;
			}else{
				return false;
			}
		}

		public static function SessionEmpty()
		{
			if(empty($_SESSION['email'])){
				return true;
			}else{
				return false;
			}
		}

		public static function SessionDestroy()
		{
			if(!empty($_SESSION['email']))
			{
				session_unset();
				session_destroy();
			}
		}

		public function printwithpre($value)
		{
			echo "<pre>";
				print_r($value);
			echo "</pre>";
		}
		public function insertData($table,$condition)
		{
			$myconn = $this->db_connect();
			// $conn = new mysqli($this->host, $this->user , $this->password, $this->db);
			
			
			if($condition != null){
				$arrayKey = [];
				$arrayValue = [];
				foreach($condition as $key => $value){
					$arrayKey[] = $key;
					$arrayValue[] = $value;
				}
				$field = implode(",", $arrayKey);
				$value = implode("','", $arrayValue);
			 	$sqlQuery = "INSERT INTO $table($field)VALUES('$value')";
				$runQuery = $myconn->query($sqlQuery);

				if ($runQuery) {
					return mysqli_insert_id($myconn);
				} else {
					return false;
				}
			}
		}

		public function DeleteData($table ,$condition)
		{	
			$sqlQuery = "DELETE FROM $table ";
			if($condition != null){
				$sqlQuery.="WHERE ";
				$count = count($condition);
				$i = 1;
				foreach($condition as $key => $value){
					if($i==$count){
						$sqlQuery .= "$key='$value' ";
					}else{
						$sqlQuery .= "$key='$value' AND ";
					}
				}
			}
			$runQuery = $this->db_connect()->query($sqlQuery);
			return $runQuery;
		}

		public function UpdateData($table, $condition,$wherefield ,$wherevalue)
		{
			if(!empty($condition)){
				$sqlQuery = "UPDATE $table SET ";
				$count = count($condition);
				$i=1;
				foreach($condition as $key => $value){
					if($i==$count){
						$sqlQuery.= "$key='$value' ";
					}else{
						$sqlQuery.= "$key='$value' ,";
					}
					$i++;
				}
				$sqlQuery .= "WHERE $wherefield='$wherevalue'";
				$runQuery = $this->db_connect()->query($sqlQuery);
				return $runQuery;
			}
		}

		public static function Slug($string)
		{
			$slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
			return $slug;
		}
		public static function UniqueRecord($table, $field='*', $condition)
		{
			$sql = "SELECT $field FROM $table ";
			if($condition != null){
				$sql .= "WHERE ";
				$count = count($condition);
				$i=1;
				foreach($condition as $key => $condi){
					if($i == $count){
						$sql.= "$key='$condi' ";
					}else{
						$sql.= "$key = '$condi' AND ";
					}
					$i++;
				}
			}
			// return $sql;
			$sqlQuery = (new self)->db_connect()->query($sql);
			
			return $sqlQuery;
		}

		//showing image and file in user interface
		public static function asset($assets)
		{
			$request = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
			return $request.$_SERVER['HTTP_HOST'].'/oops.project/assets/'.$assets;
		
		}

		//uploading image and file and delete them from folder
		public static function public_path($path)
		{
			return $_SERVER['DOCUMENT_ROOT'].'/oops.project/assets/'.$path;
		}

		//set base url for managing form data
		public static function base_url($url='')
		{
			$request = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
			return $request.$_SERVER['HTTP_HOST'].'/oops.project/app/'.$url;
		}
		
		public static function ViewPath($path)
		{
			$request = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
			return $request.$_SERVER['HTTP_HOST'].'/oops.project/views/'.$path;
		}

		public static function CreateTable($tableName, $column, $datatype='', $keys='')
		{
			if(!empty($column)){
				$sqlQuery = "CREATE TABLE IF NOT EXISTS $tableName( ";
				$count = count($column);
				$i=1;
				foreach($column as $key => $value){
					if($i==$count){
						$sqlQuery.= "$key $value ";
					}else{
						$sqlQuery.= "$key $value ,";
					}
					$i++;
				}
				$sqlQuery .= "$datatype  $keys)";
				$runQuery = (new self)->db_connect()->query($sqlQuery);
				return $runQuery;
			}
		}
		public function Join($table1 ,$field='*' ,$join, $table2=null, $table1field=null, $table2field=null, $table3=null, $table3field=null,$condition=null)
		{
			$conn = $this->db_connect();
			$sqlQuery = "SELECT $field FROM $table1";
			if($join !=null){
				$sqlQuery.= " $join JOIN ";
			}
			if($table2 != null){
				$sqlQuery.= " $table2 ON ";
			}
			if($table1field != null){
				$sqlQuery.= "$table1.$table1field= ";
			}
			if($table2field != null){
				$sqlQuery.= " $table2.$table2field ";
			}
			if($table3field != null){
				$sqlQuery.= " $table3.$table3field ";
			}
			if($condition != null){
				$sqlQuery.= "WHERE ";
				$count = count($condition);
				$i=1;
				foreach($condition AS  $key => $value){
					if($i==$count){
						$sqlQuery .= "$key='$value' ";
					}else{
						$sqlQuery .= "$key='$value' AND ";
					}
					$i++;
				}
			}
			// return $sqlQuery;
			$runQuery = $conn->query($sqlQuery);
			while($fetchQuery = $runQuery->fetch_assoc()){
				$fetchdata[] = $fetchQuery;
			}
			return $fetchdata;
		}
	}

	$db = new Controller;
	// echo $conn = $db->Join('order_details','order_details.qty AS orderqty, order_details.order_id, order_details.product_id,order_details.amount, products.name, products.image','INNER','products','product_id','id','','',array('order_details.order_id' => 5));
	// print_r($conn);
	
 ?>
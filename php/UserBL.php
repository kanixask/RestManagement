<?php	
	use Medoo\Medoo;

	class UserBL 
	{
		public $database;
		
		function __construct($db) {
			$this->database = $db;
		}
		
		public function selectUser($userFinder){			
			$data = $this->database->select("users",["[>]userbyrestaurant" => ["UserID" => "UserID"]], ['users.UserID','users.Username','users.Password','users.Name','users.Lastname','users.IsAdministrator','userbyrestaurant.RestaurantID'],
				Medoo::raw("WHERE
					(
						users.<UserID> = ".$userFinder->UserID." OR ".$userFinder->UserID." = -1
					)
					AND
					(
						users.<Username> = '".$userFinder->Username."' OR '".$userFinder->Username."' = ''
					)
					AND
					(
						users.<Password> = '".$userFinder->Password."' OR '".$userFinder->Password."' = ''
					)					
				")
			);
			
			return $data;
		}
		
		public function insertUser(){
			
		}
		
		public function updateUser(){
			
		}
	}
?>

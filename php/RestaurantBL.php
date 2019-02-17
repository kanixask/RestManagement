<?php
    use Medoo\Medoo;

	class RestaurantBL 
	{
		public $database;
		
		function __construct($db) {
			$this->database = $db;
		}
		
		public function insertRestaurant($Restaurant){
			$id = $this->database->insert("restaurants", [
            	"Name" => $Restaurant->Name,
            	"Description" => $Restaurant->Description,
            	"Phone" => $Restaurant->Phone 
            ]);
            
            return $id;
		}
        
        public function insertRestaurantByUser($userID, $restID){
            $this->database->insert("userbyrestaurant", [
            	"UserID" => $userID,
            	"RestaurantID" => $restID
            ]);
        }
	}
?>
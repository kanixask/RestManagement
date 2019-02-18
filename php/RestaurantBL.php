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
        
        public function selectRestaurantsByUser($userID){
            $data = $this->database->select("userbyrestaurant",["[>]restaurants" => ["RestaurantID" => "RestaurantID"]],
            ['restaurants.RestaurantID','restaurants.Name','restaurants.Description','restaurants.Phone'],
            [
            	"UserID" => $userID
            ]);
            
            return $data;
        }
        
        public function updateRestaurant($objRest){
            $this->database->update("restaurants",["Name" => $objRest->Name, "Description" => $objRest->Description, "Phone" => $objRest->Phone],["RestaurantID" => $objRest->RestaurantID]);
        }
        
        public function deleteRestaurant($restaurantID){
            $this->database->delete("userbyrestaurant",["RestaurantID" => $restaurantID]);
            $this->database->delete("restaurants",["RestaurantID" => $restaurantID]);
        }
	}
?>
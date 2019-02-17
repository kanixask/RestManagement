<?php
	class User 
	{
		public $UserID = -1;
		public $Username = '';
		public $Password = '';
		public $Name = '';
		public $Lastname = '';
		public $IsAdministrator = 0;
		public $RestaurantID = -1;
		
		public function SetValuesFromData($data){
			
			$resultEncoded = json_encode($data);
			
			$resultDecoded = json_decode($resultEncoded);
			//echo var_dump($resultDecoded);
			if(!empty($resultDecoded)){				
				$this->UserID = $resultDecoded[0]->{'UserID'};
				$this->Username = $resultDecoded[0]->{'Username'};
				$this->Password = $resultDecoded[0]->{'Password'};
				$this->Name = $resultDecoded[0]->{'Name'};
				$this->Lastname = $resultDecoded[0]->{'Lastname'};
				$this->IsAdministrator = $resultDecoded[0]->{'IsAdministrator'};
				$this->RestaurantID = $resultDecoded[0]->{'RestaurantID'};
			}							
		}
	}
?>
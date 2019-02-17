<?php

    class Restaurant 
	{
		public $RestaurantID = -1;
		public $Name = '';
		public $Description = '';
        public $Phone = '';
		
		public function SetValuesFromData($data){
			
			$resultEncoded = json_encode($data);
			
			$resultDecoded = json_decode($resultEncoded);
			
			if(!empty($resultDecoded)){				
				$this->RestaurantID = $resultDecoded[0]->{'RestaurantID'};
				$this->Name = $resultDecoded[0]->{'Name'};
				$this->Description = $resultDecoded[0]->{'Description'};
                $this->Phone = $resultDecoded[0]->{'Phone'};				
			}							
		}
	}
    
?>
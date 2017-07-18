<?php 

	namespace App;

	class Plot extends Garden
	{
		public function quantity()
		{
			$quantity = 0;

			foreach ($this->plants as $plant) {

				if(is_a($plant, 'PlantInterface'))
				{

					$quantity = $quantity + $plant->sum();
					continue;

				}
			}
			
			return array($quantity);
		}
	}

 ?>
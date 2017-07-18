<?php 

	namespace App;

	class Garden implements GardenInterface
	{
		protected $plants;

		public function __construct($plants = array())
		{
			$this->plants = $plants;
		}

		public function quantity(): int
		{
			$quantity = 0;

			foreach ($this->plants as $plant) {

				if(is_a($plant, 'PlantInterface'))
				{

					$quantity = $quantity + $plant->sum();
					continue;

				}

				//throw new \Exception("Error Processing Request");
				
				
				// if($plant->type === 'root')
				// {
				// 	$quantity = $quantity + $plant->getPerBunch() * $plant->getCount();
				// }else{

				// 	$quantity = $quantity + $plant->getCount();
				// }
			}

			// if($output == 'json')
			// {
			// 	return json_encode(array('quantity' => $quantity ));

			// }elseif($output == 'html')
			// {
			// 	return "<p>Quantity: " . $quantity . "</p>";
			// }

			return $quantity;
		}
	}


 ?>
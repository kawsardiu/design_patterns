<?php 

	namespace App;

	class GardenOutputer
	{
		private $garden;

		public function __construct(GardenInterface $garden)
		{
			$this->garden = $garden;
		}

		public function json()
		{
			return json_encode(array('quantity' => $this->garden->quantity()));
		}

		public function html()
		{
			return "<p>Quantity: " . $this->garden->quantity() . "</p>";
		}
	}

 ?>
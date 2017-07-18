<?php 

	namespace App;

	class Carrot implements PlantInterface
	{
		private $colories = 100;
		public $type = "root";
		private $perBunch= 4;
		private $color = "orange";
		private $vitaminC = "50gm";
		private $count;

		public function __construct($count)
		{
			$this->count = $count;
		}

		public function getCount()
		{
			return $this->count;
		}

		public function getPerBunch()
		{
			return $this->perBunch;
		}

		public function sum()
		{
			return $this->getCount() * $this->getPerBunch();
		}
	}


 ?>
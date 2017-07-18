<?php 

	namespace App;

	class Broccoli implements PlantInterface
	{
		private $colories = 200;
		private $color = "green";
		public $type = 'vagetable';
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

		public function sum()
		{
			return $this->getCount();
		}
	}


 ?>
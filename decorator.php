<?php 

	interface CarService
	{
		public function getCost();

		public function getDescription();
	}



	class BasicInspection implements CarService
	{
		public function getCost()
		{
			return 19;
		}

		public function getDescription()
		{
			return "basic inspection";
		}
	}


	class OilChange implements CarService
	{
		protected $carService;

		public function __construct(CarService $carService)
		{
			$this->carService = $carService;
		}

		public function getCost()
		{
			return 25 + $this->carService->getCost();
		}

		public function getDescription()
		{
			return $this->carService->getDescription() . ', and oil change';
		}
	}

	class TireRotation implements CarService
	{
		protected $carService;

		public function __construct(CarService $carService)
		{
			$this->carService = $carService;
		}

		public function getCost()
		{
			return 10 + $this->carService->getCost();
		}

		public function getDescription()
		{
			return $this->carService->getDescription() . ', and tire rotation';
		}
	}

	//echo (new TireRotation(new BasicInspection()))->getDescription();

	$service = new TireRotation(new OilChange(new BasicInspection));

	//echo $service->getCost();


 ?>
<?php 

	interface Car
	{
		public function cost();
		public function desc();
	}

	class Suv implements Car
	{
		public function cost(): int
		{
			return 3000;
		}

		public function desc(): string
		{
			return "Suv";
		}
	}

	class Sedan implements Car
	{
		public function cost(): int
		{
			return 5000;
		}

		public function desc(): string
		{
			return "Sedan";
		}
	}

	abstract class CarFeature implements Car
	{
		protected $car;

		public function __construct(Car $car)
		{
			$this->car = $car;
		}

		abstract public function cost(): int;

		abstract public function desc(): string;
	}

	class WithSunRoof extends CarFeature
	{
		public function cost(): int
		{
			return $this->car->cost() + 500;
		}

		public function desc(): string
		{
			return $this->car->desc() . ", with sun roof";
		}
	}

	class HighEnd extends CarFeature
	{
		public function cost(): int
		{
			return $this->car->cost() + 800;
		}

		public function desc(): string
		{
			return $this->car->desc() . ", high end";
		}
	}

	var_dump((new WithSunRoof(new HighEnd(new Suv)))->desc());

 ?>
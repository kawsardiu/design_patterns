<?php 

	abstract class Lesson
	{
		private $duration;
		private $costStrategy;

		public function __construct(int $duration, CostStrategy $costStrategy)
		{
			$this->duration     = $duration;
			$this->costStrategy = $costStrategy;
		}

		public function cost(): int
		{
			return $this->costStrategy->cost($this);
		}

		public function chargeType(): string
		{
			return $this->costStrategy->chargeType();
		}

		public function getDuration():  int
		{
			return $this->duration;
		}

	}

	class Lecture extends Lesson
	{
		public function __construct(int $duration, CostStrategy $costStrategy)
		{
			parent::__construct($duration, $costStrategy);
		}
	}


	class Seminar extends Lesson
	{
		public function __construct(int $duration, CostStrategy $costStrategy)
		{
			parent::__construct($duration, $costStrategy);
		}
	}


	abstract class CostStrategy
	{
		abstract public function cost(Lesson $lesson): int;
		abstract public function chargeType(): string;
	}


	class TimedCostStrategy extends CostStrategy
	{
		public function cost(Lesson $lesson): int
		{
			return ($lesson->getDuration() * 5);
		}

		public function chargeType(): string
		{
			return "hourly rate";
		}
	}


	class FixedCostStrategy extends CostStrategy
	{
		public function cost(Lesson $lesson): int
		{
			return 30;
		}

		public function chargeType(): string
		{
			return "fixed rate";
		}
	}

	$lessons[] = new Seminar(4, new TimedCostStrategy);
	$lessons[] = new Lecture(4, new TimedCostStrategy);

	foreach ($lessons as $lesson) {

		print "lesson charge {$lesson->cost()}.";
		print "charge type {$lesson->chargeType()}\n";

	}

	// $costs[] = new TimedCostStrategy();
	// $costs[] = new FixedCostStrategy();

	// foreach ($costs as $cost) {

	// 	print "lesson charge {$cost->cost(new Seminar(4, $cost))}.";
	// 	print "charge type {$cost->chargeType(new Lecture(4, $cost))}\n";
	// }

 ?>
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

	// foreach ($lessons as $lesson) {

	// 	print "lesson charge {$lesson->cost()}.";
	// 	print "charge type {$lesson->chargeType()}\n";

	// }




	class RegistrationMgr
	{
		public function register(Lesson $lesson)
		{
			// do something with the lesson
			

			// now tell someone
			
			$notifire = Notifire::getNotifire();
			$notifire->inform("new lesson:cost ({$lesson->cost()})");
		}

	}


	abstract class Notifire
	{
		public static function getNotifire(): Notifire
		{
			// acquire concrete class according
			// to configuration or other logic
			

			if(rand(1, 2) === 1)
			{
				return new MailNotifire();
			}else
			{
				return new TextNotifire();
			}
		}

		abstract public function inform($message);
	}

	class MailNotifire extends Notifire
	{
		public function inform($message)
		{
			print "Mail Notification: {$message}\n";
		}
	}

	class TextNotifire extends Notifire
	{
		public function inform($message)
		{
			print "Text Notification: {$message}\n";
		}
	}


	$lesson1 = new Seminar(4, new FixedCostStrategy());
	$lesson2 = new Lecture(4, new TimedCostStrategy());

	$mgr = new RegistrationMgr();

	$mgr->register($lesson1);
	$mgr->register($lesson2);


	// $costs[] = new TimedCostStrategy();
	// $costs[] = new FixedCostStrategy();

	// foreach ($costs as $cost) {

	// 	print "lesson charge {$cost->cost(new Seminar(4, $cost))}.";
	// 	print "charge type {$cost->chargeType(new Lecture(4, $cost))}\n";
	// }

 ?>
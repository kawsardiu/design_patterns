<?php 

	abstract class HomeChaker
	{
		protected $succesor;

		abstract public function check(HomeStatus $home);

		public function succedWith(HomeChaker $chacker)
		{
			$this->succesor = $chacker;
		}

		public function next(HomeStatus $home)
		{
			if ($this->succesor) {

				$this->succesor->check($home);
			}
		}
	}

	class Locks extends HomeChaker
	{
		public function check(HomeStatus $home)
		{
			if (! $home->locked) {
				throw new Exception("The doors are not locked. Abort ! Abort !");
				
			}

			$this->next($home);
		}
	}

	class Lights extends HomeChaker
	{

		public function check(HomeStatus $home)
		{
			if (! $home->lightOff) {
				throw new Exception("The lights are on. Abort ! Abort !");
				
			}

			$this->next($home);

		}
	}

	class Alarm extends HomeChaker
	{

		public function check(HomeStatus $home)
		{
			if (! $home->alarmOn) {
				throw new Exception("The alarms are off. Abort ! Abort !");
				
			}

			$this->next($home);

		}
	}

	class HomeStatus
	{
		public $locked = true;
		public $lightOff = true;
		public $alarmOn = false;
	}

	//...........
	
	$lockes = new Locks();
	$lights = new Lights();
	$alarms = new Alarm();

	$lockes->succedWith($lights);
	$lights->succedWith($alarms);

	$lockes->check(new HomeStatus);

 ?>
<?php 

	interface Manageable
	{
		public function BeManaged();
	}
	
	interface Workerable
	{
		public function work();
	}

	interface Sleepable
	{
		public function sleep();
	}

	class HumanWorker implements Workerable, Sleepable, Manageable
	{
		public function work()
		{

		}

		public function sleep()
		{

		}

		public function BeManaged()
		{
			$this->work();
			$this->sleep();
		}
	}

	class AndroidWorker implements Workerable, Manageable
	{
		public function work()
		{

		}

		public function BeManaged()
		{
			$this->work();
		}
	}


	class Captain
	{
		public function manage(Manageable $worker)
		{
			$worker->BeManaged();
		}
	}



 ?>
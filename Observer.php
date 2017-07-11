<?php 

	interface Subject
	{
		public function attach($observer);

		public function detach($observer);

		public function notify();
	}

	interface Observer
	{
		public function handle();
	}

	class Login implements Subject
	{
		protected $observers;

		public function attach($observable)
		{
			if (is_array($observable)) {

				return $this->attachObserver($observable);
			}

			$this->observers[] = $observable;

			return $this;
		}

		public function detach($index)
		{
			unset($this->observers[$index]);
		}

		public function notify()
		{
			foreach ($this->observers as $observer) 
			{
				$observer->handle();
			}
		}

		private function attachObserver($observable)
		{
			//$this->observers = $observable;

			foreach ($observable as $observer) 
			{
				if(! $observer instanceof Observer)

					throw new Exception();
					
				$this->attach($observer);

				//$this->observers[] = $observer;
			}
		}

		public function fire()
		{
			// Perform login
			
			$this->notify();
		}
	}

	class LoginHandler implements Observer
	{
		public function handle()
		{
			var_dump("log something importent!");
		}
	}

	class EmailNotifire implements Observer
	{
		public function handle()
		{
			var_dump("fire off an email");
		}
	}


	class ConfirmSms implements Observer
	{
		public function handle()
		{
			var_dump("Send confirmation sms");
		}
	}

	$login = new Login();
	$login->attach([new LoginHandler, new EmailNotifire, new ConfirmSms]);

	$login->fire();

	//var_dump($login);


	// $login->attach(new LoginHandler);
	// $login->attach(new EmailNotifire);


 ?>
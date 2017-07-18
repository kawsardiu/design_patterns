<?php 

	namespace App\Models;

	class User
	{
		protected $first_name;
		protected $last_name;
		protected $email;

		public function setFirstName(string $firstName)
		{
			$this->first_name = trim($firstName);
		}

		public function getFirstName(): string
		{
			return $this->first_name;
		}

		public function setLastName(string $lastName)
		{
			$this->last_name = trim($lastName);
		}

		public function getLastName(): string
		{
			return $this->last_name;
		}

		public function getFullName(): string
		{
			return $this->first_name . ' ' . $this->last_name;
		}

		public function setEmail(string $email)
		{
			$this->email = trim($email);
		}

		public function getEmail(): string
		{
			return $this->email;
		}

		public function getEmailVariable()
		{
			return ['full_name' => $this->getFullName(), 'email' => $this->email];
		}
	}

 ?>
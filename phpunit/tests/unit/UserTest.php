<?php 


	class UserTest extends PHPUnit_Framework_TestCase
	{
		protected $user;

		public function setUp()
		{
			$this->user = new \App\Models\User;
		}


		public function testThatWeCanGetTheFirstName()
		{

			$this->user->setFirstName("Kawsar");

			$this->assertEquals($this->user->getFirstName(), "Kawsar");
		}

		public function testThatWeCanGetTheLastName()
		{

			$this->user->setLastName("Joy");

			$this->assertEquals($this->user->getLastName(), "Joy");
		}

		public function testFullNameReturned()
		{

			$this->user->setFirstName("Kawsar");

			$this->user->setLastName("Joy");

			$this->assertEquals($this->user->getFullName(), "Kawsar Joy");
		}

		public function testFirstNameAndLastNameAreTrimmed()
		{

			$this->user->setFirstName("    Kawsar   ");

			$this->user->setLastName("Joy       ");

			$this->assertEquals($this->user->getFirstName(), "Kawsar");
			$this->assertEquals($this->user->getLastName(), "Joy");
		}

		public function testGetTheEmail()
		{

			$this->user->setEmail("kawsar@bca.com");

			$this->assertEquals($this->user->getEmail(), "kawsar@bca.com");
		}

		public function testEmailVariablesContainTheCorrectValue()
		{

			$this->user->setFirstName("Kawsar");

			$this->user->setLastName("Joy");

			$this->user->setEmail("kawsar@bca.com");

			$emailVariable = $this->user->getEmailVariable();

			$this->assertArrayHasKey('full_name', $emailVariable);
			$this->assertArrayHasKey('email', $emailVariable);

			$this->assertEquals($emailVariable['full_name'], 'Kawsar Joy');
			$this->assertEquals($emailVariable['email'], 'kawsar@bca.com');

		}
	}

 ?>
<?php 
	//require "vendor/autoload.php";

	use Illuminate\Database\Capsule\Manager as DB;

	 class CustomerRepositoryTest extends PHPUnit_Framework_TestCase
	 {
	 	protected $customers;

	 	public function setUp()
	 	{
	 		$this->setUpDatabase();

	 		//$this->migrateTables( );

	 		$this->customers = new CustomerRepository;

	 	}

	 	protected function setUpDatabase()
	 	{
	 		$database = new DB;

	 		$database->addConnection([

	 			'driver' => 'mysql',
	 			'host' => 'localhost',
	 			'database' => 'phpsols',
	 			'username' => 'root',
	 			'password' => ''

	 			]);

	 		$database->bootEloquent();

	 		$database->setAsGlobal();
	 	}

	 	protected function migrateTables()
	 	{
	 		DB::schema()->create('customers', function($table){

	 			$table->increments('id');
	 			$table->string('name');
	 			$table->string('type');
	 			$table->timestamps();

	 		}); 

	 		Customer::create(['name' => 'joe', 'type' => 'gold']);
	 		Customer::create(['name' => 'jane', 'type' => 'silver']);
	 	}

	 	/** @test */

	 	function it_fetches_all_customers()
	 	{
	 		$results = $this->customers->all();

	 		$this->assertCount(2, $results);
	 	}

	 	/** @test */

	 	function it_fetches_all_customers_who_matche_a_given_specification()
	 	{
	 		$results = $this->customers->whoMatch(new CustomerIsGold);

	 		$this->assertCount(1, $results);

	 	}

	 }


 ?>
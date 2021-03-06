<?php 

	class AdditionTest extends PHPUnit_Framework_TestCase
	{
		/** @test */

		public function adds_up_given_operands()
		{
			$addition = new App\Calculator\Addition;
			$addition->setOperands([5, 10]);

			$this->assertEquals(15, $addition->calculate());
		}

		/** @test */
		/**
	     * @expectedException NoOperandsException
	     */
		public function no_operands_given_throws_exception_when_calculating()
		{
			//this->setExpectedException(App\Calculator\Exceptions\NoOperandsException::class);

			$addition = new App\Calculator\Addition;

			$addition->calculate();
		}
	}


 ?>
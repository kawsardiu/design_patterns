<?php 

	class DivisionTest extends PHPUnit_Framework_TestCase
	{
		/** @test*/

		public function diviedes_given_operand()
		{
			$division = new App\Calculator\Division;
			$division->setOperands([50, 2]);

			$this->assertEquals(25, $division->calculate());
		}

		/** @test */
		/**
	     * @expectedException NoOperandsException
	     */
		public function no_operands_given_throws_exception_when_calculating()
		{
			//this->setExpectedException(App\Calculator\Exceptions\NoOperandsException::class);

			$division = new App\Calculator\Division;

			$division->calculate();
		}
		
		/** @test */

		public function remove_division_by_zero_operands()
		{

			$division = new App\Calculator\Division;
			$division->setOperands([50, 0, 25, 0]);

			$this->assertEquals(2, $division->calculate());
		}
	}

 ?>
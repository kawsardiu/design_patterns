<?php 

	namespace App;

	abstract class Sub
	{

		public function make()
		{
			return $this
					->layBread()
					->addLettuce()
					->addPrimaryToppings()
					->addSauces();
		}


		protected function layBread()
		{
			var_dump("laying bread on turkey");

			return $this;
		}

		protected function addLettuce()
		{
			var_dump("adding lettuce");

			return $this;
		}

		protected function addSauces()
		{
			var_dump("adding sauces");
		}

		protected abstract function addPrimaryToppings();
	}


 ?>
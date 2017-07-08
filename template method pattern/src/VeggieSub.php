<?php 

	namespace App;

	class VeggieSub extends Sub
	{

		protected function addPrimaryToppings()
		{
			var_dump("adding veggies");

			return $this;
		}

	}

 ?>
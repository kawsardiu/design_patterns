<?php 

	namespace Acme;

	class AreaCalculator
	{
		public function calculate($shapes)
		{
			foreach ($shapes as $shape) {

				$arr[] = $shape->area();
			}

			return array_sum($arr);
		}
	}

 ?>
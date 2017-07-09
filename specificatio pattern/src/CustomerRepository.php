<?php 

	class CustomerRepository
	{
		public function whoMatch($customerIsGold)
		{
			$customers = Customer::query();

			$customers = $customerIsGold->asScope($customers);

			return $customers->get();
		}	

		public function all()
		{
			return Customer::all();
		}
	}


 ?>
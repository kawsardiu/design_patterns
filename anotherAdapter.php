<?php 

	interface Payment
	{
		public function name($name);

		public function bill($bill);
	}

	class Paypal implements Payment
	{
		public function name($item)
		{
			var_dump("Buying $item with paypal");
		}

		public function bill($price)
		{
			var_dump("Total bill is $price with paypal");
		}
	}

	class Customer
	{
		public $payment;

		public function __construct(Payment $payment)
		{
			$this->payment = $payment;
		}

		public function buy($name, $bill)
		{
			$this->payment->name($name);
			$this->payment->bill($bill);
		}
	}

	class AlipayAdapter implements Payment
	{
		protected $mathodType;

		public function __construct ($payment)
		{
			$this->mathodType = $payment;
		}

		public function name($name)
		{
			$this->mathodType->anotherName($name);
		}

		public function bill($bill)
		{
			$this->mathodType->anotherBill($bill);
		}
	}

	class Alipay
	{
		public function anotherBill($name)
		{
			var_dump("Buying $name with alipay");
		}

		public function anotherName($bill)
		{
			var_dump("Total bill is $bill with alipay");
		}
	}

	(new Customer(new AlipayAdapter(new Alipay)))->buy("Shoe", 50);

 ?>
<?php 

	interface CarCuponGenerator
	{
		function addSessionDsicount();

		function addStockDiscount();
	}

	class BmwCuponGenerator implements CarCuponGenerator
	{
		private $discount = 0;
		private $isHighSeason = false;
		private $bigStock = true;

		public function addSessionDsicount()
		{
			if (!$this->isHighSeason) return $this->discount += 5;

			return $this->discount += 0;
		}

		public function addStockDiscount()
		{
			if($this->bigStock) return $this->discount += 7;

			return $this->discount += 0;
		}
	}


	class MercedesCuponGenerator implements CarCuponGenerator
	{
		private $discount = 0;
		private $isHighSeason = false;
		private $bigStock = true;

		public function addSessionDsicount()
		{
			if (!$this->isHighSeason) return $this->discount += 4;

			return $this->discount += 0;
		}

		public function addStockDiscount()
		{
			if($this->bigStock) return $this->discount += 10;

			return $this->discount += 0;
		}
	}

	function couponObjectGenerator($car)
	{
		if($car === "BMW")
		{
			$carObj = new BmwCuponGenerator;

		}elseif($car === "MERCEDES")
		{
			$carObj = new MercedesCuponGenerator;
		}

		return $carObj;
	}

	class CouponGenerator
	{
		private $carCoupon;

		public function __construct(CarCuponGenerator $carCoupon)
		{
			$this->carCoupon = $carCoupon;
		}

		public function getCoupon()
		{
			$discount = $this->carCoupon->addSessionDsicount();
			$discount = $this->carCoupon->addStockDiscount();

			return $coupon = "Get {$discount} off the price of your new car.";
		}
	}

	$car = "MERCEDES";

	$carObj = couponObjectGenerator($car);

	$couponGenerator = new CouponGenerator($carObj);

	print $couponGenerator->getCoupon();
 ?>
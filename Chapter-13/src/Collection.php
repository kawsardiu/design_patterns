<?php 
	namespace App;
	
	abstract class Collection implements \Iterator
	{
		protected $mapper;
		protected $total = 0;
		protected $raw = [];

		private $pointer = 0;
		private $objects = [];

		public function __construct(array $raw = [], Mapper $mapper = null)
		{
			$this->raw = $raw;
			$this->total = count($raw);

			if (count($raw) && is_null($mapper)) {

				throw new AddException("need Mapper to generate objects.");
				
			}

			$this->mapper = $mapper;
		}

		public function add(DomainObject $object)
		{
			$class = $this->targetClass();

			if (! $object instanceof $class) {

				throw new AddException("This is a {$class} collection.");
				
			}

			$this->notifyAccess();
			$this->objects[$this->total] = $object;
			$this->total++;
		}

		abstract public function targetClass(): string;

		protected function notifyAccess()
		{
			// deliberately left blank!
		}

		private function getRow($num)
		{
			$this->notifyAccess();

			if ($num >= $this->total || $num < 0) {

				return null;
			}

			if (isset($this->objects[$num])) {

				return $this->objects[$num];
			}

			if (isset($this->raw[$num])) {
			
				$this->objects[$num] = $this->createObject($this->raw[$num]);
			}
		}
	}


 ?>
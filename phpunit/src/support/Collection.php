<?php 

	namespace App\Support;

	class Collection implements \IteratorAggregate, \JsonSerializable 
	{
		protected $items = [];

		public function __construct(array $items = [])
		{
			$this->items = $items;
		}

		public function getIterator(): \ArrayIterator
		{
			return new \ArrayIterator($this->items);
		}

		public function jsonSerialize()
		{
			return $this->items;
		}
		
		public function get(): array
		{
			return $this->items;
		}

		public function count(): int
		{
			return count($this->items);
		}

		public function merge(Collection $collection)
		{
			$this->add($collection->get());
		}

		public function add(array $newItems)
		{
			$this->items = array_merge($this->get(), $newItems);
		}

		public function toJson(): string
		{
			return json_encode($this->items);
		}
	}

 ?>
<?php 


	class CollectionTest extends PHPUnit_Framework_TestCase
	{
		/** @test */

		public function empty_instantiated_collection_return_no_items()
		{
			$collection = new App\Support\Collection();

			$this->assertEmpty($collection->get());
		}

		/** @test */

		public function count_is_correct_for_collection_passed_in()
		{
			$collection = new App\Support\Collection(['one', 'two', 'three']);

			$this->assertEquals($collection->count(), 3);
		}

		/** @test */

		public function items_returned_match_items_passed_in()
		{
			$collection = new App\Support\Collection(['one', 'two', 'three', 'four']);

			$this->assertCount(4, $collection->get());
			$this->assertEquals('one', $collection->get()[0]);
			$this->assertEquals('four', $collection->get()[3]);

		}

		/** @test */

		public function collection_is_instance_of_iterator_aggregate()
		{
			$collection = new App\Support\Collection(['one', 'two', 'three', 'four']);

			$this->assertInstanceOf(IteratorAggregate::class, $collection);
		}

		/** @test */

		public function collection_can_be_iterated()
		{
			$collection = new App\Support\Collection(['one', 'two', 'three', 'four']);

			$items = [];

			foreach ($collection as $item) {

				$items[] = $item;
			}

			$this->assertCount(4, $items);
			$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
		}

		/** @test */

		public function collection_can_be_merged_with_another_collection()
		{
			$collection1 = new App\Support\Collection(['one', 'two']);
			$collection2 = new App\Support\Collection(['three', 'four', 'five']);

			$collection1->merge($collection2);

			$this->assertCount(5, $collection1->get());
			$this->assertEquals(5, $collection1->count());

		}

		/** @test */

		public function can_add_to_existing_collection()
		{
			$collection = new App\Support\Collection(['one', 'two', 'three', 'four']);
			$collection->add(['five']);

			$this->assertEquals(5, $collection->count());
			$this->assertCount(5, $collection->get());
		}

		/** @test */

		public function return_json_encoded_items()
		{
			$collection = new App\Support\Collection([

					['first_name' => "Kawsar", "last_name" => 'Joy'], 
					['first_name' => "Md", "last_name" => "jakir"]

				]);

			$this->assertInternalType('string', $collection->toJson());
			$this->assertEquals('[{"first_name":"Kawsar","last_name":"Joy"},{"first_name":"Md","last_name":"jakir"}]',$collection->toJson());

		}

		/** @test */

		public function json_encoding_a_collection_object_returns_json()
		{
			$collection = new App\Support\Collection([

					['first_name' => "Kawsar", "last_name" => 'Joy'], 
					['first_name' => "Md", "last_name" => "jakir"]

				]);

			$encoded = json_encode($collection);
			
			$this->assertInternalType('string', $encoded);
			$this->assertEquals('[{"first_name":"Kawsar","last_name":"Joy"},{"first_name":"Md","last_name":"jakir"}]',$encoded);
		}
	}

 ?>
<?php 
	
	foreach (spl_classes() as $key => $value) {
		
		//print $key . '->' . $value . '</br>';
	}


	$array = array('1' => 'one', '2' => 'two', '3' => 'three');

	$arrayObject = new ArrayObject($array);

	//var_dump($arrayObject);

	for($iterator = $arrayObject->getIterator(); $iterator->valid(); $iterator->next())
	{
		//print $iterator->key() . '->' . $iterator->current() . "\n";
	}

	$arrayObject = new arrayObject();
	$arrayObject[] = 'Zero';
	$arrayObject[] = 'One';
	$arrayObject[] = 'Two';

	$iterator = $arrayObject->getIterator();
	$iterator->next();

	//print $iterator->key();

	//$iterator->rewind();

	//print $iterator->key();

	//var_dump($iterator->valid());

	$iterator->next();
	$iterator->next();
	//var_dump($iterator->valid());


	while ($iterator->valid()) {
		
		//print $iterator->key() . '->' . $iterator->current() . "\n";
		//$iterator->next();
	}

	class Count implements Countable
	{
		protected $ljl = 0;

		public function count()
		{
			return $this->ljl;
		}
	}

	$countable = new Count;

	//var_dump(count($countable));

	$iterator1 = new ArrayIterator(array('a', 'b', 'c'));
	$iterator2 = new ArrayIterator(array('e', 'f', 'g'));

	$iterator = new AppendIterator();

	$iterator->append($iterator1);
	$iterator->append($iterator2);

	foreach ($iterator as $value) {
		//print $value;
	}

	try
	{
		foreach (new DirectoryIterator('../') as $item) {
			print $item->getBasename('.php') . "\n";	
			$item->next();	
		}
	}
	catch(Excection $e)
	{
		//print $e->getMassage();
	}

	//Reflection::export(new ReflectionClass('Count'));


 ?>
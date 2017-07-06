<?php 

	// An adapter allows us to traslet or wrap 1 interface for use with another


	require "vendor/autoload.php";

	use Acme\Book;
	use Acme\BookInterface;
	use Acme\eAdapter;
	use Acme\eReaderInterface;
	use Acme\Kindle;
	use Acme\Nook;


	class Person
	{
		public function read(BookInterface $book)
		{
			$book->open();
			$book->turnPage();
		}
	}

	(new Person)->read(new eAdapter(new Nook));


 ?>
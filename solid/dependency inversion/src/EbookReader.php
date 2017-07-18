<?php 

	namespace App;

	class EbookReader
	{
		private $book;

		public function __construct(EbookInterface $book)
		{
			$this->book = $book;
		}

		public function read()
		{
			return $this->book->read();
		}
	}

 ?>
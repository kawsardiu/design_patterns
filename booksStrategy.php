<?php 

	abstract class Question
	{
		protected $prompt;
		protected $marker;

		public function __construct(string $prompt, Marker $marker)
		{
			$this->prompt  = $prompt;
			$this->marker = $marker;
		}

		public function mark(string $response): bool
		{
			return $this->marker->mark($response);
		}
	}

	class TextQuestion extends Question
	{

	}

	class AVQuestion extends Question
	{

	}

	abstract class Marker
	{
		protected $test;

		public function __construct(string $test)
		{
			$this->test = $test;
		}

		abstract function mark(string $response): bool;
	}


	class MarkLogicMarker extends Marker
	{
		private $engine;

		public function __construct(string $test)
		{
			parent::__construct($test);
			$this->engine = new MarkParse($test);
		}

		public function mark(string $response): bool
		{
			return $this->engine->evaluate($response);
		}
	}

	class MatchMarker extends Marker
	{
		public function mark(string $response): bool
		{
			return ($this->test == $response);
		}
	}

	class RegexMarker extends Marker
	{
		public function mark(string $response): bool
		{
			return (preg_match("$this->test", $response) === 1);
		}
	}

	$markers = [
		new MatchMarker("five"),
		new RegexMarker("/f.ve/")
	];

	//var_dump($markers);

	foreach ($markers as $marker) {
		print get_class($marker) . "\n";
		$question = new TextQuestion("how many beans makes five", $marker);

		foreach (['five', 'four'] as $response) {
				print "response   : $response:";
				if ($question->mark($response)) {
					print "well done\n";
				}else{
					print "never mind\n";
				}
			}	
	}

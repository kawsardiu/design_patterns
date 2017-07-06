<?php 

	abstract class Tile
	{
		abstract public function getWealthFactor(): int;
	}

	class Plains extends Tile
	{
		private $wealthFactor = 2;

		public function getWealthFactor(): int
		{
			return $this->wealthFactor;
		}
	}

	abstract class TileDecorator extends Tile
	{
		protected $tile;

		public function __construct(Tile $tile)
		{
			$this->tile = $tile;
		}
	}


	class DiamondDecorator extends TileDecorator
	{
		public function getWealthFactor(): int
		{
			return $this->tile->getWealthFactor() + 2;
		}
	}

	class PolutionDecorator extends TileDecorator
	{
		public function getWealthFactor(): int
		{
			return $this->tile->getWealthFactor() - 4;
		}
	}

	$tile = new Plains();
	//print $tile->getWealthFactor();

	$tile = new DiamondDecorator(new Plains());
	//print $tile->getWealthFactor();

	$tile = new DiamondDecorator(new PolutionDecorator(new Plains()));
	//print $tile->getWealthFactor();

	$tile = new PolutionDecorator(new plains());
	//print $tile->getWealthFactor();

	class RequestHelper
	{

	}

	abstract class ProcessRequest
	{
		abstract public function process(RequestHelper $req);
	}

	class MainProcess extends ProcessRequest
	{
		public function process(RequestHelper $req)
		{
			print __CLASS__ . ":doing something with request\n";
		}
	}

	abstract class DecoratorProcess extends ProcessRequest
	{
		protected $processRequest;

		public function __construct(ProcessRequest $pr)
		{
			$this->processRequest = $pr;
		}
	}

	class LogRequest extends DecoratorProcess
	{
		public function process(RequestHelper $req)
		{
			print __CLASS__ . ": logging request\n";
			$this->processRequest->process($req);
		}
	}

	class AuthenticateRequest extends DecoratorProcess
	{
		public function process(RequestHelper $req)
		{
			print __CLASS__  . ": authenticate request\n";
			$this->processRequest->process($req);
		}
	}

	class StructureRequest extends DecoratorProcess
	{
		public function process(RequestHelper $req)
		{
			print __CLASS__ . ": structuring request data\n";
			$this->processRequest->process($req);
		}
	}

	$process = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainProcess())));
	$process->process(new RequestHelper());


 ?>
<?php
	class myIterator implements Iterator {
	    private $position = 0;
	    private $array = array(
	        "firstelement",
	        "secondelement",
	        "lastelement",
	    );  

	    public function __construct() {
	        $this->position = 2;
	    }

	    public function rewind() {
	        var_dump(__METHOD__);
	        $this->position = 0;
	    }

	    public function current() {
	        var_dump(__METHOD__);
	        return $this->array[$this->position];
	    }

	    public function key() {
	        var_dump(__METHOD__);
	        return $this->position;
	    }

	    public function next() {
	        var_dump(__METHOD__);
	        ++$this->position;
	    }

	    public function valid() {
	        var_dump(__METHOD__);
	        return isset($this->array[$this->position]);
	    }
	}

	$it = new myIterator;

	//$it2 = new myIterator;

	//$it2->next();

	//var_dump($it);

		// foreach($it as $key => $value) {
		//     var_dump($key, $value);
		//     echo "\n";
		// }

	//var_dump($it->next());

	//var_dump($it->key());

	//var_dump($it->valid());

?>

<script type="text/javascript">
	
var file = {
	"autoload": {
		"psr-4": {
			"App\\": "src"
		}
	},
	"name": "kawsar",
	"car": null,
	"address": ["rampura", "banasree"],
	"isHome" : false,
	"mobile": 01916115824
};

// for (i in file.address)
// {
// 	console.log(file.address[i]);
// }

for (i = 0; i < file.address.length; i++)
{
	//console.log(file.address[i]);
}


var address = ["dhaka", {"comilla": "bagmara"}];

//console.log(address[1].comilla);


// file["name"] = "joy";

// console.log(file.name);

// delete file.name;

// for (x in file){

// 	console.log(file[x]);

// }

myObj = {
    "name":"John",
    "age":30,
    "cars": [
        { "name":"Ford", "models":[ "Fiesta", "Focus", "Mustang" ] },
        { "name":"BMW", "models":[ "320", "X3", "X5" ] },
        { "name":"Fiat", "models":[ "500", "Panda" ] }
    ]
 }


for (x in myObj.cars)
{
	console.log(myObj.cars[x].name);

	for (i in myObj.cars[x].models)
	{
		console.log(myObj.cars[x].models[i]);
	}
}

</script>
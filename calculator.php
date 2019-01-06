<?php

	class Calculator 
	{
		private $a,$b,$_operator;
		function __construct($x,$y,$z)
		{
			# code...
			$this->a=$x;
			$this->b=$y;
			$this->_operator=$z;
		}
		function add(){
			return $this->a+$this->b;
		}
		function sub(){
			return $this->a-$this->b;
		}
		function mul(){
			return $this->a*$this->b;
		}
		function divd(){
			return $this->a/$this->b;	
		}
		function compute(){
			if($this->_operator=='+') return $this->add();
			else if($this->_operator=='-') return $this->sub();
			else if($this->_operator=='X') return $this->mul();
			else if($this->_operator=='%') return $this->divd();
			else return "error";
		}
	}

	//var_dump($_POST);
	$resp->response=0;
	$resp->message="invalid arguments";
	$resp->result=null;
	if($_POST['var1'] && $_POST['var2'] && $_POST['operator']){
		$a=floatval($_POST['var1']);
		$b=floatval($_POST['var2']);
		$c=$_POST['operator'];
		$cal=new Calculator($a,$b,$c);
		$resp->result=$cal->compute();
		if($resp->result!="error"){
			$resp->response=1;
			$resp->message="success";
		}
		echo json_encode($resp);
	}
	else{
		echo json_encode($resp);
	}
	
?>
<?php
	function public_url($url = '')
	{
	    return base_url('public/'.$url);
	}

	function pre($list, $exit = true)
	{
	    echo "<pre>";
	    print_r($list);
	    if($exit)
	    {
	        die();
	    }
	}
	function rand_string($length) 
	{
		$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; //62 ký tự
    	$charsLength = strlen($characters) -1;
    	$string = "";
	    for($i=0; $i<$length; $i++){
	        $randNum = mt_rand(0, $charsLength);
	        $string .= $characters[$randNum];
	    }
	    return $string;
	}
?>
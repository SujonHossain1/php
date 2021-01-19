<?php 
	function slug($text)
	{
		$text = strtolower($text);
		$slug = preg_replace('#[ -]+#', '-', $text);
		$slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);
 	    return $slug;
	}
 ?>
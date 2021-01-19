<?php
	 $num = 29.29;
  $exp = explode('.', $num);
  $f = new NumberFormatter("en_US", NumberFormatter::SPELLOUT);
  echo ucfirst($f->format($exp[0])) . ' and ' . ucfirst($f->format($exp[1]));
  //outputs Twenty-nine and Twenty-nin

?>
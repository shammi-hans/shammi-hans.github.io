<?php
function drawcaptcha()
		{
			$lowerbound = 1;
			$upperbound = 10;
			global $num1, $num2;
			
			$num1 = ceil( (mt_rand() / mt_getrandmax()) * ($upperbound - $lowerbound + 1));
			$num2 = ceil( (mt_rand() / mt_getrandmax()) * ($upperbound - $lowerbound + 1));
			//echo $num1."+".$num2;
		}
	
//drawcaptcha();

	
?>
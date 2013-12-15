<?php
function parseText($text)
{
	$text 			=  str_replace("\n","<br>",$text);
		
	$words = explode(' ',$text);
	
	$i = 0;
	foreach($words as $word)
	{
		if(filter_var($word, FILTER_VALIDATE_URL))
		{
			$words[$i] = "<a href='$word'>$word</a>";
		}
		$i++;
	}
	
	$text = implode(' ',$words);
	$text 			=  str_replace("'","\'",$text);
	$text 			=  str_replace('"',"\'",$text);
	return $text;
}
?>
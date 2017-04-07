<?php
/**
 * Created by PhpStorm.
 * User: Dj
 * Date: 4/6/2017
 * Time: 12:17 PM
 */
// convert.php

$f  $c = '';

if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);

if (isset($_POST['c'])) $f = sanitizeString($_POST['c']);

if( $f != ''){
    $c = intval((5 / 9) * ($f - 32));
    $out= "$f f equals $c c ";
}
elseif ($c != ''){
    $f = intval ((9 / 5) * $c + 32);
    $out = "$c c equals $f f";
}
else $out = "";

echo <<<_END
<html>
	<head>
		<title> Temperature Converter </title>
	</head>
	<body>
	<pre> Enter Either Fahrenheit or Cesius and click conver

	<b>$out</b>
	<form method="post" action="convert.php"
	Fahrenhet <input type="text" name="f" size="7">
	Celsius <input type="text" name="c" size="7">
			<input type="submit" value="convert"
	</form>
	</pre>
	</body>
</html>
_END;

Function sanitizeString($var){
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var
}

?>
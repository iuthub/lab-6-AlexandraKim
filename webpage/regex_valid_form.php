<?php
// /(fox)/
// Email /^[a-zA-Z0-9\._]{4,}@[a-zA-Z0-9]{2,}\.\w{2,}$/
// Phone number /^\+998-\d{2}-\d{7}$/
// preg_replace("/\s+/", "", "The quick " " brown fox")
// preg_replace("/[^0-9^,^\.]/", "", "$123,34.00A")
// preg_replace("/\n/", "", "Twinkle, twinkle, little star,
// How I wonder what you are.
// Up above the world so high,
// Like a diamond in the sky.)
// preg_match("/\[\w+\]/", "The quick brown [fox]", $matches)
	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	preg_match($pattern, $text, $matches);
	for ($i=0; $i < count($matches); $i++) { 
		$matches[$i] = preg_replace("/[\[\]]/", "", $matches[$i]);
	}
	print_r($matches);

	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>

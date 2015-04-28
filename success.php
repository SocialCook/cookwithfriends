<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
	<link rel="icon" href="favicon.ico">
</head>

<body>
<script>
	var parser = document.createElement('a');
	parser.href = window.location.href;

	parser.protocol; // => "http:"
	parser.hostname; // => "example.com"
	parser.port;     // => "3000"
	parser.pathname; // => "/pathname/"
	parser.search;   // => "?search=test"
	parser.hash;     // => "#hash"
	parser.host;     // => "example.com:3000"
	var splits = parser.hash.split('=');
	var middle = splits[1];
	var splits2 = middle.split('&');
	var token = splits2[0].toString();
	if(token){
		window.location.href="success2.php?token="+token;
	}

</script>
</body>
</html>


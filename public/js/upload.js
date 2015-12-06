/**
 * upload.js
 * JS functions for the upload page.
 */
 
  window.onload = function() {
	  showUpload();
  }
 
 function showUpload() {
	 var content = "<form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">" +
						"<div class=\"form-group\">" +
							"<input autocomplete=\"off\" autofocus class=\"form-control\" name=\"name\" placeholder=\"Name\" type=\"text\" required />" +
						"</div>" +
						"Select File to upload:" +
						"<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">" +
						"<button class=\"btn btn-default\" type=\"submit\">Submit</button>" +
				 "</form>";
				 
	document.getElementById("content").innerHTML = content;
 }
 
 function showLink() {
	 var content = "<form action=\"link.php\" method=\"post\"\">" +
						"<div class=\"form-group\">" +
							"<input autocomplete=\"off\" autofocus class=\"form-control\" name=\"name\" placeholder=\"Name\" type=\"text\" required />" +
						"</div>" +
						"<div class=\"form-group\">" +
							"<input autocomplete=\"off\" autofocus class=\"form-control\" name=\"link\" placeholder=\"Link\" type=\"text\" required />" +
						"</div>" +
						"<button class=\"btn btn-default\" type=\"submit\">Submit</button>" +
				 "</form>";
				 
	document.getElementById("content").innerHTML = content;
	 
 }
 
 function showEmbed() {
	 var content = "<form action=\"embed.php\" method=\"post\"\">" +
						"<div class=\"form-group\">" +
							"<input autocomplete=\"off\" autofocus class=\"form-control\" name=\"name\" placeholder=\"Name\" type=\"text\" required />" +
						"</div>" +
						"<div class=\"form-group\">" +
							"<input autocomplete=\"off\" autofocus class=\"form-control\" name=\"embed\" placeholder=\"Embed\" type=\"text\" required />" +
						"</div>" +
						"<button class=\"btn btn-default\" type=\"submit\">Submit</button>" +
				 "</form>";
				 
	document.getElementById("content").innerHTML = content;
 }
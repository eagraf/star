/**
 * Global Scripts
 * Ethan Graf 11/25/2015
 */
 
/**
 * Include Header
 */
 function header() {
	 var content = "<div id=\"nav\">" +
						"<ul class=\"nav nav-tabs\">" +
							"<a href=\"/\"><img alt=\"StarBoard\" src=\"/img/small_star_logo.png\" align=\"left\"/></a>" +
							"<li><a href=\"compare.html\">Compare</a></li>" +
							"<li><a href=\"board.php\">Board</a></li>" +
							"<li><a href=\"upload.php\">Upload</a></li>" +
							"<li><a href=\"profile.php\">Profile</a></li>" +
							"<li><a href=\"logout.php\">Log Out</a></li>" +
						"</ul>" +
					"</div>";
	$("#top").html(content);
 }
 
 function footer() {
	var content = "Copyright <a href=\"about.html\">RYEE</a> 2015";
	$("#bottom").html(content);
 }

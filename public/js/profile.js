/**
 * Profile.js
 * Helper functions for the User profile.
 * Sam Rackey 12/3/2015
 */
  
 function displayNav(element) {
	 
	var parameters = {};
	
	$.getJSON("get_name.php", parameters)
		.done(function(data, textStatus, jqXHR) {
			var content = "<div id=\"nav\"><ul class=\"nav nav-tabs\"><p class=\"navbar-text\">";
			content += data.name;
			content += "</p>";
			content += "<li onclick=\"showGroups()\"><a>Groups</a></li>";
			content += "<li onclick=\"displayTable('container');\"><a>Media</a></li>";
			content += "<li><a href=\"../media/upload.html\">Upload</a></li>";
			content += "<li onclick=\"showInfo()\"><a>Info</a></li>";
			content += "</ul></div>";
			document.getElementById(element).innerHTML = content;
			
			showGroups();
		})
		.fail(function(d, textStatus, error) {
			 console.log(d);
			 // log error to browser's console
			 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		});
	
 }
 
 function showGroups() {
	 
	var parameters = {};
	
	$.getJSON("get_profile_groups.php", parameters)
		.done(function(data, textStatus, jqXHR) {
		
			var content = "<table class=\"table\"><thead><tr><th>Name:</th><th>Description:</th></tr></thead><tbody>";
            for (var i in data.groups) { 
                content+="<tr>";
                content+="<td style=\"text-align:left\">" + data.groups[i].group + "</td>";
				content+="<td style=\"text-align:left\">" + data.groups[i].desc + "</td>";
                content+="</tr>";
            }
			
			content+="</tbody></table></div>";
			
			document.getElementById("container").innerHTML = content;
			
		})
		.fail(function(d, textStatus, error) {
			 console.log(d);
			 // log error to browser's console
			 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		});
	
 }
 
 function showInfo() {
	
	var content = "<h3><p><a href=\"change_name.php\">Change Name</a></p></h3><h3><p><a href=\"change_pass.php\">Change Password</a></p></h3>";
	//var content = "ayylmao";
	document.getElementById("container").innerHTML = content;
 }
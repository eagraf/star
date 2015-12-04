/**
 * JavaScript code for leader board functions.
 * Ethan Graf 12/3//2015
 */
 
 window.onload = function() {
	 $.getJSON("board.php", {"type": "groups"})
		.done(function(data, textStatus, jqXHR) {
			
		console.log(data);
	
		var content = "<form action=\"change_group.php\" method=\"post\"><fieldset><div class=\"form-group\"><select class=\"form-control\" name=\"group\" onchange='this.form.submit()'>";
		content += "<option disabled selected value=\"\">";
		content += data.current;
		content += "</option>";
		for(i in data.groups) {
			console.log(data.groups[i].id);
			content += "<option value='" + data.groups[i].id + "'>" + data.groups[i].name + "</option>";
		}
		content += "</select></div>";
		
		document.getElementById("group_changer").innerHTML = content;
	})
	.fail(function(d, textStatus, error) {
		 console.log(d);
		 // log error to browser's console
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		 return "getJSON failed, status: " + textStatus + ", error: "+error;
	});
 }
 
 function showTotal() {
	$.getJSON("board.php", {"type": "total"})
		.done(function(data, textStatus, jqXHR) {
	
			console.log(data);
			var content = "<table class=\"table\"><thead><tr><th>Name:</th><th>Type:</th><th>Rating:</th><th>View:</th></tr></thead><tbody>";
			for (var i in data) { 
				content+="<tr>";
				content+="<td>" + data[i].name + "</td>";
				content+="<td>" + data[i].type + "</td>";
				content+="<td>" + data[i].rating + "</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+=printMedia(data[i].type, data[i].address);
				content+="</div>";
				content+="</form></td>";
				content+="</tr>";
			}
			
			content+="</tbody></table></div>";
			
			document.getElementById("content").innerHTML = content;
	})
	.fail(function(d, textStatus, error) {
		 console.log(d);
		 // log error to browser's console
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		 return "getJSON failed, status: " + textStatus + ", error: "+error;
	});
 }
 
 function showCategories() {
	 
 }
 
 function showUsers() {
	 $.getJSON("board.php", {"type": "users"})
		.done(function(data, textStatus, jqXHR) {
	
			console.log(data);
			var content = "<table class=\"table\"><thead><tr><th>Stars:</th><th>Name:</th></tr></thead><tbody>";
			for (var i in data) { 
				content+="<tr>";
				content+="<td>" +  "<img alt=\"Star\" src=\"/img/staricon.png\"/>" + data[i].rating + "</td>";
				content+="<td>" + data[i].name + "</td>";
				content+="</tr>";
			}
			
			content+="</tbody></table></div>";
			
			document.getElementById("content").innerHTML = content;
	})
	.fail(function(d, textStatus, error) {
		 console.log(d);
		 // log error to browser's console
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		 return "getJSON failed, status: " + textStatus + ", error: "+error;
	});
 }
 
 function printMedia(type, value) {
	 switch(type) {
		 case "image":
			return "<button class=\"btn btn-default\" onclick=\"displayImage('" + value  + "', 'middle')\"\>View</button>";
		 case "audio":
			return "<button class=\"btn btn-default\" onclick=\"displayAudio('" + value  + "', 'middle')\"\>View</button>";
		 case "document":
			return "<button class=\"btn btn-default\" onclick=\"displayDocument('" + value  + "', 'middle')\"\>View</button>";
		 case "link":
			return "<a href=\"" + value + "\">" + value + "</a>";
		 case "embed":
			return "<iframe width=\"420\" height=\"315\" src=\"" + value + "\"></iframe>";
	 }
 }
 
 
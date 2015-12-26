/**
 * JavaScript code for leader board functions.
 * Ethan Graf 12/3//2ind15
 */
 var categories;
 
 window.onload = function() {
	 $.getJSON("board.php", {"type": "groups"})
		.done(function(data, textStatus, jqXHR) {
			
		console.log(data);
	
		var content = "<form action=\"change_group.php\" method=\"get\"><fieldset><div class=\"form-group\"><select class=\"form-control\" name=\"group\" onchange='this.form.submit()'>";
		content += "<option disabled selected value=\"" + data.current.id + "\">";
		content += data.current.name;
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
				content+=printMedia(data[i].type, data[i].address, "content");
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
	 $.getJSON("board.php", {"type": "categories"})
		.done(function(data, textStatus, jqXHR) {
			
			categories = data;
			console.log(data);
			console.log(data[0]);
			showCategory(0);
			
	})
	.fail(function(d, textStatus, error) {
		 console.log(d);
		 // log error to browser's console
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		 return "getJSON failed, status: " + textStatus + ", error: "+error;
	});
 }
 
 function showCategory(ind) {
	 var nextInd = ind++;
	 if(nextInd == categories.length) {
		 nextInd = 0;
	 }
	 var content = "<div><a class=\"btn btn-default\" role=\"button\" onclick=\"showCategory(" + nextInd + ")\">Next Category</a></div>";
	 content += "<h1>" + categories[ind].name + "</h1>";  
 	 content += "<table class=\"table\"><thead><tr><th>Name:</th><th>Type:</th><th>Rating:</th><th>View:</th></tr></thead><tbody>";
			for (var i in categories[ind].objects) { 
				content+="<tr>";
				content+="<td>" + categories[ind].objects[i].name + "</td>";
				content+="<td>" + categories[ind].objects[i].type + "</td>";
				content+="<td>" + categories[ind].objects[i].rating + "</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+=printMedia(categories[ind].objects[i].type, categories[ind].objects[i].address, "content");
				content+="</div>";
				content+="</form></td>";
				content+="</tr>";
			}
			
			content+="</tbody></table></div>";
			
			document.getElementById("content").innerHTML = content;
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
 
 function printMedia(type, value, loc) {
	 switch(type) {
		 case "image":
			return "<button class=\"btn btn-default\" onclick=\"displayImage('" + value  + "', '" + loc + "')\"\>View</button>";
		 case "audio":
			return "<button class=\"btn btn-default\" onclick=\"displayAudio('" + value  + "', '" + loc + "')\"\>View</button>";
		 case "document":
			return "<button class=\"btn btn-default\" onclick=\"displayDocument('" + value  + "', '" + loc + "')\"\>View</button>";
		 case "link":
			return "<a href=\"" + value + "\">" + value + "</a>";
		 case "embed":
			return "<iframe width=\"42ind\" height=\"315\" src=\"" + value + "\"></iframe>";
	 }
 }
 
 
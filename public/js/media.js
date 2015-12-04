/**
 * Media.js
 * Helper functions for displaying media.
 * Ethan Graf 11/23/2015
 */
 
 function displayTable(element) {
	 
	var parameters = {};
	
	$.getJSON("get_media.php", parameters)
		.done(function(data, textStatus, jqXHR) {
		
			var content = "<table class=\"table\"><thead><tr><th>Name:</th><th>type:</th><th>address:</th><th>View:</th></tr></thead><tbody>";
            var content = "<table class=\"table\"><thead><tr><th>Name:</th><th>type:</th><th>address:</th><th>View:</th></tr></thead><tbody>";
            for (var i in data) { 
                content+="<tr>";
                content+="<td style=\"text-align:left\">" + data[i].name + "</td>";
				content+="<td style=\"text-align:left\">" + data[i].type + "</td>";
                content+="<td style=\"text-align:left\">" + data[i].address + "</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+=printMedia(data[i].type, data[i].address);
				content+="</div>";
				content+="</td>";
                content+="</tr>";
            }
			content+="</tbody></table></div>";
			
			document.getElementById(element).innerHTML = content;
			
		})
		.fail(function(d, textStatus, error) {
			 console.log(d);
			 // log error to browser's console
			 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		});
	
 }
 
 function displayInsertTable(element) {
	 
	var parameters = {};
	
	$.getJSON("get_media.php", parameters)
		.done(function(data, textStatus, jqXHR) {
		
			var content = "<table class=\"table\"><thead><tr><th>Name:</th><th>type:</th><th>address:</th><th>View:</th><th>Insert:</th></tr></thead><tbody>";
            for (var i in data) { 
                content+="<tr>";
                content+="<td style=\"text-align:left\">" + data[i].name + "</td>";
				content+="<td style=\"text-align:left\">" + data[i].type + "</td>";
                content+="<td style=\"text-align:left\">" + data[i].address + "</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+=printMedia(data[i].type, data[i].address);
				content+="</div>";
				content+="</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" onclick=\"insertMedia(" + data[i].id + ")\"\>";
				content+="Insert";
				content+="</button>";
				content+="</div>";
				content+="</td>";
                content+="</tr>";
            }
			content+="</tbody></table></div>";
			
			document.getElementById(element).innerHTML = content;
			
		})
		.fail(function(d, textStatus, error) {
			 console.log(d);
			 // log error to browser's console
			 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		});
	
 }
 
 function displayImage(address, element) {
	var content = "<img src=\"" + address + "\" alt=\"hi\">";
	if(element == "container") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayTable('container')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	if(element == "middle") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayInsertTable('middle')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}

	document.getElementById(element).innerHTML = content;	 
 }
 
 function displayAudio(address, element) {
	 var content = "<audio controls><source src=\"" + address + "\"></audio>";
	 
	 if(element == "container") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayTable('container')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	if(element == "middle") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayInsertTable('middle')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	
	 document.getElementById(element).innerHTML = content;
 }
 
 function displayDocument(address, element) {
	 var content = "<embed src=\"" + address + "\" width=\"600\" height=\"500\" alt=\"pdf\" pluginspage=\"http://www.adobe.com/products/acrobat/readstep2.html\">";
	 
	 if(element == "container") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayTable('container')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	if(element == "middle") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayInsertTable('middle')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	
	 document.getElementById(element).innerHTML = content;
 }
 
 function displayLink(address, element) {
	 var content = "<a href=\"" + address + "\">" + address + "</a>";
	 
	 if(element == "container") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayTable('container')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	if(element == "middle") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayInsertTable('middle')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	
	 document.getElementById(element).innerHTML = content;
 }
 
 function displayEmbed(address, element) {
	 var content = "<iframe width=\"420\" height=\"315\" src=\"" + address + "\"></iframe>";
	 
	 if(element == "container") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayTable('container')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	if(element == "middle") {
		content+="<div class=\"form-group\">";
		content+="<button class=\"btn btn-default\" onclick=\"displayInsertTable('middle')\"\>";
		content+="Back";
		content+="</button>";
		content+="</div>";
	}
	
	 document.getElementById(element).innerHTML = content;
 }
 
 function insertMedia(media_id) {
	 
	parameters = { "media_id": media_id };
	console.log(parameters);
  
	$.get("insert.php", parameters)
		.done(function() {
		})
		.fail(function(jqXHR, textStatus, errorThrown) {

         // log error to browser's console
         console.log(errorThrown.toString());
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
			return "<button class=\"btn btn-default\" onclick=\"displayLink('" + value  + "', 'middle')\"\>View</button>";
		 case "embed":
			return "<button class=\"btn btn-default\" onclick=\"displayEmbed('" + value  + "', 'middle')\"\>View</button>";
	 }
 }
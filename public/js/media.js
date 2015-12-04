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
            for (var i in data.images) { 
                content+="<tr>";
                content+="<td style=\"text-align:left\">" + data.images[i].name + "</td>";
				content+="<td style=\"text-align:left\">" + data.images[i].type + "</td>";
                content+="<td style=\"text-align:left\">" + data.images[i].address + "</td>";
				content+="<td style=\"text-align:left\"><form action=\"view_media.php\" method=\"post\">";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" + data.images[i].id  + "\">";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</form></td>";
                content+="</tr>";
            }
			for (var i in data.audio) { 
                content+="<tr>";
                content+="<td style=\"text-align:left\">" + data.audio[i].name + "</td>";
				content+="<td style=\"text-align:left\">" + data.audio[i].type + "</td>";
                content+="<td style=\"text-align:left\">" + data.audio[i].address + "</td>";
				content+="<td style=\"text-align:left\"><form action=\"view_media.php\" method=\"post\">";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" + data.audio[i].id  + "\">";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</form></td>";
                content+="</tr>";
            }
			for (var i in data.documents) { 
                content+="<tr>";
                content+="<td style=\"text-align:left\">" + data.documents[i].name + "</td>";
				content+="<td style=\"text-align:left\">" + data.documents[i].type + "</td>";
                content+="<td style=\"text-align:left\">" + data.documents[i].address + "</td>";
				content+="<td style=\"text-align:left\"><form action=\"view_media.php\" method=\"post\">";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" + data.documents[i].id  + "\">";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</form></td>";
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
            for (var i in data.images) { 
                content+="<tr>";
                content+="<td>" + data.images[i].name + "</td>";
				content+="<td>" + data.images[i].type + "</td>";
                content+="<td>" + data.images[i].address + "</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" onclick=\"displayImage('" + data.images[i].address  + "', 'middle')\"\>";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" onclick=\"insertMedia(" + data.images[i].id + ")\"\>";
				content+="Insert";
				content+="</button>";
				content+="</div>";
				content+="</td>";
                content+="</tr>";
            }
			for (var i in data.audio) { 
                content+="<tr>";
                content+="<td>" + data.audio[i].name + "</td>";
				content+="<td>" + data.audio[i].type + "</td>";
                content+="<td>" + data.audio[i].address + "</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" onclick=\"displayAudio('" + data.audio[i].address  + "', 'middle')\"\>";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" onclick=\"insertMedia(" + data.audio[i].id + ")\"\>";
				content+="Insert";
				content+="</button>";
				content+="</div>";
				content+="</td>";
                content+="</tr>";
            }
			for (var i in data.documents) { 
                content+="<tr>";
                content+="<td>" + data.documents[i].name + "</td>";
				content+="<td>" + data.documents[i].type + "</td>";
                content+="<td>" + data.documents[i].address + "</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" onclick=\"displayDocument('" + data.documents[i].address  + "', 'middle')\"\>";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</td>";
				content+="<td>";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" onclick=\"insertMedia(" + data.documents[i].id + ")\"\>";
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
/**
 * Media.js
 * Helper functions for displaying media.
 * Ethan Graf 11/23/2015
 */
 
 function displayTable() {
	 
	var parameters = {};
	
	$.getJSON("get_media.php", parameters)
		.done(function(data, textStatus, jqXHR) {
		
			var content = "<table class=\"table\"><thead><tr><th>Name:</th><th>type:</th><th>address:</th><th>View:</th></tr></thead><tbody>";
            for (var i in data.images) { 
                content+="<tr>";
                content+="<td>" + data.images[i].name + "</td>";
				content+="<td>" + data.images[i].type + "</td>";
                content+="<td>" + data.images[i].address + "</td>";
				content+="<td><form action=\"view_media.php\" method=\"post\">";
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
                content+="<td>" + data.audio[i].name + "</td>";
				content+="<td>" + data.audio[i].type + "</td>";
                content+="<td>" + data.audio[i].address + "</td>";
				content+="<td><form action=\"view_media.php\" method=\"post\">";
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
                content+="<td>" + data.documents[i].name + "</td>";
				content+="<td>" + data.documents[i].type + "</td>";
                content+="<td>" + data.documents[i].address + "</td>";
				content+="<td><form action=\"view_media.php\" method=\"post\">";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" + data.documents[i].id  + "\">";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</form></td>";
                content+="</tr>";
            }
			content+="</tbody></table></div>";
			
			document.getElementById('media_table').innerHTML = content;
			
		})
		.fail(function(d, textStatus, error) {
			 console.log(d);
			 // log error to browser's console
			 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		});
	
 }
 
 function displayInsertTable() {
	 
	var parameters = {};
	
	$.getJSON("get_media.php", parameters)
		.done(function(data, textStatus, jqXHR) {
		
			var content = "<table class=\"table\"><thead><tr><th>Name:</th><th>type:</th><th>address:</th><th>View:</th><th>Insert:</th></tr></thead><tbody>";
            for (var i in data.images) { 
                content+="<tr>";
                content+="<td>" + data.images[i].name + "</td>";
				content+="<td>" + data.images[i].type + "</td>";
                content+="<td>" + data.images[i].address + "</td>";
				content+="<td><form action=\"view_media.php\" method=\"post\">";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" + data.images[i].id  + "\">";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</form></td>";
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
				content+="<td><form action=\"view_media.php\" method=\"post\">";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" + data.audio[i].id  + "\">";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</form></td>";
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
				content+="<td><form action=\"view_media.php\" method=\"post\">";
				content+="<div class=\"form-group\">";
				content+="<button class=\"btn btn-default\" type=\"submit\" name=\"media_id\" value=" + data.documents[i].id  + "\">";
				content+="View";
				content+="</button>";
				content+="</div>";
				content+="</form></td>";
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
			
			document.getElementById('media_table').innerHTML = content;
			
		})
		.fail(function(d, textStatus, error) {
			 console.log(d);
			 // log error to browser's console
			 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		});
	
 }
 
 function displayImage() {
	 
 }
 
 function displayAudio() {
	 
 }
 
 function displayDocument() {
	 
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
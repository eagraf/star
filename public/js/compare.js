/**
 *
 * JavaScript code for compare functions.
 * Ethan Graf 11/19/2015
 */
 
var group = {};
var objectQueue;

/**
* Called when the DOM is loaded.
*/
window.onload = function() {
	
	var parameters = {};
	$.getJSON("get_group.php", parameters)
		.done(function(data, textStatus, jqXHR) {
	
			//Set global variable to JSON retrieved.
			group = data;
			console.log(group);
			
			reset();
			setComparees();
	})
	.fail(function(d, textStatus, error) {
		 console.log(d);
		 // log error to browser's console
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
	});
	
};

/**
* Reset the comparees displayed in compare.
*/
function setComparees() {
	
	if(objectQueue.length < 3) {
		reset();
	}
	console.log(objectQueue);
	
	var objectA = getComparee();
	var objectB = getComparee();
	
	var category = getCategory();
	
	//Set the text of the button to the comparees name.
		$("#view_a").text(objectA.name);
		$("#view_b").text(objectB.name);
		$("#view_c").text("On " + category + ":");
		
		$("#view_a").val(objectA.owner_id);
		$("#view_b").val(objectB.owner_id);
		
		switch(objectA.type) {
			case "image":
				displayImage(objectA.address, "media_a");
				break;
			case "audio":
				displayAudio(objectA.address, "media_a");
				break;
			case "document":
				displayDocument(objectA.address, "media_a");
				break;
		}
		switch(objectB.type) {
			case "image":
				displayImage(objectB.address, "media_b");
				break;
			case "audio":
				displayAudio(objectB.address, "media_b");
				break;
			case "document":
				displayDocument(objectB.address, "media_b");
				break;
		}
}

function getComparee() {
	var randIndex = Math.floor(Math.random() * (objectQueue.length + 1));
	var comparee = objectQueue[randIndex];
	
	objectQueue.splice(randIndex, 1);
	
	return comparee;
}

function getCategory() {
	var randIndex = Math.floor(Math.random() * (group.categories.length + 1));
	
	return group.categories[randIndex].category;
}

function compare(result) {
	
	switch(result){
		case 0:
			setComparees(1);
			return;
		case 1:
			var winner_id = objectA.id;
			var loser_id = objectB.id;
			break;
		case 2:
			var winner_id = objectB.id;
			var loser_id = objectA.id;
			break;
		default:
			setComparees(1);
			return;
	}
	
	var parameters = {
		"comparees": comparees,
		"winner_id": winner_id,
		"loser_id": loser_id
	};
	console.log(parameters);
  
	$.get("compare_result.php", parameters)
		.done(function() {
			setComparees(1);
		})
		.fail(function(jqXHR, textStatus, errorThrown) {

         // log error to browser's console
         console.log(errorThrown.toString());
     });
	 
}

 /**
  * Reset the list of objects to be compared.
  */
 function reset() {
	 objectQueue = group.objects;
	 console.log(objectQueue);
 }
/**
 *
 * JavaScript code for compare functions.
 * Ethan Graf 11/19/2015
 */
 
 //Global variables.
var group = {};
var current ={};
var objectQueue;

/**
* Called when the DOM is loaded.
*/
window.onload = function() {
	
	var parameters = {};
	
	//Get basic group information necesarry for showing the compare page.
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
	//Reset the objectQueue if there are less than two remaining.
	if(objectQueue.length < 2) {
		reset();
	}
	console.log(objectQueue);
	
	//Randomly retrieve objects from the object queue to be compared.
	var objectA = getComparee();
	var objectB = getComparee();
	
	//Randomly get category.
	var category = getCategory();
	
	//Update global variable current, so that it can be referenced in compare().
	current.objectA = objectA;
	current.objectB = objectB;
	current.category = category;
	
	//Set the text of the button to the comparees name.
	$("#view_a").text(objectA.name);
	$("#view_b").text(objectB.name);
	$("#view_c").text("On " + category + ":");
	
	//Display the different types of media.
	displayMedia(objectA, "media_a");
	displayMedia(objectB, "media_b");
}

function getComparee() {
	var randIndex = Math.floor(Math.random() * (objectQueue.length));
	var comparee = objectQueue[randIndex];
	
	objectQueue.splice(randIndex, 1);
	
	return comparee;
}

function getCategory() {
	var randIndex = Math.floor(Math.random() * (group.categories.length));
	
	return group.categories[randIndex].category;
}

function compare(result) {
	
	switch(result){
		case 0:
			setComparees(1);
			return;
		case 1:
			var winner_id = current.objectA.id;
			var loser_id = current.objectB.id;
			break;
		case 2:
			var winner_id = current.objectB.id;
			var loser_id = current.objectA.id;
			break;
		default:
			setComparees(1);
			return;
	}
	
	var parameters = {
		"comparees": current,
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
	 objectQueue = group.objects.slice();
	 console.log("AYY LMAO: " + objectQueue);
 }
 
 /**
  * Small helper function that displays media based on type.
  */
  function displayMedia(object, dest) {
	  switch(object.type) {
		case "image":
			displayImage(object.address, dest);
			break;
		case "audio":
			displayAudio(object.address, dest);
			break;
		case "document":
			displayDocument(object.address, dest);
			break;
	}
  }
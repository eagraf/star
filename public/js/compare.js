/**
 *
 * JavaScript code for compare functions.
 * Ethan Graf 11/19/2015
 */
 
 //Global variables.
var group = {};
var current = {};
var comparisons = [];
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
		 
		 // log error to browser's console
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		 return "getJSON failed, status: " + textStatus + ", error: "+error;
	});
	
};

window.onbeforeunload = function() {
	parameters = {"comparisons": comparisons, "categories": group.categories};
	
	$.ajax({
		type: 'POST',
		async: false,
		url: 'compare_result.php',
		data: parameters
	}).done(function(data, textStatus, jqXHR) {
	
			//Set global variable to JSON retrieved.
			console.log(data);
	}).fail(function(d, textStatus, error) {

		 // log error to browser's console
		 console.log(d);
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
		 return "getJSON failed, status: " + textStatus + ", error: "+error;
	 }).always(function() {
		console.log("complete");
	 });
	return "AYY LMAO";
};

/**
* Called when a key is pressed,
* Checks if key was left or right arrow,
* and calls compare (1) or (2) depending
*/
window.onkeydown = function() {
	
	//get keycode of key pressed
	var code = event.keyCode;
	
	//determine action off keycode
	switch(code){
		//left arrow
		case 37:
			compare(1);
			break;
		//right arrow
		case 39:
			compare(2);
			break;
	}
}

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
	
	var category = group.categories[randIndex];
	current.category_id = category.id;
	return category.category;
}

function compare(result) {
	
	var comparison = {};
	comparison.category = current.category;
	comparison.category_id = current.category_id;
	
	switch(result){
		case 0:
			setComparees();
			
			var winner_id = current.objectA.id;
			var loser_id = current.objectB.id;
			
			comparison.winner = current.objectA;
			comparison.loser = current.objectB;
			comparison.tie = true;
		
			break;
		case 1:
			var winner_id = current.objectA.id;
			var loser_id = current.objectB.id;
			
			comparison.winner = current.objectA;
			comparison.loser = current.objectB;
			comparison.tie = false;
			break;
		case 2:
			var winner_id = current.objectB.id;
			var loser_id = current.objectA.id;
			
			comparison.winner = current.objectB;
			comparison.loser = current.objectA;
			comparison.tie = false;
			break;
		default:
			setComparees();
			return;
	}
	
	comparisons.push(comparison);
	console.log(comparisons);
	
	var parameters = {
		"comparees": current,
		"winner_id": winner_id,
		"loser_id": loser_id
	};
	console.log(parameters);
  
	$.get("compare_result.php", parameters)
		.done(function() {
			setComparees();
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
	 console.log(objectQueue);
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
function test() {
	$.getJSON("glicko.php", {"comparisons": comparisons, "categories": group.categories})
			.done(function(data, textStatus, jqXHR) {

				//Set global variable to JSON retrieved.
				group = data;
				console.log("AYY " + group);

		})
		.fail(function(d, textStatus, error) {
			 
			 // log error to browser's console
			 console.error(d);
			 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
			 return "getJSON failed, status: " + textStatus + ", error: "+error;
		});
	}

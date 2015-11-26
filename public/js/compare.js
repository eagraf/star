/**
 *
 * JavaScript code for compare functions.
 * Ethan Graf 11/19/2015
 */
 
var comparees = {};

/**
* Called when the DOM is loaded.
*/
window.onload = function() {
 // alert("Hi");
  
  setComparees(1);
};

/**
* Reset the comparees displayed in compare.
*/
function setComparees(comparer) {
  var parameters = {};
  
  $.getJSON("get_comparees.php", parameters)
	.done(function(data, textStatus, jqXHR) {
	
		//Set global variable to JSON retrieved.
		comparees = data;

		//Print JSON
		for (var i in comparees) {
			
			console.log(comparees[i]);
		}

		//Set the text of the button to the comparees name.
		$("#view_a").text(comparees.object_a.name);
		$("#view_b").text(comparees.object_b.name);
		$("#view_c").text("On " + comparees.category.category + ":");
		
		$("#view_a").val(comparees.object_a.owner_id);
		$("#view_b").val(comparees.object_b.owner_id);
		
		switch(comparees.object_a.type) {
			case "image":
				displayImage(comparees.object_a.address, "media_a");
				break;
			case "audio":
				displayAudio(comparees.object_a.address, "media_a");
				break;
			case "document":
				displayDocument(comparees.object_a.address, "media_a");
				break;
		}
		switch(comparees.object_b.type) {
			case "image":
				displayImage(comparees.object_b.address, "media_b");
				break;
			case "audio":
				displayAudio(comparees.object_b.address, "media_b");
				break;
			case "document":
				displayDocument(comparees.object_b.address, "media_b");
				break;
		}
	})
	.fail(function(d, textStatus, error) {
		 console.log(d);
		 // log error to browser's console
		 console.error("getJSON failed, status: " + textStatus + ", error: "+error);
	});
}

function compare(result) {
	
	switch(result){
		case 0:
			setComparees(1);
			return;
		case 1:
			var winner_id = comparees.object_a.id;
			var loser_id = comparees.object_b.id;
			break;
		case 2:
			var winner_id = comparees.object_b.id;
			var loser_id = comparees.object_a.id;
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
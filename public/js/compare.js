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
		$("#view_a").text(comparees.user_a.name);
		$("#view_b").text(comparees.user_b.name);
		
		$("#view_a").val(comparees.user_a.user_id);
		$("#view_b").val(comparees.user_b.user_id);
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
			var winner_id = comparees.user_a.user_id;
			var loser_id = comparees.user_b.user_id;
			break;
		case 2:
			var winner_id = comparees.user_b.user_id;
			var loser_id = comparees.user_a.user_id;
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
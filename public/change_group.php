<?php

    // configuration
    require("../includes/config.php"); 

    // else if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		//if the user selected a group to change, change it
        if(!empty($_POST['group'])){
			$_SESSION['group_id'] = $_POST['group'];
			redirect("board.php");
		}else{
			redirect("board.php");
		}
    }

?>

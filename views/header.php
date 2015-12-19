<!DOCTYPE html>

<html>

	</head>
		<!-- http://getbootstrap.com/ -->
        <link href="../css/bootstrap.min.css" rel="stylesheet"/>

        <link href="../css/style.css" rel="stylesheet"/>


        <?php if (isset($title)): ?>
			<title>StarBoard</title>
		<?php else: ?>
			<title>StarBoard</title>
		<?php endif ?>
	
		<!-- https://jquery.com/ -->
        <script src="../js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="../js/bootstrap.min.js"></script>
		
		<?php
			//Scripts to include in the file.
			if(isset($scripts))
			{
				foreach($scripts as $script)
				{
					print("<script src=\"" . $script . "\"></script>");
				}
			}
		?>


    </head>

    <body>

        <div class="container">

            <div id="top">
        
				<?php if (!empty($_SESSION["id"])): ?>
					<div id="nav">
						<ul class="nav nav-tabs">
							<a href="/"><img alt="StarBoard" src="../img/small_star_logo.png" align="left"/></a>
							<li><a href="../compare/">Compare</a></li>
							<li><a href="../board/">Board</a></li>
							<li><a href="../profile/">Profile</a></li>
							<li><a href="../account/logout.php">Log Out</a></li>
						</ul>
					</div>
                <?php else : ?>
					<div>
						<a href="/"><img alt="StarBoard" src="/img/old_star_logo.png" /></a>
					</div>
					<hr>
				<?php endif ?>
            </div>
			
            <div id="middle">
			
			
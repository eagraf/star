<!DOCTYPE html>

<html>
	
	</head>
		<!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/style.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
			<title>Star: <?= htmlspecialchars($title) ?></title>
		<?php else: ?>
			<title>Star</title>
		<?php endif ?>
		
		<?php print("SESSION: ".$_SESSION["id"]);?>
		
		<li><a href="logout.php"><strong>Log Out</strong></a></li>
		
		<!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>


    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="Star" src="/img/star_logo.png"/></a>
                </div>
            </div>

            <div id="middle">
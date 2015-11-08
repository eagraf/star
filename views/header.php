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
                    <a href="/"><img alt="StarBoard" src="/img/old_star_logo.png"/></a>
                </div>
				<?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="compare.php">Compare</a></li>
                        <li><a href="board.php">Board</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                <?php endif ?>
            </div>
			<hr>
            <div id="middle">
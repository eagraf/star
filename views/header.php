<!DOCTYPE html>

<html>

	<?php if (isset($title)): ?>
		<title>Star: <?= htmlspecialchars($title) ?></title>
	<?php else: ?>
		<title>Star</title>
	<?php endif ?>
	
	</head>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="Star" src="/img/star_logo.png"/></a>
                </div>
            </div>

            <div id="middle">
<?php
	// configuration
	require("class.Glicko2Player.php");
    require("../includes/config.php"); 
	
	compareGroupComparees($_POST["comparisons"]);
	compareCategoryComparees($_POST["comparisons"]);
	compareUserComparees($_POST["comparisons"]);
	
	function compareGroupComparees($comparisons) {
		
		$group_comparees = array();
		foreach($comparisons as $comparison) {
			if(empty($group_comparees[$comparison['winner']['id']])) {
				$comparee = query("SELECT id, rating, deviation FROM compare_object_group WHERE id='" . $comparison['winner']['id'] . "';")[0];
				if($comparee != null) {
					$player = new Glicko2Player("group_total", $comparee['id'], $comparee['rating'], $comparee['deviation']);
					$group_comparees[$comparee['id']] = $player;
				}
			}
			if(empty($group_comparees[$comparison['loser']['id']])) {
				$comparee = query("SELECT id, rating, deviation FROM compare_object_group WHERE id='" . $comparison['loser']['id'] . "';")[0];
				if($comparee != null) {
					$player = new Glicko2Player("group_total", $comparee['id'], $comparee['rating'], $comparee['deviation']);
					$group_comparees[$comparee['id']] = $player;
				}
			}
		}
		
		foreach($comparisons as $comparison) {
			if($comparison['tie'] == "false") {
				$group_comparees[$comparison['winner']['id']]->AddWin($group_comparees[$comparison['loser']['id']]);
				$group_comparees[$comparison['loser']['id']]->AddLoss($group_comparees[$comparison['winner']['id']]);
			}
			else {
				$group_comparees[$comparison['winner']['id']]->AddDraw($group_comparees[$comparison['loser']['id']]);
				$group_comparees[$comparison['loser']['id']]->AddDraw($group_comparees[$comparison['winner']['id']]);
			}
		}
		foreach($group_comparees as $group_comparee) {
			$group_comparee->update();
			query("UPDATE compare_object_group SET rating='" . $group_comparee->rating . "', deviation='" . $group_comparee->rd . "' WHERE id='" . $group_comparee->id . "';");
		}
	}
	
	function compareCategoryComparees($comparisons) {
		$category_comparees = array();
		foreach($_POST["categories"] as $category) {
			$category_comparees[$category['id']] = array();
		}
		foreach($comparisons as $comparison) {
			if(empty($category_comparees[$comparison['category_id']][$comparison['winner']['object_id']])) {
				$category_comparee = query("SELECT * FROM object_category WHERE object_id='" . $comparison['winner']['object_id'] . "' AND category_id='" . $comparison['category_id'] . "';")[0];
				if($category_comparee != null) {
					$player = new Glicko2Player("category", $category_comparee['object_id'], $category_comparee['rating'], $category_comparee['deviation']);
					$category_comparees[$comparison['category_id']][$category_comparee['object_id']] = $player;
				}
			}
			if(empty($category_comparees[$comparison['category_id']][$comparison['loser']['object_id']])) {
				$category_comparee = query("SELECT * FROM object_category WHERE object_id='" . $comparison['loser']['object_id'] . "' AND category_id='" . $comparison['category_id'] . "';")[0];
				if($category_comparee != null) {
					$player = new Glicko2Player("category", $category_comparee['object_id'], $category_comparee['rating'], $category_comparee['deviation']);
					$category_comparees[$comparison['category_id']][$category_comparee['object_id']] = $player;
				}
			}
		}
		foreach($comparisons as $comparison) {
			if($comparison['tie'] == "false") {
				$category_comparees[$comparison['category_id']][$comparison['winner']['object_id']]->AddWin($category_comparees[$comparison['category_id']][$comparison['loser']['object_id']]);
				$category_comparees[$comparison['category_id']][$comparison['loser']['object_id']]->AddLoss($category_comparees[$comparison['category_id']][$comparison['winner']['object_id']]);
			}
			else {
				$category_comparees[$comparison['category_id']][$comparison['winner']['object_id']]->AddDraw($category_comparees[$comparison['category_id']][$comparison['loser']['object_id']]);
				$category_comparees[$comparison['category_id']][$comparison['loser']['object_id']]->AddDraw($category_comparees[$comparison['category_id']][$comparison['winner']['object_id']]);
			}
		}
		foreach($category_comparees as $key => $category) {
			foreach($category as $category_comparee) {
				$category_comparee->update();
				query("UPDATE object_category SET rating='" . $category_comparee->rating . "', deviation='" . $category_comparee->rd . "' WHERE object_id='" . $category_comparee->id . "' AND category_id='" . $key . "';");
			}
		}
	}
	function compareUserComparees($comparisons) {
		$user_comparees = array();
		foreach($comparisons as $comparison) {
			if(empty($user_comparees[$comparison['winner']['owner_id']])) {
				$user = query("SELECT id, user_id, rating, deviation FROM group_member WHERE user_id='" . $comparison['winner']['owner_id'] . "';")[0];
				if($user != null) {
					$player = new Glicko2Player("user_total", $user['user_id'], $user['rating'], $user['deviation']);
					$user_comparees[$user['user_id']] = $player;
				}
			}
			if(empty($user_comparees[$comparison['loser']['owner_id']])) {
				$user = query("SELECT id, user_id, rating, deviation FROM group_member WHERE user_id='" . $comparison['loser']['owner_id'] . "';")[0];
				if($user != null) {
					$player = new Glicko2Player("user_total", $user['user_id'], $user['rating'], $user['deviation']);
					$user_comparees[$user['user_id']] = $player;
				}
			}
		}
		foreach($comparisons as $comparison) {
			if($comparison['tie'] == "false") {
				$user_comparees[$comparison['winner']['owner_id']]->AddWin($user_comparees[$comparison['loser']['owner_id']]);
				$user_comparees[$comparison['loser']['owner_id']]->AddLoss($user_comparees[$comparison['winner']['owner_id']]);
			}
			else {
				$user_comparees[$comparison['winner']['owner_id']]->AddDraw($user_comparees[$comparison['loser']['owner_id']]);
				$user_comparees[$comparison['loser']['owner_id']]->AddDraw($user_comparees[$comparison['winner']['owner_id']]);
			}
		}
		foreach($user_comparees as $user_comparee) {
			$user_comparee->update();
			query("UPDATE group_member SET rating='" . $user_comparee->rating . "', deviation='" . $user_comparee->rd . "' WHERE user_id='" . $user_comparee->id . "';");
		}
	}
?>
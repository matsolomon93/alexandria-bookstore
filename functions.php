<?php

session_start();

// function creates a session if user is in the database and returns true .. else user can't login and returns false
function login($email,$pass,$link){
	$result = $link->query("SELECT * FROM `users` WHERE email = '". $email ."' and password = '". $pass . "' limit 1");
	$row_count = $result->num_rows;

	if($row_count !== 0){
		$_SESSION['login'] = 1;
		$result = $link->query("SELECT id FROM `users` WHERE email = '". $email ."' and password = '". $pass . "' limit 1");
		$row = mysqli_fetch_assoc($result);
		$_SESSION['userid'] = $row["id"];
	}
	//echo $_SESSION['userid']; 
}

// function destroys user session if user is logged in 
function logout(){
	if (isset($_SESSION['login'])) {
	   session_destroy();
	}
	header('Location: login.php');
}

// returns true if user is logged in 
function is_logged(){
	return isset($_SESSION['login']);
}

//registers new user returns true if successful else returns false
function signup($fname, $lname, $email, $pass, $link){
	$result = $link->query("INSERT INTO `users` (`email`, `f_name`, `l_name`,`password`) VALUES ('". $email ."','". $fname ." ','". $lname ."','" . $pass ."')");

	if(!$result)
		die ('Can\'t query users because: ' . $link->error);
	else
		$message = "Signup Complete-----";
}

// Query functions

function getSummary($isbn,$link){
	$result = $link->query("SELECT summary FROM `users` WHERE isbn = '". $isbn ."'");
	$row = mysqli_fetch_assoc($result);
	$result = $row["summary"];
	echo "<p>" . $result . "</p>";
}

function getTitle($isbn,$link){
	$result = $link->query("SELECT title FROM `users` WHERE isbn = '". $isbn ."'");
	$row = mysqli_fetch_assoc($result);
	$result = $row["title"];
	echo "<p>" . $result . "</p>";
}

function getCategory($isbn,$link){
	$result = $link->query("SELECT category FROM `users` WHERE isbn = '". $isbn ."'");
	$row = mysqli_fetch_assoc($result);
	$result = $row["category"];
	echo "<p>" . $result . "</p>";
}

function getAuthor($isbn,$link){
	$result = $link->query("SELECT author FROM `users` WHERE isbn = '". $isbn ."'");
	$row = mysqli_fetch_assoc($result);
	$result = $row["author"];
	echo "<p>" . $result . "</p>";
}

function addToList($userid,$isbn,$link){
	$result = $link->query("INSERT INTO `wishlists`(`user_id`, `isbn`) VALUES ('". $userid ."','". $isbn ."')");
	if(!$result)
		die ('Can\'t query users because: ' . $link->error);
	else
		$message = "wishlist fail buss";
}

function addStar($userid,$isbn,$star,$link){
	$result = $link->query("INSERT INTO `reviews`(`user_id`, `isbn`, `rating`) VALUES ( '". $userid ."','". $isbn ." ','". $star ."')");
	if(!$result)
		die ('Can\'t query users because: ' . $link->error);
	else
		$message = "Review Complete-----";

}

function addReview($userid,$isbn,$review,$link){
	$result = $link->query("INSERT INTO `reviews`(`user_id`, `isbn`, `review`) VALUES ( '". $userid ."','". $isbn ." ','". $review ."')");
	if(!$result)
		die ('Can\'t query users because: ' . $link->error);
	else
		$message = "Review Complete-----";

}

function getReview($isbn,$link){
	$result = $link->query("SELECT review FROM `reviews` WHERE isbn = '". $isbn ."'");

	while(($row = mysqli_fetch_assoc($result)) != NULL) {

    	echo "<p>Comment: " . $row['review'] . "</p><br />";
    }

}

function getWishList($isbn,$link){
	//$result = $link->query("SELECT review FROM `reviews` WHERE isbn = '". $isbn ."'");
	$result = $link->query("SELECT title FROM wishlists w inner join books b on b.isbn = w.isbn");

	while(($row = mysqli_fetch_assoc($result)) != NULL) {

    	echo "<p>" . $row['title'] . "</p><br />";
    }

}

?>
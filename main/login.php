<?php include "includes/header.php"; ?>
<main>
		<img class = "banner" src="images/banner.jpg"/>
		<h1> To-Do List </h1>

		<div class="sign_up">
		<form action="main/index.php" method="post">

			E-mail Address: <br>
				<input type="email" name="email" placeholder="E-mail Address"><br>

			Password: <br>
				<input type="password" name="password" placeholder="*********"><br>

			<a href="main"> <input type="submit" value="Submit"> </a>
		</form>
		</div>

</main>


<?php include 'includes/footer.php'; ?>
<?php include "../includes/header.php"; ?>

<main>
		<img class = "banner" src="../images/banner.jpg"/>
		<h1> To-Do List </h1>

		<div class="sign_up">
		<h3> Sign Up </h3>
		<form action="." method="post">
			<input type="hidden" name="action" value="init_user">

			<div class="fName"> First Name: <br>
				<input type="text" name="fname" placeholder="First Name" autofocus> <br>
			</div>
			<div class="lName"> Last Name: <br>
				<input type="text" name="lname" placeholder="Last Name"><br clear="both">
			</div>
			E-mail Address: <br>
				<input type="email" name="email" placeholder="E-mail Address"><br>
			Phone Number: <br>
				<input type="text" name="phone" placeholder="XXX-XXX-XXXX"><br>
			Birthday: <br>
				<input type="date" name="bday" placeholder="DD-MM-YYYY"><br>
			Password: <br>
				<input type="password" name="password" placeholder="*********"><br>
			
			<!--Gender-->
			Gender: <br>
			<input type="radio" name ="gender" value="male" checked> Male <br>
			<input type="radio" name ="gender" value="female" > Female <br>
			<input type="radio" name ="gender" value="other" > Unspecified <br>
			<input type="submit" value="Submit"> <br><br>

			<!--Log in-->
			<a href="log_in.php" name="action" value="login"> Already have an account? Click here. </a>
		</form>
		</div>

</main>


<?php include '../includes/footer.php'; ?>
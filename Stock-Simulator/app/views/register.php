<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/registerStyle.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <div class="registration_logo">
        <img src="/public/logo.png" alt="Site Logo l" width=190px >
    </div>
	<div class="registration_form">
		<div class="title">
			Registration Form
		</div>

		<form>
			<div class="form_wrap">
					<div class="input_wrap">
						<label for="fname">Full Name</label>
						<input type="text" id="fname">
					</div>
					<div class="input_wrap">
						<label for="lname">Username</label>
						<input type="text" id="lname">
				    </div>
				<div class="input_wrap">
					<label for="email">Email Address</label>
					<input type="text" id="email">
				</div>
				<div class="input_wrap">
					<label for="password">Password</label>
					<input type="password" id="password">
				</div>
				<div class="input_wrap">
					<label for="confirm-password">Confirm Password</label>
					<input type="password" id="confirm-password">
				</div>
				<div class="input_wrap">
					<input type="submit" value="Register Now" class="submit_btn">
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>
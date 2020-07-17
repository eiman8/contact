<?php

	$error = "";
	$successMessage = "";
		if($_POST) {
			if(!$_POST["email"]){
				$error .= "An email address is required.<br>";
			}

			if(!$_POST["subject"]){
				$error .= "The subject field is required.<br>";
			}

			if(!$_POST["content"]){
				$error .= "The message field is required.<br>";
			}
			if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
				$error .= "The email address is invalid.<br>";
			}
			if($error != "") {
				$error = '<div class="alert alert-danger" role="alert"><strong>There were error(s) in the form: </strong>' . '<br>' . $error . '</div>';
				} else {

					$emailTo = "bituin.may@auf.edu.ph";
					$subject = $_POST["subject"];
					$content = $_POST["content"];
					$headers = "From: " . $_POST["email"];

					if(mail($emailTo, $subject, $content, $headers)) {
						$successMessage = '<div>Success</div>';
					} else {
						$error = '<div>Fail to send email!</div>';
					}
				}

			}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Contact Us</title>
	<style type="text/css">
		body {
			font-family: helvetica, sans-serif;
		}
		.form-style {
			width: 700px;
			margin-top: 80px;
		}
		#emailHelp {
			display: none;
		}
	</style>
</head>
<body>

	<div class="container form-style">
			<form method="post">
				<div id="error"><?php echo $error.$successMessage;?></div>
				<h1>Get in touch!</h1>

				<div class="form-group">
    				<label for="email" id="emailLabel">Email address</label>
    				<input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
    				 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  				</div>

  				<div class="form-group">
    				<label for="subject">Subject</label>
    				<input type="text" class="form-control" id="subject"  name="subject">
  				</div>

  				<div class="form-group">
    				<label for="content">Want to know more?</label>
    				<textarea class="form-control" id="content" rows="3" name="content"></textarea>
  				</div>

  				<div class="form-group">
  					<button type="submit" class="btn btn-primary" id="submit">Submit</button>
  				</div>

			</form>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript">

        $("form").submit(function(e) {

        		var error = "";
        		if($("#email").val() == "") {
        			error += "The email field is required.<br>";
        		}
        			$("#error").html(error);

        		if($("#subject").val() == "") {
        			error += "The subject field is required.<br>";
        		}
        			$("#error").html(error);

        		if($("#content").val() == "") {
        			error += "The content field is required.<br>";
        		}

        		if(error != "") {
        			$("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s) in the form: </strong>' + '<br>' + error + '</div>');

							return false;

        		} else {

							return true;
        		}

        });

    </script>

</body>
</html>

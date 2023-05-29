<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Tutorial</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<style>
		body{
			margin: 0;
			padding: 0;
			background: #DDD;
			display: flex;
			-webkit-justify-content: center;
			        justify-content: center;
			-webkit-align-items: center;
			        align-items: center;
			width: 100%;
			height: 100vh;
		}
		.comments{
			width: 500px;
			padding: 50px;
			background: #FFF;
			-webkit-box-shadow: 2px 2px 10px #0002;
			        box-shadow: 2px 2px 10px #0002;
		}
		.user-image{
			width: 50px;
			height: 50px;
		}
		.media{
			display: flex;
			margin: 10px 0;
		}
		.media-body{
			padding-left: 10px;
			-webkit-flex: 1;
			    -ms-flex: 1;
			        flex: 1;
		}
		.user-name{
			margin: 0;
			padding: 0;
			padding-top: 5px;
			font-size: 15px;
			color: #333;
			font-family: sans-serif;
		}
		.comment{
			margin: 0;
			padding: 0;
			color: #777;
			font-size: 14px;
			font-family: sans-serif;
			padding-top: 5px;
		}
	</style>
</head>
<body>
	<div class="comments">
		<div class="all-comments mb-5">
			<div class="media">
				<img src="../blog/images/user/user.jpg" alt="user img" class="img-fluid user-image">
				<div class="media-body">
					<h5 class="user-name">Talha Khlaid</h5>
					<p class="comment">This si the  body of the comment</p>
				</div>
			</div>
		</div>
		<form class="form">
			<textarea rows="5" class="form-control" name="comment"></textarea>
			<input type="hidden" name="post_id" value="5">
			<button class="btn post-comment btn-info mt-2" type="submit">Post a Comment</button>
		</form>
	</div>
	<script src="./js/jquery.min.js"></script>
	<script>
		$(".form").on("submit", function(e){
			e.preventDefault();
			let formData = $(this).serialize();
			let comment = $(this).find(".form-control").val();

			$.ajax({
				url: "submit.php",
				type: "POST",
				data: formData,
				dataType: "json",
				success: function(response){
					$(".all-comments").append(`
							<div class="media">
								<img src="../blog/images/user/user.jpg" alt="user img" class="img-fluid user-image">
								<div class="media-body">
									<h5 class="user-name">${response.userName}</h5>
									<p class="comment">${response.comment}</p>
								</div>
							</div>`);
				},
				error: function(){
					alert("Error Pls Try again");
				}
			});
		});
	</script>
</body>
</html>
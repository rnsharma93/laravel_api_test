<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel PHP Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
		  .bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		  }

		  @media (min-width: 768px) {
			.bd-placeholder-img-lg {
			  font-size: 3.5rem;
			}
		  }
		  .container {
				max-width: 960px;
			}
		</style>
    </head>
    <body class="bg-light">
		<div class="container">
		  <main>
			<div class="py-5 text-center">
			  <img class="d-block mx-auto mb-4" src="/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
			  <h2>PHP Test</h2>
			  <p class="lead">Laravel PHP Test</p>
			</div>

			<div class="row g-3">
			  <div class="offset-3 col-lg-6">
				<form class="needs-validation" novalidate>
				  <div class="row g-3">
					<div class="col-12">
					  <label for="address" class="form-label">Content</label>
					  <textarea name="content" id="content" class="form-control" rows="10"></textarea>
					  
					</div>

					
					
				  <hr class="my-4">

				  <button class="w-100 btn btn-primary btn-lg" id="btn_submit" type="submit">Submit</button>
				</form>
				
				<div id="details"></div>
				
			  </div>
			</div>
		  </main>

		  <footer class="my-5 pt-5 text-muted text-center text-small">
			<p class="mb-1">&copy; 2017–2021 Company Name</p>
			<ul class="list-inline">
			  <li class="list-inline-item"><a href="#">Privacy</a></li>
			  <li class="list-inline-item"><a href="#">Terms</a></li>
			  <li class="list-inline-item"><a href="#">Support</a></li>
			</ul>
		  </footer>
		</div>


		<script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
			$("#btn_submit").click(function(e){
				e.preventDefault();
				let content = $("#content").val();
				$.ajax({
					headers: {
						token : "123456789"
					},
					type: "POST",
					url : "<?php echo env('API_URL').'convert_data';?>",
					data : {content : content},
					beforeSend : function(){
						$("#btn_submit").text("Processing...");
						$("#btn_submit").attr("disabled","disabled");
					},
					success : function(res) {
						$("#btn_submit").text("Submit");
						$("#btn_submit").removeAttr("disabled");
						//console.log(res);
						$("#details").html(res.data);
					},
					error : function(xhr, status, error){
						$("#btn_submit").text("Submit");
						$("#btn_submit").removeAttr("disabled");
						$("#details").html("<div class='alert alert-warning'><strong>"+xhr.responseJSON.message+"</strong></div>");
						console.log(xhr);
						
					}
				});
			});
		});	
		</script>
		
    </body>
</html>

<html>

	<head>

		<title>More Weird Place</title>

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

		<script type="text/javascript">
			$(document).ready(
				function(){
					$.getJSON('/Main/foodsJSON', 
						function(data){
							output = "";
							for(const item of data){
								output = output + "item ID: " + item.id + " has the name " + item.name + "</br>";
							}
							$('#foods').html(output);
						}
					);
				}
			);
		</script>

	</head>

	<body>
		
		<div id="foods">
			There is nothing to read here!
		</div>

		<ul>
			<li><a href='/Main/index'>Index</a></li>
			<li><a href='/Main/index2'>Index 2</a></li>
		</ul>

	</body>

</html>
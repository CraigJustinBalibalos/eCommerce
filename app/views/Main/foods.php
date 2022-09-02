<html>

	<head>

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<title>More Weird Place</title>

	</head>

	<body>
		<!--Display the data as a table-->
		<p>
			<table>
				<tr><th>Id</th><th>Name</th><th>Action</th></tr>
			<?php
			//$c = count($data);
			//$i =0;
			//while ($i< $c) {
				//echo "<tr><td>$item[i]</td></tr>"
				//$i++;
			//}
			
			//for ($i=0; $i < $c; $i++) { 
				//echo "<tr><td>$item[i]</td></tr>"
			//}

			foreach ($data as $key => $item) {
				echo "<tr>
				<td>$item->id</td>
				<td>$item->name</td>
				<td><a href='/Food/delete/$item->id'> Delete </a></td>
				</tr>";
			}

			?>
			</table>
		</p>

		<form action='' method='post'>
			Input the food that you like:
			<input type="text" name="new_food" />
			<input type="submit" name="action" value="Send" />
		</form>

		<ul>
			<li><a href='/Main/index'>Index</a></li>
			<li><a href='/Main/index2'>Index 2</a></li>
		</ul>

	</body>

</html>
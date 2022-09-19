<html>

	<head>

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<title>Owner List</title>

	</head>

	<body>
		<!--Display the data as a table-->
		<p>
			<a href='/Vet/add'>Add a new client</a>

			<table>
				<tr><th>First Name</th><th>Last Name</th><th>Contact</th><th>Action</th></tr>
			<?php

			foreach ($data as $item) {
				echo "<tr>
				<td>$item->first_name</td>
				<td>$item->last_name</td>
				<td>$item->contact</td>
				<td>
				<a href='/Vet/edit/$item->owner_id'> Edit </a> |
				<a href='/Vet/details/$item->owner_id'> Details </a> |
				<a href='/Vet/delete/$item->owner_id'> Delete </a> |
				</td>
				</tr>";
			}

			?>
			</table>
		</p>

		<ul>
			<li><a href='/Main/index'>Index</a></li>
			<li><a href='/Main/index2'>Index 2</a></li>
		</ul>

	</body>

</html>
<html>

	<head>

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<title>Owner Animal List</title>

	</head>

	<body>
		<h1>Owner Information</h1>
		<?php 
			$this->view('Owner/detailsPartial', $data['owner']);
		?>


		<!--Display the data as a table-->
		<h1>List of pets</h1>
		<p>
			<a href="/Animal/index/<?= $data['owner']->owner-id ?>">Add a new pet for owner</a>

			<table>
				<tr><th>Name</th><th>Date of Birth</th><th>Action</th></tr>
			<?php

			foreach ($data as $item) {
				echo "<tr>
				<td>$item->name</td>
				<td>$item->dob</td>
				<td>
				<a href='/Animal/edit/$item->animal_id'> Edit </a> |
				<a href='/Animal/details/$item->animal_id'> Details </a> |
				<a href='/Animal/delete/$item->animal_id'> Delete </a> |
				</td>
				</tr>";
			}

			?>
			</table>
		</p>
        <a href='/Vet/index'>Back to the list of owner</a>
	</body>

</html>
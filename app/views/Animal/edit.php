<html>

	<head>

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<title>Modify Pet</title>

	</head>

	<body>
		<?php
			$this->view('Owner/detailsPartial', $data['owner']);
		?>
		<form action='' method='post'>
			<label>Name:<input type="text" name="name" value="<?= $data['animal']->name ?>"/></label><br>
			<label>Date of Birth: <input type="date" name="dob" value="<?= $data['animal']->bod ?>"/>/></label><br>
			<input type="submit" name="action" value="Modify pet" />
		</form>

		<a href="/Animal/index/<?= $data['owner']->owner-id ?>">Cancel</a>
		
	</body>

</html>
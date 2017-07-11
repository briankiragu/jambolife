<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{ route('role.store') }}" method="post">
		{{ csrf_field() }}

		<input type="text" name="name" placeholder="Enter role name">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<button type="submit">Add new role</button>
	</form>
</body>
</html>
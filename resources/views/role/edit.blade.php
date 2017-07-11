<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>{{ $status }}</h3>
	
	<form action="{{ route('role.update', ['id' => $payload->id]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<input type="text" name="name" placeholder="Enter role name" value="{{ $payload->name }}">
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
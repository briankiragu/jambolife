<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>{{ $status }}</h3>

	<p>{{ $payload['message'] }}</p>
	
	<ul>
		<li>{{ $payload['role']->id }}</li>
		<li>{{ $payload['role']->name }}</li>
	</ul>
	
	<button onclick="document.querySelector('#destroy').submit();"">Delete</button>

	<form hidden id="destroy" action="{{ route('role.destroy', ['id' => $payload['role']->id]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
</body>
</html>
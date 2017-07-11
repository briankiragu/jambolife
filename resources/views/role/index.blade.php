<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul>	
		@foreach($payload['role'] as $role)
			<li>{{ $role->name }}</li>
		@endforeach
	</ul>

	{{ $payload['message'] }}
</body>
</html>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Completar Registro</h2>
        <p>Haz click en el siguiente link para activar tu cuenta en Tectareas
            <span>{{ URL::to('activate', array($user_id, $code)) }}</span>
        </p>
	</body>
</html>

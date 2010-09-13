<html>
<head>
	<title><? echo $localization['title']; ?></title>
</head>
<body>

<div>
	<? foreach ($records as $record): ?>
	<p>
		<? echo $record; ?>
	</p>
	<? endforeach; ?>
</div>

</body>
</html>
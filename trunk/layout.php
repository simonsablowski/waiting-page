<html>
<head>
	<title><? echo localize('title'); ?></title>
</head>
<body>

<div>
	<? foreach ($records as $record): ?>
	<p>
		<? echo formatRecord($record); ?>
	</p>
	<? endforeach; ?>
</div>

</body>
</html>
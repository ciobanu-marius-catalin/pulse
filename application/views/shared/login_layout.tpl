<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="ro">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Pragma" content="no-cache"/>
		<meta http-equiv="Cache-Control" content="no-cache"/>
		<meta http-equiv="Expires" content="0"/>

		<meta name="application-name" content="Pulse">
			<meta name="theme-color" content="#ffffff">

				{if isset($title)}<title>{$title}</title>{/if}

				{bundle name="jquery"}
				{bundle name="bootstrap"}
				{bundle name="blockui"}
				{bundle name="pnotify"}

				<style>
					body {
						padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
					}
				</style>

			{block name=head}{/block}
			</head>
			<body>
				<div class="container">{block name=body}{/block}</div>
			{block name=nocontainer}{/block}

		{block name=footer}{/block}
	{block name=scripts}{/block}
</body>
</html>

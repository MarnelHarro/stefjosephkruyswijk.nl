<!DOCTYPE html>
<html lang="<?php echo $htmlLanguage; ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>

		<?php 
		
			if (!empty($googleAnalytics)) {

		?>

		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalytics; ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', '<?php echo $googleAnalytics; ?>');
		</script>

		<?php

			}
		
		?><style>

			<?php 

				if ($useDefaultLayout) {
					echo FUNCTIONS::minimize(file_get_contents(DOCUMENT_ROOT . '__framework/css/default.css'));
					echo FUNCTIONS::minimize(file_get_contents(DOCUMENT_ROOT . '__framework/css/' . $template . '.css'));
				}

				echo FUNCTIONS::minimize(file_get_contents(DOCUMENT_ROOT . 'css/css.css'));

			?>


		</style>

	</head>


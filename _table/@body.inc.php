
	<?php

		/*
			This will get all files with the extension sql, 
			and execute them as a query
		*/

	?>

		<?php
			
			$items = scandir(TABLE_DIRECTORY);
			$files = array();

			foreach ($items as $item) {
				$ext = pathinfo(TABLE_DIRECTORY . $item, PATHINFO_EXTENSION);

				if ($ext == "sql") {
					$files[] = $item;
				}
			}

			foreach ($files as $file) {
				if (ISLOCALHOST) {
					echo "<br />- " . $file;
				}

				$content = file_get_contents(TABLE_DIRECTORY . $file);

				Data::executeQuery($content);
			}

			echo "<br />";

			if (ISLOCALHOST) {
				echo "\r\n<br />Time: " . (microtime() - STARTTIME);
			}

		?>


	<body>
		<h1>Home</h1>

		<?php

			// get the current page
			$page = FUNCTIONS::getQueryString("page", 1);
			// remove all non alpha numeric characters
			// searchQuery is filled when using ?q in the url
			$searchQuery = FUNCTIONS::convertToAlphaNumeric($searchQuery);

			$searchArray = explode(" ", $searchQuery);

			$searchArray = array_values($searchArray);
			$searchArray = array_filter($searchArray);

			$list = [];
			$searchedToSoon = false;

			// numbers of result to per page
			define("PAGECOUNT", 25);

			if ($searchArray) {

				$start = $page * PAGECOUNT - PAGECOUNT;
				$end = PAGECOUNT;
				$limit = "$start,$end";

				$searchTime = 0;
				$currentTime = time();
				if (isset($_SESSION["searchtime"])) {
					$searchTime = $_SESSION["searchtime"];
				}

				// at least 3 seconds before searching again
				if ($currentTime - $searchTime >= 3) {
					
					// set the timestamp of the last search
					$_SESSION["searchtime"] = time();
					$list = array(); //Data::search($searchArray, $limit);

					$list = array_values($list);
					$list = array_filter($list);
				}
				else {
					$searchedToSoon = true;
				}
			}
			else {
				$searchQuery = "";
			}

		?>

		<form action="/" method="get">
			<div style="width:100%; display:table">
				<label for="search" width="50px">Search: </label> <input type="search" name="q" id="search" style="display:table-cell; width:85%" value="<?php echo $searchQuery; ?>" placeholder="enter keywords">
			</div>	
		</form>

		<?php

			if ($list) {
			}
		?>

	</body>

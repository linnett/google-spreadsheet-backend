<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Google Spreadsheet Backend</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
	    <?php

	    	require_once 'GetSpreadsheetData.class.php';

	    	$spreadsheetId = "1dM1fHXxv0EifvmG6uQiNrZJHHJOBKGPZ2YRBWMzgJsw";
			$GetSpreadsheetData = new GetSpreadsheetData($spreadsheetId);

			$i = 0;
			$lang = "en";

			if(!$data = $GetSpreadsheetData->returnData()) {
				die();
			}

			foreach($data as $row) {
			    $section = $row->{'gsx$section'}->{'$t'};
			    $value = $row->{'gsx$' . $lang}->{'$t'};
			    // Numeric Array
			    $dataNumericArray[$i] = $value;
			    $i++;
			    // Associative array
			    $dataAssocArray[$section] = $value;
			}

	    ?>

	    	<!-- Numberic Array -->
			<h1><?php print($dataNumericArray[0]); ?></h1>
			<h2><?php print($dataNumericArray[1]); ?></h2>
			<h3><?php print($dataNumericArray[2]); ?></h3>
			<p><?php print($dataNumericArray[3]); ?></p>

			<!-- Associative Array -->
			<h1><?php print($dataAssocArray["h1"]); ?></h1>
			<h2><?php print($dataAssocArray["h2"]); ?></h2>
			<h3><?php print($dataAssocArray["h3"]); ?></h3>
			<p><?php print($dataAssocArray["p"]); ?></p>

    </body>
</html>
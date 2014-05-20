<?php

class GetSpreadsheetData {

	private $spreadsheetId;
	private $url;

	public function __construct($spreadsheetId) {
	  if(!$spreadsheetId) {
	  	print ("Argument missing. You must provide a spreadsheet ID.");
	  	return false;
	  }
	  $this->spreadsheetId = $spreadsheetId;
	  $this->url = "https://spreadsheets.google.com/feeds/list/". $this->spreadsheetId ."/od6/public/values?alt=json";
	  $this->init();
	}

	private function init() {
		// Set character encoding
		mb_internal_encoding("UTF-8");
	}

	private function getData() {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	public function returnData() {

		$data = $this->getData();

		// Check if the data returned is valid JSON.
		if (!is_object(json_decode($data))) {
    	echo $data;
			return false;
    }

		$json = json_decode($data);

		$rows = $json->{'feed'}->{'entry'};

		return $rows;

	}

	public function viewRawData() {
		$data = $this->returnData();
		if($data) {
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}
	}

}

?>
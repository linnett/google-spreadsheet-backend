# Google Spreadsheet Data Retrieval
==========================

> Use Google Docs as your back-end! This very simple class will retrieve spreadsheet data from a [Google Docs Spreadsheet](https://docs.google.com/) using PHP.

## Usage

The example below shows how you can parse data from a Google Docs spreadsheet. You must first obtain the spreadsheet ID:

https://docs.google.com/spreadsheets/d/{SPREADSHEETID}/

You must then make your spreadsheet public by publishing it. You can do this by going to File > Publish To The Web.


Instantiate the class:


```php
$spreadsheetId = "1dM1fHXxv0EifvmG6uQiNrZJHHJOBKGPZ2YRBWMzgJsw";
$GetSpreadsheetData = new GetSpreadsheetData($spreadsheetId);
```


The following will print out the raw data from the spreadsheet.
```php
$GetSpreadsheetData->viewRawData();
```
Return data into an array:
```php
$data = $GetSpreadsheetData->returnData();
```

Example of how to use the data array with a langauge spreadsheet like [this one](https://docs.google.com/spreadsheets/d/1dM1fHXxv0EifvmG6uQiNrZJHHJOBKGPZ2YRBWMzgJsw/):
```php
$i = 0;
$lang = "en";
foreach($data as $row) {
    $section = $row->{'gsx$section'}->{'$t'};
    $value = $row->{'gsx$' . $lang}->{'$t'};
    // Numeric Array
    $dataNumericArray[$i] = $value;
    $i++;
    // Associative array
    $dataAssocArray["$section"] = $value;
}
```

You can now access the values in the following ways:
```html
<!-- Numberic Array -->
<h1><?php print($dataNumericArray[0]); ?></h1>
<h2><?php print($dataNumericArray[2]); ?></h2>
<h3><?php print($dataNumericArray[3]); ?></h3>
<p><?php print($dataNumericArray[4]); ?></p>

<!-- Associative Array -->
<h1><?php print($dataAssocArray["h1"]); ?></h1>
<h2><?php print($dataAssocArray["h2"]); ?></h2>
<h3><?php print($dataAssocArray["h3"]); ?></h3>
<p><?php print($dataAssocArray["p"]); ?></p>
```

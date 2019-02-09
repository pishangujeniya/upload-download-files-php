
<html>

<head>
    <title>DownloadFiles
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

    <style type="text/css">
        .main_div {
            margin: 1%;
            align-items: center;
            text-align: center;
            font-weight: bold;
            font-family: monospace;
            font-size: large;
        }
    </style>
    <div class="container col-xs-12">
        <div class="main_div">
       

        <?php
// Current Page Url
$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$current_dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $current_dir .= $parts[$i] . "/";
}
// echo $current_dir;


$download_dir = "Download";                 // CHANGE THE DOWNLOAD DIRECTORY FOLDER NAME with ENDING SLASH
$dir = "./".$download_dir."/";
// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      echo "<a href='//".$current_dir."".$download_dir."/" . $file . "'>" . $file . "</a><br>";
    }
    closedir($dh);
  }
}

/*
// Scan Directory and get contents in Array 
$dir = "./Download/";

// Sort in ascending order - this is default
$a = scandir($dir);

// Sort in descending order
$b = scandir($dir,1);

print_r($a);
print_r($b);
*/
?>

        </div>
    </div>

</body>

</html>


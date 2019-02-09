<html>

<head>
    <title>UploadFiles
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

// Code Source : https://daveismyname.blog/upload-multiple-files-with-a-single-input-with-html-5-and-php

// If you get error for size of upload then change this two values in php.ini 
// post_max_size       (maximum total files size can be uploaded)
// upload_max_filesize    (maximum single file size can be uploaded)


if(isset($_POST['submit'])){
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "uploaded/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    //insert into db 
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
              }
        }
    }

    //show success message
    echo "<h1>Uploaded:</h1>";    
    if(is_array($files)){
        echo "<ul>";
        foreach($files as $file){
            echo "<li>$file</li>";
        }
        echo "</ul>";
    }
}
?>

<form action="" enctype="multipart/form-data" method="post">

    <div>
        <label for='upload'>Add Attachments:</label>
        <input class="btn btn-primary" id='upload' name="upload[]" type="file" multiple="multiple" />
    </div>

    <p><input class="btn btn-primary" type="submit" name="submit" value="Submit"></p>

</form>
    
    </div>
    </div>

</body>

</html>



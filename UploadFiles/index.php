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

<body style="background-color: crimson;">

    <style type="text/css">
        .main_div {
            margin: 10%;
            align-items: left;
            text-align: left;
            font-weight: bold;
            font-family: monospace;
            font-size: large;
            background-color: snow;
        }

        .box-shadow {
            padding:1%;
            position: relative;
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
    </style>
    <div class="container">
        <div class="main_div card box-shadow">

            <?php

            $secret_key = 'C0fFeE';            

            // ini_set('post_max_size', '1M');
            // ini_set('upload_max_filesize', '1M');

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);

            // Code Source : https://daveismyname.blog/upload-multiple-files-with-a-single-input-with-html-5-and-php

            // If you get error for size of upload then change this two values in php.ini 
            // post_max_size       (maximum total files size can be uploaded)
            // upload_max_filesize    (maximum single file size can be uploaded)


            if (isset($_POST['submit']) && isset($_POST['key'])) {
                if ($_POST['key'] == $secret_key) {
                    if (count($_FILES['upload']['name']) > 0) {
                        //Loop through each file
                        for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                            //Get the temp file path
                            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                            //Make sure we have a filepath
                            if ($tmpFilePath != "") {

                                //save the filename
                                $shortname = $_FILES['upload']['name'][$i];

                                //save the url and the file
                                $filePath = "uploaded/" . date('d-m-Y-H-i-s') . '-' . $_FILES['upload']['name'][$i];

                                //Upload the file into the temp dir
                                if (move_uploaded_file($tmpFilePath, $filePath)) {

                                    $files[] = $shortname;
                                    //insert into db 
                                    //use $shortname for the filename
                                    //use $filePath for the relative url to the file

                                }
                            }
                        }
                    }

                    //show success message
                    echo "<div class='alert alert-info'><h1>Uploaded:</h1>";
                    if (is_array($files)) {
                        echo "<ul>";
                        foreach ($files as $file) {
                            echo "<li>$file</li>";
                        }
                        echo "</ul>";
                    }
                    echo "</div>";
                } else {
                    echo '<div class="alert alert-danger">Nothing Uploaded.</div>';
                }
            }
            ?>

            <form action="" enctype="multipart/form-data" method="post">

                <div>
                    <div class="form-group">
                        <label for='upload'>Upload Files</label>
                        <input class="btn btn-default" id='upload' name="upload[]" type="file" multiple="multiple" aria-describedby="filesHelp" />
                        <small id="filesHelp" class="form-text text-muted">Choose files to upload</small>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="form-group">
                        <label for="key">Secret Key</label>
                        <input type="password" class="form-control" id="key" name="key" aria-describedby="keyHelp" placeholder="Enter Secret Key">
                        <small id="keyHelp" class="form-text text-muted">Enter the secret key for successfull upload.</small>
                    </div>
                </div>
                <br>
                <hr>
                <br>

                <p><input class="btn btn-primary" type="submit" name="submit" value="Submit"></p>

            </form>
            <br>
            <hr>

            <div class="alert alert-warning"> Please do not refresh this page. To reload copy url and paste and then press enter in browser.</div>



        </div>
    </div>

</body>

</html>
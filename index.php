<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <style>
            #labelImage{
                max-width: 100%;
                height: 70px;
                padding: inherit;
                font-family: Verdana;
            }
            .spanText{
                font-size: 50px;
                font-family: Verdana;
                font-weight: bold;
            }
            .new-button{
                display: inline-block;
                padding: 8px 12px; 
                cursor: pointer;
                background-color: white;
                font-size: 16px;
                color: #3182ce;
                column-span: all;
                border-radius: 25px;
                border: 10px solid #2c5282;
                border-style: outset;
                font-family: Verdana;
                
            }
            .inputContainer{
                text-align: center;
                padding: inherit;
                padding-top: 50px;
                font-family: Verdana;
            }
            .inputContainer2{
                padding-top: 50px;
                font-family: Verdana;
            }

            .img-fluid{
                width:100%;
                height:200px;
            }
            .navbar{
                background-color: #2c5282;
                color: white;
                font-family: Verdana;
                 }
        </style>

    </head>
    <body style="background-color: #a0aec0;">
        <nav class="navbar navbar-center">
            <span class="navbar-brand  mb-0  h1"><p style="text-align: center;">Gallery</p</span>
        </nav>

            <div class="container inputContainer">
                <form id="form" action="../CCTech/upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control input-lg" onchange="form.submit()" hidden>
                        <label class ="new-button" for="fileToUpload">
                            <img id="labelImage" src="../oneLastTry/upload.svg" alt="upload" />
                            <span class="spanText">Upload</span>
                        </label>
                    </div>
                </form>
            </div>  
            <div class="container ">  
                <div class="row "> 
                    <?php
                        $dir_name = "../CCTech/image/";
                            $images = glob($dir_name."*.{jpg,gif,png,jpeg}",GLOB_BRACE);
                                foreach($images as $image) {
                                    $filename = basename($image);
                                        echo '
                                            <div class="col-lg-4 col-md-4 col-sm col-xs inputContainer2">
                                                <div class="card text-center ">
                                                    <img class="img-fluid preview-image"  src="'.$image.'"  id="'.$filename.'"/>
                                                    <h5 class="card-title">'.$filename.'</h5>
                                                </div>
                                            </div>
                
                                            ';
                                        }
                    ?>
                </div>
            </div> 
    </body>
</html>

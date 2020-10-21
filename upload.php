<?php
$target_dir = "../CCTech/image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadSuccess = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadSuccess = 1;
  } else {
    echo "File is not an image.";
    $uploadSuccess = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  //echo "Sorry, file already exists.";
  $msg = "Sorry, file already exists.";
  echo "<script>
        alert('$msg')
        window.location = 'index.php';
        </script>";
  $uploadSuccess = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  //echo "Sorry, your file is too large.";
  $msg = "Sorry, your file is too large.";
    echo "<script>
          alert('$msg')
          window.location = 'index.php';
          </script>";
  $uploadSuccess = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo "<script>
          alert('$msg')
          window.location = 'index.php';
          </script>";
  $uploadSuccess = 0;
}

// Check if $uploadSuccess is set to 0 by an error
if ($uploadSuccess == 0) {
  //echo "Sorry, your file was not uploaded.";
  $msg = "Sorry, your file was not uploaded.";
    echo "<script>
          alert('$msg')
          window.location = 'index.php';
          </script>";

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

    $msg = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo "<script>
          alert('$msg')
          window.location = 'index.php';
          </script>"; 


  } else {
    //echo "Sorry, there was an error uploading your file.";
    $msg = "Sorry, there was an error uploading your file.";
    echo "<script>
          alert('$msg')
          window.location = 'index.php';
          </script>"; 
  }
}
?>
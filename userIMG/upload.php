<?php
    include '../dbh.php';
    session_start();
   
    
    
    if(isset($_POST['submit']))
    {
        $file = $_FILES['file'];
        
        print_r($file);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        
        $fileExt = explode('.', $fileName);
        $fileActualExt = "png";
        
        $allowed = array('jpg', 'jpeg', 'png');
        
        if (in_array($fileActualExt, $allowed)) {
            
            if($fileError == 0){
                if($fileSize < 5000000)
                {
                    $uid = $_SESSION['id'];
                    $_SESSION['ext'] = 'png';
                    $fileNameNew = $uid.".".$fileActualExt;
                    $fileDestination = $fileNameNew;
                    $sqlFIND = "SELECT * FROM profileimg WHERE profuid='$uid'";
                    $FINDresult = mysqli_query($conn, $sqlFIND);
                    if(($row = $FINDresult->fetch_assoc()))
                    {
                       if($row['profuid'] == $uid)
                       {
                           $sqlDEL = "DELETE FROM profileimg WHERE profuid='$uid'";
                           $DELresult = mysqli_query($conn, $sqlDEL);
                           $png = $uid.".png";
                           $jpeg = $uid.".jpeg";
                           $jpg = $uid.".jpg";
                           if(!unlink($png)){
                               
                           }
                           else{
                              
                           }
                           if(!unlink($jpg)){
                               
                           }
                           else{
                               
                           }
                           if(!unlink($jpeg)){
                               
                           }else{
                               
                           }
                           
                           
                       }
                    }
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sqlIN = "INSERT INTO profileimg (profuid, status, ext) 
		                    VALUES ('$uid', '1', '$fileActualExt')";
		            $result = mysqli_query($conn, $sqlIN);
		            $sqlUPDATE = "UPDATE users 
		                          SET setIMG = 1
		                          WHERE id = '$uid'";
		          $updateResult = mysqli_query($conn, $sqlUPDATE);
                    
                    if(isset($_REQUEST['destination'])){
                          header("Location: {$_REQUEST['destination']}?uploadSUCCESS");
                     
                      }else{
                          header('Location: https://login-jrom.c9users.io/pages/userINDEX.php');
                      }
                   
                    
                }
                else{
                    echo "Your file is too big!";
                }
            }
            else{
                echo "There was an error uploading your file!...";
            }
        }
        else {
            echo "You cannot upload files of this type!";
        }
        
    }

?>
<?php
function pdf_upload($wochenkarte)
{
    $result = new stdClass(); //this object will carry status from file upload
    $result->fileName = 'document.pdf';
    $result->error = 1; //it could also be a boolean true/false
    //collect data from object $wochenkarte
    $fileName = $wochenkarte["name"];
    $fileType = $wochenkarte["type"];
    $fileTmpName = $wochenkarte["tmp_name"];
    $fileError = $wochenkarte["error"];
    $fileSize = $wochenkarte["size"];
    $test1 ="test";
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $filesAllowed = ["pdf"];
    if ($fileError == 4) {
        $result->ErrorMessage = "No wochenkarte was chosen. It can always be updated later.";
        return $result;
    } else {
        if (in_array($fileExtension, $filesAllowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) { //500kb this number is in bytes
                    //it gives a file name based microseconds
                    $fileNewName = "wochenkarte" . "." . $fileExtension; // 1233343434.jpg i.e
                    $destination = "./media/uploads/pdf/$fileNewName";
                    if (move_uploaded_file($fileTmpName, $destination)) {
                        $result->error = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                        
                    } else {
                        $result->ErrorMessage = "<br>There was an error uploading this file.";
                        return $result;
                    }
                } else {
                    $result->ErrorMessage = "<br>This wochenkarte is bigger than the allowed 2MB. <br> Please choose a smaller one and Update your profile.";
                    return $result;
                }
            } else {
                $result->ErrorMessage = "There was an error uploading - $fileError code. Check php documentation.";
                return $result;
            }
        } else {
            $result->ErrorMessage = "This fible type cant be uploaded.";
            return $result;
        }
    }
}
function sommer_upload($sommerkarte)
{
    $result = new stdClass(); //this object will carry status from file upload
    $result->fileName = 'document.pdf';
    $result->error = 1; //it could also be a boolean true/false
    //collect data from object $wochenkarte
    $fileName = $sommerkarte["name"];
    $fileType = $sommerkarte["type"];
    $fileTmpName = $sommerkarte["tmp_name"];
    $fileError = $sommerkarte["error"];
    $fileSize = $sommerkarte["size"];
    $test1 ="test";
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $filesAllowed = ["pdf"];
    if ($fileError == 4) {
        $result->ErrorMessageS = "No Sommerkarte was chosen. It can always be updated later.";
        return $result;
    } else {
        if (in_array($fileExtension, $filesAllowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) { //500kb this number is in bytes
                    //it gives a file name based microseconds
                    $fileNewName = "sommerkarte" . "." . $fileExtension; // 1233343434.jpg i.e
                    $destination = "./media/uploads/pdf/$fileNewName";
                    if (move_uploaded_file($fileTmpName, $destination)) {
                        $result->error = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                        
                    } else {
                        $result->ErrorMessageS = "<br>There was an error uploading this file.";
                        return $result;
                    }
                } else {
                    $result->ErrorMessageS = "<br>This wochenkarte is bigger than the allowed 2MB. <br> Please choose a smaller one and Update your profile.";
                    return $result;
                }
            } else {
                $result->ErrorMessageS = "There was an error uploading - $fileError code. Check php documentation.";
                return $result;
            }
        } else {
            $result->ErrorMessageS = "This fible type cant be uploaded.";
            return $result;
        }
    }
}

function grill_upload($grillkarte)
{
    $result = new stdClass(); //this object will carry status from file upload
    $result->fileName = 'document.pdf';
    $result->errorG = 1; //it could also be a boolean true/false
    //collect data from object $wochenkarte
    $fileName = $grillkarte["name"];
    $fileType = $grillkarte["type"];
    $fileTmpName = $grillkarte["tmp_name"];
    $fileError = $grillkarte["error"];
    $fileSize = $grillkarte["size"];
    $test1 ="test";
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $filesAllowed = ["pdf"];
    if ($fileError == 4) {
        $result->ErrorMessageG = "No Sommerkarte was chosen. It can always be updated later.";
        return $result;
    } else {
        if (in_array($fileExtension, $filesAllowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) { //500kb this number is in bytes
                    //it gives a file name based microseconds
                    $fileNewName = "grillkarte" . "." . $fileExtension; // 1233343434.jpg i.e
                    $destination = "./media/uploads/pdf/$fileNewName";
                    if (move_uploaded_file($fileTmpName, $destination)) {
                        $result->errorG = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                        
                    } else {
                        $result->ErrorMessageG = "<br>There was an error uploading this file.";
                        return $result;
                    }
                } else {
                    $result->ErrorMessageG = "<br>This wochenkarte is bigger than the allowed 2MB. <br> Please choose a smaller one and Update your profile.";
                    return $result;
                }
            } else {
                $result->ErrorMessageG = "There was an error uploading - $fileError code. Check php documentation.";
                return $result;
            }
        } else {
            $result->ErrorMessageG = "This fible type cant be uploaded.";
            return $result;
        }
    }
}

function speise_upload($speisekarte)
{
    $result = new stdClass(); //this object will carry status from file upload
    $result->fileName = 'document.pdf';
    $result->errorG = 1; //it could also be a boolean true/false
    //collect data from object $wochenkarte
    $fileName = $speisekarte["name"];
    $fileType = $speisekarte["type"];
    $fileTmpName = $speisekarte["tmp_name"];
    $fileError = $speisekarte["error"];
    $fileSize = $speisekarte["size"];
    $test1 ="test";
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $filesAllowed = ["pdf"];
    if ($fileError == 4) {
        $result->ErrorMessageK = "No Speisekarte was chosen. It can always be updated later.";
        return $result;
    } else {
        if (in_array($fileExtension, $filesAllowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) { //500kb this number is in bytes
                    //it gives a file name based microseconds
                    $fileNewName = "speisekarte" . "." . $fileExtension; // 1233343434.jpg i.e
                    $destination = "./media/uploads/pdf/$fileNewName";
                    if (move_uploaded_file($fileTmpName, $destination)) {
                        $result->errorK = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                        
                    } else {
                        $result->ErrorMessageK = "<br>There was an error uploading this file.";
                        return $result;
                    }
                } else {
                    $result->ErrorMessageK = "<br>This wochenkarte is bigger than the allowed 2MB. <br> Please choose a smaller one and Update your profile.";
                    return $result;
                }
            } else {
                $result->ErrorMessageK = "There was an error uploading - $fileError code. Check php documentation.";
                return $result;
            }
        } else {
            $result->ErrorMessageK = "This fible type cant be uploaded.";
            return $result;
        }
    }
}
<?php

// Define a destination
$uploadDir = 'uploads/';

// Set the allowed file extensions
$fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'rar'); // Allowed file extensions

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$uploadDir  = $uploadDir;
	$targetFile = $uploadDir . $_FILES['Filedata']['name'];

	// Validate the filetype
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
		// Save the file
		move_uploaded_file($tempFile, $targetFile);
		echo 1;

	} else {

		// The file type wasn't allowed
		echo 'Invalid file type.';

	}
}

?>
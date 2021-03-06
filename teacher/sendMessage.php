<?php
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['pass'])){
  header('Location: ../index.php');
}
else {
  include("dbconfig.php");

  $stuff_id = $_SESSION['id'];
  $sql = "SELECT * FROM stuff_login WHERE id = '$stuff_id' AND type = 'teacher'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) <= 0) {
    session_unset();
    session_destroy();
    mysqli_close($conn);
    header('Location: ../loginprocess.php');
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $stuffName = $row['fname']." ".$row['lname'];
    }
  }
}

require '../phpmailer/PHPMailerAutoload.php';

$user = '';
$mailFrom = '';
$mailTo = '';
$mailSubject = '';
$mailBody = '';

if (isset($_POST['sendmessage'])) {
	$stu_id = $_POST['stu_id'];

	$conn = mysqli_connect("localhost", "root", "", "abc_school") or die(mysqli_error());
	$sql1 = "SELECT * FROM stuff_email WHERE id = '$stuff_id'";
	$result1 = mysqli_query($conn, $sql1) or die(mysqli_error());

	if (mysqli_num_rows($result1) > 0){
	  while ($row = mysqli_fetch_assoc($result1)) {
	  	$stuff_email = $row['email'];
	  	$stuff_pass = $row['pass'];
	  }
	}

	$conn = mysqli_connect("localhost", "root", "", "abc_school") or die(mysqli_error());
	$sql = "SELECT * FROM present_student WHERE sid = '$stu_id'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error());

	if (mysqli_num_rows($result) > 0){
	  while ($row = mysqli_fetch_assoc($result)) {
	  	$stu_email = $row['email'];
	  	$stu_name = $row['fname']." ".$row['lname'];
	  }
	}
	$mailFrom = $stuff_email;
	$mailTo = $stu_email;
	$mailSubject = $_POST['title'];
	$mailFile = $_POST['file'];
	$mailBody = $_POST['desc'];
	$mailBody .= '<br><br><b>'.$stuffName.'</b><br>ID : '.$stuff_id;
	$user = $stuffName;

}


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $mailFrom;                 // SMTP username
$mail->Password = $stuff_pass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($mailFrom, $user);
$mail->addAddress($mailTo);     // Add a recipient
$mail->addReplyTo($mailFrom, $stuffName);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment($mailFile);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $mailSubject;
$mail->Body    = $mailBody;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $conn = mysqli_connect("localhost", "root", "", "abc_school") or die(mysqli_error());
    $sql = "INSERT INTO messagebox(from_mail_id, to_mail_id, subject, attachment, body) VALUES ('$stu_id', '$stuff_id', '$mailSubject', '$mailFile', '$mailBody')";
    if (mysqli_query($conn, $sql)) {
	    header("Location: contactList.php?msg=success");
	} else {
	    echo "Error: " . mysqli_error($conn);
	}
}

  ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$designation = $_POST['designation'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$type = $_POST['type'];

	$conn = mysqli_connect("localhost", "root", "", "abc_school") or die(mysqli_error());
	$sql = "SELECT * FROM admin_login WHERE id = '$admin_id' AND pass = '$admin_pass' ";
	$result = mysqli_query($conn, $sql) or die(mysqli_error());

	if (mysqli_num_rows($result) > 0) {
		$sl = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$sl++;
		}
	}


	function makeID($data){
		$year = date('y');
		$year = $year."1";
		$data1 = str_pad($year, 4, "0", STR_PAD_LEFT);
		$data = sprintf("%u%s",$data1,$data);
		return $data;
	}

	$id = makeID($sl);

	$conn = mysqli_connect("localhost", "root", "", "abc_school") or die(mysqli_error());
	$sql = "INSERT INTO present_stuff (fname, lname, designation, email, phone, type)
			VALUES ('$fname', '$lname', '$designation', '$email', '$phone', '$type')";
	$sql = mysqli_query($conn, $sql) or die(mysqli_error());

	$sql = "INSERT INTO stuff_login (id, pass, type, fname, lname)
			VALUES ('$id', '$id', '$type', '$fname', '$lname')";
	$sql = mysqli_query($conn, $sql) or die(mysqli_error());

	$pay_conn = mysqli_connect("localhost", "root", "", "abc_school_payments") or die(mysqli_error());
	$long_year = date('Y');
	$tableName = "employeepayment".$long_year;
	$fullName = $fname." ".$lname;

	$sql = "INSERT INTO $tableName (stuff_id, stuff_name, stuff_designation, type)
			VALUES ('$id', '$fullName', '$designation', '$type')";
	$sql = mysqli_query($pay_conn, $sql) or die(mysqli_error());

	if ($type == 'teacher') {
		header("Location: stuff_teacher.php");
	} else {
		header("Location: stuff_payment.php");
	}
}
  ?>
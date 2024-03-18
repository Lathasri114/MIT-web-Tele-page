<?php include 'includes/connection.php';?>
<?php include 'includes/adminheader.php';?>
<?php
if (isset($_GET['id'])) {
	$id = mysqli_real_escape_string($conn, $_GET['id']);  
}
else {
	header('location:posts.php');
}
$currentuser = $_SESSION['firstname'];
if ($_SESSION['role'] == 'superadmin') {
$query = "SELECT * FROM telebook WHERE id='$id'";
}
else {
    $query = "SELECT * FROM posts WHERE id='$id' AND author = '$currentuser'" ;
}
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0 ) {
while ($row = mysqli_fetch_array($run_query)) {
    $post_id = $row['id'];
    $name = $row['name'];
	$Designation = $row['Designation'];
     $intercom = $row['interno'];
    $loca = $row['location'];                        
    $mobile_no = $row['phoneno'];
	$deptno = $row['Dept_no'];

	$dept_query = "SELECT Dept_name FROM departments WHERE Dept_no = '$deptno'";
	$dept_result = mysqli_query($conn, $dept_query);
	$dept_row = mysqli_fetch_assoc($dept_result);
	$dept_name = $dept_row['Dept_name'];



	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$design = $_POST['design'];
                $loca = $_POST['location'];
		$intercom = $_POST['intercom'];
		$mobileno = $_POST['mobileno'];
	
		// Check if the department dropdown value is set
		if (isset($_POST['deptname'])) {
			// Fetch the selected department value from the dropdown
			$dept_value = $_POST['deptname'];
	
			// Update the department number in the database
			$queryupdate = "UPDATE telebook SET name='$name', Designation='$design', location='$loca', interno=$intercom, phoneno=$mobileno, Dept_no=$dept_value WHERE id=$id";
	
			$result = mysqli_query($conn, $queryupdate) or die(mysqli_error($conn));
			if (mysqli_affected_rows($conn) > 0) {
				echo "<script>alert('CONTACT SUCCESSFULLY UPDATED'); window.location.href= 'posts.php';</script>";
			} else {
				echo "<script>alert('Error! ..try again');</script>";
			}
		} else {
			echo "<script>alert('Department not selected');</script>";
		}
	}
	
?>

<div id="wrapper">

       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            UPDATE Contact
                        </h1>
						<form role="form" action="" method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="post_title">Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo $name;  ?>">
	</div>

	<div class="form-group">
		<label for="post_tags">Designation</label>
		<input type="text" name="design" class="form-control" value="<?php echo  $Designation; ?>">
	</div>
<div class="form-group">
		<label for="post_tags">Location</label>
		<input type="text" name="loca" class="form-control" value="<?php echo  $loca; ?>">
	</div>

	<div class="form-group">
		<label for="post_tags">InterCom</label>
		<input type="text" name="intercom" class="form-control" value="<?php echo  $intercom; ?>">
	</div>
	<div class="form-group">
		<label for="post_tags">Mobile No </label>
		<input type="text" name="mobileno" class="form-control" value="<?php echo  $mobile_no; ?>">
	</div>

	<div class="form-group">
    <label for="deptname">Department</label>
    <select name="deptname" id="departmentDropdown" class="form-control">
        <option value="0">---Select Department---</option>
        <option value="1"<?php if ($dept_name == "Dean Office") echo " selected"; ?>>Dean Office</option>
        <option value="2"<?php if ($dept_name == "Aeronautical Engineering") echo " selected"; ?>>Aeronautical Engineering</option>
        <option value="6"<?php if ($dept_name == "Instrumentation Engineering") echo " selected"; ?>>Instrumentation Engineering</option>
        <option value="3"<?php if ($dept_name == "Computer Technology") echo " selected"; ?>>Computer Technology</option>
        <option value="5"<?php if ($dept_name == "Information Technology") echo " selected"; ?>>Information Technology</option>
        <option value="10"<?php if ($dept_name == "Automobile Engineering") echo " selected"; ?>>Automobile Engineering</option>
        <option value="8"<?php if ($dept_name == "Rubber and Plastics Technology") echo " selected"; ?>>Rubber and Plastics Technology</option>
        <option value="7"<?php if ($dept_name == "Production Technology") echo " selected"; ?>>Production Technology</option>
        <option value="4"<?php if ($dept_name == "Electronics Engineering") echo " selected"; ?>>Electronics Engineering</option>
        <option value="11"<?php if ($dept_name == "Applied Science and Humanities") echo " selected"; ?>>Applied Science and Humanities</option>
        <option value="12"<?php if ($dept_name == "Library") echo " selected"; ?>>Library</option>
        <option value="9"<?php if ($dept_name == "Labs and Centers") echo " selected"; ?>>Labs and Centers</option>
    </select>
</div>

	<?php
}}
?>

	

<div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary" value="Update Post">Update Contact</button>
                            <a href="posts.php" class="btn btn-primary">Back</a>
                        </div>
</form>
</div>
</div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>

    
    <script src="js/bootstrap.min.js"></script>

</body>

</html>


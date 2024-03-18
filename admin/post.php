<?php include 'includes/connection.php';?>
<?php include 'includes/adminheader.php';?>
<?php
if (isset($_GET['post'])) {
	$post = mysqli_real_escape_string($conn, $_GET['post']);  
}
else {
    header('location:posts.php');
}
$currentuser = $_SESSION['firstname'];
if ($_SESSION['role'] == 'superadmin') {
$query = "SELECT * FROM telebook WHERE id='$post'";
}
else {
    $query = "SELECT * FROM posts WHERE id='$post' AND author = '$currentuser'" ;
}
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));


if (mysqli_num_rows($run_query) > 0 ) {
while ($row = mysqli_fetch_array($run_query)) {
	$id=$row['id'];
	$name=$row['name'];
	$design=$row['Designation'];
$loca=$row['location'];
	$intercom=$row['interno'];
	$mobileno=$row['phoneno']; 
	$deptno=$row['Dept_no'];

	$dept_query = "SELECT Dept_name FROM departments WHERE Dept_no='$deptno'";
        $dept_result = mysqli_query($conn, $dept_query);
        $dept_row = mysqli_fetch_assoc($dept_result);
        $dept_name = $dept_row['Dept_name'];

	?>
   
<div id="wrapper">

       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Contact
                        </h1>
                        <form role="form" action="posts.php" method="POST" enctype="multipart/form-data">


	<div class="form-group">
		<label for="post_title">Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo $name;  ?>" readonly>
	</div>

	<div class="form-group">
		<label for="post_tags">Designation</label>
		<input type="text" name="design" class="form-control" value="<?php echo  $design; ?>" readonly>
	</div>
        <div class="form-group">
		<label for="post_tags">Location</label>
		<input type="text" name="location" class="form-control" value="<?php echo  $loca; ?>" readonly>
	</div>

	<div class="form-group">
		<label for="post_tags">InterCom</label>
		<input type="text" name="intercom" class="form-control" value="<?php echo  $intercom; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="post_tags">Mobile No </label>
		<input type="text" name="mobileno" class="form-control" value="<?php echo  $mobileno; ?>" readonly>
	</div>

	<div class="form-group">
		<label for="post_tags">Department </label>
		<input type="text" name="department" class="form-control" value="<?php echo  $dept_name; ?>" readonly>
	</div>


	<?php
}}
?>

	

	<button type="submit" name="" class="btn btn-primary" value="Update Post">Back</button>
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
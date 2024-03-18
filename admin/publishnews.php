<?php include 'includes/adminheader.php';

?>
    <div id="wrapper">

       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            New Contact
                        </h1>
<?php
if (isset($_POST['publish'])) {

    $id=$_POST['id'];
	$name=$_POST['name'];
	$design=$_POST['design'];
        $loca=$_POST['location'];
	$intercom=$_POST['intercom'];
	$mobileno=$_POST['mobileno']; 
	$deptno=$_POST['dept'];
   
	 $query = "INSERT INTO telebook (id, name, Designation, location, interno, phoneno, Dept_no) VALUES ($id,'$name', '$design', '$loca', '$intercom', '$mobileno',$deptno)";
	 $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script> alert('Contact Added successfully');
                window.location.href='posts.php';</script>";
            }
            else {
                "<script> alert('Error ..try again');</script>";
            }
}

else{

	$id=0;
		 $query = "SELECT COUNT(*) as total from telebook";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0 ) {
	$row = mysqli_fetch_array($run_query);
$id=$row['total']+1;}
}
	?>
<div id="wrapper">

       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

              <div class="row">
    <div class="col-lg-12">
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="post_title">Name</label>
                <input type="text" name="name" class="form-control" value="" required>
            </div>

            <div class="form-group">
                <label for="post_tags">Designation</label>
                <input type="text" name="design" class="form-control" value="">
            </div>
            
            <div class="form-group">
                <label for="post_tags">Location</label>
                <input type="text" name="loca" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="post_tags">InterCom</label>
                <input type="text" name="intercom" class="form-control" value="">
            </div>
            
            <div class="form-group">
                <label for="post_tags">Mobile No </label>
                <input type="text" name="mobileno" class="form-control" value="">
            </div>
            
            <div class="form-group">
                <label for="post_tags">Department</label>
                <select name="dept" id="departmentDropdown" class="department-dropdown form-control">
                    <option value="0">---Select Department---</option>
                    <option value="1">Dean Office</option>
                    <option value="2">Aeronautical Engineering</option>
                    <option value="6">Instrumentation Engineering</option>
                    <option value="3">Computer Technology</option>
                    <option value="5">Information Technology</option>
                    <option value="10">Automobile Engineering</option>
                    <option value="8">Rubber and Plastics Technology</option>
                    <option value="7">Production Technology</option>
                    <option value="4">Electronics Engineering</option>
                    <option value="11">Applied Science and Humanities</option>
                    <option value="12">Library</option>
                </select>
            </div>

            <button type="submit" name="publish" class="btn btn-primary" value="Update Post" onclick="return validateForm();">Add Contact</button>
        </form>
    </div>
</div>

</div>
</div>

<script>
    function validateForm() {
        var department = document.getElementById("departmentDropdown").value;
        if (department == '0') {
            alert("Please select a department");
            return false;
        }
        return true;
    }
    </script>
        
   <?php 'includes/admin_footer.php';?> 
    </div>
    
    <script src="js/jquery.js"></script>

    
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

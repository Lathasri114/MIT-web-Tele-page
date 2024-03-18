<?php error_reporting(E_ERROR | E_PARSE); // Report only errors and parse errors
ini_set('display_errors', '1'); ?>
<?php include 'includes/header.php';?>
<?php include 'includes/navbar.php';?>

<?php include 'includes/connection.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Madras Institute of Technology</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        width:100%
    }
h2 {
            text-align: center;
            color: #007bff;
            margin-top: -10px; /* Set the color as needed */
        }
 h3{color: #007bff;
     margin-top:-50px;
      margin-left:10px;}

    .container {
        display: flex;
        justify-content: center; /* Center align the container horizontally */
        align-items: center;
        padding: 10px;
        margin-top: -10px; /* Add some margin from the top */
    }
tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
            
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }

    .search-bar {
        flex: 1;
        padding: 5px;
        width: 600px;
        z-index:1;
    }

    .department-dropdown {
        width: 200px;
        height: 35px;
        margin-left: 10px;
    }

    /* Style for the table */
    .staff-table {
        margin-top: 30px;
        width: 100%; /* Make the table cover the whole width */
    }
.department-dropdown {
        font-size: 14px;
        width: 300px;
        height: 35px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        color: #333;
        outline: none;
        cursor: pointer;
        margin-top: -36px;
    }
.custom {
    position: relative;
  width: 400px;
  max-width: 100%;
  font-size: 1.15rem;
  color: #000;
  margin-top: 3rem;
     }

    .department-dropdown:hover {
        border-color: #007bff;
    }

    .department-dropdown:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
       }
</style>
<body >
<h2>MIT Campus Telephones & Intercom</h2>
<div id="MyTable">
<div class="container">
        <div class="search-bar">
            <form id="searchForm" action="" method="GET">
             <div class="input-group mb-3"> 
                <input type="text" style="height:35px; width : 300px; font-size:16;" id="search" name="search" value="<?php if(isset($_GET['search'])){echo htmlspecialchars($_GET['search']); } ?>" class="form-control" placeholder="Search">

                   
                </div>
            </form>
        </div>


	<div class="custom">	
        <select id="departmentDropdown" style="font-size:14;" class="department-dropdown">
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
                 

            <!-- Add other options as needed -->
        </select>
        </div>
    </div>

    <div class="container" id="searchResults"></div>

<?php
$per_page = 10; // Number of posts per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page
$deptno = isset($_GET['dept']) ? $_GET['dept'] : 1;
$start = ($page - 1) * $per_page; // Starting post index for the current page
$query = "";
$table = "telebook"; // Table name

if (isset($_GET['search'])) {
    $filtervalues = $_GET['search'];
    $query = "SELECT name, Designation, interno, phoneno, location FROM telebook WHERE CONCAT(name, Designation, interno, phoneno, location) LIKE '%$filtervalues%' ";
} else {
    $query = "SELECT name, Designation, interno, phoneno, location FROM telebook WHERE Dept_no=$deptno LIMIT $start, $per_page";
}

$start_record = ($page - 1) * $per_page + 1;
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($run_query) > 0) {
    ?>
    <div class='container' id="default">
        <table style="font-size:14" class="table table-hover staff">
            <thead>
                <tr style="color: #007bff;">
                    <th scope="col">S. No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Location</th>
                    <th scope="col">Intercom No</th>
                    <th scope="col">Mobile No</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $serial_number = $start_record;
                while ($row = mysqli_fetch_array($run_query)) {
                    ?>
                    <tr>
                        <td><?php echo $serial_number; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['Designation']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['interno']; ?></td>
                        <td><?php echo $row['phoneno']; ?></td>
                        
                    </tr>
                    <?php
                    $serial_number++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination links -->
    <?php
    $query = "SELECT COUNT(*) AS total FROM $table WHERE Dept_no=$deptno";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total_pages = ceil($row["total"] / $per_page);

    echo "<br><br>";
    echo "<div class='row justify-content-center' id='pagination'>";
    echo "<div class='col-auto' align=center>";
    echo "<ul class='pagination' style='margin-top: -40px;'>";

    for ($i = 1; $i <= $total_pages; $i++) {
        // Calculate the starting record for each page
        $start_record = ($i - 1) * $per_page + 1;
        echo "<li class='page-item'><a class='page-link' href='?page=$i&dept=$deptno&start=$start_record'>$i</a></li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    ?>
    <!-- End of Pagination links -->
    <br><br>
<?php
} else {
    echo "No records found";
}
?>
   
    <?php include 'includes/footer.php';?>

    <script>
$(document).ready(function(){
    $("#search").on("keyup", function() { // Bind to keyup event
        var query = $(this).val();
        
        if (query !== '') {
            $("#default").hide();
            $("#pagination").hide();
            $.ajax({
                url: "search_1.php", // The PHP script to handle the search
                method: "GET",
                data: {query: query},
                success: function(data) {
                    $("#searchResults").html(data); // Display the search results
                }
            });
        } else {
            $("#default").show();
            $("#pagination").show();
            $("#searchResults").html(''); // Clear the search results if the search query is empty
        }
    });
});
</script>


<script>
    var departmentDropdown = document.getElementById('departmentDropdown');
    var searchInput = document.getElementById('search');
    var previousDepartment = <?php echo $deptno; ?>; // Store the previous department

    searchInput.addEventListener('keyup', function () {
        if (searchInput.value.trim() === '') {
            // If the search input is empty, restore the previous dropdown option
            departmentDropdown.value = previousDepartment;
        } else {
            // Otherwise, set the dropdown selection to the default option
            departmentDropdown.selectedIndex = 0;
        }
    });
</script>

    <script>
    document.getElementById('departmentDropdown').addEventListener('change', function () {
    var selectedDepartment = this.value;
    window.location.href = "index.php?dept=" + selectedDepartment;
	 this.selectedIndex = this.options.selectedIndex;});
    </script>

    

	<script>
// Assuming 'selectedDepartment' contains the value that you want to match with the dropdown options
var selectedDepartment = "<?php echo $deptno; ?>";

// Get the dropdown element
var departmentDropdown = document.getElementById('departmentDropdown');

// Iterate through the options and set the selected attribute for the matching option
for (var i = 0; i < departmentDropdown.options.length; i++) {
    if (departmentDropdown.options[i].value === selectedDepartment) {
        departmentDropdown.options[i].selected = true;
        break;
    }
}
</script>
</body>
</html>
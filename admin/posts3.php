<?php
// Include your database connection file
include 'includes/connection.php';

// Check if the query parameter is set
if (isset($_GET['del'])) {
    // Retrieve and sanitize the del parameter value
    $post_del =  mysqli_real_escape_string($conn, $_GET['del']);
    
    // Define the delete query
    $del_query = "DELETE FROM telebook WHERE id=$post_del";
    
    // Execute the delete query
    $run_del_query = mysqli_query($conn, $del_query) or die(mysqli_error($conn));
    
    // Check if the deletion was successful
    if (mysqli_affected_rows($conn) > 0) {
        // If deletion was successful, re-align IDs sequentially
        $update_query = "SET @count := 0;
                         UPDATE telebook SET id = @count := @count + 1;
                         ALTER TABLE telebook AUTO_INCREMENT = 1;";
        
        mysqli_multi_query($conn, $update_query) or die(mysqli_error($conn));
        
        echo "<script>alert('Deleted successfully');</script>";
    } else {
        echo "<script>alert('Error occurred. Please try again.');</script>";
        // Check for specific MySQL errors
        echo "MySQL Error: " . mysqli_error($conn);
    }


       header('Location: ' . $_SERVER['PHP_SELF']);
    exit; 
}


?>

<!-- Include header and navigation -->
<?php include 'includes/adminheader.php'; ?>
<div id="wrapper">
    <?php include 'includes/adminnav.php'; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <div class="col-xs-4">
                            <a href="publishnews.php" class="btn btn-primary">Add New</a>
                        </div>
                             </h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <!-- Search form -->
                                <form id="searchForm" action="" method="post">
                                    <div class="input-group">
                                        <input type="text" style="width:500px;" id="searchInput" name="query" class="form-control" placeholder="Search">
                                                                            </div>
                                </form>
                                <!-- Container for search results -->
                                <div style="margin-top: 30px" id="searchResults"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Script for handling search and navigation -->
<script>
    $(document).ready(function() {
        // Function to load all contacts when the page is first loaded
        loadAllContacts();

        // Function to handle search input
        $('#searchInput').on('input', function() {
            var query = $(this).val();
            if (query.trim() !== '') {
                // If search query is not empty, perform search
                $.ajax({
                    url: 'search_contacts2.php',
                    type: 'POST',
                    data: { query: query },
                    success: function(response) {
                        $('#searchResults').html(response);
                    }
                });
            } else {
                // If search query is empty, load all contacts
                loadAllContacts();
            }
        });

        // Function to load all contacts
        function loadAllContacts() {
            $.ajax({
                url: 'search_contacts2.php',
                type: 'POST',
                data: { query: '' }, // Empty query to fetch all contacts
                success: function(response) {
                    $('#searchResults').html(response);
                }
            });
        }

        // Event listener for the Labs and Centres button
        $('#staffBtn').click(function() {
            window.location.href = 'posts.php'; // Redirect to posts3.php
        });

    });
</script>
</body>
</html>

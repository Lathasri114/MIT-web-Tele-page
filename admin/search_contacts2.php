<?php
// Include your database connection file
include 'includes/connection.php';

// Check if the query parameter is set
if (isset($_POST['query'])) {
    // Get the search query
    $query = $_POST['query'];

    // Prepare and execute the SQL query to search contacts in the labs_search table
    $search_query = "SELECT * FROM labs_research WHERE name LIKE '%$query%' OR interno LIKE '%$query%' OR location LIKE '%$query%' OR Dept LIKE '%$query%' OR Dept_no LIKE '%$query%'";
    $search_result = mysqli_query($conn, $search_query);

    // Check if there are any results
    if (mysqli_num_rows($search_result) > 0) {
        $serial_number = 1;
        // Display the search results
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>ID</th><th>Name</th><th>Intercom</th><th>Location</th><th>Department</th><th>View</th><th>Edit</th><th>Delete</th></tr></thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($search_result)) {
            echo '<tr>';
            echo "<td>{$serial_number}</td>";
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['interno'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '<td>' . $row['Dept'] . '</td>';
            echo '<td>';
            echo "<a href='post1.php?post={$row['id']}' style='color:green'>See Contact</a>";
            echo '</td>';
            echo '<td>';
            echo "<a href='editlabposts.php?id={$row['id']}'><span class='glyphicon glyphicon-edit' style='color: #265a88;'></span></a>";
            echo '</td>';
            echo '<td>';
            echo "<a onClick=\"javascript: return confirm('Are you sure you want to delete?')\" href='?del={$row['id']}'><i class='fa fa-times' style='color: red;'></i>delete</a>";
            echo '</td>';
            
            echo '</tr>';
            $serial_number++;
        }
        echo '</tbody>';
        echo '</table>';
    } 
    
    else {
        // If no results found
        echo '<p>No contacts found.</p>';
    }

   


}

?>

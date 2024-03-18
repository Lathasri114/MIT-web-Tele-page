<?php
include 'includes/adminheader.php';
include 'includes/adminnav.php';
include 'includes/connection.php';

// Fetch search query
if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Construct SQL query for search
    $sql = "SELECT * FROM telebook WHERE (name LIKE '%$query%' OR location LIKE '%$query%' OR Designation LIKE '%$query%' OR interno LIKE '%$query%' OR phoneno LIKE '%$query%')";
    $result = mysqli_query($conn, $sql);

    // Display search results
    if ($result && mysqli_num_rows($result) > 0) {
        $serial_number = 1;
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th scope='col'>S. No</th>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>Designation</th>
                                    <th scope='col'>Location</th>
                                    <th scope='col'>Interno</th>
                                    <th scope='col'>Mobile No</th>
                                    <th scope="col">View Contact</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<tr>';
                                    echo "<td>{$serial_number}</td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['Designation']}</td>";
                                    echo "<td>{$row['location']}</td>";
                                    echo "<td>{$row['interno']}</td>";
                                    echo "<td>{$row['phoneno']}</td>";
                                    echo '<td>';
                                    echo "<a href='post.php?post={$row['id']}' style='color:green'>See Contact</a>";
                                    echo '</td>';
                                    echo '<td>';
                                    echo "<a href='editposts.php?id={$row['id']}'><span class='glyphicon glyphicon-edit' style='color: #265a88;'></span></a>";
                                    echo '</td>';
                                    echo '<td>';
                                    echo "<a onClick=\"return confirm('Are you sure you want to delete this post?')\" href='?del={$row['id']}'><i class='fa fa-times' style='color: red;'></i>delete</a>";
                                    echo '</td>';
                                    echo '</tr>';
                                    $serial_number++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "No results found";
    }
} 
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

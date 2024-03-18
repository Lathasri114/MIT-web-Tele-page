<?php
include 'includes/connection.php';

$per_page = 10; // Number of search results per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page
$start = ($page - 1) * $per_page; // Starting index for search results

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Query to search in telebook table
    $sqlTelebook = "SELECT * FROM telebook WHERE (name LIKE '%$query%' OR Designation LIKE '%$query%' OR interno LIKE '%$query%' OR phoneno LIKE '%$query%') LIMIT $start, $per_page";
    $resultTelebook = mysqli_query($conn, $sqlTelebook);

    // Check if search results found in telebook table
    $telebook_found = mysqli_num_rows($resultTelebook) > 0;

    // Check if search results found in either table
    if ($telebook_found) {
        ?>
        <div class='container' style="display: flex; flex-direction: column;">
            <?php if ($telebook_found) { ?>
                    <table style="font-size:14" class='table table-hover'>
                    <thead>
                        <tr style="color: #007bff;">
                            <th scope='col'>S. No</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Designation</th>
                            <th scope='col'>Location</th>
                            <th scope='col'>Intercom no</th>
                            <th scope='col'>Mobile No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serial_number = $start + 1;
                        while ($row = mysqli_fetch_assoc($resultTelebook)) {
                            echo "<tr>";
                            echo "<td>" . $serial_number . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['Designation'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['interno'] . "</td>";
                            echo "<td>" . $row['phoneno'] . "</td>";
                            echo "</tr>";
                            $serial_number++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
         </div>
    <?php } else {
        echo "No results found";
    }
}
?>

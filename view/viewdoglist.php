<!DOCTYPE html>
<html>
<head>
    <title>View Dogs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Set column widths */
        th:nth-child(1), td:nth-child(1) { width: 15%; }
        th:nth-child(2), td:nth-child(2) { width: 15%; }
        th:nth-child(3), td:nth-child(3) { width: 10%; }
        th:nth-child(4), td:nth-child(4) { width: 10%; }
        th:nth-child(5), td:nth-child(5) { width: 20%; }
        th:nth-child(6), td:nth-child(6) { width: 15%; }
        th:nth-child(7), td:nth-child(7) { width: 15%; }

        /* Optional: Hover effect */
        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Dog Name</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Weight (kg)</th>
            <th>Owner Name</th>
            <th>Phone</th>
            <th>Vaccination Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr></tr>
    </tfoot>
    <tbody>
        <?php
            if (!empty($dogs)) {
                foreach ($dogs as $dog) {
                    echo "<tr>";
                    echo "<td><a href='index.php?command=viewSpecific&dog_name=" . urlencode($dog->dog_name) . "'>" . htmlspecialchars($dog->dog_name) . "</a></td>";
                    echo "<td>" . htmlspecialchars($dog->dog_breed) . "</td>";
                    echo "<td>" . htmlspecialchars($dog->dog_age) . "</td>";
                    echo "<td>" . htmlspecialchars($dog->dog_weight) . "</td>";
                    echo "<td>" . htmlspecialchars($dog->owner_name) . "</td>";
                    echo "<td>" . htmlspecialchars($dog->owner_phone) . "</td>";
                    echo "<td>" . htmlspecialchars($dog->vaccination_status) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }
        ?>
    </tbody>
</table>

</body>
</html>

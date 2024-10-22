<!DOCTYPE html>
<html>
<head>
    <title>Dog Details</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 8px;
            border: 1px solid #dddddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php if ($dog) { ?>
    <table>
        <tr>
            <th>Dog Name</th>
            <td><?php echo htmlspecialchars($dog->dog_name); ?></td>
        </tr>
        <tr>
            <th>Breed</th>
            <td><?php echo htmlspecialchars($dog->dog_breed); ?></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?php echo htmlspecialchars($dog->dog_age); ?></td>
        </tr>
        <tr>
            <th>Weight (kg)</th>
            <td><?php echo htmlspecialchars($dog->dog_weight); ?></td>
        </tr>
        <tr>
            <th>Owner Name</th>
            <td><?php echo htmlspecialchars($dog->owner_name); ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?php echo htmlspecialchars($dog->owner_phone); ?></td>
        </tr>
        <tr>
            <th>Vaccination Status</th>
            <td><?php echo htmlspecialchars($dog->vaccination_status); ?></td>
        </tr>
    </table>
<?php } else { ?>
    <p>No dog found with the specified name.</p>
<?php } ?>

</body>
</html>

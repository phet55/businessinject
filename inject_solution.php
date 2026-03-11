<?php
require "connect.php";

$cid = $_GET["CustomerID"] ?? null;

$sql = "SELECT * 
        FROM customer 
        INNER JOIN country 
        ON country.CountryCode = customer.CountryCode";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2 style="text-align:center;">Customer Table</h2>

    <table>
        <tr>
            <th>CustomerID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>Debt</th>
        </tr>

        <?php
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['CountryName'] . "</td>";
            echo "<td>" . $row['OutstandingDebt'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>
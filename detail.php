<html>

<head>
    <title>Display Select Customer Infromation 65</title>
</head>

<body>
    <?php
    if (isset($_GET["CustomerID"])) {
        $strCustomerID = $_GET["Customer"];
    }
    echo $strCustomerID;
    require "connect.php";
    $sql = "SELECT*FROM customer WHERE CustomerID = ?";
    $params = array($strCustomerID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($prepare($sql));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <table>
        <tr>
            <th width="325">Customer</th>
            <td width="240"><?php echo $result["Customer"]; ?></td>
        </tr>
        <tr>
            <th width="130">am</th>
            <td><?php echo $result["Name"]; ?></td>
        </tr>
        <tr>
            <th width="130">Birthdate</th>
            <td><?php echo $result["Birthdate"]; ?></td>
        </tr>
        <tr>
            <th width="130">Email</th>
            <td><?php echo $result["Email"]; ?></td>
        </tr>
        <tr>
            <th width="130">CountryCode</th>
            <td><?php echo $result["CountryCode"]; ?></td>
        </tr>
        <tr>
            <th width="130">OutstandingDebt</th>
            <td><?php echo $result["OutstandingDebt"]; ?></td>
        </tr>

    </table>
    <?php $conn = null; ?>
</body>

</html>
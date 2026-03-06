<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">
        <label for="CustomerID">CustomerID:</label>
        <br>
        <input type="text" id="CustomerID" name="CustomerID">
        <br><br>
        <label for="Name">Your fullname:</label>
        <br>
        <input type="text" id="Name" name="Name">
        <br><br>
        <label for="Birthdate">Birthdate:</label>
        <br>
        <input type="date" id="Birthdate" name="Birthdate">
        <br><br>
        <label for="Email">Email:</label>
        <br>
        <input type="email" id="Email" name="Email">
        <br><br>
        <label for="CountryCode">Select CountryCode:</label>
        <br>
        <input type="text" id="CountryCode" name="CountryCode">
        <br><br>
        <label for="OutstandingDebt">OutstandingDebt:</label>
        <br>
        <input type="number" id="OutstandingDebt" name="OutstandingDebt">
        <br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>
<?php
if (isset($_POST['CustomerID']) && ($_POST['Name'])) :
    echo "<br>" . $_POST['CustomerID'] . $_POST['Name'] . $_POST['Birthdate'] . $_POST['Email'] . $_POST['CountryCode'] . $_POST['OutstandingDebt'];
    require 'connect.php';
    $sql = "insert into Customer values(:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

    if ($stmt->execute()):
        $message = 'Suscessfully add new customer';
    else :
        $message = 'fail to add new customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>
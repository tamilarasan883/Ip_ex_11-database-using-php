<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
</head>

<body>

<?php

$conn = new mysqli("localhost", "root", "test@123", "mysql");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$address = $_POST['address'];

$sql = "INSERT INTO orders
        (name, email, phone, product, quantity, price, address)
        VALUES
        ('$name', '$email', '$phone', '$product', '$quantity', '$price', '$address')";

if ($conn->query($sql) === TRUE) {

    echo "<h2>Order Successful</h2>";

} else {

    echo "Error: " . $conn->error;

}
echo "<h2>All Orders Details</h2>";

$sql1 = "SELECT * FROM orders";

$result = $conn->query($sql1);

if ($result->num_rows > 0) {

    echo "<table border='1' cellpadding='8'>";

    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Address</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";

} else {

    echo "No orders found.";

}

$conn->close();

?>

</body>
</html>

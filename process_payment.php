<?php
session_start();
include 'includes/db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $rental_id = $_POST['rental_id'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];

    $query = "INSERT INTO payments (user_id, rental_id, amount, payment_method) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iids", $user_id, $rental_id, $amount, $payment_method);

    if ($stmt->execute()) {
        echo "Payment successful!";
    } else {
        echo "Payment failed: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

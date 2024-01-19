<?php
// Подключение к базе данных
$host = "localhost";
$db = "services";
$user = "root";
$password = "mmaakkss123!";
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
$info = filter_input(INPUT_POST, 'Info', FILTER_SANITIZE_STRING);

// Запрос
$sql = "INSERT INTO services (email, info) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$email, $info);
if ($stmt->execute() === TRUE) {
    echo "Запрос принят в обработку, ожидайте ответ на вашу почту.";
} else {
    echo "Просим прощение, произошла ошибка, повторите попытку позже.";
}
$conn->close();
?>
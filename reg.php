<?php
// Ваши данные для подключения к базе данных
$host = "localhost";
$db = "services";
$user = "root";
$password = "mmaakkss123!";

// Создание нового подключения
$conn = new mysqli($host, $user, $password, $db);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Проверка наличия пользователя в базе данных
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "польозователь с такой почтой уже существует!";
} else {
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    if ($stmt->execute()) {
        echo "Пользователь успешно зарегистрирован!";
    } else {
        echo "Ошибка: " . $conn->error;
    }
}

$conn->close();
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Готовые работы</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="one">
	<ul>
	<li><a href="index.html"><img src="images/logo.png" height="70"></a></li>
	<li><h3><a href="index.html">КАПИБАРА ХОЛМС</a></h3></li>
	<li><h3><a href="index.html">ГЛАВНАЯ</a></h3></li>
	<li><h3><a href="about.html">О&nbsp;НАС</a></h3></li>
	<li><h3><a href="service.html">УСЛУГИ</a></h3></li>
	<li><h3><a href="contacts.html">КОНТАКТЫ</a></h3></li>
	</ul>
</nav>
<div class="container">
<?php
$servername = "localhost";
$username = "root";
$password = "mmaakkss123!";
$dbname = "services";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, text FROM works";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div class='tile'><h2>" . $row["title"]. "</h2><p>" . $row["text"]. "</p></div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</div>
</body>
</html>
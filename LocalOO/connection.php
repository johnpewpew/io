<?

$hashed_password = password_hash('your_password', PASSWORD_DEFAULT);

// Use this hashed password when inserting into the users table
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password);
$stmt->execute();
$stmt->close();


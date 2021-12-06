<?php
$server = "localhost";
$username = "your_username";
$password = "your_password";
$database = "database_you_want_to_use";

$connexion = mysqli_connect($server, $username, $password, $database);

if (!$connexion) {
    die("Connection failed: " . $connexion->connect_error);
}

echo "Connected successfully";

// create table for a simple user
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";

if ($connexion->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $connexion->error;
}

// update name of user 1
// $sql = "UPDATE users SET username='user1' WHERE id=1";
// if ($connexion->query($sql) === TRUE) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $connexion->error;
// }

// select user limit 10
$sql = "SELECT * FROM users LIMIT 10";
$result = $connexion->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Username: " . $row["username"]. " - Password: " . $row["password"]. " - Email: " . $row["email"]. " - Reg_date: " . $row["reg_date"]. "<br>";
    }
} else {
    echo "0 results";
}

// query delete id 1
// $sql = "DELETE FROM users WHERE id = 1";

// if ($connexion->query($sql) === TRUE) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . $connexion->error;
// }

// query yo select all users
// $sql = "SELECT * FROM users";
// $sql = "SELECT * FROM users WHERE id = 1";
// $sql = "SELECT * FROM users ORDER BY id DESC";
// $result = $connexion->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - Username: " . $row["username"]. " - Password: " . $row["password"]. " - Email: " . $row["email"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }




// $stmt = $connexion->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
// //i - integer
// // d - double
// // s - string
// // b - BLOB
// $stmt->bind_param("sss", $username, $password, $email);

// $username = "admin";
// $password = "admin";
// $email = "admin@yahoo.com";
// $stmt->execute();

// $username = "user";
// $password = "user";
// $email = "user@yahoo.com";
// $stmt->execute();

// $stmt->close();

//insert multiple users query
// $sql = "INSERT INTO users (username, password, email) 
// VALUES ('admin', 'admin', 'test@yahoo.com');";
// $sql .= "INSERT INTO users (username, password, email) VALUES ('user', 'user', 'test2@yahoo.com');";
// $sql .= "INSERT INTO users (username, password, email) VALUES ('user2', 'user2', 'test3@yahoo.com');";

// if ($connexion->multi_query($sql) === TRUE) {
//     echo "New records created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $connexion->error;
// }



// insert into user table query
// $sql = "INSERT INTO users (username, password, email) 
// VALUES ('admin', 'admin', 'test@yahoo.com')";

// if ($connexion->query($sql) === TRUE) {
//     $last_id = $connexion->insert_id;
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $connexion->error;
// }



// $sql_create_database = "CREATE DATABASE portal";

// if ($connexion->query($sql_create_database) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $connexion->error;
// }
$connexion->close();

?>

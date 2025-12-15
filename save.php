<?php 
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE IF NOT EXISTS shop_db";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
// Create connection
$conn = new mysqli($servername, $username, $password, "shop_db");
// Check connection
if ($conn->connect_error) {
  die("Connection 2 failed: " . $conn->connect_error);
}

$sqlUser = "CREATE TABLE IF NOT EXISTS user(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
email VARCHAR(50),
username VARCHAR(50) UNIQUE,
password VARCHAR(255),
phone VARCHAR(20),
birthdate DATE,
gender VARCHAR(10),
address TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

if ($conn->query($sqlUser) === TRUE) {
  echo "Table  created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}



session_start();
unset($_SESSION['errors']);
unset($_SESSION['success']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first = trim($_POST["first_name"]);
    $last = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $password = md5($_POST["password"]);
    $conf_pass = $_POST["confirm_password"];
    $username = trim($_POST["username"]);
    $phone = trim($_POST["phone"]);
    $birthdate = trim($_POST["birthdate"]);
    $gender = trim($_POST["gender"]);
    $address = trim($_POST["address"]);

    // 1) դաշտերի համար․ պիտի պարտադիր լինեն լրացված
    $errors = [];
     
    $required_fields = ["first_name", "last_name", "email", "password", "confirm_password", "username", "gender", "birthdate","phone", "address"];
    foreach($required_fields as $field ){
        if(empty($_POST[$field])){
            $errors[] = "$field is required";
        }
    }

    // 2) անուն, ազգանուն դաշտերը թվեր, սիմվոլներ չպարունակեն
    if(!preg_match("/^[a-zA-ZԱ-Ֆա-ֆ'-]+$/u", $first)) {
        $errors[] = "$first can only contain letters.";
    }
    if(!preg_match("/^[a-zA-ZԱ-Ֆա-ֆ'-]+$/u", $last)){
        if(empty($_POST[$last])){
            $errors[] = "$last can only contain letters.";
        }
    }
     
    // 3) էլ. փոստը լրացված լինի համապատասխան ֆորմատի
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        if(empty($_POST[$email])){
           $errors[] = "Invalid $email format";
        }
    }

    // 4) ծննդյան ամսաթիվ դաշտում լրացված արժեքի հիման վրա ստուգել տարիքը, պիտի լինի 18+
    
    /*if(!empty($birthdate)){
        $birthDateObj = new DateTime($birthdate);
        $today = new DateTime();
        $age = $today->diff($birthDateObj)->y;
        if($age < 18){
            $errors[] = "Age must be 18 or older"
        }
    }*/
    if (!empty($birthate)){
        $birthDateObj =  new DateTime($birthdate);
         $today = new DateTime();
         $diff =date_diff($birthDateObj,$today);
         $age = $diff->y;

         if($age < 18){
            $errors[] = "Age must be 18 or older";
         }
    }
    // 5) հեռախոսահամարը լինի +374 00 000 000 ֆորմատով լրացված
     if(!preg_match("/^\+374\s\d{2}\s\d{3}\s\d{3}$/", $phone)){
        $errors[] = "The phone number must be in the format +374 XX XXX XXX";
     }

    // 6) գաղտնաբառ ու գաղտնաբառի հաստատում դաշտերում նույն արժեքը լինի
     if ($password !== $conf_pass) {
        $errors[] = "<h3 style='color:red;'>Passwords do not match!</h3>";
       
    }

    echo "<h2>Գրանցման տվյալները</h2>";
    echo "Անուն: $first <br>";
    echo "Ազգանուն: $last <br>";
    echo "Էլ․ փոստ: $email <br>";
    echo "Օգտանուն: $username <br>";
    echo "Հեռախոս: $phone <br>";
    echo "Ծննդյան ամսաթիվ: $birthdate <br>";
    echo "Սեռ: $gender <br>";
    echo "Հասցե: $address <br>";
}

// Սխալները
if (!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: index2.php");
}else{
   $sqlInsert = "INSERT INTO user (first_name, last_name, email, username, password, phone, birthdate, gender, address)
VALUES ('$first','$last','$email','$username','$password','$phone','$birthdate','$gender','$address')";

 if ($conn->query($sqlInsert) === TRUE) {
    $_SESSION['success'] = "Registered!";
 }else{
     echo "Error creating table: " . $sql . "<br>" . $conn->error;
 }
}

 if (!empty($errors)) {
        echo "<h3 style='color:red'>Սխալներ կա ֆորմայի լրացման մեջ:</h3>";
        echo "<ul>";
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul>";
        exit;
    }

    // Եթե ոչ մի սխալ չկա, ցուցադրում ենք տվյալները
    echo "<h2>Գրանցման տվյալները</h2>";

    $data = [
        "Անուն" => $first,
        "Ազգանուն" => $last,
        "Էլ․ փոստ" => $email,
        "Օգտանուն" => $username,
        "Հեռախոս" => $phone,
        "Ծննդյան ամսաթիվ" => $birthdate,
        "Սեռ" => $gender,
        "Հասցե" => $address
    ];

    foreach ($data as $key => $value) {
        echo "$key => [$value]<br>";
    }
    echo "<h4 style = 'color:green'> Success!</h4>";


?>
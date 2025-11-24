<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first = trim($_POST["first_name"]);
    $last = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
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


?>
<!DOCTYPE html>
<html>
    <head>
        <title>php</title>
        <style> 
           h1{
             font-size: 60px;
             font-weight: bold;
             text-align: center;

              background: linear-gradient(to top right, #0066ff 14%, #00ffcc 100%);
           
             -webkit-background-clip: text;
             -webkit-text-fill-color: transparent; 
         }
         </style>
    </head>
    <body style = "background: linear-gradient(to top right, #33ccff 0%, #ff99cc 100%);">
        <h1><i>_My first php_</i></h1>
        <?php
         echo "Hello! PHP" . "<br>";
        
         //1
         $price = 16.89345; //1.1
         echo(round($price, 2) . "<br>");
         echo(ceil($price) . "<br>"); //1.2
         echo(floor($price) . "<br>"); //1.3
         
         //2
         echo(rand(1, 100) . "<br>"); //2.1
         echo mt_rand() / mt_getrandmax() . "<br>"; //2.2
         $numbers = []; 
          for ($i = 0; $i < 5; $i++){
             $numbers [] = rand(1, 100);
          }
    
          echo "Numbers:" . implode(",",$numbers) . "<br>";
          echo "Max:" . max($numbers) . "<br>";
          echo "Min:" . min($numbers) . "<br>"; //2.3

        //3
         $num1 = -15.7;
         $num2 = 8.3;
         
         echo abs($num1) . "<br>";
         echo abs($num2) . "<br>"; //3.1
        
         echo(pow($num1,2) . "<br>");
         echo(sqrt($num2) . "<br>"); //3.2
       
         echo(pow($num1,$num2) . "<br>"); //3.3

         //4 
         $text = "    hello World    ";
         $trims = trim($text);
         echo $trims . "<br>"; //4.1
         
         echo strtoupper($text) . "<br>";
         echo strtolower($text) . "<br>"; //4.2
         
         echo strlen($text) . "<br>";
         echo ucfirst($text) . "<br>"; //4.3

         //5
         $sentence = "I love JavaScript, JavaScript is great";
         echo str_replace("JavaScript","PHP",$sentence) . "<br>";  //5.1
         echo strpos("$sentence","JavaScript") . "<br>";  //5.2
          
         if (strpos($sentence,"love")) {
            echo "Yes" . "<br>";
          } else {
            echo "No"  . "<br>";
          }    //5.3
         
          echo substr_count("$sentence","JavaScript") . "<br>"; //5.4

          //6
          $email = "user@example.com";
          $parts = explode("@",$email);
          echo "Username: " . $parts[0] . "<br>";
          echo "Domain: " . $parts[1] . "<br>";  //6.1

          $newEmail = implode(" at ", $parts);
          echo "New email: " . $newEmail . "<br>";  //6.2

          echo "Strrev: " . strrev($email) . "<br>";  //6.3

          echo "Last 4 characters: " . substr( $email, -4) . "<br>";  //6.4

          //7
          function getInitials($fullName) {
            $fullName = trim($fullName);
            $words = explode( " ", $fullName);

            $initials = "";
             foreach ($words as $word) {
                if ($word != "" ){
                 $initials .= strtoupper(substr($word, 0, 1)) . ".";
                }
             }
             return $initials;
          }
          echo getInitials("jone smith") . "<br>";

          //8
           $fruits = ["apple", "banana", "orange", "mango", "pear"];
           echo $fruits[1] . "<br>"; //8.1
           echo $fruits[] = "cherry" . "<br>"; //8.2
           array_unshift($fruits, "strawberry" . "<br>"); //8.3
           array_pop( $fruits) . "<br>"; //8.4
           echo count( $fruits) . "<br>"; //8.5

           //9
           $student = [
            "name" => "John",
            "age" => 20,
            "grade" => 10,
           ];
             print_r(array_keys($student)); //9.1
             print_r(array_values($student)); //9.2
              if(array_key_exists("age",$student)){
               echo "Key exists!"  . "<br>";
               }
               else
              {
                echo "Key does not exist!";
              } //9.3
              $student["city"] = "Yerevan" . "<br>"; //9.4
               print_r($student) . "<br>";

              //10
              $numbers = [5, 12, 8, 130, 44, 3];
              echo max($numbers) . "<br>"; //10.1
              echo min($numbers) . "<br>"; //10.2
              echo array_sum($numbers) . "<br>"; //10.3
              $even = array_filter($numbers, function($n){
               return $n % 2 == 0;
              }); //10.4

              //11
              $fruits = ["apple", "banana"];
              $veggies = ["carrot", "potato"];
                sort($fruits);
                 echo "<b>Sorted fruits:</b><br>";
                   print_r($fruits);
                    echo "<br>"; //11.1
                 echo "<b>Combined fruits:</b><br>";
                  $combined = array_merge($fruits, $veggies);
                   print_r($combined);
                   echo "<br>"; //11.2
                 echo "<b>Reversed fruits:</b><br>";
                    $reversed = array_reverse($combined);
                    print_r($reversed);
                    echo "<br>"; //11.3
                 echo "<b>Fruits</b><br>";
                    $oneLine = implode(",",$combined );
                    echo $oneLine;
                    echo "<br>"; //11.4

                    //12
                    $prices = [100, 200, 150, 300];
                  $withVAT = array_map(function($p){
                     return $p * 1.2;   // 20% ավելացում
                  },$prices);
                     echo "<b>Prices with VAT:</b><br>";
                     print_r($withVAT);
                     echo "<br>";  //12.1
                  $discounted = array_map(function($p){
                     return $p * 0.9; //10% զեղչ
                  },$prices);
                     echo "<b>Discounted Prices:</b><br>";
                     print_r($discounted);
                     echo "<br>"; //12.2
                  $formatted = array_map(function($p){
                     return $p . "AMD";
                  },$prices);
                     echo "<b>Prices(AMD):</b><br>";
                  print_r($formatted);
                  echo "<br>"; //12.3

                  //13

                  $students = [
                     ["name" => "Alice", "grades" => [9, 8, 7]],
                     ["name" => "Bob", "grades" => [8, 7, 6]],
                     ["name" => "Doe", "grades" => [6, 5, 8]]   
                  ];
                  echo "<b>Average: </b>" . "<br>" ;
                  $averages = [];
                    foreach ($students as $student) {
                      $avg = array_sum($student["grades"]) / count($student["grades"]);
                     echo $student["name"] ." = " . $avg . "<br>";
                      $averages[$student["name"]] = $avg;
                     }  //13.1
                     echo "<b>Top average:</b><br>";
                  $topst = array_keys($averages, max($averages));
                  print_r($topst) . "<br>"; //13.2
                  echo "<br><b>All studients:</b><br>";
                  foreach ($students as $s) {
                     echo $s["name"] . "<br>";
                  } //13.3

                  //14
                  $keys = ["name", "age", "city"];
                  $values = ["John", 25, "Yerevan"];

                  $c = array_combine($keys,$values);
                  print_r($c); //14.1

                  echo "<br><b>After added:</b><br>";
                  $c["country"] = "Armenia";
                  print_r($c);
                  echo "<br>"; //14.2

                  echo "<br><b>After removed:</b><br>";
                  unset($c["age"]);
                  print_r($c);
                  echo "<br><br>";//14.3

                  echo "<b>All keys:</b><br>";
                  print_r(array_keys($c));
                  echo "<br><br>";

                  echo "<b>All values:</b><br>";
                  print_r(array_values($c)); //14.4
                  //  ?>
    </body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>php2</title>

    <style>
        body {
            font-family: Arial;
            background: #e9f5ff;
            display: flex;
            justify-content: center;
            padding-top: 40px;
        }
        .container {
            background: white;
            width: 420px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px #9cd2ff;
        }
        .container h2 {
            text-align: center;
            color: #0077cc;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 7px 0 20px;
            border: 1px solid #c2e0ff;
            border-radius: 6px;
        }
        .gender-box {
            margin-bottom: 20px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #0088ff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #006edc;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first = $_POST["first_name"];
    $last = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conf_pass = $_POST["confirm_password"];

    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    // Password check
    if ($password !== $conf_pass) {
        die("Գաղտնաբառերը չեն համընկնում!");
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
?>
<div class="container">

    <h2>Գրանցման Ֆորմա</h2>

    <form action="save.php" method="POST">

        <label>Անուն</label>
        <input type="text" name="first_name" required>

        <label>Ազգանուն</label>
        <input type="text" name="last_name" required>

        <label>Էլ․ փոստ</label>
        <input type="email" name="email" required>

        <label>Գաղտնաբառ</label>
        <input type="password" name="password" required>

        <label>Կրկին գաղտնաբառ</label>
        <input type="password" name="confirm_password" required>

        <label>Օգտանուն</label>
        <input type="text" name="username">

        <label>Հեռախոսահամար</label>
        <input type="tel" name="phone">

        <label>Ծննդյան ամսաթիվ</label>
        <input type="date" name="birthdate">

        <label>Սեռ</label>
        <select name="gender">
            <option value="male">Արական</option>
            <option value="female">Իգական</option>
            <option value="other">Այլ</option>
        </select>

        <label>Հասցե</label>
        <textarea name="address" rows="3"></textarea>

        <button type="submit">Գրանցվել</button>
    </form>

</div>
</body>
</html>
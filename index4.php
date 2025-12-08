<?php
require_once "classes.php";

$students = [
    new Student("Անի", "Պետրոսյան", "AM123456", "091234567", 19, 18.7, "Բնագիտական", 2),
    new Student("Արման", "Հակոբյան", "AM234567", "099876543", 20, 16.5, "Տնտեսագիտություն", 3),
    new Student("Մարիամ", "Սարգսյան", "AM345678", "093456789", 18, 19.1, "Իրավագիտություն", 1)
];
?>

<!DOCTYPE html>
<head>
<title>Student list</title>
</head>
    <style>
        body{
          
            background: #d7f4feff;
            padding: 20px;
        }

        h1{

            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 5px 10px rgba(9, 9, 9, 0.2);
            border-radius: 15px;
        }
       
     
        th, td{
            font-family: Arial;
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th{
            font-family: Arial;
            background: #47b9edff;
             color: white;
        }

        tr:nth-child(even){
            background: #ffffffdc;
        }
    </style>
    <body>

     <h1>Ուսանողների տվյալներ</h1>

    <div class="box">
    <table>
    <tbody>
        <tr>
        <th>Անուն</th>
        <th>Ազգանուն</th>
        <th>Անձնագիր</th>
        <th>Հեռախոս</th>
        <th>Տարիք</th>
        <th>ՄՈԳ</th>
        <th>Ֆակուլտետ</th>
        <th>Կուրս</th>
      </tr>

        <tr>
        <td>Անի</td>
        <td>Պետրոսյան</td>
        <td>AM123456</td>
        <td>091234567</td>
        <td>19</td>
        <td>18.7</td>
        <td>Բնագիտական</td>
        <td>2</td>
      </tr>
        <tr>
        <td>Արման</td>
        <td>Հակոբյան</td>
        <td>AM234567</td>
        <td>099876543</td>
        <td>20</td>
        <td>16.5</td>
        <td>Տնտեսագիտություն</td>
        <td>3</td>
      </tr>
        <tr>
        <td>Մարիամ</td>
        <td>Սարգսյան</td>
        <td>AM345678</td>
        <td>093456789</td>
        <td>18</td>
        <td>19.1</td>
        <td>Իրավագիտություն</td>
        <td>1</td>
    </tr>
    
</tbody>
</table>
</div>

</body>
</html>
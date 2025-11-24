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
            width: 450px;
            padding: 40px;
            border-radius: 38px;
            box-shadow: 0 0 30px #9cd2ff;
        }
        .container h2 {
            padding: 15px;
            text-align: center;
            color: #0077cc;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #c2e0ff;
            border-radius: 6px;
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
    
<div class="container">

    <h2>Գրանցման Ֆորմա</h2>

     <form  method="POST" action="save.php">

        <label>Անուն(<i>First Name</i>)</label>
        <input type="text" name="first_name" >

        <label>Ազգանուն(<i>Last Name</i>)</label>
        <input type="text" name="last_name" >

        <label>Էլ․ փոստ(<i>Email</i>)</label>
        <input type="email" name="email" >

        <label>Գաղտնաբառ(<i>Password</i>)</label>
        <input type="password" name="password" >

        <label>Կրկին գաղտնաբառ(<i>Password</i>)</label>
        <input type="password" name="confirm_password" >

        <label>Օգտանուն(<i>Username</i>)</label>
        <input type="text" name="username">

        <label>Հեռախոսահամար(<i>Tel Num</i>)</label>
        <input type="tel" name="phone">

        <label>Ծննդյան ամսաթիվ(<i>Date</i>)</label>
        <input type="date" name="birthdate">

        <label>Սեռ(<i>Gender</i>)</label>
        <select name="gender">
            <option value="male">Արական</option>
            <option value="female">Իգական</option>
            <option value="other">Այլ</option>
        </select>

        <label>Հասցե(<i>Textarea</i>)</label>
        <textarea name="address" rows="3"></textarea>

        <button type="submit">Գրանցվել</button><br>
        
    </form>

</div>
</body>
</html>
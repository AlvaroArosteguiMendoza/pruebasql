<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
    <style>
        *{
margin: 0;
padding: 0;
box-sizing: border-box;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color:black;
}
.wrapper{
    width: 30%;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0,0,0, .2);
    color:white;
    border-radius: 10px;
    padding: 30px 40px;
}

.wrapper h1{
    font-size: 36px;
    text-align: center;
}

.wrapper .input-box{
    position: relative;
    width: 100%;
    height: 50px;
    background: transparent;
    margin: 30px  0;
}
.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border:none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    font-size: 16px;
    color: white;
    padding: 20px 45px 20px 20px;
}

.input-box input::placeholder{
    color:white;
}
.input-box i{
    position:absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
}

.wrapper .remember{
    display: flex;
    justify-content: center;
    font-size: 14.5px;
    margin: -15px 0 15px;
}
.remember label input{
    accent-color: white;
    margin-right: 3px;
}
.remember a{
    color:white;
    text-decoration: none;
}

.wrapper .btn{
    width: 100%;
    height: 45px;
    background-color: white;
    border:none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0,0,0, .1);
    cursor: pointer;
    font-size: 16px;
}
.wrapper .register-link{
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
}

.register-link p a{
    color: white;
    text-decoration: none;
    font-weight: 600;
}

.register-link p a :hover{
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input name="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i> 
            </div>
            <div class="input-box">
                <input name="password" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">               
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>

    <!-- PARA PROCESAR EL FORMULARIO -->
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $contraseñaAdmin = "1234";

    session_start();

    if ($username === "admin" && $password === $contraseñaAdmin) {
        // Si el usuario es "admin" y la contraseña coincide, inicia sesión
        $_SESSION['username'] = $username;
        $_SESSION['access_time'] = date("Y-m-d H:i:s");
        header("Location: index.php");
        exit();
    } elseif ($username === "cliente1") {
        // Si el usuario es cliente1, no se verifica la contraseña, simplemente se inicia sesión
        $_SESSION['username'] = $username;
        $_SESSION['access_time'] = date("Y-m-d H:i:s");
        header("Location: opciones.php");
        exit();
    } else {
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}
    ?>
</body>
</html>


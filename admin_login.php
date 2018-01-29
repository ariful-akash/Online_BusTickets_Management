<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username && $password) {
        $con = new mysqli('localhost', 'root', '', 'busticketreservation');
        $sql = "SELECT * FROM bus_admins WHERE email = '$username'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if (mysqli_num_rows($res) !== 0) {

            //while($row = mysqli_fetch_assoc($res))
            //	{
            $dbusername = $row['email'];
            $dbpassword = $row['password'];
            //	}
            if ($username == $dbusername && $password == $dbpassword) {
                $_SESSION['username'] = $username;
                header("location: admin_bus_input.php");
            } else {
                echo "incorrect";
            }
        } else {
            die("user dosen`t exists");
        }
    } else {
        die("Pls enter a username and passwors");
    }
}
?>

<html>
    <head>
        <title>Admin Login</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/W3_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/w3css-theme.css" rel="stylesheet" type="text/css"/>
    </head>
    <div style="width: 1060px; margin-left: 125px; margin-top: 50px" class="w3-bar w3-border w3-theme-me2">
        <a href="home.php" class="w3-bar-item w3-button">Home</a>
        <a href="#" class="w3-bar-item w3-button">Bus Search</a>
        <a href="#" class="w3-bar-item w3-button w3-right">About</a>
    </div>
    <div style="margin: 30px 1px 1px 110px">
        <img alt="" height="100px" width="200px" src="logo.png">
    </div>
    <div align="center">
        <form method="post"action="">

            <table class="input-table" cellspacing="10">
                <tr>
                    <td>Email:</td>
                    <td>
                        <input class="w3-theme-light-input" name="username" placeholder="example@email.com" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input class="w3-theme-light-input" name="password" placeholder="Password" type="password" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input class="w3-theme-light" type="submit" value="Log In">
                    </td>
                </tr>
            </table>

        </form>
    </div>

</body>
</html>
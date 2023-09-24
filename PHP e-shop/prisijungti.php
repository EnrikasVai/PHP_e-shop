<?php session_start();?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <link rel="stylesheet" href="Styles/prisijungimas.css">
</head>
<body>
    <header>
        <div class="pavadinimas">
            <img src="IMG/logo.png" alt="logo">
            <a href="index.php"><h1>GameStore</h1></a>
        </div>
        <nav>
            <ul>
                <a href="index.php"><li>Home</li></a>
                <a href="kontaktai.php"><li>Kontaktai</li></a>    
                <?php if(!isset($_SESSION['OKK'])){ 
                    echo '<a href="prisijungti.php"><li>Prisijungti</li></a>';
                }?>
                <?php if(isset($_SESSION['OKK'])){ 
                    echo '<a href="prisijungti.php"><li>Anketa</li></a>';
                }?>
            </ul>
        </nav>
        <?php if(isset($_SESSION['OKK'])){
            echo'<div class="krepselis">
                    <a href="krepselis.php"><img src="IMG/cart.svg" alt=""></a>
                </div>';
         }?>

    </header>
    <main>
    <?php
    if(!isset($_SESSION['OKK'])){?>
        <div class="login">
        <h2>Prisijungimas</h2>
        <form action="prisijungti.php" method="post">
            <input type="text" name="slapyvardis" class="feedback-input" placeholder="Prisijungimo vardas">
            <input type="password" name="Slapt" class="feedback-input" placeholder="Slaptažodis ">
            <input type="submit" value="Prisijungti" name="jungtis">
        </form>
        <p><a href="registruotis.php">Naujos Paskyros Kūrimas</a></p>
    <?php } ?>
        <?php
            $var='';$pass='';
            $duombaze = mysqli_connect("localhost","root","") or die("Neprisijungia.");
            mysqli_select_db($duombaze, 'duombaze');
            if(isset($_POST['slapyvardis'])) {
            
            $var = $_POST['slapyvardis'];
            $pass = $_POST['Slapt'];
            $sql = mysqli_query($duombaze,"SELECT * FROM `vartotojai` WHERE prisijungimo_vardas='".$var."' AND slaptazodis='" .md5($pass)."'");
        
            $num = mysqli_num_rows($sql);
        
            if($num > 0) {
                //$row = mysqli_fetch_array($sql);
                $_SESSION['OKK'] = '';
                $_SESSION['username']=$var;
                //echo "Login worked";
                echo '<meta http-equiv="refresh" content="0; URL=prisijungti.php" />';
            }
            else {
            echo '
                <h3 style="margin-top: 60px; background:none; color:red;"> Neteisingai įvesti duomenys.</h3>';
                }
            }
        echo '</div>';
         if(isset($_SESSION['OKK'])){

            $duombaze = mysqli_connect("localhost","root","");
            mysqli_select_db($duombaze, 'duombaze');
            $selektas = "SELECT * FROM `vartotojai` WHERE prisijungimo_vardas='". $_SESSION['username']."'";
            $result = mysqli_query($duombaze,$selektas);
            $row = mysqli_fetch_assoc($result);
                    echo '<div class="login">';
                    echo '<h3 style="padding-top:100px ;">Prisijungimo vardas: ' .$_SESSION['username']. "</h3>";
                    echo '<h3 style="padding:10px;">Vardas: ' .$row['vardas']. "</h3>";
                    echo '<h3 style="padding:10px;">Pavardė: ' .$row['pavarde']. '</h3>';
                    echo '<h3 style="padding:10px;" class="">El paštas: ' .$row['el_pastas']. '</h3>';
                    echo'<form action="prisijungti.php" method="post">';
                    echo'   <input type="submit" value="Atsijungti" name="back">';
                    echo'</form>';
                    echo'</div> ';
                    echo '</div>';
                    if(isset($_POST['back'])){
                        session_destroy();
                        echo '<meta http-equiv="refresh" content="0; URL=prisijungti.php" />';
            }
        } 
        ?>
    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>
    
</body>
</html>
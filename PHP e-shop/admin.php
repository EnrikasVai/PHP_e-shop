<?php session_start();?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store-ADMIN</title>
    <link rel="stylesheet" href="Styles/admin2.css">
</head>
<body>
    <header>
        <div class="pavadinimas">
            <img src="IMG/logo.png" alt="logo">
            <a href="admin.php"><h1>GameStore</h1></a>
        </div>
    </header>
    <main>
    <?php
    if(!isset($_SESSION['OK'])){?>
    <div class="login">
        <h2>Admin Prisijungimas</h2>
        <form action="admin.php" method="post">
            <input type="text" name="slapyvardis" class="feedback-input" placeholder="Prisijungimo vardas">
            <input type="password" name="Slapt" class="feedback-input" placeholder="Slaptažodis ">
            <input type="submit" value="Prisijungti" name="jungtis">
        </form>
    <?php } ?>
        <?php
            $duombaze = mysqli_connect("localhost","root","") or die("Neprisijungia.");
            mysqli_select_db($duombaze, 'duombaze');
            if(isset($_POST['slapyvardis'])) {
            $var=$_POST['slapyvardis'];
            $sql = mysqli_query($duombaze,"SELECT * FROM `admin` WHERE prisijungimo_vardas='".$_POST["slapyvardis"]."' AND slaptazodis='" .md5($_POST["Slapt"])."'");
    
            $num = mysqli_num_rows($sql);
        
            if($num > 0) {
                //$row = mysqli_fetch_array($sql);
                $_SESSION['OK'] = '';
                $_SESSION['admin']=$var;
                echo '<meta http-equiv="refresh" content="0; URL=admin.php" />';
            }
            else {
            echo '
                <h3 style="margin-top: 60px; background:none; color:red;"> Neteisingai įvesti duomenys.</h3>';
                }
            }
        if (isset($_SESSION['OK'])) {
            echo '</div>';
        ?>
        <div class="login">
        <h2>Naujo žaidimo idėjimas</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input required  type="text" name="pavadinimas" class="feedback-input" placeholder="Pavadinimas">
            <input required  type="text" name="data"class="feedback-input" placeholder="Išleidimo data">
            <input required type="text" name="kaina"class="feedback-input" placeholder="Kaina" max="99999" title="Neteisingai įvesta kaina">
            <textarea required type="text" name="aprasymas"class="feedback-input" placeholder="Aprašymas"></textarea>
            <textarea type="text" name="reikalavimai"class="feedback-input" placeholder="Reikalavimai"></textarea>
            <input class="input-field" required type="file" name="nuotrauka">
            <select name="kategorija">
                <option value="veiksmo">Veiksmo</option>
                <option value="koviniai">Koviniai</option>
                <option value="nuotykiu">Nuotykiu</option>
                <option value="fps">FPS/TPS</option>
                <option value="indie">Indie</option>
                <option value="mmo">MMO</option>
                <option value="lenktyniu">Lenktyniu</option>
                <option value="sporto">Sporto</option>
                <option value="rpg">RPG</option>
                <option value="strateginiai">Strateginiai</option>
            </select>
            <button name ="postt" type="submit" >Ikelti</button>
        </form>       
        <?php
            // echo $_POST['numeris'];
            if (isset($_POST['postt'])) {
                $kat = $_POST['kategorija'];
                $pav = $_POST['pavadinimas'];
                $kaina = $_POST['kaina'];
                $data = $_POST['data'];
                $nuotrauka = $_FILES["nuotrauka"]["name"];
                move_uploaded_file($_FILES["nuotrauka"]["tmp_name"], "prekesfoto/" . $_FILES["nuotrauka"]["name"]);
                $aprasymas = $_POST['aprasymas'];
                $reikalavimai = $_POST['reikalavimai'];
                $duombaze = mysqli_connect("localhost", "root", "");
                mysqli_select_db($duombaze, 'duombaze');
                $var=$_SESSION['admin'];
                $sql = mysqli_query($duombaze, "SELECT * FROM `admin` WHERE prisijungimo_vardas='".$var."'");

                $num = mysqli_num_rows($sql);

                if ($num > 0) {
                    mysqli_query($duombaze, "INSERT INTO `prekes` (`ID`, `pavadinimas`, `data`, `kaina`, `aprasymas`, `reikalavimai`, `nuotrauka`, `kategorija`) VALUES (NULL, '$pav', '$data', '$kaina', '$aprasymas', '$reikalavimai', '$nuotrauka', '$kat');");
                    echo '<hr>
                    <h5 style="font-size:20px;color:green;" class="text-center"> Sėkmingai įkėlete</h5>
                    <hr>';
                } else {
                    echo '<hr>
                <h5 style="font-size:20px;color:#ff4444;" class="text-center" padding-bottom:50px;> Neteisingai įvesti duomenys. Bandykite dar kartą</h5>
                <hr>';
                }
            }
        ?>
        <?php
            echo'<form action="admin.php" method="post">';
            echo'   <input type="submit" value="Atsijungti" name="logout">';
            echo'</form>';
            echo'<form action="admin2.php" method="post">';
            echo'   <input type="submit" value="Užsakymai" name="order">';
            echo'</form>';
            echo'</div> ';
            if(isset($_POST['logout'])){
                session_destroy();
                echo '<meta http-equiv="refresh" content="0; URL=admin.php" />';
    }
        }
        ?>
    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>
    
</body>
</html>
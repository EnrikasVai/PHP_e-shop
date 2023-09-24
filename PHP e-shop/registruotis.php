<?php ini_set('display_errors', 0);?>
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
                <a href="prisijungti.php"><li>Prisijungti</li></a>
            </ul>
        </nav>

    </header>
    <main>
        <div class="login">
        <h2>Registracija</h2>
        <form action="registruotis.php" method="post">
            <input required  type="text" name="vardas" class="feedback-input" placeholder="Vardas">
            <input required  type="text" name="pavarde"class="feedback-input" placeholder="Pavardė">
            <input required type="text" name="el_pastas"class="feedback-input" placeholder="El-paštas" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Neteisingai įvestas el. paštas">
            <input required type="text" name="prisijungimo_vardas"class="feedback-input" placeholder="Prisijungimo vardas">
            <input type="password" name="slaptazodis"class="feedback-input" placeholder="Slaptažodis" pattern=".{4,}" title="4 ar daugiau simbolių">
            <input type="submit" value="Registruoti naują" name="Registruoti">
        </form>
        <?php
        if(isset($_POST['Registruoti'])) {
        echo '<h5 style=" margin-bottom:20px; font-size:20px;color:green;" class="text-center"">Registracija sėkminga</h5>'  ;
        echo '<a href="prisijungti.php"><p>Prisijungti</p></a>';
    }
        ?>
        </div>
    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>
    <?php
            if(isset($_POST['Registruoti'])) {
                $pastas = $_POST['el_pastas'];
                $vardas = $_POST['vardas'];
                $pavarde = $_POST['pavarde'];
                $slapt = md5($_POST['slaptazodis']);
                $slapyvardis = $_POST['prisijungimo_vardas'];
                
                $duombaze = mysqli_connect("localhost","root","");
                    mysqli_select_db($duombaze, 'duombaze');
                    mysqli_query($duombaze, "INSERT INTO `vartotojai` (`prisijungimo_vardas`, `vardas`, `pavarde`, `slaptazodis`, `el_pastas`) VALUES ('$slapyvardis', '$vardas', '$pavarde', '$slapt', '$pastas')");
                    $num = mysqli_num_rows($sql);
                }
        ?>
</body>
</html>
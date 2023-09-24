<?php session_start();?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <link rel="stylesheet" href="Styles/krepselis.css">
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
                <a href="prisijungti.php"><li>Anketa</li></a>
            </ul>
        </nav>
        <div class="krepselis">
            <a href="krepselis.php"><img src="IMG/cart.svg" alt=""></a>
        </div>
    </header>
    <main>
        <div class="cart">
            <?php
            if(!isset($_POST['buy'])){
            echo '<h2>Krepšelis</h2>';
            $duombaze = mysqli_connect("localhost","root","");
            mysqli_select_db($duombaze, 'duombaze');
            $vardas=$_SESSION['username'];
            $selektas = "SELECT * FROM `krepselis` where prisijungimo_vardas='".$vardas."'";
            $result = mysqli_query($duombaze,$selektas);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div onclick="kuris(this);" class="kontentas">';
                    echo '<div class="fotke">';
                    $img = $row['nuotrauka'];
                    ?>
                            
                    <img src="prekesfoto\<?php echo $img; ?>"width="150px">
                    <?php
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<h2>' .$row['pavadinimas']. '</h2>';
                    echo "<p>Kaina: <b>" .$row['kaina']. ' EUR</b></p>';
                    echo '</div>';
                    echo '<div class="trynt">';
                    echo'    <form action="krepselis.php" method="post">';
                    echo'   <input type="submit" value="&#x2715" name="iks'.$row['idd'].'">';
                    echo' </form>';
                    echo '</div>';
                    echo '</div>';
                    

                }
                $num = mysqli_num_rows($result);
                if($num>0){
                echo'<form action="krepselis.php" method="post" class="pirk">';
                echo'   <input type="submit" value="Pirkti dabar" name="buy">';
                echo'</form>';}

            }
            for($i=0; $i<10000; $i++){
                if(isset($_POST['iks'.$i.''])){
                    $duombaze = mysqli_connect("localhost","root","");
                    mysqli_select_db($duombaze, 'duombaze');
                    $vardas=$_SESSION['username'];
                    $selektas = "DELETE FROM `krepselis` where idd='".$i."'";
                    $result = mysqli_query($duombaze,$selektas);
                    echo '<meta http-equiv="refresh" content="0; URL=krepselis.php" />';
                }
            }
        }   
            if (isset($_POST['buy'])) {
                echo '<h2>Prekių užsakymas</h2>';
                echo '<div class="forma">';
                echo'<form action="krepselis.php" method="post">';
                echo    '<input required  type="text" name="vardas" class="feedback-input" placeholder="Vardas">';
                echo    '<input required  type="text" name="pavarde"class="feedback-input" placeholder="Pavardė">';
                echo    '<input required type="text" name="el_pastas"class="feedback-input" placeholder="El-paštas" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Neteisingai įvestas el. paštas">';
                echo    '<select name="kategorija">';
                echo        '<option value="korta">Kortele</option>';
                echo        '<option value="pavedimas">Bankiniu pavedimu</option>';
                echo    '</select>';
                echo    '<input type="submit" value="Pirkti" name="pirkt" class="feedback-input">';
                echo '</form>';
                echo '</div>';
            }
            if (isset($_POST['pirkt'])) {
                $var = $_POST['vardas'];
                $pav = $_POST['pavarde'];
                $pastas = $_POST['el_pastas'];
                $kat = $_POST['kategorija'];
                $duombaze = mysqli_connect("localhost", "root", "");
                mysqli_select_db($duombaze, 'duombaze');
                $v=$_SESSION['username'];
                $selektas = "SELECT * FROM `krepselis` where prisijungimo_vardas='".$v."'";
                $result = mysqli_query($duombaze,$selektas);
                while($row = mysqli_fetch_assoc($result)){
                    $duombaze = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($duombaze, 'duombaze');
                    $sql = mysqli_query($duombaze, "SELECT * FROM `vartotojai` WHERE prisijungimo_vardas='".$v."'");
                    $num = mysqli_num_rows($sql);
                    $znr=$row['id'];
    
                    if ($num > 0) {
                        mysqli_query($duombaze, "INSERT INTO `uzsakymai` (`id`, `vardas`, `pavarde`, `el_pastas`, `atsiskaitymo_budas`, `idz`) VALUES (NULL, '$var', '$pav', '$pastas', '$kat', '$znr');");
                    }
                    else {
                        echo '<hr>
                    <h5 style="font-size:20px;color:#ff4444;text-align:center;" padding-bottom:50px;> Neteisingai įvesti duomenys. Bandykite dar kartą</h5>
                    <hr>';
                    }
                }
                $selektas = "DELETE FROM `krepselis` where prisijungimo_vardas='".$v."'";
                $result = mysqli_query($duombaze,$selektas);   
                echo '<meta http-equiv="refresh" content="0; URL=krepselis.php" />';
                    echo '<h5 style="font-size:20px;color:green; text-align:center;"> Sėkmingas užsakymas</h5>';          
            }
            ?>

        </div>
    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>
    
</body>
</html>
<script>
	function neveikti()
	{
		alert("Įvyko klaida. Bandykite dar kartą.");
	}
	function kuris(skelbimas)
	{
		console.log(skelbimas.childNodes[1].getElementsByTagName("h2")[0].innerHTML);
		var yems = skelbimas.childNodes[1].getElementsByTagName("h2")[0].innerHTML;
		window.location.href = "skelbimas2.php?argument="+yems;
	}

</script>
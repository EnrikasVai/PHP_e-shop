<?php session_start();?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <link rel="stylesheet" href="Styles/skelbimas.css">
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
        <div class="preke">
        <?php
            $result = $_GET['argument'];
            //echo $result;
            $duombaze = mysqli_connect("localhost","root","");
            mysqli_select_db($duombaze, 'duombaze');
            $selektas = "SELECT * FROM `prekes` WHERE pavadinimas='" .$result. "'";
            $result = mysqli_query($duombaze,$selektas);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<div class="fotke">';
                    $img = $row['nuotrauka'];
                    $pavadinimas =$row['pavadinimas'];
                    $kaina =$row['kaina'];
                    $info=$row['ID'];
                    ?>
                    <img  src="prekesfoto\<?php echo $img; ?>"width=""></div>
                    <?php
                    echo '<div class="informacija">';
                    echo '<h2 style="padding:10px;">' .$row['pavadinimas']. "</h2>";
                    echo '<h3 style="padding:10px;">Isleidimo metai: ' .$row['data']. '</h3>';
                    echo '<h3 style="padding:10px;">ID: ' .$info. '</h3>';
                    echo '<h5 class="text-danger" style="padding:10px;"><b>KAINA: ' .$row['kaina']. ' EUR </b></h5>';
                    echo '<h4 style="padding:10px;">Aprašymas:</h4>';
                    echo '<p style="padding:10px;" class="">' .$row['aprasymas']. '</p>';
                    echo '<h4 style="padding:10px;">Sistemos reikalavimai:</h4>';
                    echo '<p style="padding:10px;" class="">' .$row['reikalavimai']. '</p>';
                    echo'<form action="krepselis.php?" method="post">';
                    echo'   <input type="submit" value="Grįžti atgal" name="back">';
                    echo'</form>';
                    if(isset($_SESSION['OKK'])){ 
                        echo'<form class="pirk"action="" method="post">';
                        echo'   <input type="submit" value="Pridėti į krepšelį" name="byt">';
                        echo'</form>';
                        if(isset($_POST['byt'])){
                            $vardas=$_SESSION['username'];
                            mysqli_query($duombaze, "INSERT INTO `krepselis` (`ID`, `prisijungimo_vardas`,`pavadinimas`,`kaina`,`nuotrauka`) VALUES ('$info', '$vardas','$pavadinimas','$kaina','$img');");
                            header("location:krepselis.php");
                        }
                    }
                    echo'</div> ';
                    echo '</div>';
                }
            }
        ?>


        </div>
    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>

    <script>
	function neveikti()
	{
		alert("Įvyko klaida. Bandykite dar kartą.");
	}
	function kuris(skelbimas)
	{
		console.log(skelbimas.childNodes[1].getElementsByTagName("h2")[0].innerHTML);
		var yems = skelbimas.childNodes[1].getElementsByTagName("h2")[0].innerHTML;
		<?php
		$argument = 'yems';
		echo $argument;
		?>
		
	}

</script>
</body>
</html>
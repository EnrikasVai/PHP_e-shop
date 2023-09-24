<?php session_start();?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <link rel="stylesheet" href="Styles/pagrindinis.css">
</head>
<body>
    <header>
        <div class="pavadinimas">
            <img src="IMG/logo.png" alt="logo">
            <a href="index.php"><h1>GameStore</h1></a>
        </div>
        <nav>
            <ul>
                <a href="?home"><li class="kas">Home</li></a>
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
        
        <div class="top">
            <a href="?veiksmo"><div><p>Veiksmo</p></div></a>
            <a href="?koviniai"><div><p>Koviniai</p></div></a>
            <a href="?nuotykiu"><div><p>Nuotykių</p></div></a>
            <a href="?fps"><div><p>FPS/TPS</p></div></a>
            <a href="?indie"><div><p>Indie</p></div></a>
            <a href="?mmo"><div><p>MMO</p></div></a>
            <a href="?lenktyniu"><div><p>Lenktynių</p></div></a>
            <a href="?sporto"><div><p>Sporto</p></div></a>
            <a href="?rpg"><div><p>Vaidmenų
                (RPG)</p></div></a>
            <a href="?strateginiai"><div><p>Strateginiai</p></div></a>
        </div>
        <div class="katalog">
        <?php
            if(!empty($_GET)){
		        if(isset($_GET['home'])){include('files/home.php');}
		        elseif(isset($_GET['veiksmo'])){include('files/veiksmo.php');}
		        elseif(isset($_GET['veiksmo'])){include('files/veiksmo.php');}
		        elseif(isset($_GET['koviniai'])){include('files/koviniai.php');}
		        elseif(isset($_GET['lenktyniu'])){include('files/lenktyniu.php');}
		        elseif(isset($_GET['mmo'])){include('files/mmo.php');}		
		        elseif(isset($_GET['fps'])){include('files/fps.php');}
                elseif(isset($_GET['indie'])){include('files/indie.php');}
		        elseif(isset($_GET['nuotykiu'])){include('files/nuotykiu.php');}
		        elseif(isset($_GET['rpg'])){include('files/rpg.php');}
		        elseif(isset($_GET['sporto'])){include('files/sporto.php');}
		        elseif(isset($_GET['strateginiai'])){include('files/strateginiai.php');}
		    else{include('files/404.php');}
		    }
	    else{include('files/home.php');}
	
	    ?>
  
        </div>
    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>
    
</body>
</html>
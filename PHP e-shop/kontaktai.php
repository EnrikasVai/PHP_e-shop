<?php session_start();?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <link rel="stylesheet" href="Styles/kontaktai.css">
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
        <div class="kontaktai-1">
            <h2>Kontaktinė informacija</h2>
            <div class="info">
                <p>Adresas: Lietuva, Vilnius, Geležinio vilko g. 36</p>
                <p>Telefono nr: +37063303382</p>
                <p>El. paštas: eagaming@info.lt</p>
            </div>
        </div>
        <div class="kontaktai">
            <h2>Susisiekite</h2>
        <form>      
            <input required name="name" type="text" class="feedback-input" placeholder="Name" />   
            <input required type="text" name="el_pastas"class="feedback-input" placeholder="El-paštas" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Neteisingai įvestas el. paštas">            
            <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
            <input type="submit" value="SUBMIT"/>
        </form>
        </div>

    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>
    
</body>
</html>
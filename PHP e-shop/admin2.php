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
        if (isset($_SESSION['OK'])) {
        ?>
        <div class="login">
        <h2>Užsakymai</h2>
        <table>
        <tr>
            <th>Vardas</th>
            <th>Pavarde</th>
            <th>Elpaštas</th>
            <th>Atsiskaitymo būdas</th>
            <th>Žaidimo ID</th>
        </tr>
        <?php
            $duombaze = mysqli_connect("localhost","root","");
            mysqli_select_db($duombaze, 'duombaze');
            $selektas = "SELECT * FROM `uzsakymai`";
            $result = mysqli_query($duombaze,$selektas);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>'.$row['vardas'].'</td>';
                    echo '<td>'.$row['pavarde'].'</td>';
                    echo '<td>'.$row['el_pastas'].'</td>';
                    echo '<td>'.$row['atsiskaitymo_budas'].'</td>';
                    echo '<td>'.$row['idz'].'</td>';
                    echo '</tr>';
                }
            }
        ?>
        </table>
        
        <?php
            echo'<form action="admin.php" method="post">';
            echo'   <input type="submit" value="Atsijungti" name="logout">';
            echo'</form>';
            echo'<form action="admin.php" method="post">';
            echo'   <input type="submit" value="Žaidimo įkėlimas" name="upl">';
            echo'</form>';
            echo'</div> ';
            if(isset($_POST['logout'])){
                session_destroy();
                echo '<meta http-equiv="refresh" content="0; URL=admin.php" />';
    }
        echo '</div>';
    }?>
    </main>
    <footer>
    <p class="copy">&copy; Copyright <?php echo date("Y") ?> Enrikas Vaiciulis</p>
    </footer>
    
</body>
</html>
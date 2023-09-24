<style>
    /* prekes */
*{
    margin: 0;
    padding: 0;
    font-family: Verdana, sans-serif;
}
.fotke{
    width: 300px;
    height: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.info{
    width: 300px;
    display: inline-block;
    height: 100px;
    text-align: center;
}
.kontentas{
    float: left;
    background:rgb(46, 34, 34);
    border-radius: 20px;
    margin-top:60px;
    margin-right: 10px;
    margin-left: 20px;
    margin-bottom: 10px;
}
.katalog h2{
    width:100%;
    text-align: center;
}
</style>
<?php
    echo'<h2 style="margin-top:30px;">Sporto žaidimai</h2>';
    
    $duombaze = mysqli_connect("localhost","root","");
    mysqli_select_db($duombaze, 'duombaze');
    $selektas = "SELECT * FROM `prekes` where kategorija='sporto'";
    $result = mysqli_query($duombaze,$selektas);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            echo '<div onclick="kuris(this);" class="kontentas">';
            echo '<div class="fotke">';
            $img = $row['nuotrauka'];
            ?>
                    
            <img src="prekesfoto\<?php echo $img; ?>"width="250px">
            <?php
            echo '</div>';
            echo '<div class="info">';
            echo '<h2>' .$row['pavadinimas']. '</h2>';
            echo "<p>Kaina: <b>" .$row['kaina']. ' EUR</b></p>';
            echo '</div>';
            echo '</div>';
        }
    }
?>
<script>
	function neveikti()
	{
		alert("Įvyko klaida. Bandykite dar kartą.");
	}
	function kuris(skelbimas)
	{
		console.log(skelbimas.childNodes[1].getElementsByTagName("h2")[0].innerHTML);
		var yems = skelbimas.childNodes[1].getElementsByTagName("h2")[0].innerHTML;
		window.location.href = "skelbimas.php?argument="+yems;
	}

</script>
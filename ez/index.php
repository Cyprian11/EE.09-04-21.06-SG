<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <div class="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </div>

    <div class="lewy">
        <h4>Użytkownicy</h4>
        <?php
        $con = new mysqli("127.0.0.1","root","","dane4");
        session_start();
    
    $sql=mysqli_query($con,"SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30");
    while($i=mysqli_fetch_array($sql))
        {
            
            // $wynik=echo date ("y")-$i[3];
            $wynik=2023-$i[3];
            echo "$i[0]. $i[1] $i[2] $wynik lat<br>";
        }
            

         ?>
        Efekt działania skryptu 1<br>
        <a href="settings.html">Inne ustawienia</a>
    </div>
    
    <div class="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="index.php" method="post">
            <input type="number" name="liczba" id="liczba"> 
            <input type="submit" value="zobacz" class="b1" id="zobacz">
        <hr></hr>
        

        <?php
        if(isset($_POST["liczba"]))
        {
            $liczba = $_POST["liczba"];
            $sql=mysqli_query($con,"SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = $liczba");
            while($i=mysqli_fetch_array($sql))
            {
                echo
                "<h2>$liczba. $i[0] $i[1]</h2><br>
                <img src='$i[4]' alt='$liczba'>
                <p>Rok urodzenia: $i[2]</p>
                <p>Opis:$i[3]</p>
                <p>Hobby:$i[5]</p>";  
            }
            mysqli_close($con);
        }
        ?>
        </form> 
        
         
        
    
    </div>
    
    <div class="stopka">
        wykonał:0000000000000000
    </div>
</body>
</html>
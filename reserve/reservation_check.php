<?php   
session_start();
    include("../database/db_inc.php");
    include("../functions/functions.php");
    $user_data = check_login($con);

    /*echo $_SESSION["kfztyp"]."    ";
    echo $_SESSION["mietstation"]."    ";
    echo $_SESSION["abholstation"] ."  KFZ BEZEICHNUNG  ";

    echo $_SESSION["kfzTypBezeichnung"][0]."  Abholstation bezeichung  ";
    echo $_SESSION['abholstationBezeichnung'][0] ."  anza verfügbare autos  ";
    echo $_SESSION["anzahlVerfuegbareAutos"] ."  anza reservierte autos  ";
    echo $_SESSION["anzahlReservierteAutos"]."  total autos  ";
    echo $_SESSION["totavailableKfz"]."    ";*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../src/styles/style_checkReservation.css">
        <title>Reservierungsüberprüfung</title>
    </head>
    <body>
        <!--Header-->
        <header>
            <nav>
                <ul>
                    <b>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="reservation.php">Reservieren</a></li>
                        <li><a href="../invoice/invoice_list.php">Rechnungen</a></li>
                        <li><b class="username"> Hallo <?php echo $user_data['pseudo'] ?><b></li>
                        <li><a href="../login/logout.php">Logout</a></li>
                    </b>
                </ul>
            </nav>
        </header>
        <!--Reservierungseingaben-->
        <main>
            <h1>Überprüfung</h1>
            <center>
            <div class="frame">

                <form action="reservation_confirmation.php" method="POST">
                <!-------------------------------------------------------------->
                    <div class="group">
                        <label for="vorname"><b>*Vorname</b></label>
                        <input type="text" name="vorname" value="<?php echo $user_data['vorname'] ?>" readonly required>

                        <label for="nachname"><b>*Nachname</b></label>
                        <input type="text" name="nachname" value="<?php echo $user_data['nachname'] ?>" readonly required>

                        <label for="telefonnr"><b>*Telefonnr.</b></label>
                        <input type="text" name="telefonnr" value="<?php echo $user_data['telefonNr'] ?>" readonly required>

                        <label for='Mietbeginn'>Mietbeginn:</label>
                        <input type='date' name='Mietbeginn' value="<?php echo $_SESSION['Mietbeginn'] ?>" readonly required readonly>

                    </div>

                <!-------------------------------------------------------------->

                    <div class="group">
                        <label for="kfztyp"><b>*KFZ-Typ</b></label>
                        <input type="text" name="kfztyp" value="<?php echo $_SESSION['kfzTypBezeichnung'][0]?>" readonly required>
                    
                        <label for="abholstation"><b>*Abholstation</b></label>
                        <input type="text" name="abholstation" value="<?php echo $_SESSION ['abholstationBezeichnung'][0] ?>" readonly required>     
                        
                        <label for="email"><b>*Email-Adresse</b></label>
                        <input type="text" name="email" value="<?php echo $user_data['emailAdresse'] ?>" readonly required>

                        <label for='Mietende'>Mietende:</label>
                        <input type='date' name='Mietende' value="<?php echo $_SESSION['Mietende'] ?>" required readonly> 


                    </div>
                    
                <!-------------------------------------------------------------->

                    <br>
                    <div class="group">
                        <label for="message"><b>Message</b></label>
                        <textarea name="message"><?php echo $_SESSION['message'] ?></textarea>
                    </div>
                    <br>
                
                    <br>
                    <label for="bedingung" id="checkbox">
                        <input type="checkbox" name="bedingung"><b>Die Daten sind korrekt</b>
                    </label>
                    <br>

                    <b class="invisible" id="fehlermeldung">Bitte bestätigen sie die Korrektheit der Daten</b><br><br>
                    <div class="buttons" style="width: 50px">
                        <button type="button" onclick="if(window.confirm('Möchten sie die Reservierung wirklich abbrechen?')){window.location='..\\index.php'}">Abbrechen</button>
                        <button type="button" onclick="if(form.bedingung.checked){form.submit()}else{document.getElementById('fehlermeldung').classList.remove('invisible');}">Reservieren</button>
                    </div>
                </form>
            </div>
            </center>
            
        </main>
        <!--Sonstige Links-->

        <!--Footer-->
        <footer>
            <b>Privacy Policy</b>
            <b>© 2022. All rights reserved</b>
            <b>Social</b>
        </footer>
    </body>
</html>
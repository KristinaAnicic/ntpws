<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 7</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            $kolokvij1 = "";
            $kolokvij2 = "";
            $srednja_ocjena = null;

            if (isset($_POST['kolokvij1']) && isset($_POST['kolokvij2'])){
                $kolokvij1 = $_POST['kolokvij1'];
                $kolokvij2 = $_POST['kolokvij2'];
            
                if(is_numeric($kolokvij1)&& is_numeric($kolokvij2)){
                    if($kolokvij1 == 1 || $kolokvij2 == 1){
                        $srednja_ocjena = 1;
                    }
                    else{
                        $srednja_ocjena = ($kolokvij1 + $kolokvij2)/2;
                    }
                }
            }

            print '
            <div class="container">
                <h1>Izračun ocjene iz kolokvija</h1>
                <p>Potrebno je napraviti formu za izračun ocjene iz kolokvija. Imamo uvjet da moramo izračunati srednju ocjenu 
                    iz prvog i drugog kolokvija. Ukoliko je jedan od kolokvija negativan, krajnja ocjena je negativna. Drugi 
                    uvjet je da ocjena ne smije biti manja od 1 i veća od 5
                </p></br>

                <form method="post" action="">
                    <label for="ocjena1">Ocjena 1. kolokvija</label></br>
                    <input type="number" id="ocjena1" name="kolokvij1" class="ocjena" min="1" max="5" value="' . $kolokvij1 . '"/></br></br>
                    <label for="ocjena2">Ocjena 2. kolokvija</label></br>
                    <input type="number" id="ocjena2" name="kolokvij2" class="ocjena" min="1" max="5" value="' . $kolokvij2 . '"/></br></br>

                    <input type="submit" value="POŠALJI"/>
                </form>
                </br>';

                if($srednja_ocjena != null){
                    echo '<div class="results">';
                    if($srednja_ocjena > 1){
                        echo '<p>Srednja ocjena iz predmeta: ' . $srednja_ocjena . '</br>';
                        echo 'Konačna ocjena iz predmeta: ' . round($srednja_ocjena). '</p>';
                    }
                    else if($kolokvij1 == 1 && $kolokvij2 == 1){
                        echo '<p>Student mora ponavljati oba kolokvija</p>';
                    }
                    else if($kolokvij1 == 1){
                        echo '<p>Student mora ponoviti 1. kolokvij</p>';
                    }
                    else if($kolokvij2 == 1){
                        echo '<p>Student mora ponoviti 2. kolokvij</p>';
                    }
                    echo('</div>');
                }
            
            print '</div>
            ';
        ?>
    </body>
</html>
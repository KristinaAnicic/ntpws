<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 10</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0 auto;
                margin-top: 40px;
                width: 70%;
            }
            input[type="submit"]{
                padding: 15px;
                background-color: steelblue;
                color: white;
                border: none;
                border-radius: 10px;
            }    
            .niz{
                width: 80%;
                padding: 10px;
                outline: none;
                border: none;
                border-bottom: solid 1px gray;
                font-size: 16px;
            }
            .tekst{
                background-color:rgba(226, 99, 99, 0.4);
                
                display: inline-block;
                white-space: nowrap;
                color: darkred;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <?php
            print '
            <h1>Zadatak <span class = "tekst">str_word_count</span></h1>
            <form method="post" action="">
                <label for="niz">Ulazni niz:</label></br>
                <input type="text" name="niz" id="niz" class="niz" value=""/></br></br>
                <input type="submit" value="ispiši broj riječi">
            </form>
            </br>';

            if(isset($_POST['niz'])){
                $wordCount = str_word_count($_POST['niz']);
                echo '<p>ulazni niz: <span class = "tekst">' . $_POST['niz'] . '</span> sadrži ' . $wordCount . ' riječi.<p>';
            }

            //Tekst: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin dolor sollicitudin sapien vehicula fringilla.
        ?>
    </body>
</html>
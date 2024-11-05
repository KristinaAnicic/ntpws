<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 11</title>

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
            .unos{
                width: 80%;
                padding: 10px;
                outline: none;
                border: none;
                border-bottom: solid 1px gray;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <?php
            function 
            isPrimeNumber($number){
                if($number <= 1){
                    return false;
                }
                for($i=2; $i <= sqrt($number); $i++){
                    if($number % $i == 0){
                        return false;
                    }
                }
                return true;
            }

            function
            allPrimeNumbers(){
                $primes = [];
                for($i=1; $i <= 100; $i++){
                    if (isPrimeNumber($i)){
                        $primes[] = $i;
                    }
                }
                return $primes;
            }
        
        print'
        <h1>Prosti brojevi</h1>
        <form method="post" action="">
            <label for="prime">Provjeri je li je broj prost</label></br>
            <input type="number" name="prime" id="number" class="unos"/></br></br>
            <input type="submit" value="Pošalji" /></br></br>
        </form>
        ';

        if (isset($_POST['prime'])) {
            $input = $_POST['prime'];
            
            if (is_numeric($input) && $input > 0 && floor($input) == $input) {
                print '<p>Broj ' . $input . (isPrimeNumber($input) ? " je prost." : " nije prost.") . "</p>";
                print '<p>Prosti brojevi do 100 su: ' . implode(', ', allPrimeNumbers()) . '</p>';
            } else {
                print '<p>Unesite prirodan broj (pozitivan cijeli broj veći od 0).</p>';
            }
        }
        
        ?>
    </body>
</html>
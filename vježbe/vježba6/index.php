<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 6</title>
    </head>
    <body>
        <?php
            $result = '';
            $firstNum = null;
            $secondNum = null;

            if (isset($_POST['operator']) && isset($_POST['firstNum']) && isset($_POST['secondNum'])){
                $firstNum = $_POST['firstNum'];
                $secondNum = $_POST['secondNum'];
                $operator = $_POST['operator'];

                if(is_numeric($firstNum) && is_numeric($secondNum)){
                    switch ($operator){
                        case '+':
                            $result = $firstNum + $secondNum;
                            break;
                        case '-':
                            $result = $firstNum - $secondNum;
                            break;
                        case '*':
                            $result = $firstNum * $secondNum;
                            break;
                        case '/':
                            $result = $firstNum / $secondNum;
                            break;
                    }
                }
            }

            print '
            <p>Kalkultor (Switch naredba)</p>
            <form method="post" action="">
                <label for="first_number"><b>Upiši prvi broj * </b></label>
                <input type="number" name="firstNum" id="first_number" value="' . $firstNum . '"></br></br>
                <label for="second_number"><b>Upiši drugi broj * </b></label>
                <input type="number" name="secondNum" id="second_number" value="' . $secondNum . '"></br></br>

                <p>Rezultat: ' . $result . '</p>

                <input type="submit" name="operator" value="+" style="padding:5px 10px"/>
                <input type="submit" name="operator" value="-" style="padding:5px 10px"/>
                <input type="submit" name="operator" value="*" style="padding:5px 10px"/>
                <input type="submit" name="operator" value="/" style="padding:5px 10px"/>
            </form>
            ';
        ?>
    </body>
</html>
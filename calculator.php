<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Button Example</title>
</head>
<style>
    .calculator {
        display: flex;
    }
</style>

<body>
    <h1>Máy tính cẩm lan Sụk</h1>
    <form method="POST">
        <p>First Value:<br />
            <input type="text" id="first" name="first">
        </p>
        <p>Second Value:<br />
            <input type="text" id="second" name="second">
        </p>
        <div class="calculator">
            <input type="radio" name="operand" id="add" value="add">
            <p>+</p><br />
            <input type="radio" name="operand" id="subtract" value="subtract">
            <p>-</p><br />
            <input type="radio" name="operand" id="times" value="times">
            <p>x</p><br />
            <input type="radio" name="operand" id="divide" value="divide">
            <p>/</p><br />
            <p></p>
        </div>
        <button type="submit" name="submit" id="submit">Calculate</button>
    </form>
    <?php
    //initial when user click submit
    if (isset($_POST["submit"])) {
        try{
             //when there is enough inputs from user
                if (is_numeric($_POST["first"]) && is_numeric($_POST["second"])) {
                    //when user choose the correct operator
                    if (!empty($_POST["operand"])) {
                        //calculate the result
                        $a = $_POST["first"];
                        $b = $_POST["second"];
                        switch ($_POST["operand"]) {
                            case "add":
                                echo $a + $b;
                                break;
                            case "subtract":
                                echo $a - $b;
                                break;
                            case "times":
                                echo $a * $b;
                                break;
                            case "divide":
                                if ($b == 0) {
                                    throw new Exception ("ê ê sao chia cho 0 vậy má ?");
                                    break;
                                }
                                echo $a / $b;
                                break;
                        }
                    }
                    //when user forgot to choose an operand
                    else {
                        throw new Exception("Rồi không có dấu t tính cái gì, cái nết m à");
                    }
                }
                //when user forgot to enter a number
                else {
                    throw new Exception ("Thiếu số tính củ cải gì má :)");
                }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
       
    }

    ?>
</body>

</html>
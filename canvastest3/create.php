<html>
    <head>

    </head>
    <body>
        <form method="GET" action="welcome.php">
            帳號:
            <input name="account" type="text">
            <br>
            密碼:
            <input name="password" type="password">
            <br>
            驗證碼
            <input name="numbercheck1" id ="checknumber" type="text">
            
            <?php
                $ran=mt_rand(1000,9000);
                echo "驗證碼:";
                $ran1=mt_rand(100,980);
                echo $ran1;
                echo "+";
                echo ($ran-$ran1);
                echo "<script>";
                echo "var ran=";
                echo $ran;
                echo ";";
                echo "</script>";
            ?>
            <input name="numbercheck2" value="<?php echo $ran ?>" type="hidden">
            <br>
            <input type="submit" value="註冊">
        </form>
        <br>
    
    </body>
</html>



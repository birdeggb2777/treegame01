<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            if (isset($_GET["account"]) && isset($_GET["password"]))
            {
                $CheckAccount=0;
                $totalstr=file_get_contents("user.data");
                $userdata=explode("\n",$totalstr);
                for($i=0;$i<count($userdata);$i++)
                {
                    $Mydata=explode(" ",$userdata[$i]);
                    if ($Mydata[0]==$_GET["account"]&&$Mydata[1]==$_GET["password"])
                    { 
                        echo $Mydata[0];
                        echo "您好 ";
                        echo " 您目前的最高成績為";
                        echo $Mydata[2];
                        $CheckAccount=1;
                        break;
                    }
                    
                }
                if ($CheckAccount==0)
                {
                    echo "無此帳號或密碼錯誤";
                    echo "<br>";
                    echo "<a href='canvas2.php'>重新登入</a>";
                }
                else
                {
                    echo "<br>";
                    echo "<a href='treegame.php?account=";
                    echo $_GET['account'];
                    echo "'>開始遊戲</a>";
                    echo "<br>";
                    echo "<a href='sort.php?account=";
                    echo $_GET['account'];
                    echo "'查看所有玩家的成績</a>";
                }
            }

        ?>
    </body>
</html>


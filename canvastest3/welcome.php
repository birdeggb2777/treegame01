<!-- 註冊完成或失敗的提示文字 -->
<?php
    if (isset($_GET["account"]) && isset($_GET["password"]))
    {
        $CheckAccount=0;
        $totalstr=file_get_contents("user.data");
        $userdata=explode("\n",$totalstr);
        for($i=0;$i<count($userdata);$i++)
        {
            $Mydata=explode(" ",$userdata[$i]);
            if ($Mydata[0]==$_GET["account"])
            { 
                $CheckAccount=1;
                break;
            }
            
        }
        if ($CheckAccount==1)
        {
            echo "此帳號已經存在";
            echo "<br>";
            echo "<a href='canvas2.php'>重新登入</a>";
        }
        else
        {
            if (isset($_GET["numbercheck1"]) && isset($_GET["numbercheck2"]))
            {
                if ($_GET["numbercheck1"]==$_GET["numbercheck2"])
                {
                    if (empty($_GET["account"]) && empty($_GET["password"]))
                    {
                        echo "註冊帳號失敗";
                    }
                    else
                    {                              
                        $totalstr.="\r\n";
                        $totalstr.=$_GET["account"];
                        $totalstr.=" ";
                        $totalstr.=$_GET["password"];
                        $totalstr.=" ";
                        $totalstr.="0";
                        file_put_contents("user.data", $totalstr);
                        echo "註冊帳號成功";
                        echo "<br>";
                        echo "<a href='canvas2.php'>登入</a>";
                    }
                }
                else
                {
                    echo "驗證碼錯誤";
                }
            }
            else
            {
                    echo "未輸入驗證碼";
            }
        }
    }
    else
    {
        echo"發生錯誤";
    }
?>
<!-- 將分數上傳，並顯示成績 -->
<?php
    if (isset($_GET["account"])&&isset($_GET["score"]))
    {
        $CheckAccount=0;
        $totalstr=file_get_contents("user.data");
        $totalstr2=$totalstr;
        $userdata=explode("\n",$totalstr);
        for($i=0;$i<count($userdata);$i++)
        {
            $Mydata=explode(" ",$userdata[$i]);
            if ($Mydata[0]==$_GET["account"])
            { 
                $CheckAccount=1;
                $before=$Mydata[0]." ".$Mydata[1]." ".$Mydata[2];
                $after=$Mydata[0]." ".$Mydata[1]." ".$_GET["score"];
                $totalstr2=str_replace($before, $after, $totalstr2);
                if ($_GET["score"]>=$Mydata[2])
                    file_put_contents("user.data",$totalstr2);
                echo "紀錄上傳成功";
                echo "<br>";
                break;
            }
          
            
        }
        if ($CheckAccount==1)
        {
           echo "<a href='canvas2.php'>返回主畫面</a><br>";
        }
    }
    else
    {
        echo "發生錯誤";
    }

    ////////////////////
    if (isset($_GET["account"]))
    {
        $CheckAccount=0;
        $totalstr=file_get_contents("user.data");
        $totalstr2=$totalstr;
        $userdata=explode("\n",$totalstr);
        $arr[0]=0;
        for($i=0;$i<count($userdata);$i++)
        {
            $Mydata=explode(" ",$userdata[$i]);
            $arr[$i]=$Mydata[2];                
        } 
        echo "<font size='5'>";echo "<table border='1'>";
        for($i=1;$i<count($userdata);$i++)
        {   
            for($j=1;$j<count($userdata);$j++)
            {    
                $Mydata=explode(" ",$userdata[$i]);
                if ($Mydata[2]==$arr[$i])
                {    
                    
                    echo "<tr>";
                    if ($Mydata[0]==$_GET["account"])
                    {
                        echo "<td>";
                        echo "<mark>";
                        echo $Mydata[0];
                        echo "</mark>"; 
                        echo "</td>";
                        echo "<td>";
                        echo "<mark>";
                        echo $arr[$i];
                        echo "</mark>"; 
                        echo "</td>";                   
                        break;
                    }
                    else
                    {  
                        echo "<td>";
                        echo $Mydata[0];
                        echo "</td>";
                        echo "<td>";
                        echo $arr[$i];
                        echo "</td>"; 
                        break;
                    }
                    echo "</tr>";
                    
                }
            }
        }
        echo "</table";
    }
     echo "</font>";
   ///////////////////     
?>
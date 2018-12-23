<!-- 顯示所有玩家的成績 -->
<?php 
    echo "<a href='canvas2.php'>返回主畫面</a><br>";
    if (isset($_GET["account"]))
    {
        $CheckAccount=0;
        $totalstr=file_get_contents("user.data");
        $totalstr2=$totalstr;
        $userdata=explode("\n",$totalstr);
        $arr[0]=0;
        echo "<font size='5'>";
        echo "<table border='1'>";
        for($i=1;$i<count($userdata);$i++)
        {   
            for($j=1;$j<count($userdata);$j++)
            {    
                $Mydata=explode(" ",$userdata[$i]);
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
                    echo $Mydata[2];
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
                    echo $Mydata[2];
                    echo "</td>"; 
                    break;
                }
                echo "</tr>";
            }   
        }
        echo "</table";
        echo "</font>";
    }
    else
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
        echo "<br>";
        echo "<font size='5'>";
        for($i=1;$i<count($userdata);$i++)
        {   
            for($j=1;$j<count($userdata);$j++)
            {    
                $Mydata=explode(" ",$userdata[$j]);
    
                echo $Mydata[0];
                echo " ";
                echo $Mydata[2];
				echo "<br>";
                
            }
        }
        echo "</font>";
    }

?>
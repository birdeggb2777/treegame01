<?php 
            echo "<a href='canvas2.php'>返回主畫面</a>";
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
                echo "<br>";
                for($i=0;$i<count($userdata);$i++)
                {    
                    for($j=0;$j<count($userdata);$j++)
                    {
                        if ($arr[$i]>$arr[$j])
                        {  
                            $temp=$arr[$i];
                            $arr[$i]=$arr[$j];
                            $arr[$j]=$temp;
                        }
                    }
                }
                echo "<font size='5'>";
                for($i=1;$i<count($userdata);$i++)
                {   
                    for($j=1;$j<count($userdata);$j++)
                    {    
                        $Mydata=explode(" ",$userdata[$j]);
                        if ($Mydata[2]==$arr[$i])
                        {    
                            
                            if ($Mydata[0]==$_GET["account"])
                            {
                                echo "<mark>";
                                echo $i;
                                echo " ";
                                echo $Mydata[0];
                                echo " ";
                                echo $arr[$i];
                                echo "</mark>";
                            }
                            else
                            {   echo $i;
                                echo " ";
                                echo $Mydata[0];
                                echo " ";
                                echo $arr[$i];
                            }
                            echo "<br>";
                        }
                    }
                }
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
                    //echo "<br>";
                    //echo $before=$Mydata[0]." ".$Mydata[2];                  
                } 
                echo "<br>";
                for($i=0;$i<count($userdata);$i++)
                {    
                    for($j=0;$j<count($userdata);$j++)
                    {
                        if ($arr[$i]>$arr[$j])
                        {  
                            $temp=$arr[$i];
                            $arr[$i]=$arr[$j];
                            $arr[$j]=$temp;
                        }
                    }
                }
                echo "<font size='5'>";
                for($i=1;$i<count($userdata);$i++)
                {   
                    for($j=1;$j<count($userdata);$j++)
                    {    
                        $Mydata=explode(" ",$userdata[$j]);
                        if ($Mydata[2]==$arr[$i])
                        {    
                            echo $Mydata[0];
                            echo " ";
                            echo $arr[$i];
                            echo "<br>";
                        }
                    }
                }
                echo "</font>";
            }

        ?>
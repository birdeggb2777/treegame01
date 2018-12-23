<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <form method="GET" action="end.php">
            <input id="account" type="hidden" value=<?php echo $_GET["account"]; ?>>
    </form>   
        <canvas id="2dcanvas" width="600" height="600" style="display: block;margin: auto;">error</canvas>
        <audio id="bgm" src="bgm.mp3" type="audio/mp3" autoplay>
        </audio>
        <audio id="jump" src="jump.mp3" type="audio/mp3" autoplay>
        </audio>
        <audio id="jump2" src="jump.mp3" type="audio/mp3" autoplay>
        </audio>
        <script>
            var end1=0;
            var end2=0;
            var score1=0;
            var score2=0;
            var Now_Image=0;
            var canvas=document.getElementById("2dcanvas");
            var cxt=canvas.getContext("2d");  
            var My_X1=50;
            var My_Y1=550;
            var My_X2=500;
            var My_Y2=500;
            They_X=new Array();
            They_Y=new Array();
            They_X=[50,500,500,50,50
            ,500,500,50,50,50
            ,50,500,50,50,50
            ,50,500,50,500,50
            ,50,500,50,500,500,500
            ,50,500,500,500,500
            ,50,50,500,50,50
            ,50,500,500,50,50];
            They_Y=[50,-100,-200,-312,-350
            ,-420,-460,-512,-540,-590
            ,-620,-720,-820,-850,-890
            ,-1100,-1180,-1280,-1420,-1540
            ,-1660,-1740,-1880,-1990,-2150,-2190
            ,-2300,-2430,-2440,-2470,-2500
            ,-2700,-2800,-2930,-3000,-3030
            ,-3300,-3400,-3500,-3590,-3720];
            var They_Size=50;
            var My_Size=50;
            var MyStep1=20;
            var TheyStep1=5;
            var MyStep2=20;
            var TheyStep2=5;
            var Now_Two1=1;
            var Now_Two2=2;
            var WinOrLose=0;
            var MountainImage=new Image();
            MountainImage.src="mountain.png";
            var LeafImage1=new Image();
            LeafImage1.src="leaf1.png";
            var LeafImage2=new Image();
            LeafImage2.src="leaf2.png";
            var LoseImage=new Image();
            LoseImage.src="lose.png";
            var WinImage=new Image();
            WinImage.src="win.png";
            var MeImage1=new Image();
            MeImage1.src="me1.png";
            var MeImage2=new Image();
            MeImage2.src="me2.png";
            var TreeImage=new Image();
            TreeImage.src="tree.png";
            var treelocal=0;
            window.onload=function()
            {      
                DrawAll();
                
            };
            function DrawAll()
            {   
                if (WinOrLose==0)
                {
                    DrawMountain();
                    DrawMe();
                    DrawThey();
                    DrawTree();
                    //DrawText();
                }
            };
            //繪製背景
            function DrawMountain()
            {
                cxt.drawImage(MountainImage,0, 0,600,600);
            }
            //顯示分數
            function DrawText()
            {
                cxt.font='20pt Arial';
                cxt.fillStyle="#000000";
                cxt.fillText("2P Score",240,200);
                cxt.fillText(score1,270,240);
                cxt.fillText("1P Score",240,290);
                cxt.fillText(score2,270,320);
            }
            //畫樹木
            function DrawTree()
            {
                //cxt.fillStyle="#8F4040";
                //cxt.fillRect(0,0,50,600);
                //cxt.fillRect(550,0,50,600);
                treelocal+=5;
                if (treelocal>=600)
                    treelocal=0;
                cxt.drawImage(TreeImage,0, treelocal,50,600);
                cxt.drawImage(TreeImage,0, treelocal-600,50,600);
                cxt.drawImage(TreeImage,550, treelocal,50,600);
                cxt.drawImage(TreeImage,550, treelocal-600,50,600);

            }
            //清除畫面
            function AllClear()
            {
                cxt.clearRect(0,0,canvas.width,canvas.height);
            }
            //繪製自己
            function DrawMe()
            {
                cxt.fillStyle="#FFFF00";
                if (My_X1>300)
                    cxt.drawImage(MeImage1,My_X1, My_Y1,My_Size,My_Size);
                else
                    cxt.drawImage(MeImage2,My_X1, My_Y1,My_Size,My_Size);
                    
                if (My_X2>300)
                    cxt.drawImage(MeImage1,My_X2, My_Y2,My_Size,My_Size);
                else
                    cxt.drawImage(MeImage2,My_X2, My_Y2,My_Size,My_Size);
                
            }
            //畫樹葉
            function DrawThey()
            {
                cxt.fillStyle="#FF00FF";
                for(var i=0;i<They_X.length;i++)
                { 
                    if (They_X[i]>200)
                        cxt.drawImage(LeafImage1,They_X[i],They_Y[i] ,They_Size,They_Size);
                    else
                        cxt.drawImage(LeafImage2,They_X[i],They_Y[i] ,They_Size,They_Size);
                }
                
            }        
            //鍵盤事件    
            function keyDownHandler(evt)
            {               
                //top
                if (evt.keyCode==191&&Now_Two1==0)
                { 
                    bgm.play();
                    jump.volume = 0.5;     
                    jump.play(); 
                      
                    if (My_X1>=500)
                    {   
                        Now_Two1=2;
                    }
                    else if (My_X1<=50)
                    {
                        Now_Two1=1;                      
                    }
                }
                    

                if (evt.keyCode==90&&Now_Two2==0)
                { 
                    bgm.play();
                    jump2.volume = 0.5;     
                    jump2.play(); 
                      
                    if (My_X2>=500)
                    {   
                        Now_Two2=2;
                    }
                    else if (My_X2<=50)
                    {
                        Now_Two2=1;                      
                    }
                }
            };
            //碰撞偵測
            function hit()
            {
                for(var i=0;i<They_X.length;i++)
                {   
                    if (They_Y[i]>=500&&They_Y[i]<=600)
                    {  
                        if (My_X1>=They_X[i]&&My_X1<=They_X[i])
                        { 
                            //TheyStep1=0;
                            MyStep1=-2;
                            end1=1;
                            end();
                        }
                        if (My_X1+50>=They_X[i]&&My_X1+50<=They_X[i])
                        {
                            //////////////
                           // TheyStep1=0;
                            MyStep1=-2;
                            end1=1;
                            end();
                        }
                    }
                        ///////////////////////////

                    if (They_Y[i]>=450&&They_Y[i]<=550)
                    {  
                        if (My_X2>=They_X[i]&&My_X2<=They_X[i])
                        { 
                            //TheyStep1=0;
                            MyStep2=-2;
                            end2=1;
                            end();
                        }
                        if (My_X2+50>=They_X[i]&&My_X2+50<=They_X[i])
                        {
                            //////////////
                            //TheyStep1=0;
                            MyStep2=-2;
                            end2=1;
                            end();
                        }
                    }
                }
                // 你找找這五個是不是是都是必要的
                if (They_Y[They_X.length-1]>=600)
                {
                        
                    TheyStep1+=1;
                    MyStep1+=5;
                    if (WinOrLose==0) 
                    {
                        AllClear();
                            
                    }
                    for(var i=0;i<They_X.length;i++)
                    {   
                        They_Y[i]-=4350;
                    }
                }
                

                
            }
            //移動
            function MyMove()
            {
                if (end1==0)
                {
                    if (Now_Two1==1)
                    {
                        My_X1+=MyStep1;
                        if (My_X1>=500)
                        {
                            Now_Two1=0;
                            My_X1=500;
                        }
                    }
                    else if (Now_Two1==2)
                    {
                        My_X1-=MyStep1; 
                        if (My_X1<=50)
                        {
                            Now_Two1=0;
                            My_X1=50;
                        }                
                    }
                }
                if (end2==0)
                {
                    if (Now_Two2==1)
                    {
                        My_X2+=MyStep2;
                        if (My_X2>=500)
                        {
                            Now_Two2=0;
                            My_X2=500;
                        }
                    }
                    else if (Now_Two2==2)
                    {
                        My_X2-=MyStep2; 
                        if (My_X2<=50)
                        {
                            Now_Two2=0;
                            My_X2=50;
                        }                
                    }
                }
            }
            //葉子往下掉
            function down()
            {
                AllClear();
                for(var i=0;i<They_X.length;i++)
                {   
                    They_Y[i]+=TheyStep1;
                }
                if (end1==1)
                {
                    My_Y1+=4;                  
                }
                else
                {                
                  score1+=MyStep1;  
                }
                if (end2==1)
                {
                    My_Y2+=4;                  
                }
                else
                {                
                  score2+=MyStep2;  
                }
                DrawAll();
                
                
            }
            //重覆執行
            var fun1=setInterval(down,30);
            var fun2=setInterval(hit,30);
            var fun3=setInterval(MyMove,30);
            var doublecheck=0;
            //結束
            function end()
            {
                //取消執行
                if (end1==1&&end2==1&&doublecheck==0)
                {
                    doublecheck=1;
                    clearInterval(fun1);
                    clearInterval(fun2);
                    clearInterval(fun3);
                    DrawText();
                    bgm.muted=true;
                    var score=score1;
                    if (score<score2)
                        score=score2;
                    alert("您的分數為" +score);
                    window.location.replace("end.php"+"?account="+
                    account.value +
                    "&score="+score);
                }              
            }
            //註冊事件
            window.addEventListener('keydown',keyDownHandler,false);
        </script>
    </body>
</html>
<!-- 和善的使用者介面，作為遊戲的主畫面 -->
<html>
    <head></head>
    <style>
        html
        {
            background: url("mountain.png") no-repeat fixed;
            background-size: 100vw 100vh;
            width: 100vw;
            height: 100vh;
        }
        body
        {
            padding: 0px;
            margin: 0px;
            height: inherit;
            width: inherit;
        }
        #enter:hover{
            cursor: pointer;
        }
        #account,#password
        {
            width:350px;
            height:50px;
            font-size:30px;
        }
        #submitform
        {
            margin-top: calc(50vh - 320px / 2);
            text-align: center;
        }
    </style>
    <body>
        <form id="submitform" method="GET" action="create.php">
            <span style="font-size: 30px;">帳號</span>
            <input id="account" type="text" height="200">
            <br>
            <span style="font-size: 30px;">密碼</span>
            <input id="password" type="password" height="200">
            <br>
            <img src="enter.png" id="enter">
            <br>
            沒有帳號嗎?立即註冊新的帳戶
            <input type="submit" value="註冊">
        </form>     
    </body>
	<script>
		enter.onclick=function()
		{
			// window.open("gametest0011.html");
			window.location.replace("enter.php"+"?account="+account.value+"&password="+password.value);
		}
	</script>
</html>
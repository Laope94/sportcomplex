<body style="background-color: #4CAF50">

<div class="dark-form">
<form action="<?php echo site_url('admin/verify');?>" method="post">
    Login: <br>
    <input type="text" required name="login" style="color: black"><br><br>
    Heslo: <br>
    <input type="password" required name="pass" style="color: black"><br><br>
    <input type="submit" name="potvrd" value="Prihlásiť (sa)" style="color: black">
</form>
</div>
</body>
</html>
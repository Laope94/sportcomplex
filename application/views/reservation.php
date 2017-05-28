<body style="background-color: #4CAF50">
    <ul class="menu-area">
        <li class="menu-part-area"><a class="menu-link-area" href="<?php echo site_url('welcome/index') ?>">Domov</a></li>
    </ul>

<form action="<?php echo site_url('reservation/save_user');?>" method="post">
    <div class="dark-form">
        Víta vás sprievodca rezerváciou. Začnite tým, že vyplníte svoje údaje. <br><br>
    Meno:<br> <input type="text" name="name" required style="color: black"> <br> <br>
    Priezvisko:<br><input type="text" name="surname" required style="color: black"> <br><br>
    e-mail:<br> <input type="text" name="email" required value="@" style="color: black"><br><br>
    Telefón:<br> <input type="text" name="phone" required style="color: black"><br><br>
    <input type="submit" name="potvrd" value="Pokračovať" style="color: black">
    </div>
</form>

<body>
<body style="background-color: #4CAF50">
<ul class="menu-area">
    <li class="menu-part-area"><a class="menu-link-area" href="<?php echo site_url('welcome/index') ?>">Domov</a></li>
</ul>

<form action="<?php echo site_url('reservation/writeplace');?>" method="post">
    <div class="dark-form">
        Vyberte si čas a dĺžku rezervácie. <br>
        Rezervácia pre dátum <?php echo $date ?> <br> <br>
        Rezervované časy: <br>
        <?php
        foreach($query as $row){
            ?>
           <?php echo substr($row->start, -8,5); ?> - <?php echo substr($row->end, -8,5);?>
            <br>
        <?php }
        ?>
        <br>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="date" value="<?php echo $date ?>">
       Začiatok rezervácie: <br><input type="time" required name="start" min="06:00" max="23:00" value="06:00" step="3600" style="color: black"> <br><br>
       Koniec rezervácie: <br><input type="time" required name="end" min="07:00" max="23:00" value="07:00" step="3600" style="color: black"> <br><br>
        <input type="submit" name="potvrd" value="Pokračovať" style="color: black">
    </div>
</form>
<body>
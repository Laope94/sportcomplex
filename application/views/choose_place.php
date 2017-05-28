<body style="background-color: #4CAF50">
<ul class="menu-area">
    <li class="menu-part-area"><a class="menu-link-area" href="<?php echo site_url('welcome/index') ?>">Domov</a></li>
</ul>

<form action="<?php echo site_url('reservation/choose_time');?>" method="post">
    <div class="dark-form">
        Vyberte si športovisko a dátum rezervácie. Rezervovať je nutné najmenej tri dni dopredu <br><br>
        <?php
        foreach($query as $row){
            ?>
            <?php echo $row->id?>
            <input type="radio" required name="sport_place" value="<?php echo $row->id?>">
            <?php echo $row->name?> - <?php echo $row->sub_place?> - <?php echo $row->price_for_hour?> €/hodina
            <br>
      <?php }
      ?>
        <br>
        <?php $days = time()+(3*24*60*60);
        $date = date('Y-m-d', $days);?>
        Dátum: <input type="date" required name="datum" min="<?php echo $date;?>" value="<?php echo $date;?>" style="color:#000;"> <br><br>
        <input type="submit" name="potvrd" value="Pokračovať" style="color: black">
    </div>
</form>
<body>
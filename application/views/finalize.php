<body style="background-color: #4CAF50">
<ul class="menu-area">
    <li class="menu-part-area"><a class="menu-link-area" href="<?php echo site_url('welcome/index') ?>">Domov</a></li>
</ul>

    <div class="dark-form">
        Dokončenie rezervácie.<br><br>
            Meno: <?php echo $name ?> <br>
            Priezvisko: <?php echo $surname ?><br>
            Email: <?php echo $email ?><br>
            Telefónne číslo: <?php echo $phone ?><br><br>
            Športoviská k rezervácii<br>
            <div align="center">
            <table style="color: white; width: 100%;">
                <tr>
                    <th>Názov</th><th>Dátum</th><th>Od</th><th>Do</th><th>Cena</th><th></th>
                </tr>
            <?php foreach ($place_array as $i) {
                ?>
                <tr>

                <?php
                $temp = ${'place'.$i}; ?>
                    <td>
                <?php echo $temp['subplace']; ?>
                    </td>
                    <td>
                        <?php  echo substr($temp['start'],0,10); ?>
                    </td>
                    <td>
                        <?php  echo substr($temp['start'],-8,5); ?>
                    </td>
                    <td>
                        <?php  echo substr($temp['end'],-8,5); ?>
                    </td>
                    <td>
                        <?php  echo $temp['total']." €"; ?>
                    </td>
                <td>
                <form action="<?php echo site_url('reservation/delete');?>" method="post">
                <input type="hidden" name="delete" value="<?php echo $temp['id']?>">
                <input type="submit" name="potvrd" value="Zmazať" style="color:#000;">
            </form>
                </td>
                </tr>
            <?php } ?>
            </table>
            </div>
            <form action="<?php echo site_url('reservation/choose_place'); ?>" method="post">
                <input type="submit" name="potvrd" value="Ďalšia položka" style="color: black">
            </form>
            Vyberte formu platby: <br>
            <form action="<?php echo site_url('reservation/writeback'); ?>" method="post">
            <?php
            foreach($query as $row){
                ?>
                <input type="radio" required name="payment" value="<?php echo $row->id ?>"><?php echo $row->type?>


                <br>
            <?php
            }
            ?>
                <br><br>Poznámka:<br>
                <textarea cols="80" rows ="10" name="note" style="color: black; resize: none"> </textarea><br><br>
                <input type="submit" name="potvrd" value="Potvrdiť rezerváciu" style="color: black">
            </form>

    </div>
<body>
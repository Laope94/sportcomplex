<body>
<div class="container-fluid" style="padding-left:0px ">
    <div class="row" >
        <div class="col-sm-3">
            <div class="dark-bar">
                <h2>You are god now</h2>
                Top level data <br>
                <a href="<?php echo site_url('admin/show_places'); ?>">Športoviská</a> <br>
                <a href="<?php echo site_url('admin/show_subplaces'); ?>">Detail športoviska</a> <br>
                <a href="<?php echo site_url('admin/show_payments'); ?>">Metódy platby</a> <br> <br>
                Lower data <br>
                <a href="<?php echo site_url('admin/show_invoices'); ?>">Faktúry</a> <br>
                <a href="<?php echo site_url('admin/show_entries'); ?>">Položky na faktúre</a> <br><br>
                Stats<br>
                <a href="<?php echo site_url('admin/chart_payment');?>">Forma platby</a><br>
                <a href="<?php echo site_url('admin/chart_sport');?>">Obľúbené športoviská</a><br>
                <a href="<?php echo site_url('admin/chart_income');?>">Príjmy</a><br>
                <a href="<?php echo site_url('admin/chart_compare');?>">Otvorené faktúry</a><br><br>
                <a href="<?php echo site_url('welcome/index');?>">Hlavná strána</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="dash-content">
                <form action="<?php echo site_url('admin/commit_entry'); ?>" method="post">
                    Športovisko:
                    <select name="sport_place">
                        <?php foreach($places as $row) {?>
                            <option value="<?php echo $row->id ?>"
                            <?php if($row->id==$query->sub_place){ echo " selected ";} ?> >
                                <?php echo $row->sport_place; echo " - "; echo $row->sub_place;?></option>
                        <?php } ?>
                    </select>
                    ID faktúry:
                    <select name="invoice_id">
                        <?php foreach($invoice as $row) {?>
                            <option value="<?php echo $row->id?>"
                                <?php if($row->id==$query->invoice){ echo " selected ";} ?> ><?php echo $row->id?></option>
                        <?php } ?>
                    </select>
                    <br><br>Začiatok: <input type="datetime-local" required name="start" value="<?php echo str_replace(" ", "T", $query->start) ?>">
                    Koniec: <input type="datetime-local" required name="end" value="<?php echo str_replace(" ", "T", $query->end) ?>">
                    <input type="hidden" name="id" value="<?php echo $query->id ?>">
                    <input type="submit" name="potvrd" value="Upraviť">
                </form>
        </div>
    </div>
</div>
</body>
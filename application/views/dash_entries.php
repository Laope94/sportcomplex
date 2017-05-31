<body>
<div class="container-fluid" style="padding-left:0px">
    <div class="row">
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
                <div class="dash-add">
                    <h3>Pridať záznam</h3>
                <form action="<?php echo site_url('admin/entry_add'); ?>" method="post">
                    Športovisko:
                    <select name="sport_place">
                        <?php foreach($places as $row) {?>
                            <option value="<?php echo $row->id?>"><?php echo $row->sport_place; echo " - "; echo $row->sub_place;?></option>
                        <?php } ?>
                    </select>
                     ID faktúry:
                    <select name="invoice_id">
                        <?php foreach($invoice as $row) {?>
                            <option value="<?php echo $row->id?>"><?php echo $row->id?></option>
                        <?php } ?>
                    </select>
                    <br><br>Začiatok: <input type="datetime-local" required name="start">
                   Koniec: <input type="datetime-local" required name="end">
                   <input type="submit" name="potvrd" value="Pridať">
                </form>
                </div>
            <div class="dash-content">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>miesto</th>
                        <th>ID faktúry</th>
                        <th>rezervácia od</th>
                        <th>rezervácia do</th>
                        <th>akcia</th>
                    </tr>
                    <?php foreach ($query as $row) { ?>
                        <tr>
                            <td><?php echo $row->id ?> </td>
                            <td><?php echo $row->sport_place;
                                echo " - ";
                                echo $row->sub_place ?> </td>
                            <td><?php echo $row->invoice ?></td>
                            <td><?php echo $row->start ?></td>
                            <td><?php echo $row->finish ?></td>
                            <td>
                                <form action="<?php echo site_url('admin/entry_edit'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <input type="submit" name="potvrd" value="Upravit">
                                </form>
                                <form action="<?php echo site_url('admin/entry_delete'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <input type="submit" name="potvrd" value="Vymazať">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
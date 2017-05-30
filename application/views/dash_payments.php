<body>
<div class="container-fluid" style="padding-left:0px">
    <div class="row">
        <div class="col-sm-3" >
            <div class="dark-bar" >
                <h2>You are god now</h2>
                Top level data <br>
                <a href="<?php echo site_url('admin/show_places');?>">Športy</a> <br>
                <a href="<?php echo site_url('admin/show_subplaces');?>">Športoviská</a> <br>
                <a href="<?php echo site_url('admin/show_payments');?>">Metódy platby</a> <br> <br>
                Lower data <br>
                <a>Faktúry</a> <br>
                <a>Položky na faktúre</a> <br>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="dash-content">
                <form action="<?php echo site_url('admin/payment_add');?>" method="post">
                    <input type="text" required name="method">
                    <input type="submit" name="potvrd" value = "Pridať">
                </form>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>názov</th>
                        <th>Akcia</th>
                    </tr>
                    <?php foreach($query as $row) { ?>
                        <tr>
                            <td><?php echo $row->id ?> </td>
                            <td><?php echo $row->type ?> </td>
                            <td>
                                <form action="<?php echo site_url('admin/payment_edit');?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <input type="submit" name="potvrd" value="Upravit">
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
<?php

function checkChild($parentID, $conn) {
    //echo "SELECT * FROM `menu_items` where parent_id=" . $parentID;
    $smi = $conn->link->query("SELECT * FROM `menu_items` where parent_id=" . $parentID);
    $smi_rec = $smi->fetchAll(PDO::FETCH_ASSOC);
    if ($smi_rec == null)
        return 'FALSE';
    else
        return 'TRUE';
}
?> 
<div class="col-sm-2" id="vertical-header" style="margin: 0px;padding:0px;">
    <ul class="nav flex-column flex-nowrap overflow-hidden" style="min-height:675px;">

        <li class="nav-item"><a class="navbar-brand" href="#"><i class="fa fa-fw fa-dashboard"></i> Home</a></li>
        <?php
        $mi = $conn->link->query("SELECT * FROM `menu_items` where parent_id=0");
        $mi_rec = $mi->fetchAll(PDO::FETCH_ASSOC);
        $m = 1;
        foreach ($mi_rec as $mr) {
            if (checkChild($mr['item_id'], $conn) != 'TRUE') {
                ?>                
                <li class="nav-item">
                    <a class="nav-link collapsed text-truncate" href="<?= $mr['item_link'] ?>"><i class="fa fa-sign-out"></i> <span class="d-none d-sm-inline"><?= $mr['item_text'] ?></span></a>                            
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link collapsed text-truncate" href="<?= $mr['item_link'] ?>" data-toggle="collapse" data-target="#submenu<?= $m ?>"><i class="fa fa-gears"></i> <span class="d-none d-sm-inline"><?= $mr['item_text'] ?></span></a>
                    <div class="collapse" id="submenu<?= $m ?>" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <?php
                            //echo checkChild($mr['item_id'],$conn);

                            $smi = $conn->link->query("SELECT * FROM `menu_items` where parent_id=" . $mr['item_id']);
                            $smi_rec = $smi->fetchAll(PDO::FETCH_ASSOC);
                            $sm = 1;
                            foreach ($smi_rec as $smr) {
                                if (checkChild($smr['item_id'], $conn) != 'TRUE') {
                                    //echo "SELECT * FROM `menu_items` where parent_id=" . $mr['item_id'];
                                    ?>
                                    <li class="nav-item"><a class="nav-link py-0" href="<?= $smr['item_link'] ?>"><span>&#x203A; <?= $smr['item_text'] ?></span></a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed py-1" href="<?= $smr['item_link'] ?>" data-toggle="collapse" data-target="#submenu<?= $m ?>sub<?= $sm ?>"><span>&#x203A;  <?= $smr['item_text'] ?></span></a>
                                        <div class="collapse" id="submenu<?= $m ?>sub<?= $sm ?>" aria-expanded="false">
                                            <ul class="flex-column nav pl-4">
                                                <?php
                                                //echo "SELECT * FROM `menu_items` where parent_id=" . $smr['item_id'];
                                                $ssmi = $conn->link->query("SELECT * FROM `menu_items` where parent_id=" . $smr['item_id']);
                                                $ssmi_rec = $ssmi->fetchAll(PDO::FETCH_ASSOC);
                                                $ssm = 1;
                                                foreach ($ssmi_rec as $ssmr) {
                                                    if (checkChild($ssmr['item_id'], $conn) != 'TRUE') {
                                                        ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link p-1 horizontal" href="<?= $ssmr['item_link'] ?>">
                                                                &#x203A; <?= $ssmr['item_text'] ?> </a>
                                                        </li>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link collapsed py-1" href="<?= $ssmr['item_link'] ?>" data-toggle="collapse" data-target="#submenu<?= $m ?>sub<?= $sm ?>sub<?= $ssm ?>"><span>&#x203A;  <?= $ssmr['item_text'] ?></span></a>
                                                            <div class="collapse" id="submenu<?= $m ?>sub<?= $sm ?>sub<?= $ssm ?>" aria-expanded="false">
                                                                <ul class="flex-column nav pl-4">
                                                                    <?php
                                                                    $sssmi = $conn->link->query("SELECT * FROM `menu_items` where parent_id=" . $ssmr['item_id']);
                                                                    $sssmi_rec = $sssmi->fetchAll(PDO::FETCH_ASSOC);
                                                                    $sssm = 1;
                                                                    foreach ($sssmi_rec as $sssmr) {
                                                                        if (checkChild($sssmr['item_id'], $conn) != 'TRUE') {
                                                                            ?>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link p-1" href="<?= $sssmr['item_link'] ?>">
                                                                                    &#x203A; <?= $sssmr['item_text'] ?> </a>
                                                                            </li>
                                                                            <?php
                                                                        } else {
                                                                            ?>

                                                                            <?php
                                                                        }
                                                                    }
                                                                    $sssm++;
                                                                    ?>         
                                                                </ul>
                                                            </div>
                                                        </li>        
                                                        <?php
                                                    }
                                                }
                                                $ssm++;
                                                ?>         
                                            </ul>
                                        </div>
                                    </li>       
                                    <?php
                                }
                                $sm++;
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <?php
                $m++;
            }
        }
        ?>
    </ul>
</div>
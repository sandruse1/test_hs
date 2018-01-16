<?php
    require_once (ROOT.'/views/viewHeader.php');
?>
<div class="row">
    <div class="col-sm-3">
        <div class=" nav-side-menu">

            <div class="brand">Horoshop Test</div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out">

                </ul>
            </div>
        </div>
    </div>
    <div id="view_art" class="col-sm-8" style="margin-top: 10px; display: none">
        <div id="img_div" class=".col-md-3">

        </div>
        <div class=".col-md-3"  style="float:right;">
            <div class="thumbnail">
                <div id="name_price" class="">

                </div>
                <div id="sec_data" class="row">

                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Сharacteristic</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody id="tb_body">

                    </tbody>
                </table>

                <div class="space-ten"></div>
            </div>
        </div>

    </div>

</div>
<?php

    require_once (ROOT.'/views/viewFooter.php');
?>


<style>
    .hide{display: none;}
</style>
<div class="col-sm-2" id="vertical-header" style="margin: 0px;padding:0px;">
    <ul class="nav flex-column flex-nowrap overflow-hidden" style="min-height:675px;">
        <?php
        $mi = $conn->link->query("SELECT * FROM `menu_items` where parent_id=0");
        $mi_rec = $mi->fetch(PDO::FETCH_ASSOC);
        ?>
        <li class="nav-item"><a class="navbar-brand" href="#"><i class="fa fa-fw fa-dashboard"></i> Home</a></li>
        <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="#" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-gears"></i> <span class="d-none d-sm-inline">Administration</span></a>
            <div class="collapse" id="submenu1" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item <?= $_SESSION['tl_userid'] == 1 ? "" : "hide" ?>">
                        <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu1sub101"><span>&#x203A; License</span></a>
                        <div class="collapse" id="submenu1sub101" aria-expanded="false">
                            <ul class="flex-column nav pl-4">
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="./add-user-information.php">
                                        &#x203A; Add new customer </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu1sub102"><span>&#x203A; Users management</span></a>
                        <div class="collapse" id="submenu1sub102" aria-expanded="false">
                            <ul class="flex-column nav pl-4">
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="#">
                                        &#x203A; Add new user </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="javascript:void();">
                                        &#x203A;  Users management </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu1sub103"><span>&#x203A; Warehouse management</span></a>
                        <div class="collapse" id="submenu1sub103" aria-expanded="false">
                            <ul class="flex-column nav pl-4">
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="#">
                                        &#x203A; Manage the warehouse </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link py-0" href="#"><span>&#x203A; Units & tax administration</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="#"><span>&#x203A; Issuance of products</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="#"><span>&#x203A; Translations</span></a></li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu1sub1sub1"><span>&#x203A; Menu</span></a>
                        <div class="collapse" id="submenu1sub1sub1" aria-expanded="false">
                            <ul class="flex-column nav pl-4">
                                <li class="nav-item">
                                    <a class="nav-link p-1 horizontal" href="#">
                                        &#x203A; Horizontal </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-1 vertical" href="javascript:void();">
                                        &#x203A;  Vertical </a>
                                </li>
                            </ul>
                        </div>
                    </li>                                    
                </ul>
            </div>
        </li>
        <li class="nav-item <?= checkRights(8, $conn) == "true" || checkRights(9, $conn) == "true" ? "" : "hide" ?>">
            <a class="nav-link collapsed text-truncate" href="#" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-server"></i> <span class="d-none d-sm-inline">Customer database</span></a>
            <div class="collapse" id="submenu2" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item <?= checkRights(8, $conn) == "true" ? "" : "hide" ?>"><a class="nav-link py-0" href="./add-customer.php"><span>&#x203A; Add new customer</span></a></li>
                    <li class="nav-item <?= checkRights(9, $conn) == "true" ? "" : "hide" ?>"><a class="nav-link py-0" href="./view-customer.php"><span>&#x203A; View database</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="#" data-toggle="collapse" data-target="#submenu3"><i class="fa fa-tasks"></i> <span class="d-none d-sm-inline">Commodity database</span></a>
            <div class="collapse" id="submenu3" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link py-0" href="./add-product-information.php"><span>&#x203A; Add new product</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="./product-category.php"><span>&#x203A; Product category management</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="./view-product-information.php"><span>&#x203A; View database</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item <?= checkRights(4, $conn) == "true" || checkRights(5, $conn) == "true" ? "" : "hide" ?>">
            <a class="nav-link collapsed text-truncate" href="#" data-toggle="collapse" data-target="#submenu4"><i class="fa fa-building"></i> <span class="d-none d-sm-inline">Warehouse</span></a>
            <div class="collapse" id="submenu4" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item <?= checkRights(4, $conn) == "true" ? "" : "hide" ?>"><a class="nav-link py-0" href="./add-new-warehouse.php"><span>&#x203A; Add new warehouse</span></a></li>
                    <li class="nav-item <?= checkRights(5, $conn) == "true" ? "" : "hide" ?>"><a class="nav-link py-0" href="#"><span>&#x203A; Look at warehouses</span></a></li>
                </ul>
            </div>
        </li>   
        <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="#" data-toggle="collapse" data-target="#submenu5"><i class="fa fa-folder-open-o"></i> <span class="d-none d-sm-inline">Documents</span></a>
            <div class="collapse" id="submenu5" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu5sub1"><span>&#x203A; Order goods</span></a>
                        <div class="collapse" id="submenu5sub1" aria-expanded="false">
                            <ul class="flex-column nav pl-4">
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="./stockpilling.php">
                                        <i class="fa fa-plus-square-o"></i> Create new order </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="./view-stockpilling.php">
                                        <i class="fa fa-eye"></i>  View orders </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link py-0" href="./receiving_incoming_goods.php"><span>&#x203A; Arrival at the warehouse</span></a></li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu5sub2"><span>&#x203A; Movements between warehouses</span></a>
                        <div class="collapse" id="submenu5sub2" aria-expanded="false">
                            <ul class="flex-column nav pl-4">
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="#">
                                        &#x203A; Create new movement </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed py-1" href="#submenu5sub3" data-toggle="collapse" data-target="#submenu5sub3"><span>&#x203A; Out of stock</span></a>
                        <div class="collapse" id="submenu5sub3" aria-expanded="false">
                            <ul class="flex-column nav pl-4">
                                <li class="nav-item">
                                    <a class="nav-link collapsed py-1" href="#submenu5sub3sub1" data-toggle="collapse" data-target="#submenu5sub3sub1"><span>Orders</span></a>
                                    <div class="collapse" id="submenu5sub3sub1" aria-expanded="false">
                                        <ul class="flex-column nav pl-4">
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-plus-square-o"></i> Create new order </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-eye"></i>  View orders </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu5sub3sub2"><span>Prepayment orders</span></a>
                                    <div class="collapse" id="submenu5sub3sub2" aria-expanded="false">
                                        <ul class="flex-column nav pl-4">
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-plus-square-o"></i> Create new order </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-eye"></i>  View orders </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed py-1" href="#" data-toggle="collapse" data-target="#submenu5sub3sub3"><span>Bill of parcel</span></a>
                                    <div class="collapse" id="submenu5sub3sub3" aria-expanded="false">
                                        <ul class="flex-column nav pl-4">
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-plus-square-o"></i> Create new order </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-eye"></i>  View orders </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="#" data-toggle="collapse" data-target="#submenu6"><i class="fa fa-cart-arrow-down"></i> <span class="d-none d-sm-inline">Logistics</span></a>
            <div class="collapse" id="submenu6" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link py-0" href="#"><span>&#x203A; Create new distribution shipment</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="#"><span>&#x203A; View distribution plan</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="#" data-toggle="collapse" data-target="#submenu7"><i class="fa fa-database"></i> <span class="d-none d-sm-inline">Inventory</span></a>
            <div class="collapse" id="submenu7" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link py-0" href="#"><span><i class="fa fa-plus-square-o"></i> Create a new inventory</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="#"><span><i class="fa fa-eye"></i> View inventories</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="./logout.php"><i class="fa fa-sign-out"></i> <span class="d-none d-sm-inline">Logout</span></a>                            
        </li>
    </ul>
</div>
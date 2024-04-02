<div class="col-sm-12" id="horizontal-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><i class="fa fa-fw fa-dashboard"></i> <?= $lang['home'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-gears"></i> Administration
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">&#x203A; Users management</a></li>
                        <li><a class="dropdown-item" href="#">&#x203A; Translations</a></li>
                        <li><a class="dropdown-item" href="#">&#x203A; Unit management</a></li>
                        <li><a class="dropdown-item" href="#">&#x203A; Batch management</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">&#x203A; Menu</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item horizontal" href="javascript:void();">&#x203A; Horizontal</a></li>
                                <li><a class="dropdown-item vertical" href="javascript:void();">&#x203A; Vertical</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-server"></i> Customer database
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="./add-customer.php">&#x203A; Add new customer</a></li>
                        <li><a class="dropdown-item" href="./view-customer.php">&#x203A; View database</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-tasks"></i> Commodity database
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">&#x203A; Add new product</a></li>
                        <li><a class="dropdown-item" href="./product-category.php">&#x203A; Product category management</a></li>
                        <li><a class="dropdown-item" href="#">&#x203A; View database</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-building"></i> Warehouse
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="./add-new-warehouse.php">&#x203A; Add new warehouse</a></li>
                        <li><a class="dropdown-item" href="#">&#x203A; Look at warehouses</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-folder-open-o"></i> Documents
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">                                        
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">&#x203A; Order goods</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">&#x203A; Create new order</a></li>
                                <li><a class="dropdown-item" href="#">&#x203A; View orders</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">&#x203A; Arrival at the warehouse</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">&#x203A; Movements between warehouses</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">&#x203A; Create new movement</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">&#x203A; Out of stock</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">&#x203A; Order</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">&#x203A; Create new order</a></li>
                                        <li><a class="dropdown-item" href="#">&#x203A; View orders</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">&#x203A; Prepayment orders</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">&#x203A; Create new order</a></li>
                                        <li><a class="dropdown-item" href="#">&#x203A; View orders</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">&#x203A; Bill of parcel</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">&#x203A; Create new order</a></li>
                                        <li><a class="dropdown-item" href="#">&#x203A; View orders</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cart-arrow-down"></i> Logistics
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">&#x203A; Create new distribution shipment</a></li>
                        <li><a class="dropdown-item" href="#">&#x203A; View distribution plan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-database"></i> Inventory
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">&#x203A; Create a new inventory</a></li>
                        <li><a class="dropdown-item" href="#">&#x203A; View inventories</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>                    
</div>
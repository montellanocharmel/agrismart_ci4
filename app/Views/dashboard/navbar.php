<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href=""><img src="<?= base_url() ?>assets_landingpage/img/agrismart-logo.png" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">

        <li class="side_menu_title">
            <span>Dashboard</span>
        </li>
        <li>
        <li><a href="/dashboards" style="margin-left: 40px;">Dashboard</a></li>

        </li>
        <li class="side_menu_title">
            <span>Fields</span>
        </li>
        <li>
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="img/menu-icon/1.svg" alt>
                <span>Fields</span>
            </a>
            <ul>
                <li><a href="/viewfields">View Your Fields</a></li>
                <li><a href="/maps">View Map</a></li>
            </ul>
        </li>
        <li class="side_menu_title">
            <span>About Fields</span>
        </li>
        <li class>
        <li><a href="/cropplanting" style="margin-left: 40px;">Planting</a></li>
        <li><a href="/jobs" style="margin-left: 40px;">Jobs</a></li>
        <li><a href="/harvest" style="margin-left: 40px;">Harvest</a></li>
        </li>
        <li class="side_menu_title">
            <span>Data Analytics</span>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="img/menu-icon/4.svg" alt>
                <span>View Charts</span>
            </a>
            <ul>
                <li><a href="">Vegetation History</a></li>
                <li><a href="">Variety</a></li>
                <li><a href="">Field Yields</a></li>
                <li><a href="">Expenses</a></li>
            </ul>
        </li>
        <li class="side_menu_title">
            <span>My Farm</span>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="img/menu-icon/4.svg" alt>
                <span>My Profile</span>
            </a>
            <ul>
                <li><a href="/addprofile">Add Profile</a></li>
                <li><a href="">See Profile</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="img/menu-icon/4.svg" alt>
                <span>Inventory</span>
            </a>
            <ul>
                <li><a href="/workers">Workers</a></li>
                <li><a href="/cropvariety">Crop Variety</a></li>
                <li><a href="/fertilizers">Fertilizers</a></li>
                <li><a href="/otherexpenses">Other Expenses</a></li>
            </ul>
        </li>
    </ul>
</nav>
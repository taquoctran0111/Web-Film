<?php require_once('../header.php') ?>
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-film" aria-hidden="true" style="color: red"></i></span>
                    <span class="title">
                        <h2>Admin Flix</h2>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                    <span class="title">Customers</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-comments" aria-hidden="true"></i></span>
                    <span class="title">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                    <span class="title">Help</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                    <span class="title">Settings</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="title">Password</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <div class="topbar">
            <div class="toggle" onclick="toggleMenu()"></div>
            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </label>
            </div>
            <div class="user">
                <img src="../assets/images/avatar.jpg">
            </div>
        </div>
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,042</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="#" class = "btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Name</td>
                            <td>Name</td>
                            <td>Name</td>
                            <td>Name</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                        <tr>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                            <td>aaaaa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customer</h2>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <td><div class="imgBx"><img src="../assets/images/avatar.jpg"></div></td>
                            <td><h4>David</h4></td>
                        </tr>
                        <tr>
                            <td><div class="imgBx"><img src="../assets/images/avatar.jpg"></div></td>
                            <td><h4>David</h4></td>
                        </tr>
                        <tr>
                            <td><div class="imgBx"><img src="../assets/images/avatar.jpg"></div></td>
                            <td><h4>David</h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('../footer.php') ?>
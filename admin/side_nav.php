  <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Admin</h3>
                </div>

                <ul class="list-unstyled components">
                    <p><?php
                    // echo "<pre>";
                    // print_r($_SESSION);
                    // echo "</pre>";
                    $mail=$_SESSION['login_user'];
                     echo $mail;
                     ?></p>

                    <li class="active" >
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" style="background-color: #3d4a82;">Settings</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu" >
                            <li ><a href="profile">Profile</a></li>
                            <li><a href="../logout">Log-out</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="account">Manage Account</a>
                    </li>
                    <li>
                        <a href="product">Manage Product</a>
                    </li>
                    <li>
                        <a href="categories">Manage Categories</a>
                    </li>
                </ul>

                
            </nav>
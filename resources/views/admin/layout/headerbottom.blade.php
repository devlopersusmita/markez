 <div class="toolbar-v1 is-narrow">
                    <!-- Sidebar Trigger -->
                    <div class="friendkit-hamburger sidebar-v1-trigger">
                        <span class="menu-toggle has-chevron">
                                <span class="icon-box-toggle">
                                    <span class="rotate">
                                        <i class="icon-line-top"></i>
                                        <i class="icon-line-center"></i>
                                        <i class="icon-line-bottom"></i>
                                    </span>
                        </span>
                        </span>
                    </div>
                    <h1>Timeline</h1>
                    <div class="controls">
                        <div class="navbar-item is-icon drop-trigger">
                            <a class="icon-link is-friends" href="javascript:void(0);">
                                <i data-feather="heart"></i>
                                <span class="indicator"></span>
                            </a>

                            <div class="nav-drop is-right">
                                <div class="inner">
                                    <div class="nav-drop-header">
                                        <span>Friend requests</span>
                                        <a href="#">
                                            <i data-feather="search"></i>
                                        </a>
                                    </div>
                                    <div class="nav-drop-body is-friend-requests">
                                       
                                        <!-- Friend request -->
                                        <div class="media">
                                            <figure class="media-left">
                                                <p class="image">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="{{asset('assets/img/avatars/edward.jpeg')}}" alt="">
                                                </p>
                                            </figure>
                                            <div class="media-content">
                                                <span>You are now friends with <a href="#">Edward Mayers</a>. Check his <a href="#">profile</a>.</span>
                                            </div>
                                            <div class="media-right">
                                                <div class="added-icon">
                                                    <i data-feather="tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nav-drop-footer">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item is-icon drop-trigger">
                            <a class="icon-link" href="javascript:void(0);">
                                <i data-feather="bell"></i>
                                <span class="indicator"></span>
                            </a>

                            <div class="nav-drop is-right">
                                <div class="inner">
                                    <div class="nav-drop-header">
                                        <span>Notifications</span>
                                        <a href="#">
                                            <i data-feather="bell"></i>
                                        </a>
                                    </div>
                                    <div class="nav-drop-body is-notifications">
                                      
                                        <!-- Notification -->
                                        <div class="media">
                                            <figure class="media-left">
                                                <p class="image">
                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="{{asset('assets/img/avatars/elise.jpg')}}" alt="">
                                                </p>
                                            </figure>
                                            <div class="media-content">
                                                <span><a href="#">Elise Walker</a> shared an <a href="#">Image</a> with you an 2 other people.</span>
                                                <span class="time">2 days ago</span>
                                            </div>
                                            <div class="media-right">
                                                <div class="added-icon">
                                                    <i data-feather="image"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nav-drop-footer">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item is-icon drop-trigger">
                            <a class="icon-link is-active" href="javascript:void(0);">
                                <i data-feather="mail"></i>
                                <span class="indicator"></span>
                            </a>

                            <div class="nav-drop is-right">
                                <div class="inner">
                                    <div class="nav-drop-header">
                                        <span>Messages</span>
                                        <a href="">Inbox</a>
                                    </div>
                                    <div class="nav-drop-body is-friend-requests">
                                       
                                        <!-- Message -->
                                        <div class="media">
                                            <figure class="media-left">
                                                <p class="image">
                                                    <img src="https://via.placeholder.com/150x150" data-demo-src="{{asset('assets/img/avatars/dan.jpg')}}" data-user-popover="1" alt="">
                                                </p>
                                            </figure>
                                            <div class="media-content">
                                                <a href="#">Dan Walker</a>
                                                <span>Hey there, would it be possible to borrow your bicycle, i really need...</span>
                                                <span class="time">Jun 03 2018</span>
                                            </div>
                                            <div class="media-right is-centered">
                                                <div class="added-icon">
                                                    <i data-feather="message-square"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nav-drop-footer">
                                        <a href="#">Clear All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item is-cart">
                            <div class="cart-button">
                                <i data-feather="shopping-cart"></i>
                                <div class="cart-count">
                                </div>
                            </div>

                            <!-- Cart dropdown -->
                            <div class="shopping-cart">
                                <div class="cart-inner">

                                    <!--Loader-->
                                    <div class="navbar-cart-loader is-active">
                                        <div class="loader is-loading"></div>
                                    </div>

                                    <div class="shopping-cart-header">
                                        <a href="" class="cart-link">View Cart</a>
                                        <div class="shopping-cart-total">
                                            <span class="lighter-text">Total:</span>
                                            <span class="main-color-text">$193.00</span>
                                        </div>
                                    </div>
                                    <!--end shopping-cart-header -->

                                    <ul class="shopping-cart-items">
                                       

                                        <li class="cart-row">
                                            <img src="assets/img/products/4.svg" alt="" />
                                            <span class="item-meta">
                                                    <span class="item-name">Cool Backpack</span>
                                            <span class="meta-info">
                                                        <span class="item-price">$125.00</span>
                                            <span class="item-quantity">Qty: 01</span>
                                            </span>
                                            </span>
                                        </li>
                                    </ul>

                                    <a href="#" class="button primary-button is-raised">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <div id="account-dropdown" class="navbar-item is-account drop-trigger has-caret">
                            <div class="user-image">
                                <img src="https://via.placeholder.com/400x400" data-demo-src="{{asset('assets/img/avatars/jenna.png')}}" alt="">
                                <span class="indicator"></span>
                            </div>

                            <div class="nav-drop is-account-dropdown">
                                <div class="inner">
                                    <div class="nav-drop-header">
                                        <span class="username">Jenna Davis</span>
                                        <label class="theme-toggle">
                                            <input type="checkbox">
                                            <span class="toggler">
                                                    <span class="dark">
                                                        <i data-feather="moon"></i>
                                                    </span>
                                            <span class="light">
                                                        <i data-feather="sun"></i>
                                                    </span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="nav-drop-body account-items">
                                        <a id="profile-link" href="" class="account-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="image">
                                                        <img src="https://via.placeholder.com/400x400" data-demo-src="{{asset('assets/img/avatars/jenna.png')}}" alt="">
                                                    </div>
                                                </div>
                                                <div class="media-content">
                                                    <h3>Jenna Davis</h3>
                                                    <small>Main account</small>
                                                </div>
                                                <div class="media-right">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </a>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
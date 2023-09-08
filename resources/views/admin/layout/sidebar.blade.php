<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="{{route('admin')}}" class="brand-link">

      <img src="{{URL::asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light">Markez</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

          <img src="{{URL::asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">

        </div>

        <div class="info">

          <a href="{{route('admin')}}" class="d-block">Admin Panel</a>

        </div>

      </div>



      <!-- SidebarSearch Form -->

      <div class="form-inline">

        <div class="input-group" data-widget="sidebar-search">

          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">

          <div class="input-group-append">

            <button class="btn btn-sidebar">

              <i class="fas fa-search fa-fw"></i>

            </button>

          </div>

        </div>

      </div>



      <!-- Sidebar Menu -->

      <nav class="mt-2">

       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item <?php if(\Request::route()->getName() == 'category'){echo 'menu-is-opening menu-open';}?>">
              <a href="#" class="nav-link <?php if(\Request::route()->getName() == 'category'){echo 'active';}?>">

                  <i class="fa fa-address-book" aria-hidden="true"></i>
                  <p>
                      Category Management
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('category')}}"  class="nav-link <?php if(\Request::route()->getName() == 'category'){echo 'active';}?>">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Category</p>
                      </a>
                  </li>

              </ul>
           </li>

           <li class="nav-item <?php if(\Request::route()->getName() == 'enquiry'){echo 'menu-is-opening menu-open';}?>">
              <a href="#" class="nav-link <?php if(\Request::route()->getName() == 'enquiry'){echo 'active';}?>">

                  <i class="fa fa-address-book" aria-hidden="true"></i>
                  <p>
                      Enquiry Management
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('enquiry')}}"  class="nav-link <?php if(\Request::route()->getName() == 'enquiry'){echo 'active';}?>">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Contact Us</p>
                      </a>
                  </li>

              </ul>
           </li>

           <!-- start institution -->

           <li class="nav-item  <?php if(\Request::route()->getName() == 'admininstitution'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link  <?php if(\Request::route()->getName() == 'course'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Institution Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admininstitution')}}" class="nav-link  <?php if(\Request::route()->getName() == 'admininstitution'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Institution</p>
                    </a>
                </li>

            </ul>

         </li>
           <!-- end institution -->

            <!-- start institution teacher  -->

            <li class="nav-item  <?php if(\Request::route()->getName() == 'adminteacherstatus'){echo 'menu-is-opening menu-open';}?>">
                <a href="#" class="nav-link  <?php if(\Request::route()->getName() == 'adminteacherstatus'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Institution Teacher Approved and Rejected
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('adminteacherstatus')}}" class="nav-link  <?php if(\Request::route()->getName() == 'adminteacherstatus'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>  Institution Teacher Approved</p>
                    </a>
                </li>

            </ul>

        </li>
           <!-- end institution teacher  -->



              <!-- start student teacher request -->

        <li class="nav-item  <?php if(\Request::route()->getName() == 'sendrequest'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link  <?php if(\Request::route()->getName() == 'course'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Student Teacher Request
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('sendrequest')}}" class="nav-link  <?php if(\Request::route()->getName() == 'sendrequest'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Student Teacher Request</p>
                    </a>
                </li>

            </ul>

        </li>
           <!-- end student teacher request -->

            <li class="nav-item <?php if(in_array(\Request::route()->getName(),['student','teacher','institution'])){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link <?php if(in_array(\Request::route()->getName(),['student','teacher','institution'])){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     User Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('student')}}" class="nav-link <?php if(\Request::route()->getName() == 'student'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('teacher')}}" class="nav-link <?php if(\Request::route()->getName() == 'teacher'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Teacher</p>
                    </a>
                </li>


            </ul>

         </li>

            <li class="nav-item <?php if(in_array(\Request::route()->getName(),['institution_teacher_need_approval','institution_teacher_approved'])){echo 'menu-is-opening menu-open';}?>">
              <a href="#" class="nav-link <?php if(in_array(\Request::route()->getName(),['institution_teacher_need_approval','institution_teacher_approved'])){echo 'active';}?>">

                  <i class="fa fa-address-book" aria-hidden="true"></i>
                  <p>
                      Institution Teacher
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('institution_teacher_need_approval')}}"  class="nav-link <?php if(\Request::route()->getName() == 'institution_teacher_need_approval'){echo 'active';}?>">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Need Approval</p>
                      </a>
                  </li>
                   <li class="nav-item">
                      <a href="{{route('institution_teacher_approved')}}"  class="nav-link <?php if(\Request::route()->getName() == 'institution_teacher_approved'){echo 'active';}?>">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Approved</p>
                      </a>
                  </li>

              </ul>
           </li>

           <li class="nav-item  <?php if(\Request::route()->getName() == 'order'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link <?php if(\Request::route()->getName() == 'order'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Order Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('order')}}" class="nav-link <?php if(\Request::route()->getName() == 'order'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Order</p>
                    </a>
                </li>

            </ul>

         </li>
         <li class="nav-item  <?php if(\Request::route()->getName() == 'course'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link  <?php if(\Request::route()->getName() == 'course'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Course Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('course')}}" class="nav-link  <?php if(\Request::route()->getName() == 'course'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Course</p>
                    </a>
                </li>

            </ul>

         </li>
         <li class="nav-item  <?php if((\Request::route()->getName() == 'institutionsubcriptionpackage') || (\Request::route()->getName() == 'institution_subscription_order')){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link  <?php if(\Request::route()->getName() == 'institutionsubcriptionpackage'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Institution Subscription Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('institutionsubcriptionpackage')}}" class="nav-link  <?php if(\Request::route()->getName() == 'institutionsubcriptionpackage'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Package</p>
                    </a>
                </li>
                <li class="nav-item">
                <li class="nav-item">
                    <a href="{{route('institution_subscription_order')}}" class="nav-link <?php if(\Request::route()->getName() == 'institution_subscription_order'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Order</p>
                    </a>
                </li>

                </li>

            </ul>

         </li>
         <li class="nav-item <?php if(\Request::route()->getName() == 'studentpayment'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link <?php if(\Request::route()->getName() == 'studentpayment'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Student Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('studentpayment')}}" class="nav-link <?php if(\Request::route()->getName() == 'studentpayment'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student</p>
                    </a>
                </li>

            </ul>

         </li>
         <li class="nav-item <?php if(\Request::route()->getName() == 'cms'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link <?php if(\Request::route()->getName() == 'cms'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Cms Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('cms')}}" class="nav-link <?php if(\Request::route()->getName() == 'cms'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cms</p>
                    </a>
                </li>

            </ul>

         </li>
         <li class="nav-item <?php if(\Request::route()->getName() == 'faq'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link <?php if(\Request::route()->getName() == 'faq'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     FAQ Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('faq')}}" class="nav-link <?php if(\Request::route()->getName() == 'faq'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>FAQ</p>
                    </a>
                </li>

            </ul>

         </li>
         <li class="nav-item <?php if(\Request::route()->getName() == 'adminform'){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link <?php if(\Request::route()->getName() == 'adminform'){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Form Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('adminform')}}" class="nav-link <?php if(\Request::route()->getName() == 'adminform'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Form</p>
                    </a>
                </li>

            </ul>

         </li>

           <li class="nav-item <?php if(in_array(\Request::route()->getName(),['company','system'])){echo 'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link <?php if(in_array(\Request::route()->getName(),['company','system'])){echo 'active';}?>">

                <i class="fa fa-address-book" aria-hidden="true"></i>
                <p>
                     Settings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('company')}}" class="nav-link <?php if(\Request::route()->getName() == 'company'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Company Settings</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('system')}}" class="nav-link  <?php if(\Request::route()->getName() == 'system'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>System Settings</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('adminhomesetting')}}" class="nav-link  <?php if(\Request::route()->getName() == 'adminhomesetting'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Banner Settings</p>
                    </a>
                </li>

            </ul>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('termsandcondition')}}" class="nav-link  <?php if(\Request::route()->getName() == 'termsandcondition'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Terms and Condition</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('privacypolicy')}}" class="nav-link  <?php if(\Request::route()->getName() == 'privacypolicy'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Privacy Policy</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('aboutus')}}" class="nav-link  <?php if(\Request::route()->getName() == 'aboutus'){echo 'active';}?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>About Us</p>
                    </a>
                </li>

            </ul>
         </li>





         </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>


<div class="left-menu">
    <div class="left-menu-inner">
        <div class="menu-item {{ (\Request::route()->getName() == 'teacherprofile') ? 'is-active' : '' }}" data-content="overview-content">
            <div class="menu-icon">
               <a href="{{route('teacherprofile',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
                <span><i class="mdi mdi-note"></i> Profile</span></a>
            </div>
        </div>

        <div class="menu-item {{ (\Request::route()->getName() == 'courseassignlist') ? 'is-active' : '' }}"
        data-content="personal-content">

            <div class="menu-icon">
                <a href="{{route('courseassignlist',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']]) }}">
               <span><i class="mdi mdi-school"></i>Courses Request</span></a>
            </div>
        </div>
        <div class="menu-item {{ (\Request::route()->getName() == 'teachercourse') ? 'is-active' : '' }}" data-content="personal-content">
            <div class="menu-icon">
                <a href="{{route('teachercourse',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
               <span><i class="mdi mdi-school"></i>Course</span></a>
            </div>
        </div>



            <!--START Institution management -->
            <!-- <div class="menu-item drop-menu"    data-content="personal-content">
            <div class="menu-icon">

               <span><i class="mdi mdi-school"></i>Institution Mangement</span>

            </div>
            <div class="sub-menu {{ ((\Request::route()->getName() == 'institutionview') || (\Request::route()->getName() == 'institutioninvitation')) ? 'is-active' : '' }}"
                style="display:{{ ((\Request::route()->getName() == 'institutionview')|| (\Request::route()->getName() == 'institutioninvitation')) ? 'block' : '' }}"
                >
                <a class="{{ (\Request::route()->getName() == 'institutionview') ? 'submenu-active' : '' }}" href="{{ route('institutionview') }}">
                    <span><i class="mdi mdi-school ml-6"></i>Institution Page</span>
                </a>
                <a class="{{ (\Request::route()->getName() == 'institutioninvitation') ? 'submenu-active' : '' }}" href="{{ route('institutioninvitation') }}">
                    <span><i class="mdi mdi-school ml-6"></i>Institutions Invition</span>
                </a>

            </div>
        </div> -->
        <!-- END Institution management -->

         <div class="menu-item {{ (\Request::route()->getName() == 'teacherstudent') ? 'is-active' : '' }}" data-content="personal-content">
            <div class="menu-icon">
                <a href="{{route('teacherstudent',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
               <span><i class="mdi mdi-school"></i>Student</span></a>
            </div>
        </div>
        <div class="menu-item {{ (\Request::route()->getName() == 'teachermessage') ? 'is-active' : '' }}" data-content="personal-content">
            <div class="menu-icon">
                <a href="{{route('teachermessage',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
               <span><i class="mdi mdi-school"></i>Message</span></a>
            </div>
        </div>


    </div>
</div>

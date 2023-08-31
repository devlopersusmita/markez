<div class="left-menu">
    <div class="left-menu-inner">
        <div class="menu-item {{ (\Request::route()->getName() == 'profile') ? 'is-active' : '' }}" data-content="overview-content">
            <div class="menu-icon">
               <a href="{{route('profile',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
                <span><i class="mdi mdi-note"></i> Profile</span></a>
            </div>
        </div>
         <div class="menu-item {{ (\Request::route()->getName() == 'studentcourse') ? 'is-active' : '' }}" data-content="personal-content">
            <div class="menu-icon">
                <a href="{{route('studentcourse',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
               <span><i class="mdi mdi-school"></i>Course</span></a>
            </div>
        </div>

        <div class="menu-item {{ (\Request::route()->getName() == 'studentteacher') ? 'is-active' : '' }}" data-content="personal-content">
            <div class="menu-icon">
                <a href="{{route('studentteacher',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
               <span><i class="mdi mdi-school"></i>Teacher</span></a>
            </div>
        </div>
        <div class="menu-item {{ (\Request::route()->getName() == 'studentinstitution') ? 'is-active' : '' }}" data-content="personal-content">
            <div class="menu-icon">
                <a href="{{route('studentinstitution',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
               <span><i class="mdi mdi-school"></i>Institution</span></a>
            </div>
        </div>
        <div class="menu-item {{ (\Request::route()->getName() == 'studentorder') ? 'is-active' : '' }}" data-content="personal-content">
            <div class="menu-icon">
                <a href="{{route('studentorder',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']])}}">
               <span><i class="mdi mdi-school"></i>Order</span></a>
            </div>
        </div>
        <div class="menu-item drop-menu"   data-content="personal-content">
            <div class="menu-icon">
                <span><i class="mdi mdi-school"></i>Message</span>
            </div>
            <div class="sub-menu {{ ((\Request::route()->getName() == 'studentmessage') || (\Request::route()->getName() == 'studentmessageinstitution')) ? 'is-active' : '' }}"
                style="display:{{ ((\Request::route()->getName() == 'studentmessage') || (\Request::route()->getName() == 'studentmessageinstitution')) ? 'block' : '' }}"
                >
                <a class="{{ (\Request::route()->getName() == 'studentmessage') ? 'submenu-active' : '' }}" href="{{ route('studentmessage',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']]) }}">
                    <span><i class="mdi mdi-school ml-6"></i>Teacher</span>
                </a>
                <a class="{{ (\Request::route()->getName() == 'studentmessageinstitution') ? 'submenu-active' : '' }}" href="{{ route('studentmessageinstitution',['institution_id' => $_GET['institution_id'],'user_id' => $_GET['user_id']]) }}">
                    <span><i class="mdi mdi-school ml-6"></i>Institution</span>
                </a>
            </div>
        </div>


    </div>
</div>

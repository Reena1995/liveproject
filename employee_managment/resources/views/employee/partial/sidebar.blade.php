
<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo" src="{{asset('console/assets/img/logo.svg')}}" width="40" alt="hci Logo" />
        <span class="admin-brand-content"><a href="index.html"> hci</a></span>
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">   
            <!--list item begins-->
            <li class="menu-item" >
                <a href="{{route('admin.dashboard')}}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Dashboard </span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-view-dashboard"></i>
                    </span>
                </a>
            </li>
            <!--list item ends-->

            

            <!--list item employee  module  begins-->
            <li class="menu-item">
                <a href="javascript:void(0);" class="open-dropdown menu-link {{ Request::is('employee/*') ? 'subtab-active' : '' }}">
                    <span class="menu-label">
                        <span class="menu-name">
                        Employee
                            <span class="menu-arrow"></span>
                        </span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi  mdi-account-group"></i>
                    </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu" style="display: {{ Request::is('employee/*')   ? 'block' : 'none' }};">
                    <li class="menu-item  {{ Request::url() == route('employee.create') ? 'opened' : '' }}" >
                        <!--list item department  module  start-->
                           
                            <li class="menu-item {{ Request::is('employee/list') ? 'opened' : '' }}">
                                <a href="{{route('employeeview.show')}}" class="sub-menu-link menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                        view  employee 
                                            <!-- <span class="menu-arrow"></span> -->
                                        </span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi  mdi-account-group"></i>
                                    </span>
                                </a>
                            </li>    
                        <!--list item department  module  end-->
                    </li>
                </ul>
            </li>            
            <!--list item employee  module ends-->
        </ul>
        <!-- Menu List Ends-->
    </div>
</aside>
       
       
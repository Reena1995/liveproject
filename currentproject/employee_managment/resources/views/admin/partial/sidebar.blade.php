
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

            <!--list item Masters  module  begins-->
            <li class="menu-item">
                <a href="javascript:void(0);" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">
                        Masters
                            <span class="menu-arrow"></span>
                        </span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi  mdi-account-group"></i>
                    </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu" style="display: {{ Request::is('department/*') || Request::is('designation/*') || Request::is('organization-role/*') || Request::is('company-location/*')  || Request::is('company-location-type/*')  || Request::is('medium-instruction-type/*')  || Request::is('language/*')  || Request::is('education-level/*')  || Request::is('document-type/*')  || Request::is('asset-brand/*')  || Request::is('asset-type/*')  || Request::is('asset-sub-type/*')  || Request::is('current-residence-type/*')  || Request::is('mode-of-transportation/*') || Request::is('leave-type/*')  ? 'block' : 'none' }};">
                    <li class="menu-item  {{ Request::url() == route('department.create') ? 'opened' : '' }}" >
                            <!--list item department  module  start-->
                            <li class="menu-item {{ Request::is('department/list') || Request::is('department/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                            Department
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder mdi  mdi-account-group"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('department/*') ? 'block' : 'none' }};">
                                        <li class="menu-item  {{ Request::is('department/add') ? 'opened' : '' }}" >
                                                <a href="{{route('department.create')}}"   class="menu-link">
                                                    <span class="menu-label">
                                                        <span class="menu-name">Add Department</span>
                                                    </span>
                                                    <span class="menu-icon">
                                                        <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                    </span>
                                                </a>
                                        </li>
                                        
                                        <li class="menu-item  {{ Request::is('department/list') ? 'opened' : '' }}">
                                            <a href="{{route('department.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Departments</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            <!--list item department  module  end-->

                            <!--list item designation  module  start-->
                                <li class="menu-item {{ Request::is('designation/list') || Request::is('designation/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                            designation
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder mdi  mdi-account-group"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul desi" style="display:{{ Request::is('designation/*') ? 'block' : 'none' }};">
                                        <li class="menu-item  {{ Request::is('designation/add') ? 'opened' : '' }}" >
                                                <a href="{{route('designation.create')}}"   class="menu-link">
                                                    <span class="menu-label">
                                                        <span class="menu-name">Add Designation</span>
                                                    </span>
                                                    <span class="menu-icon">
                                                        <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                    </span>
                                                </a>
                                        </li>
                                        
                                        <li class="menu-item  {{ Request::is('designation/list') ? 'opened' : '' }}">
                                            <a href="{{route('designation.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Designations</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            <!--list item designation  module  end-->

                            <!--list item Role organization  module  begins-->
                                <li class="menu-item {{ Request::is('organization-role/list') || Request::is('organization-role/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                            Organization Role
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder mdi mdi-account-check"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('organization-role/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::is('organization-role/add') ? 'opened' : '' }} ">
                                                <a href="{{route('organization_role.create')}}"   class="menu-link">
                                                    <span class="menu-label">
                                                        <span class="menu-name">Add Organization Role</span>
                                                    </span>
                                                    <span class="menu-icon">
                                                        <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                    </span>
                                                </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::is('organization-role/list ') ? 'opened' : '' }}">
                                            <a href="{{route('organization_role.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Organization Roles</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            <!--list item Role organization  module  end-->

                            <!--list item company location module  begins-->
                                <li class="menu-item {{ Request::is('company-location/list') || Request::is('company-location/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Location 
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder   fa fa-map-marker"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('company-location/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('company_location.create') ? 'opened' : '' }}">
                                                <a href="{{route('company_location.create')}}"   class="menu-link">
                                                    <span class="menu-label">
                                                        <span class="menu-name">Add Location</span>
                                                    </span>
                                                    <span class="menu-icon">
                                                        <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                    </span>
                                                </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('company_location.index') ? 'opened' : '' }}">
                                            <a href="{{route('company_location.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Locations</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item company location  module ends-->

                            <!--list item company location Type module  begins-->
                                <li class="menu-item {{ Request::is('company-location-type/list') || Request::is('company-location-type/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Location Type
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder  mdi mdi-account-network"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('company-location-type/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('company_location_type.create') ? 'opened' : '' }}">
                                            <a href="{{route('company_location_type.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Location Type</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('company_location_type.index') ? 'opened' : '' }}">
                                            <a href="{{route('company_location_type.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Location Types</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item company location Type  module ends-->
            
                            <!--list item medium of instruction module  begins-->
                                <li class="menu-item {{ Request::is('medium-instruction-type/list') || Request::is('medium-instruction-type/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Medium 
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder fa fa-book"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('medium-instruction-type/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('medium_instruction.create') ? 'opened' : '' }}">
                                            <a href="{{route('medium_instruction.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Medium </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('medium_instruction.index') ? 'opened' : '' }}">
                                            <a href="{{route('medium_instruction.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Mediums </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item  medium of instruction  module ends-->

            
                            <!--list item Language module  begins-->
                                <li class="menu-item {{ Request::is('language/list') || Request::is('language/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Language
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder fa fa-language"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('language/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('language.create') ? 'opened' : '' }}">
                                            <a href="{{route('language.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Language</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('language.index') ? 'opened' : '' }}">
                                            <a href="{{route('language.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View   Languages</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item  Language  module ends-->

                            <!--list item Education Level module  begins-->
                                <li class="menu-item {{ Request::is('education-level/list') || Request::is('education-level/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Education Level
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder fa fa-graduation-cap"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('education-level/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('education_level.create') ? 'opened' : '' }}">
                                            <a href="{{route('education_level.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Education Level</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder fa fa-graduation-cap"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('education_level.index') ? 'opened' : '' }}">
                                            <a href="{{route('education_level.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View   Education Levels</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item Education Level  module ends-->

                            <!--list item Document Type module  begins-->
                                <li class="menu-item {{ Request::is('document-type/list') || Request::is('document-type/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Document Type
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder fa fa-file-pdf-o"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('document-type/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('document_type.create') ? 'opened' : '' }}">
                                            <a href="{{route('document_type.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Document Type</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('document_type.index') ? 'opened' : '' }}">
                                            <a href="{{route('document_type.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Document Types</span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item Document Type  module ends-->

                            <!--list item Asset Brand module  begins-->
                                <li class="menu-item {{ Request::is('asset-brand/list') || Request::is('asset-brand/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                    Asset Brand 
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder mdi mdi-crown"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('asset-brand/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('asset_brand.create') ? 'opened' : '' }}">
                                            <a href="{{route('asset_brand.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Asset Brand </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('asset_brand.index') ? 'opened' : '' }}">
                                            <a href="{{route('asset_brand.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Asset Brands </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item Asset Brand  module ends-->

                            <!--list item Asset Type module  begins-->
                                <li class="menu-item {{ Request::is('asset-type/list') || Request::is('asset-type/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                    Asset Type 
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder mdi mdi-responsive"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('asset-type/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('asset_type.create') ? 'opened' : '' }}">
                                            <a href="{{route('asset_type.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Asset Type </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('asset_type.index') ? 'opened' : '' }}">
                                            <a href="{{route('asset_type.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Asset Types </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item Asset Type  module ends-->

                            <!--list item    Asset Sub Type  module  begins-->
                                <li class="menu-item {{ Request::is('asset-sub-type/list') || Request::is('asset-sub-type/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                    Asset Sub Type 
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder fa fa-keyboard-o"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('asset-sub-type/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('asset_sub_type.create') ? 'opened' : '' }}">
                                            <a href="{{route('asset_sub_type.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Asset Sub Type </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-account-plus"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('asset_sub_type.index') ? 'opened' : '' }}">
                                            <a href="{{route('asset_sub_type.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Asset Sub Types </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item    Asset Sub Type   module ends-->

                            <!--list item    Current Residence Type  module  begins-->
                                <li class="menu-item {{ Request::is('current-residence-type/list') || Request::is('current-residence-type/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Residence Type 
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder fa fa-home"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('current-residence-type/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('current_residence_type.create') ? 'opened' : '' }}">
                                            <a href="{{route('current_residence_type.create')}}"   class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">Add Residence Type </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder fa fa-home"></i>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('current_residence_type.index') ? 'opened' : '' }}">
                                            <a href="{{route('current_residence_type.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Residence Types </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item    current Residence Type   module ends-->

                            <!--list item    mode Of Transportation  module  begins-->
                                <li class="menu-item {{ Request::is('mode-of-transportation/list') || Request::is('mode-of-transportation/*')? 'opened' : '' }}">
                                    <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                        <span class="menu-label">
                                            <span class="menu-name">
                                                Transportation 
                                                <span class="menu-arrow"></span>
                                            </span>
                                        </span>
                                        <span class="menu-icon">
                                            <i class="icon-placeholder fa fa-taxi"></i>
                                        </span>
                                    </a>
                                    <!--submenu-->
                                    <ul class="sub-menu-ul" style="display: {{ Request::is('mode-of-transportation/*') ? 'block' : 'none' }};">
                                        <li class="menu-item {{ Request::url() == route('mode_of_transportation.create') ? 'opened' : '' }}">
                                                <a href="{{route('mode_of_transportation.create')}}"   class="menu-link">
                                                    <span class="menu-label">
                                                        <span class="menu-name">Add Transportation </span>
                                                    </span>
                                                    <span class="menu-icon">
                                                        <i class="icon-placeholder fa fa-taxi"></i>
                                                    </span>
                                                </a>
                                        </li>
                                        
                                        <li class="menu-item {{ Request::url() == route('mode_of_transportation.index') ? 'opened' : '' }}">
                                            <a href="{{route('mode_of_transportation.index')}}" class="menu-link">
                                                <span class="menu-label">
                                                    <span class="menu-name">View Transportations </span>
                                                </span>
                                                <span class="menu-icon">
                                                    <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!--list item    mode Of Transportation   module ends-->

                            <!--list item    Leave Type  module  begins-->
                            <li class="menu-item {{ Request::is('mode-of-transportation/list') || Request::is('mode-of-transportation/*')? 'opened' : '' }}">
                                <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                            Transportation
                                            <span class="menu-arrow"></span>
                                        </span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder fa fa-taxi"></i>
                                    </span>
                                </a>
                                <!--submenu-->
                                <ul class="sub-menu-ul" style="display: {{ Request::is('mode-of-transportation/*') ? 'block' : 'none' }};">
                                    <li class="menu-item {{ Request::url() == route('mode_of_transportation.create') ? 'opened' : '' }}">
                                        <a href="{{route('mode_of_transportation.create')}}" class="menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Add Transportation </span>
                                            </span>
                                            <span class="menu-icon">
                                                <i class="icon-placeholder fa fa-taxi"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ Request::is('leave-type/list') || Request::is('leave-type/*')? 'opened' : '' }}">
                                        <a href="javascript:void(0);" class="sub-menu-link menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">
                                                    Leave Type
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </span>
                                            <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-calendar"></i>
                                            </span>
                                        </a>
                                        <!--submenu-->
                                        <ul class="sub-menu-ul" style="display: {{ Request::is('leave-type/*') ? 'block' : 'none' }};">
                                            <li class="menu-item {{ Request::url() == route('leave_type.create') ? 'opened' : '' }}">
                                                <a href="{{route('leave_type.create')}}" class="menu-link">
                                                    <span class="menu-label">
                                                        <span class="menu-name">Add Leave Type </span>
                                                    </span>
                                                    <span class="menu-icon">
                                                        <i class="icon-placeholder mdi mdi-calendar-text"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="menu-item {{ Request::url() == route('leave_type.index') ? 'opened' : '' }}">
                                                <a href="{{route('leave_type.index')}}" class="menu-link">
                                                    <span class="menu-label">
                                                        <span class="menu-name">View Leave Types </span>
                                                    </span>
                                                    <span class="menu-icon">
                                                        <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="menu-item {{ Request::url() == route('mode_of_transportation.index') ? 'opened' : '' }}">
                                        <a href="{{route('mode_of_transportation.index')}}" class="menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">View Transportations </span>
                                            </span>
                                            <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--list item    Leave Type   module ends-->
                    </li>
                </ul>
            </li>
            <!--list item Masters  module ends-->

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
                            <li class="menu-item {{ Request::is('employee/add') ? 'opened' : '' }}">
                                <a href="{{route('employee.create')}}" class="sub-menu-link menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                        Add employee
                                            <!-- <span class="menu-arrow"></span> -->
                                        </span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi  mdi-account-group"></i>
                                    </span>
                                </a>
                                
                            </li>
                            <li class="menu-item {{ Request::is('employee/list') ? 'opened' : '' }}">
                                <a href="{{route('employee.index')}}" class="sub-menu-link menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                        view  employees
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
       
       
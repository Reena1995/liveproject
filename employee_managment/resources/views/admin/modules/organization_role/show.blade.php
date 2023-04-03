@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Show Organization Role</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Show Organization Role Details</div>
                                </div>
                                <form id="organization_role_show" action="" name="organization_role_show_form"  method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Organization Role Name</label>
                                                <input type="text" id="organization_role_name" value="{{$org_role->name}}"  name="organization_role_name"  class="form-control form-control-lg" placeholder="Enter organization role" readonly/>
                                               
                                            </div>
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Deaprtment Name</label>
                                                <input type="text" id="ename" type="text" value="{{ $org_role->department->name ?? ''}}" class="form-control form-control-lg"  readonly/>
                                            </div>
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Designation Name</label>
                                                <input type="text" id="ename" type="text" value="{{ $org_role->designation->name ?? ''}}" class="form-control form-control-lg"  readonly/>           
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('organization_role.index')}}" class="theme-btn text-white">cancel
                                                            </a>
                                                    </div>
                                                   
                                                </div>
                                
                                    </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PLACE PAGE CONTENT HERE -->
            </section>
        
       	@endsection
 @push('scripts')
   
 @endpush

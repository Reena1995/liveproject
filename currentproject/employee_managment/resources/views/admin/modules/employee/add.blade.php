@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Create a New Employee</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Add Employee Details</div>
                                </div>
                                <form id="employee_register" action="{{route('employee.add')}}" name="employee__add_form" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>First Name</label>
                                                <input type="text" id="first_name_id" name="first_name"  class="form-control form-control-lg" placeholder="Enter First Name" />
                                                
                                                @if ($errors->has('first_name'))
                                                    <span class="errr-validation">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Last Name</label>
                                                <input type="text" id="last_name_id" name="last_name"  class="form-control form-control-lg" placeholder="Enter Last Name" />
                                               
                                                @if ($errors->has('last_name'))
                                                    <span class="errr-validation">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group floating-label show-label  col-lg-6 col-md-6 col-sm-12">
                                                <label>Company Email Id</label>
                                                <input type="email" id="company_mail_id" name="company_mail"  class="form-control form-control-lg" placeholder="Enter Email Id" />
                                                
                                                @if ($errors->has('company_mail'))
                                                    <span class="errr-validation">{{ $errors->first('company_mail') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group floating-label show-label  col-lg-6 col-md-6 col-sm-12">
                                                <label>Mobile No</label>
                                                <input type="text" id="mobile_no_id" name="mobile_no"  class="form-control form-control-lg" placeholder="Enter Mobile No" />
                                                
                                                @if ($errors->has('mobile_no'))
                                                    <span class="errr-validation">{{ $errors->first('mobile_no') }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('employee.index')}}" class="theme-btn-outline">cancel
                                                            </a>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <button type="submit"  value="submit" name="submit" class="theme-btn text-white">Save</button>
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

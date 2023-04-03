@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Edit Organization Role</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Edit Organization Role Details</div>
                                </div>
                                <form id="organization_role_edit" action="{{route('organization_role.update',$org_role->uuid)}}" name="organization_role_edit_form"  method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Organization Role Name</label>
                                                <input type="text" id="organization_role_name"  name="organization_role_name"   value="{{$org_role->name}}"  class="form-control form-control-lg" placeholder="Enter organization role" />
                                                <span class="error"></span>
                                                @if ($errors->has('organization_role_name'))
                                                    <span class="errr-validation">{{ $errors->first('organization_role_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">

                                                            <label>Select Deaprtment</label>
                                                            <select class="form-control" name="department_id"  id="department_id">
                                                                <option selected value="">Choose...</option>
                                                                @foreach($department as $dept)
                                                                    @if($dept->id == $org_role->department_id)
                                                                        <option value="{{$dept->id}}" selected>{{$dept->name}} </option>
                                                                    @else    
                                                                        <option value="{{$dept->id}}">{{$dept->name}} </option>
                                                                    @endif    
                                                                @endforeach
                                                            </select>
                                                            
                                                            @if ($errors->has('department_id'))
                                                                <span class="errr-validation">{{ $errors->first('department_id') }}</span>
                                                            @endif
                                            </div>
                                            <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">

                                                            <label>Select Designation</label>
                                                            <select class="form-control" name="designation_id"  id="designation_id">
                                                                <option selected value="">Choose...</option>
                                                                @foreach($designation as $desi)
                                                                    @if($desi->id == $org_role->designation_id)
                                                                        <option value="{{$desi->id}}" selected>{{$desi->name}} </option>
                                                                    @else    
                                                                        <option value="{{$desi->id}}">{{$desi->name}} </option>
                                                                    @endif    
                                                                @endforeach
                                                            </select>
                                                        
                                                            @if ($errors->has('designation_id'))
                                                                <span class="errr-validation">{{ $errors->first('designation_id') }}</span>
                                                            @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('organization_role.index')}}" class="theme-btn-outline">cancel
                                                            </a>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <button type="submit"  value="submit" name="submit"class="theme-btn text-white">Save</button>
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
    <script>
        $(document).ready(function(){
            $("form[name='organization_role_edit_form']").validate({
                rules : {
                    organization_role_name : "required",  
                    department_id : "required", 
                    designation_id : "required",                    
                },
                messages : {
                    organization_role_name : "Please Enter a Organization Role",
                    department_id : "Please Select a Department ",  
                    designation_id : "Please Select a Designation", 
                    
                },
                errorClass: "custom-error",
                errorElement: "div",
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(element).append(error)
                    } else {
                        console.log(element.prev());
                        error.insertAfter(element);
                    }
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
        });
    </script>      
 @endpush

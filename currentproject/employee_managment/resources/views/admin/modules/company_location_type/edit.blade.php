@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Edit Company Location Type</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Edit Company Location Type Name</div>
                                </div>
                                <form id="company_location_type_edit"  action="{{route('company_location_type.update',$location_type->uuid)}}" name="company_location_type_edit_form" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Location Type</label>
                                                <input type="text" id="location_type_name" name="location_type_name"  value="{{$location_type->type}}" class="form-control form-control-lg" placeholder="Enter Location Type" />
                                                <span class="error"></span>
                                                @if ($errors->has('location_type_name'))
                                                    <span class="errr-validation">{{ $errors->first('location_type_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('company_location_type.index')}}" class="theme-btn-outline">cancel
                                                            </a>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <button type="submit"  value="submit" name="submit"class="theme-btn text-white">Save</button>
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
            $("form[name='company_location_type_edit_form']").validate({
                rules : {
                    location_type_name : "required",                    
                },
                messages : {
                    location_type_name : "Please Enter a Location Type",
                    
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
        });
</script>        
 @endpush

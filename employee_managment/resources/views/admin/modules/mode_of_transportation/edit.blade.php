@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Edit Mode Of Transportation</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Edit  Mode Of Transportation Name</div>
                                </div>
                                <form id="mode_of_transportation_edit"  action="{{route('mode_of_transportation.update',$modetype->uuid)}}" name="mode_of_transportation_edit_form" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Mode Of Transportation Name</label>
                                                <input type="text" id="mode_of_transportation_name" name="mode_of_transportation_name" value="{{$modetype->type}}"  class="form-control form-control-lg" placeholder="Enter Mode of Transportation" />
                                                <span class="error"></span>
                                                @if ($errors->has('mode_of_transportation_name'))
                                                    <span class="errr-validation">{{ $errors->first('mode_of_transportation_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('mode_of_transportation.index')}}" class="theme-btn-outline">cancel
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
            $("form[name='mode_of_transportation_edit_form']").validate({
                rules : {
                    mode_of_transportation_name : "required",                    
                },
                messages : {
                    mode_of_transportation_name : "Please Enter a Mode of Transportation",
                    
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
        });
</script>        
 @endpush

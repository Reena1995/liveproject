@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Add Education Level</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Add Education Level Name</div>
                                </div>
                                <form id="education_level_add"  action="{{route('education_level.add')}}" name="education_level_add_form" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Education Level  Name</label>
                                                <input type="text" id="education_level_name" name="education_level_name"  class="form-control form-control-lg" placeholder="Enter Education Level" />
                                                <span class="error"></span>
                                                @if ($errors->has('education_level_name'))
                                                    <span class="errr-validation">{{ $errors->first('education_level_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('education_level.index')}}" class="theme-btn-outline">cancel
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
            $("form[name='education_level_add_form']").validate({
                rules : {
                    education_level_name : "required",                    
                },
                messages : {
                    education_level_name : "Please Enter a Education Level",
                    
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
        });
</script>        
 @endpush

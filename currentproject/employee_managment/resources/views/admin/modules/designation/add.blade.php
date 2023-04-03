@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Add Designation</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Add Designation Details</div>
                                </div>
                                <form id="designation_add" action="{{route('designation.add')}}" name="designation_add_form" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Designation Name</label>
                                                <input type="text" id="designation_name" name="designation_name"  class="form-control form-control-lg" placeholder="Enter Designation" />
                                                <span class="error"></span>
                                                @if ($errors->has('designation_name'))
                                                    <span class="errr-validation">{{ $errors->first('designation_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group floating-label show-label  col-lg-6 col-md-6 col-sm-12">
                                                <label>Select Department</label>
                                                <select class="form-control" name="department_id"  id="department_id">
                                                        <option selected value="">Choose...</option>
                                                            @foreach($department as $dept)
                                                                    <option value="{{$dept->id}}">{{$dept->name}} </option>
                                                            @endforeach
                                                </select>
                                                <span class="error"></span>
                                                @if ($errors->has('department_id'))
                                                    <span class="errr-validation">{{ $errors->first('department_id') }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('designation.index')}}" class="theme-btn-outline">cancel
                                                            </a>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
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
 <script>
       $(document).ready(function(){
            $("form[name='designation_add_form']").validate({
                rules : {
                    designation_name : "required",  
                    department_id : "required",                    
                },
                messages : {
                    designation_name : "Please Enter a Designation ",
                    department_id : "Please Select  a Department ",  
                    
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

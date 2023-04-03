@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Edit  Asset Sub Type</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Edit  Asset Sub Type Details</div>
                                </div>
                                <form id="asset_sub_type_edit" action="{{route('asset_sub_type.update',$ass_sub_type->uuid)}}" name="asset_sub_type_edit_form" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Asset Sub Type</label>
                                                <input type="text" id="asset_sub_type_name" name="asset_sub_type_name" value="{{$ass_sub_type->type}}"  class="form-control form-control-lg" placeholder="Enter asset sub type" />
                                                <span class="error"></span>
                                                @if ($errors->has('asset_sub_type_name'))
                                                    <span class="errr-validation">{{ $errors->first('asset_sub_type_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Select Asset type</label>
                                                    <select class="form-control" name="asset_type_id"  id="asset_type_id">
                                                        <option selected value="">Choose...</option>
                                                        @foreach($ass_type as $ass)
                                                            @if($ass->id == $ass_sub_type->asset_type_id)
                                                                    <option value="{{$ass->id}}" selected>{{$ass->type}} </option>
                                                            @else    
                                                                     <option value="{{$ass->id}}">{{$ass->type}} </option>
                                                            @endif    
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('asset_type_id'))
                                                        <span class="errr-validation">{{ $errors->first('asset_type_id') }}</span>
                                                    @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('asset_sub_type.index')}}" class="theme-btn-outline">cancel
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
            $("form[name='asset_sub_type_edit_form']").validate({
                rules : {
                    asset_sub_type_name : "required",  
                    asset_type_id : "required",                    
                },
                messages : {
                    asset_sub_type_name : "Please Enter an asset sub type ",
                    asset_type_id : "Please select an asset type",  
                    
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

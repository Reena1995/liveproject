@extends('admin.common.master')
@section('content')
<section class="admin-content">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <!--  container or container-fluid as per your need           -->
                <div class="container-fluid p-t-20">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 m-b-20">
                            <h3>Add Asset Brand</h3>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-12 m-b-30">
                            <!--card begins-->
                            <div class="card m-b-30 add-cards" >
                                <div class="card-header">
                                    <div class="card-title">Add Asset Brand Name</div>
                                </div>
                                <form id="asset_brand_add" name="asset_brand_add_form" action="{{route('asset_brand.add')}}" method="post" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="card-body">    
                                        <div class="form-row row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Asset Brand Name</label>
                                                <input type="text" id="asset_brand" name="asset_brand"  class="form-control form-control-lg" placeholder="Enter asset brand " />
                                                <span class="error"></span>
                                                @if ($errors->has('asset_brand'))
                                                    <span class="errr-validation">{{ $errors->first('asset_brand') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-t-20 text-right">
                                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                        <a href="{{route('asset_brand.index')}}" class="theme-btn-outline">cancel
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
            $("form[name='asset_brand_add_form']").validate({
                rules : {
                    asset_brand : {
                        required:true,
                       
                    },                    
                },
                messages : {
                    asset_brand : "Please Enter an Asset Brand",
                    
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
        });
    </script>      
 @endpush

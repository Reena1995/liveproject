@extends('admin.common.master')
@section('content')


        <section class="admin-content">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <!--  container or container-fluid as per your need           -->
            <div class="container-fluid p-t-20">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 m-b-20">
                        <h3>Company Location Type</h3>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-lg-12 m-b-30">
                        <!--card begins-->
                        <div class="card m-b-0">
                            <div class="card-header">
                                <div class="card-title">Company Location Types List</div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row justify-content-end">
                                    <div class="col-lg-4 col-md-6 col-sm-12 searchlook text-right">               
                                        <!-- <input  type="search" id="search" class="search" name="search" placeholder="search here....."size="30" />
                                        <br> -->
                                        <form action="" method="GET" role="search">
                                            <div class="input-group hover-input">
                                                <input type="text" class="form-control" name="search"
                                                    placeholder="search here....." value="{{ Request::input('search') ?? ''}}" > <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default search-btn">
                                                        <span class=""><i class="fa fa-search" aria-hidden="true"></i></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive-sm">
                                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom"
                                                id="company_location_type">
                                                <thead>
                                                    <tr>
                                                    <th class="border-bottom-0 w-5">No</th>
                                                    <th class="border-bottom-0 w-5">Company Location Type Name</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablebody">
                                                @if(!empty($location_type) && $location_type->count())
                                                    @foreach($location_type as  $index => $loctype)
                                                        <tr>
                                                            <td>{{$location_type->firstItem() + $index}}</td>
                                                            <td>{{$loctype->type}}</td>
                                                            <td>
                                                                <a class="btn btn-primary btn-icon btn-sm text-white" href="{{route('company_location_type.show',$loctype->uuid)}}" >
                                                                    <i class="mdi mdi-eye" data-toggle="tooltip" data-original-title="view"></i>
                                                                </a>
                                                            
                                                                <a class="btn btn-primary btn-icon btn-sm text-white" href="{{route('company_location_type.edit',$loctype->uuid)}}" >
                                                                    <i class="mdi mdi-pen" data-toggle="tooltip"
                                                                        data-original-title="Edit"></i>
                                                                </a>
                                                                <a class="btn btn-danger btn-icon btn-sm text-white" href="{{route('company_location_type.status',$loctype->uuid)}}" 
                                                                    data-toggle="tooltip" data-original-title="Delete"><i
                                                                        class="mdi mdi-delete"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3" class="emptydata">There is no Data</td>
                                                    </tr>        
                                                @endif    
                                                </tbody>
                                            </table>
                                            <div class="row align-items-center">
                                                <div class="col-6">showing {{$location_type->firstItem()}} - {{$location_type->lastitem()}} of  {{$location_type->total()}}</div>
                                                <div class="col-6"> 
                                                    <div class="custom-pagination">
                                                            {{$location_type->links()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--card ends-->
                    </div>
                </div>
            </div>
            <!-- END PLACE PAGE CONTENT HERE -->
        </section>
    </main>
    
   @endsection
   @push('scripts')
    <script>
	/*page own datatable serching jsstart*/
        // $(document).ready(function () {
        //     $("#listholiday").DataTable();
        //     $(".dropdown-select2").select2();
        //     $(".theme-date-picker").datepicker();
        // });
	/*page own datatable serching js end*/	

    /*key press searching in ajax start */
   
    /*key press searching in ajax end */
		
    </script>
	 
	@endpush


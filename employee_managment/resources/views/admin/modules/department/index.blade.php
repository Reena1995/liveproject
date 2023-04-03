@extends('admin.common.master')
@section('content')


        <section class="admin-content">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <!--  container or container-fluid as per your need           -->
            <div class="container-fluid p-t-20">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 m-b-20">
                        <h3>Departments</h3>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-lg-12 m-b-30">
                        <!--card begins-->
                        <div class="card m-b-0">
                            <div class="card-header">
                                <div class="card-title">Departments List</div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row justify-content-end">
                               
                                    <div class="col-lg-4 col-md-6 col-sm-12 searchlook text-right">               
                                       
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
                                                id="departmentlist">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0 w-5">No</th>
                                                        <th class="border-bottom-0 w-5">Department_Name</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablebody">
                                                @if(!empty($department) && $department->count())
                                                    @foreach($department as $index => $dep)
                                                    
                                                        <tr>
                                                            <td>{{ $department->firstItem() + $index}}</td>
                                                            <td>{{$dep->name}}</td>
                                                            <td>
                                                                <a class="btn btn-primary btn-icon btn-sm text-white" href="{{route('department.show',$dep->uuid)}}" >
                                                                    <i class="mdi mdi-eye" data-toggle="tooltip" data-original-title="view"></i>
                                                                </a>
                                                            
                                                                <a class="btn btn-primary btn-icon btn-sm text-white" href="{{route('department.edit',$dep->uuid)}}" >
                                                                    <i class="mdi mdi-pen" data-toggle="tooltip"
                                                                        data-original-title="Edit"></i>
                                                                </a>
                                                                <a class="btn btn-danger btn-icon btn-sm text-white" href="{{route('department.status',$dep->uuid)}}" 
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
                                            	
			                                <div class="row align-items-center" id="pagination_id">
                                                <div class="col-6">showing {{$department->firstItem()}} - {{$department->lastitem()}} of  {{$department->total()}}</div>
                                                <div class="col-6"> 
                                                    <div class="custom-pagination">
                                                    {{$department->appends($_GET)->links()}}
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
    // $('document').ready(function (){

    //     $('#search').on('keyup',function(){

    //         $value= $(this).val();
    //         console.log($value);
    //         $('#pagination_id').html('Demo text');
            
    //         $.ajax({

    //             url:"{{route('department.index')}}",
    //             data:{'xxx':$value},
    //             success:function(yyy){
    //                 // console.log(yyy);
    //                 var department= yyy.department.data;
    //                 var html= '';
    //                 if(department.length > 0)
    //                 {
    //                     for(let i=0 ; i < department.length ; i++){
    //                         var id = department[i]['uuid'];
    //                         html +='<tr>';
    //                             html +='<td>'+(+i + +1)+'</td>';
    //                             html +='<td>'+department[i]['name']+'</td>';
    //                             html +='<td>';
    //                                 html +='<a class="btn btn-primary btn-icon btn-sm text-white showw" href="'+app_url+'/department/show/'+id+'" >';
    //                                     html +='<i class="mdi mdi-eye" data-toggle="tooltip" data-original-title="view"></i>';
    //                                 html +='</a>';
                                    
    //                                 html +='<a class="btn btn-primary btn-icon btn-sm text-white editt" href="'+app_url+'/department/edit/'+id+'" >';
    //                                     html +='<i class="mdi mdi-pen" data-toggle="tooltip" data-original-title="Edit"></i>';
    //                                 html +='</a>';
    //                                 html +='<a class="btn btn-danger btn-icon btn-sm text-white statuss" href="'+app_url+'/department/status/'+id+'" data-toggle="tooltip" data-original-title="Delete">';
    //                                     html +='<i class="mdi mdi-delete"></i>';
    //                                 html +='</a>';
    //                             html +='</td>'; 
    //                         html +='</tr>';
    //                     }
    //                 }
    //                 else{

    //                     html +='<tr>\
    //                                 <td colspan="3"> Data Not Found <td>\
    //                             </tr>';

    //                 }

    //                 $('#tablebody').html(html);
    //             }
    //         });

    //     });
    // });
    /*key press searching in ajax end */

    /* laravle searching start*/ 
    // $('document').ready(function (){

    //     $('#search').on('keyup',function(){

    //     $value= $(this).val();
    //     console.log($value);
    //     $('#pagination_id').html('');

    //     });
    // });    
    /* laravle searching end*/  
		
    </script>

	 
	@endpush


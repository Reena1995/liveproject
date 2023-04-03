

<form  id="emp_proessional_add"  name="emp_proessional_add" action="{{route('professional.professional.add')}}"  method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">

            <div id="emp_prof_add">

                @if(count($emp_professional_details))
                
                    @foreach($emp_professional_details as $professional)

                            <div class="card education mt-3 profeadd">
                    
                                <div class="card-body " >
                
                                        <div class="form-row">
                                    
                                            <input type="hidden" name="professional_uuid[]" value="{{$professional->uuid}}">

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Name Of The Institute</label>
                                                <input type="text" value = "{{ $professional->name_of_institute }}" name="name_of_institute[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('name_of_institute[]'))
                                                        <span class="errr-validation">{{ $errors->first('name_of_institute[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>To</label>
                                                <input type="date" name="to[]"  value = "{{ $professional->to }}"  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                                @if ($errors->has('to[]'))
                                                    <span class="errr-validation">{{ $errors->first('to[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>From</label>
                                                <input type="date" value = "{{ $professional->from}}" name="from[]"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('from[]'))
                                                        <span class="errr-validation">{{ $errors->first('from[]') }}</span>
                                                @endif
                                            </div>

                                           
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Address</label>
                                                <textarea  class="form-control form-control-lg"  name="address[]" cols="30" placeholder="Enter Details Of disaility">{{ $professional->address}}</textarea>
                                                @if ($errors->has('address[]'))
                                                    <span class="errr-validation">{{ $errors->first('address[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Description</label>
                                                <textarea  class="form-control form-control-lg"  name="description[]" cols="30" placeholder="Enter Details Of disaility">{{ $professional->description}}</textarea>
                                                @if ($errors->has('description[]'))
                                                    <span class="errr-validation">{{ $errors->first('description[]') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                @if(empty($professional))
                                                    <lable >Certificate</lable>
                                                    <input type="file" name="certificate_pdf[]" class=" form-control form-control-lg">
                                                @else
                                                    <lable >Certificate</lable>
                                                    <input type="file" name="certificate_pdf[]" class=" form-control form-control-lg">
                                                    <div class="imageset mt-4 m-4">
                                                            <img src="{{asset('console/upload/employee/profession_training/'.$professional->certificate_pdf)}}" height="120px" width="100px"> 
                                                    </div>   
                                                @endif
                                            </div>

                                            @if ($errors->has('certificate_pdf[]'))
                                                    <span class="errr-validation">{{ $errors->first('certificate_pdf[]') }}</span>
                                            @endif

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                            </div>

                                        
                                        </div> 
                                </div>   
                            </div>
                    @endforeach

                    <!-- @if(!empty(session()->getOldinput()['name_of_institute']))
                            @foreach(session()->getOldinput()['name_of_institute'] as $index => $value) 
                                <div class="card education mt-3 profeadd educationDetails" id="">
                                    <div class="card-body " >
                                    <h3>backend update validation</h3>
                                        <div class="form-row">
                                            
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Name Of The Institute</label>
                                                <input type="text" value = "{{ old('name_of_institute.'.$index) }}" name="{{ 'name_of_institute[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('name_of_institute.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>To</label>
                                                <input type="date" name="{{ 'to[]' }}"  value = "{{ old('to.'.$index) }}"  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                                @error('to.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>From</label>
                                                <input type="date" value = "{{ old('from.'.$index) }}" name="{{ 'from[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('from.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Address</label>
                                                <textarea  class="form-control form-control-lg"   name="{{ 'address[]' }}" cols="30" placeholder="Enter Details Of disaility">{{ old('address.'.$index) }}</textarea>
                                                @error('address.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Description</label>
                                                <textarea  class="form-control form-control-lg"   name="{{ 'description[]' }}" cols="30" placeholder="Enter Details Of disaility">{{ old('description.'.$index) }}</textarea>
                                                @error('description.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <lable>certificate</lable>
                                                <input type="file" data-key="certificate_image" value="{{ old('certificate_pdf.'.$index) }}" name="{{ 'certificate_pdf[]' }}" class=" form-control form-control-lg">
                                            </div>
                                            @error('certificate_pdf.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                            <div class="container removecard">
                                                    <div class="row ">
                                                        <button type="button" class="btn btn-danger d-none delete">delete</button> 
                                                    </div>
                                            </div>

                                        </div> 

                                    </div>   
                                </div>
                            @endforeach 
                    @else  
                        @foreach($emp_professional_details as $professional)
                            <div class="card education mt-3 profeadd">
                    
                                <div class="card-body " >
                
                                        <div class="form-row">
                                    
                                            <input type="hidden" name="professional_uuid[]" value="{{$professional->uuid}}">

                                            

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Name Of The Institute</label>
                                                <input type="text" value = "{{ $professional->name_of_institute }}" name="name_of_institute[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('name_of_institute[]'))
                                                        <span class="errr-validation">{{ $errors->first('name_of_institute[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>To</label>
                                                <input type="date" name="to[]"  value = "{{ $professional->to }}"  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                                @if ($errors->has('to[]'))
                                                    <span class="errr-validation">{{ $errors->first('to[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>From</label>
                                                <input type="date" value = "{{ $professional->from}}" name="from[]"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('from[]'))
                                                        <span class="errr-validation">{{ $errors->first('from[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Address</label>
                                                <textarea  class="form-control form-control-lg"  name="address[]" cols="30" placeholder="Enter Details Of disaility">
                                                        {{ $professional->address}}
                                                </textarea>
                                                @if ($errors->has('address[]'))
                                                    <span class="errr-validation">{{ $errors->first('address[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Description</label>
                                                <textarea  class="form-control form-control-lg"  name="description[]" cols="30" placeholder="Enter Details Of disaility">
                                                    {{ $professional->description}}
                                                </textarea>
                                                @if ($errors->has('description[]'))
                                                    <span class="errr-validation">{{ $errors->first('description[]') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                @if(empty($professional))
                                                    <lable >Certificate</lable>
                                                    <input type="file" name="certificate_pdf[]" class=" form-control form-control-lg">
                                                @else
                                                    <lable >Certificate</lable>
                                                    <input type="file" name="certificate_pdf[]" class=" form-control form-control-lg">
                                                    <div class="imageset mt-4 m-4">
                                                            <img src="{{asset('console/upload/employee/profession_training/'.$professional->certificate_pdf)}}" height="120px" width="100px"> 
                                                    </div>   
                                                @endif
                                            </div>

                                            @if ($errors->has('certificate_pdf[]'))
                                                    <span class="errr-validation">{{ $errors->first('certificate_pdf[]') }}</span>
                                            @endif

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                            </div>

                                        
                                        </div> 
                                </div>   
                            </div>
                        @endforeach
                    @endif         -->

                @else 

                    @if(!empty(session()->getOldinput()['name_of_institute']))
                            @foreach(session()->getOldinput()['name_of_institute'] as $index => $value) 
                                <div class="card education mt-3 profeadd educationDetails" id="">
                                    <div class="card-body " >
                                    <h3>backend validation</h3>
                                        <div class="form-row">
                                            
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Name Of The Institute</label>
                                                <input type="text" value = "{{ old('name_of_institute.'.$index) }}" name="{{ 'name_of_institute[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('name_of_institute.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>To</label>
                                                <input type="date" name="{{ 'to[]' }}"  value = "{{ old('to.'.$index) }}"  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                                @error('to.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>From</label>
                                                <input type="date" value = "{{ old('from.'.$index) }}" name="{{ 'from[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('from.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Address</label>
                                                <textarea  class="form-control form-control-lg"   name="{{ 'address[]' }}" cols="30" placeholder="Enter Details Of disaility">{{ old('address.'.$index) }}</textarea>
                                                @error('address.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Description</label>
                                                <textarea  class="form-control form-control-lg"  value="{{ old('description.'.$index) }}" name="{{ 'description[]' }}" cols="30" placeholder="Enter Details Of disaility"></textarea>
                                                @error('description.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <lable>certificate</lable>
                                                <input type="file" data-key="certificate_image" value="{{ old('certificate_pdf.'.$index) }}" name="{{ 'certificate_pdf[]' }}" class=" form-control form-control-lg">
                                            </div>
                                            @error('certificate_pdf.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                            <div class="container removecard">
                                                    <div class="row ">
                                                        <button type="button" class="btn btn-danger d-none delete">delete</button> 
                                                    </div>
                                            </div>

                                        </div> 

                                    </div>   
                                </div>
                            @endforeach 
                    @else

                        <div class="card education mt-3 profeadd educationDetails" id="">
                    
                            <div class="card-body " >
                                <h3>first Design</h3>
                                <div class="form-row">
                                    
                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Name Of The Institute</label>
                                        <input type="text" value = "" name="name_of_institute[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                        
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>To</label>
                                        <input type="date" name="to[]"  value = ""  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                        
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>From</label>
                                        <input type="date" value = "" name="from[]"class="form-control form-control-lg" placeholder="Enter University Name">
                                       
                                    </div>

                                    

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Address</label>
                                        <textarea  class="form-control form-control-lg"  value="" name="address[]" cols="30" placeholder="Enter Details Of disaility"></textarea>
                                        
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Description</label>
                                        <textarea  class="form-control form-control-lg"  value="" name="description[]" cols="30" placeholder="Enter Details Of disaility"></textarea>
                                        
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <lable>certificate</lable>
                                        <input type="file" data-key="certificate_image"  name="certificate_pdf[]" class=" form-control form-control-lg">
                                    </div>
                                    

                                    <div class="container removecard">
                                            <div class="row ">
                                                <button type="button" class="btn btn-danger d-none delete">delete</button> 
                                            </div>
                                    </div>

                                </div> 

                            </div>   
                
                        </div>
    
                    @endif
                    
                @endif    
                
            </div>
           
            <div class="mt-4"><button type="button" id="addprofe" class="btn btn-default pull-left  btn btn-primary mt-2 ">Add</button><br></div>
           
            <div class="form-card-footer card-footer p-t-20 p-0 text-right">
                    <!-- <div class="btn-group mr-3" role="group" aria-label="Second group">
                        <a href="" >
                            <button class="theme-btn-outline">cancel</button>
                        </a>
                    </div> -->
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="submit" id="profBtn"   class="theme-btn text-white">Save</button>
                    </div>
            </div>     


</form>

   


@push('scripts')
 <script>
    $(document).ready(function () {

        $("#addprofe").click(function () { 

            console.log('addprofeddddd');

            var defaultHtmlAppend = $('.profeadd').last().clone();
            console.log(defaultHtmlAppend);
            var rowIndex = $('.profeadd').length;  
            console.log(defaultHtmlAppend.find('.education'));

            defaultHtmlAppend.find('input[name]').each(function(){
                var name = $(this).attr('name');
		    	$(this).attr('name',name).val('');
                $(this).parents('.profeadd').find('.imageset').remove();
                // $(this).attr('data-key',rowIndex);                   
                $(this).parents('.profeadd').append('');
                $(this).parents('.form-group').find('.error').remove();
		    }); 
            defaultHtmlAppend.find('input[type="file"]').each(function(){
                console.log('file');
                var name = $(this).attr('name');
		    	$(this).attr('name',name).val('');
                $(this).parents('.eduremove').find('.imageset').remove();
                $(this).attr('data-key','certificate_image');
                $(this).parents('.eduremove').append('');
                $(this).parents('.form-group').find('.error').remove();
		    }); 
            defaultHtmlAppend.find('textarea').each(function(){
                console.log('textaaaaa');
                var name = $(this).attr('name');
                $(this).attr('name',name).val('');
		    	
                $(this).attr('data-key','certificate_image');
                $(this).parents('.form-group').find('.error').remove();
                $(this).parents('.eduremove').append('');
		    }); 
         
          defaultHtmlAppend.attr('id','educationDetail-'+rowIndex);

            defaultHtmlAppend.find('.btn-danger').removeClass('d-none').attr('data-id',rowIndex);
            $('#emp_prof_add').append(defaultHtmlAppend);
        });

        $(document).delegate('.delete','click',function () { 
            var id = $(this).attr('data-id');

            $('#educationDetail-'+id).remove();
            
        });
          

    });
 </script>   
@endpush    
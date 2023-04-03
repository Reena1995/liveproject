

<form  id="emp_family_add"  name="emp_family_add" action="{{route('contact.family.add')}}"  method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">

            <div id="emp_family">

                @if(count($family_details))
                
                    @foreach($family_details as $family)
                        <div class="card education mt-3 familyadd">
                
                            <div class="card-body " >
            
                                    <div class="form-row">
                                
                                        <input type="hidden" name="family_uuid[]" value="{{$family->uuid}}">

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Name</label>
                                            <input type="text" value = "{{ $family->name}}" name="name[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('name[]'))
                                                    <span class="errr-validation">{{ $errors->first('name[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Relationship</label>
                                            <input type="text" value = "{{ $family->relationship}}" name="relationship[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('relationship[]'))
                                                    <span class="errr-validation">{{ $errors->first('relationship[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>	profession</label>
                                            <input type="text" value = "{{ $family->profession}}" name="profession[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('	profession[]'))
                                                    <span class="errr-validation">{{ $errors->first('	profession[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Age</label>
                                            <input type="text" value = "{{ $family->age}}" name="age[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('age[]'))
                                                    <span class="errr-validation">{{ $errors->first('age[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Contact No</label>
                                            <input type="text" data-key="mob" value = "{{ $family->contact_no}}" name="contact_no[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('contact_no[]'))
                                                    <span class="errr-validation">{{ $errors->first('contact_no[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Is Depended </label>
                                            <input type="checkbox" id="is_dependent" name="is_dependent[]" value="YES">
                                            @if ($errors->has('is_dependent[]'))
                                                    <span class="errr-validation">{{ $errors->first('is_dependent[]') }}</span>
                                            @endif
                                        </div>


                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        
                                        </div>

                                    
                                    </div> 
                            </div>   
                        </div>
                    @endforeach

                    

                @else 
                @if(!empty(session()->getOldinput()['name']))
                        @foreach(session()->getOldinput()['name'] as $index => $value) 
                        <div class="card education mt-3 familyadd educationDetails" id="">
                
                                <div class="card-body " >
                                    <h3>backend validation</h3>
                                    <div class="form-row">
                                    
                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Name</label>
                                            <input type="text" value ="{{ old('name.'.$index) }}" name="{{ 'name[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @error('name.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Relationship</label>
                                            <input type="text" value = "{{ old('relationship.'.$index) }}" name="{{ 'relationship[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @error('relationship.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>	profession</label>
                                            <input type="text" value = "{{ old('profession.'.$index) }}" name="{{ 'profession[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @error('profession.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Age</label>
                                            <input type="text" value = "{{ old('age.'.$index) }}" name="age[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @error('age.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Contact No</label>
                                            <input type="text" value = "{{ old('contact_no.'.$index) }}" name="{{ 'contact_no[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @error('contact_no.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Is Depended </label>
                                            <input type="checkbox" id="is_dependent" name="is_dependent[]" value="YES">
                                            
                                        </div>

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
                        <div class="card education mt-3 familyadd educationDetails" id="">
                
                            <div class="card-body " >
                                <h3>first Design</h3>
                                <div class="form-row">
                                    
                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Name</label>
                                        <input type="text" value ="" name="{{ 'name[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        @error('name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Relationship</label>
                                        <input type="text" value = "" name="{{ 'relationship[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        @error('relationship')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>	profession</label>
                                        <input type="text" value = "" name="{{ 'profession[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        @error('profession')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Age</label>
                                        <input type="text" value = "" name="age[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                        @error('age')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Contact No</label>
                                        <input type="text" data-key="mob" value = "" name="{{ 'contact_no[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        @error('contact_no')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        <label>Is Depended </label>
                                        <input type="checkbox" id="is_dependent" name="is_dependent[]" value="YES">
                                        
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
           
            <div class="mt-4"><button type="button" id="addfam" class="btn btn-default pull-left  btn btn-primary mt-2 ">Add</button><br></div>
           
            
            <div class="form-card-footer card-footer p-t-20 p-0 text-right">
                    <div class="btn-group mr-3" role="group" aria-label="Second group">
                        <a href="" >
                            <button class="theme-btn-outline">cancel</button>
                        </a>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="sumit" id="familyBtn"  class="theme-btn text-white">Save</button>
                    </div>
            </div>     


        </form>

   


@push('scripts')
 <script>
    $(document).ready(function () {

        $("#addfam").click(function () { 

            console.log('addfamddddd');

            var defaultHtmlAppend = $('.familyadd').last().clone();
            console.log(defaultHtmlAppend);
            var rowIndex = $('.familyadd').length;  
            console.log(defaultHtmlAppend.find('.education'));

            defaultHtmlAppend.find('input[name]').each(function(){
                var name = $(this).attr('name');
		    	$(this).attr('name',name).val('');
                $(this).parents('.familyadd').find('.imageset').remove();
                // $(this).attr('data-key',rowIndex);                 
                $(this).parents('.familyadd').append('');
		    }); 
         
          defaultHtmlAppend.attr('id','educationDetail-'+rowIndex);

            defaultHtmlAppend.find('.btn-danger').removeClass('d-none').attr('data-id',rowIndex);
            $('#emp_family').append(defaultHtmlAppend);
        });

        $(document).delegate('.delete','click',function () { 
            var id = $(this).attr('data-id');

            $('#educationDetail-'+id).remove();
            
        });
          

    });
 </script>   
@endpush    
<form  id="emp_emergency_add"  name="emp_emergency_add" action="{{route('contact.emergency.add')}}"  method="post" enctype="multipart/form-data">
        @csrf

       <input type="hidden" name="user_id" value="{{$emp->uuid}}">
        <input type="hidden" name="final_submit" value="{{$submitFinal}}">

            <div id="emp_emergency_contact">

                @if(count($emergency_details))
                
                    @foreach($emergency_details as $em)
                        <div class="card education mt-3 emergencyadd">
                
                            <div class="card-body " >
                                    <h3>Update</h3>
                                    <div class="form-row">
                                
                                        <input type="hidden" name="emergency_uuid[]" value="{{$em->uuid}}">

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Name</label>
                                            <input type="text" value = "{{$em->name}}" name="name[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                           
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>address</label>
                                            <textarea  class="form-control form-control-lg"  name="address[]" cols="30" placeholder="Enter Details Of disaility">
                                                {{ $em->address }}
                                            </textarea>
                                           
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Relationship</label>
                                            <input type="text" value = "{{ $em->relationship}}" name="relationship[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                          
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Contact No</label>
                                            <input type="text" data-key="mobile" value = "{{ $em->contact_no}}" name="contact_no[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                           
                                        </div>
                                        
                                    </div> 
                            </div>   
                        </div>
                    @endforeach

                @else 

                @if(!empty(session()->getOldinput()['name']))

                            @foreach(session()->getOldinput()['name'] as $index => $value)  

                                <div class="card education mt-3 emergencyadd educationDetails" id="">
                                    
                                    <div class="card-body mr-2">
                                        <h3>backend validation</h3>
                                        <div class="form-row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Name</label>
                                                    <input type="text" value="{{ old('name.'.$index) }}" class="form-control form-control-lg" name="{{ 'name[]' }}"   placeholder="Enter University Name">
                                                    @error('name.'.$index)
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12"> 
                                                    <label>address</label>
                                                    <textarea class="form-control form-control-lg"  name="{{ 'address[]' }}" cols="30" placeholder="Enter Details Of disaility">{{ old('address.'.$index) }}</textarea>
                                                    @error('address.'.$index)
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Relationship</label>
                                                <input type="text" value="{{ old('relationship.'.$index) }}"  name="{{ 'relationship[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('relationship.'.$index)
                                                        <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Contact No</label>
                                                <input type="text" value="{{ old('contact_no.'.$index) }}"  name="{{ 'contact_no[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('contact_no.'.$index)
                                                        <span class="error">{{ $message }}</span>
                                                @enderror
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
                            <div class="card education mt-3 emergencyadd educationDetails" id="">
                                <div class="card-body">
                                    <h3>first Design</h3>
                                    <div class="form-row"> 
                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Name</label>
                                                <input type="text"  value="" class="form-control form-control-lg" name="{{ 'name[]' }}" value = ""   placeholder="Enter University Name">
                                                @error('name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>address</label>
                                                <textarea  class="form-control form-control-lg"  name="{{ 'address[]' }}" cols="30" placeholder="Enter Details Of disaility"></textarea>
                                                @error('address')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                        </div>
                                
                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Relationship</label>
                                            <input type="text" value =""  name="{{ 'relationship[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @error('relationship')
                                                    <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Contact No</label>
                                            <input type="text" value = "" data-key="mobile" name="{{ 'contact_no[]' }}" class="form-control form-control-lG number" placeholder="Enter University Name">
                                            @error('contact_no')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                            <span class="error"></span>
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
           
            <div class="mt-4"><button type="button"  id="addem" class="btn btn-default pull-left  btn btn-primary mt-2 ">Add</button><br></div>
           
            
            <div class="form-card-footer card-footer p-t-20 p-0 text-right">
                    <div class="btn-group mr-3" role="group" aria-label="Second group">
                        <a href="" >
                            <button class="theme-btn-outline">cancel</button>
                        </a>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="sumit" id="emeBtn" class="theme-btn text-white">Save</button>
                    </div>
            </div>     


</form>

@push('scripts')
 <script>
    $(document).ready(function () {


        $("#addem").click(function () { 

            
            var defaultHtmlAppend = $('.emergencyadd').last().clone();
            var rowIndex = $('.emergencyadd').length;
           

            defaultHtmlAppend.find('input[name]').each(function(){
                
                var name = $(this).attr('name');
                $(this).attr('name',name).val('');
                $(this).parents('.form-group').find('.error').remove();
              
                $(this).parents('.emergencyadd').append('');
		    }); 

            defaultHtmlAppend.find('textarea').each(function(){
                console.log('textaaaaa');
                var name = $(this).attr('name');
                $(this).attr('name',name).val('');
                $(this).parents('.form-group').find('.error').remove();
               
               
                $(this).parents('.emergencyadd').append('');
		    }); 
         
          defaultHtmlAppend.attr('id','educationDetail-'+rowIndex);

            defaultHtmlAppend.find('.btn-danger').removeClass('d-none').attr('data-id',rowIndex);
            $('#emp_emergency_contact').append(defaultHtmlAppend);
        });

        $(document).delegate('.delete','click',function () { 
            var id = $(this).attr('data-id');

            $('#educationDetail-'+id).remove();
            
        });
          

    });

    
 </script>   
@endpush    
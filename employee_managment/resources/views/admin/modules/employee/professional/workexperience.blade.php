

<form  id="emp_work_add"  name="emp_work_add" action="{{route('professional.workexperience.add')}}"  method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">

            <div id="work_add">

                @if(count($emp_work_exp_details))
                
                    @foreach($emp_work_exp_details as $work)

                        <div class="card education mt-3 workadd">

                            <div class="card-body " >
                                    <h3>Update validation</h3>
                                    <div class="form-row">
                                
                                        <input type="hidden" name="work_uuid[]" value="{{$work->uuid}}">

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Name</label>
                                            <input type="text" value = "{{$work->name}}" name="name[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('name[]'))
                                                    <span class="errr-validation">{{ $errors->first('name[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Address</label>
                                            <textarea  class="form-control form-control-lg"  data-key="address" name="address[]" cols="30" placeholder="Enter Details Of disaility">{{ $work->address}}</textarea>
                                            @if ($errors->has('address[]'))
                                                <span class="errr-validation">{{ $errors->first('address[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Date of joining</label>
                                            <input type="date" name="date_of_joining[]"  value = "{{ $work->date_of_joining }}"  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                            @if ($errors->has('date_of_joining[]'))
                                                <span class="errr-validation">{{ $errors->first('date_of_joining[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Date of joining Leaving</label>
                                            <input type="date" value = "{{ $work->date_of_leaving}}" name="date_of_leaving[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('	date_of_leaving[]'))
                                                    <span class="errr-validation">{{ $errors->first('date_of_leaving[]') }}</span>
                                            @endif
                                        </div>

                                        
                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>joining Designation</label>
                                            <input type="text" value = "{{ $work->joining_designation }}" name="joining_designation[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('joining_designation[]'))
                                                    <span class="errr-validation">{{ $errors->first('joining_designation[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Leaving Designation</label>
                                            <input type="text" value = "{{ $work->leaving_designation }}" name="leaving_designation[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('leaving_designation[]'))
                                                    <span class="errr-validation">{{ $errors->first('leaving_designation[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>role</label>
                                            <input type="text" value = "{{ $work->role }}" name="role[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('role[]'))
                                                    <span class="errr-validation">{{ $errors->first('role[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        
                                            <label>Last salary</label>
                                            <input type="text" value = "{{ $work->last_salary }}" name="last_salary[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('last_salary[]'))
                                                    <span class="errr-validation">{{ $errors->first('last_salary[]') }}</span>
                                            @endif
                                        </div>

                                        

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>leaving_reason</label>
                                            <textarea  class="form-control form-control-lg"  name="leaving_reason[]" cols="30" placeholder="Enter Details Of disaility">
                                                {{ $work->leaving_reason}}
                                            </textarea>
                                            @if ($errors->has('leaving_reason[]'))
                                                <span class="errr-validation">{{ $errors->first('leaving_reason[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        
                                            <label>reporting_authority_name</label>
                                            <input type="text" value = "{{ $work->reporting_authority_name }}" name="reporting_authority_name[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('reporting_authority_name[]'))
                                                    <span class="errr-validation">{{ $errors->first('reporting_authority_name[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                            <label>reporting_authority_contact</label>
                                            <input type="text"  data-key="contact" value = "{{ $work->reporting_authority_contact }}" name="reporting_authority_contact[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('reporting_authority_contact[]'))
                                                    <span class="errr-validation">{{ $errors->first('reporting_authority_contact[]') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                            <label>reporting_authority_designation</label>
                                            <input type="text" value = "{{ $work->reporting_authority_designation }}" name="reporting_authority_designation[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                            @if ($errors->has('reporting_authority_designation[]'))
                                                    <span class="errr-validation">{{ $errors->first('reporting_authority_designation[]') }}</span>
                                            @endif
                                        </div>

                                    

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            @if(empty($work))
                                                <lable >experience_certificate</lable>
                                                <input type="file" name="experience_certificate[]" class=" form-control form-control-lg">
                                            @else
                                                <lable >experience_certificate</lable>
                                                <input type="file" name="experience_certificate[]" class=" form-control form-control-lg">
                                                <div class="imageset mt-4 m-4">
                                                        <img src="{{asset('console/upload/employee/work_experience/'.$work->experience_certificate)}}" height="120px" width="100px"> 
                                                </div>   
                                            @endif
                                        </div>

                                        @if ($errors->has('experience_certificate[]'))
                                                <span class="errr-validation">{{ $errors->first('experience_certificate[]') }}</span>
                                        @endif

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        
                                        </div>

                                    
                                    </div> 
                            </div>   
                        </div>
                    @endforeach

                    <!-- @if(!empty(session()->getOldinput()['name']))
                            @foreach(session()->getOldinput()['name'] as $index => $value) 
                                <div class="card education mt-3 workadd educationDetails" id="">
                                    <div class="card-body " >
                                        <h3>backend validation</h3>
                                            <div class="form-row">
                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Name</label>
                                                    <input type="text" value = "{{ old('name.'.$index) }}" name="{{ 'name[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('name.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Address</label>
                                                    <textarea  class="form-control form-control-lg" value="" name="{{ 'address[]' }}" cols="30" placeholder="Enter Details Of disaility">{{ old('address.'.$index) }}</textarea>
                                                    @error('address.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Date of joining</label>
                                                    <input type="date" value = "{{ old('date_of_joining.'.$index) }}" name="{{ 'date_of_joining[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('date_of_joining.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Date of Leaving</label>
                                                    <input type="date" value = "{{ old('date_of_leaving.'.$index) }}" name="{{ 'date_of_leaving[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('date_of_leaving.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>joining Designation</label>
                                                    <input type="date" value = "{{ old('joining_designation.'.$index) }}" name="{{ 'joining_designation[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('joining_designation.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Leaving Designation</label>
                                                    <input type="text" value = "{{ old('leaving_designation.'.$index) }}" name="{{ 'leaving_designation[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('leaving_designation.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Role </label>
                                                    <input type="text" value = "{{ old('role.'.$index) }}" name="{{ 'role[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('role.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>Last salary</label>
                                                    <input type="text" value = "{{ old('last_salary.'.$index) }}" name="{{ 'last_salary[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('last_salary.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>leaving_reason </label>
                                                    <input type="text" value = "{{ old('role.'.$index) }}" name="{{ 'role[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('role.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>reporting_authority_name</label>
                                                    <input type="text" value = "{{ old('reporting_authority_name.'.$index) }}" name="{{ 'reporting_authority_name[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('reporting_authority_name.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>reporting_authority_contact </label>
                                                    <input type="text" value = "{{ old('reporting_authority_contact.'.$index) }}" name="{{ 'reporting_authority_contact[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('reporting_authority_contact.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <label>reporting_authority_designation</label>
                                                    <input type="text" value = "{{ old('reporting_authority_designation.'.$index) }}" name="{{ 'reporting_authority_designation[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                    @error('reporting_authority_designation.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                    <lable>experience_certificate</lable>
                                                    <input type="file" data-key="certificate_image" value="{{ old('experience_certificate.'.$index) }}" name="{{ 'experience_certificate[]' }}" class=" form-control form-control-lg">
                                                </div>
                                                @error('experience_certificate.'.$index)
                                                    <span class="error">{{ $message }}</span>
                                                @enderror

                                            </div>
                                    </div>
                                </div>    

                            @endforeach
                    @else
                        @foreach($emp_work_exp_details as $work)
                            <div class="card education mt-3 workadd">

                                <div class="card-body " >
                                        <h3>Update validation</h3>
                                        <div class="form-row">
                                    
                                            <input type="hidden" name="work_uuid[]" value="{{$work->uuid}}">

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Name</label>
                                                <input type="text" value = "{{$work->name}}" name="name[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('name[]'))
                                                        <span class="errr-validation">{{ $errors->first('name[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Address</label>
                                                <textarea  class="form-control form-control-lg"  name="address[]" cols="30" placeholder="Enter Details Of disaility">
                                                    {{ $work->address}}
                                                </textarea>
                                                @if ($errors->has('address[]'))
                                                    <span class="errr-validation">{{ $errors->first('address[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Date of joining</label>
                                                <input type="date" name="date_of_joining[]"  value = "{{ $work->date_of_joining }}"  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                                @if ($errors->has('date_of_joining[]'))
                                                    <span class="errr-validation">{{ $errors->first('date_of_joining[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Date of joining Leaving</label>
                                                <input type="date" value = "{{ $work->date_of_leaving}}" name="date_of_leaving[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('	date_of_leaving[]'))
                                                        <span class="errr-validation">{{ $errors->first('date_of_leaving[]') }}</span>
                                                @endif
                                            </div>

                                            
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>joining Designation</label>
                                                <input type="text" value = "{{ $work->joining_designation }}" name="joining_designation[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('joining_designation[]'))
                                                        <span class="errr-validation">{{ $errors->first('joining_designation[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Leaving Designation</label>
                                                <input type="text" value = "{{ $work->leaving_designation }}" name="leaving_designation[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('leaving_designation[]'))
                                                        <span class="errr-validation">{{ $errors->first('leaving_designation[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>role</label>
                                                <input type="text" value = "{{ $work->role }}" name="role[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('role[]'))
                                                        <span class="errr-validation">{{ $errors->first('role[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                                <label>Last salary</label>
                                                <input type="text" value = "{{ $work->last_salary }}" name="last_salary[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('last_salary[]'))
                                                        <span class="errr-validation">{{ $errors->first('last_salary[]') }}</span>
                                                @endif
                                            </div>

                                            

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>leaving_reason</label>
                                                <textarea  class="form-control form-control-lg"  name="leaving_reason[]" cols="30" placeholder="Enter Details Of disaility">
                                                    {{ $work->leaving_reason}}
                                                </textarea>
                                                @if ($errors->has('leaving_reason[]'))
                                                    <span class="errr-validation">{{ $errors->first('leaving_reason[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                                <label>reporting_authority_name</label>
                                                <input type="text" value = "{{ $work->reporting_authority_name }}" name="reporting_authority_name[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('reporting_authority_name[]'))
                                                        <span class="errr-validation">{{ $errors->first('reporting_authority_name[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                
                                                <label>reporting_authority_contact</label>
                                                <input type="text" value = "{{ $work->reporting_authority_contact }}" name="reporting_authority_contact[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('reporting_authority_contact[]'))
                                                        <span class="errr-validation">{{ $errors->first('reporting_authority_contact[]') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                
                                                <label>reporting_authority_designation</label>
                                                <input type="text" value = "{{ $work->reporting_authority_designation }}" name="reporting_authority_designation[]" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @if ($errors->has('reporting_authority_designation[]'))
                                                        <span class="errr-validation">{{ $errors->first('reporting_authority_designation[]') }}</span>
                                                @endif
                                            </div>

                                        

                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                @if(empty($work))
                                                    <lable >experience_certificate</lable>
                                                    <input type="file" name="experience_certificate[]" class=" form-control form-control-lg">
                                                @else
                                                    <lable >experience_certificate</lable>
                                                    <input type="file" name="experience_certificate[]" class=" form-control form-control-lg">
                                                    <div class="imageset mt-4 m-4">
                                                            <img src="{{asset('console/upload/employee/work_experience/'.$work->experience_certificate)}}" height="120px" width="100px"> 
                                                    </div>   
                                                @endif
                                            </div>

                                            @if ($errors->has('experience_certificate[]'))
                                                    <span class="errr-validation">{{ $errors->first('experience_certificate[]') }}</span>
                                            @endif

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                            </div>

                                        
                                        </div> 
                                </div>   
                            </div>
                        @endforeach
                    @endif -->
                  

                @else 
                @if(!empty(session()->getOldinput()['name']))
                            @foreach(session()->getOldinput()['name'] as $index => $value) 
                                <div class="card education mt-3 workadd educationDetails" id="">
                                    <div class="card-body " >
                                        <h3>backend validation</h3>
                                        <div class="form-row">
                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Name</label>
                                                <input type="text" value = "{{ old('name.'.$index) }}" name="{{ 'name[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('name.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Address</label>
                                                <textarea  class="form-control form-control-lg" value="" name="{{ 'address[]' }}" cols="30" placeholder="Enter Details Of disaility">{{ old('address.'.$index) }}</textarea>
                                                @error('address.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Date of joining</label>
                                                <input type="date" value = "{{ old('date_of_joining.'.$index) }}" name="{{ 'date_of_joining[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('date_of_joining.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Date of Leaving</label>
                                                <input type="date" value = "{{ old('date_of_leaving.'.$index) }}" name="{{ 'date_of_leaving[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('date_of_leaving.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>joining Designation</label>
                                                <input type="date" value = "{{ old('joining_designation.'.$index) }}" name="{{ 'joining_designation[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('joining_designation.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Leaving Designation</label>
                                                <input type="text" value = "{{ old('leaving_designation.'.$index) }}" name="{{ 'leaving_designation[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('leaving_designation.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Role </label>
                                                <input type="text" value = "{{ old('role.'.$index) }}" name="{{ 'role[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('role.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>Last salary</label>
                                                <input type="text" value = "{{ old('last_salary.'.$index) }}" name="{{ 'last_salary[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('last_salary.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>leaving_reason </label>
                                                <input type="text" value = "{{ old('role.'.$index) }}" name="{{ 'role[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('role.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>reporting_authority_name</label>
                                                <input type="text" value = "{{ old('reporting_authority_name.'.$index) }}" name="{{ 'reporting_authority_name[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('reporting_authority_name.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>reporting_authority_contact </label>
                                                <input type="text" value = "{{ old('reporting_authority_contact.'.$index) }}" name="{{ 'reporting_authority_contact[]' }}"class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('reporting_authority_contact.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <label>reporting_authority_designation</label>
                                                <input type="text" value = "{{ old('reporting_authority_designation.'.$index) }}" name="{{ 'reporting_authority_designation[]' }}" class="form-control form-control-lg" placeholder="Enter University Name">
                                                @error('reporting_authority_designation.'.$index)
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                                <lable>experience_certificate</lable>
                                                <input type="file" data-key="certificate_image" value="{{ old('experience_certificate.'.$index) }}" name="{{ 'experience_certificate[]' }}" class=" form-control form-control-lg">
                                            </div>
                                            @error('experience_certificate.'.$index)
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>    
                            @endforeach 
                        @else
                            <div class="card education mt-3 workadd educationDetails" id="">
                        
                                <div class="card-body " >
                                    <h3>first Design</h3>
                                    <div class="form-row">
                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Name</label>
                                            <input type="text" value = "" name="{{'name[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Address</label>
                                            <textarea  class="form-control form-control-lg" data-key="address" value="" name="{{'address[]'}}" cols="30" placeholder="Enter Details Of disaility"></textarea>
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Date of joining</label>
                                            <input type="date" name="{{'date_of_joining[]'}}"  value =""  class="form-control form-control-lg" placeholder="Select Date Of Birth">
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Date of Leaving</label>
                                            <input type="date" value = "" name="{{'date_of_leaving[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            
                                        </div>
                                        
                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>joining Designation</label>
                                            <input type="text" value = "" name="{{'joining_designation[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>Leaving Designation</label>
                                            <input type="text" value = "" name="{{'leaving_designation[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>role</label>
                                            <input type="text" value = "" name="{{'role[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        
                                            <label>Last salary</label>
                                            <input type="text" value = "" name="{{'last_salary[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <label>leaving_reason</label>
                                            <textarea  class="form-control form-control-lg" value="" name="{{'leaving_reason[]'}}" cols="30" placeholder="Enter Details Of disaility"></textarea>
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                        
                                            <label>reporting_authority_name</label>
                                            <input type="text" value = "" name="{{'reporting_authority_name[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                            
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                            <label>reporting_authority_contact</label>
                                            <input type="text" value = "" data-key="contact" name="{{'reporting_authority_contact[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        
                                        </div>

                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            
                                            <label>reporting_authority_designation</label>
                                            <input type="text" value = "" name="{{'reporting_authority_designation[]'}}" class="form-control form-control-lg" placeholder="Enter University Name">
                                        
                                        </div>
                                        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                            <lable>experience_certificate</lable>
                                            <input type="file" value="" data-key="exp_image" name="{{'experience_certificate[]'}}" class=" form-control form-control-lg">
                                            
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
           
            <div class="mt-4"><button type="button" id="addwork" class="btn btn-default pull-left  btn btn-primary mt-2 ">Add</button><br></div>
           
            <div class="form-card-footer card-footer p-t-20 p-0 text-right">
                    <!-- <div class="btn-group mr-3" role="group" aria-label="Second group">
                        <a href="" >
                            <button class="theme-btn-outline">cancel</button>
                        </a>
                    </div> -->
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="submit" id="workBtn"   class="theme-btn text-white">Save</button>
                    </div>
            </div>     


</form>
   
@push('scripts')
 <script>
    $(document).ready(function () {

        $("#addwork").click(function () { 

            console.log('addworkddddd');

            var defaultHtmlAppend = $('.workadd').last().clone();
            console.log(defaultHtmlAppend);
            var rowIndex = $('.workadd').length;  
            console.log(defaultHtmlAppend.find('.education'));

            defaultHtmlAppend.find('input[name]').each(function(){
                var name = $(this).attr('name');
		    	$(this).attr('name',name).val('');
                $(this).parents('.workadd').find('.imageset').remove();
                // $(this).attr('data-key',rowIndex);                    
                $(this).parents('.workadd').append('');
                $(this).parents('.form-group').find('.error').remove();
		    }); 
            defaultHtmlAppend.find('input[type="file"]').each(function(){
                var name = $(this).attr('name');
		    	// $(this).attr('name',name).val('');
                // $(this).parents('.eduremove').find('.imageset').remove();
                $(this).attr('data-key','exp_image');
                $(this).parents('.form-group').find('.error').remove();
                // $(this).parents('.eduremove').append('');
		    });
            defaultHtmlAppend.find('textarea').each(function(){
                console.log('textaaaaa');
                var name = $(this).attr('name');
                $(this).attr('name',name).val('');
		    	
                $(this).attr('data-key','certificate_image');
                $(this).parents('.form-group').find('.error').remove();
                // $(this).parents('.eduremove').append('');
		    }); 
         
          defaultHtmlAppend.attr('id','educationDetail-'+rowIndex);

            defaultHtmlAppend.find('.btn-danger').removeClass('d-none').attr('data-id',rowIndex);
            $('#work_add').append(defaultHtmlAppend);
        });

        $(document).delegate('.delete','click',function () { 
            var id = $(this).attr('data-id');

            $('#educationDetail-'+id).remove();
            
        });
          

    });
 </script>   
@endpush    
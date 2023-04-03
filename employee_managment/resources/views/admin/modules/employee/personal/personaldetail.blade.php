<form id="personalDetailForm"  name="personal_deatil_add" action="{{route('personal.personaldetail.add')}}"  method="post" enctype="multipart/form-data">
    <div class="form-row">
        @csrf
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Father's Name </label>
            <input type="text" name="fathername"  value = "{{ (isset($personal_detail) ? $personal_detail->fathername :  old('fathername')) }}" class="form-control form-control-lg" placeholder="Enter Father Name" tabindex="1" autofocus >
            @if ($errors->has('fathername'))
                <span class="errr-validation">{{ $errors->first('fathername') }}</span>
            @endif
        </div>  
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Mother's Name</label>
            <input type="text" name="mothername"  value = "{{ (isset($personal_detail) ? $personal_detail->mothername :  old('mothername')) }}" class="form-control form-control-lg" placeholder="Enter Mother Name" tabindex="2">
            @if ($errors->has('mothername'))
                <span class="errr-validation">{{ $errors->first('mothername') }}</span>
            @endif
        </div>
        
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Date Of Birth</label>
            <input type="date" name="dob"  value = "{{ (isset($personal_detail) ? $personal_detail->dob :  old('dob')) }}" class="form-control form-control-lg" placeholder="Select Date Of Birth" tabindex="3">
            @if ($errors->has('dob'))
                <span class="errr-validation">{{ $errors->first('dob') }}</span>
            @endif
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-12 gender">
            <label class="">Gender</label>
            <div class="d-flex row ">
                <div class="custom-control custom-radio col-lg-2 col-md-4 col-6">
                    <input type="radio" name="gender" id="gender_male" tabindex="4" value="Male" class="custom-control-input" @if((old('gender') == 'Male') || (isset($personal_detail) && ($personal_detail->gender == 'Male'))) checked @endif>
                    <label class="custom-control-label" for="gender_male">Male</label>
                </div>
                <div class="custom-control custom-radio col-lg-2 col-md-4 col-6">
                    <input type="radio"  name="gender" tabindex="4" id="gender_female" value="Female"  class="custom-control-input" @if((old('gender') == 'Female') || (isset($personal_detail) && ($personal_detail->gender == 'Female'))) checked @endif>
                    <label class="custom-control-label" for="gender_female">Female</label>
                </div>
            </div>
            @if ($errors->has('gender'))
                <span class="errr-validation">{{ $errors->first('gender') }}</span>
            @endif
        </div>
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Blood Group</label>
            <input type="text" name="bloodgroup"  tabindex="5" value = "{{ (isset($personal_detail) ? $personal_detail->blood_group :  old('bloodgroup')) }}"   class="form-control form-control-lg" placeholder="Enter Blood Group">
            @if ($errors->has('bloodgroup'))
                <span class="errr-validation">{{ $errors->first('bloodgroup') }}</span>
            @endif
        </div>
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Alternate Number</label>
            <input type="text" name="alternateno"  tabindex="6" value = "{{ (isset($personal_detail) ? $personal_detail->alternate_no :  old('alternateno')) }}" class="form-control form-control-lg" placeholder="Enter alternate  Number">
            @if ($errors->has('alternateno'))
                <span class="errr-validation">{{ $errors->first('alternateno') }}</span>
            @endif
        </div>
        
        
        
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Marital Status </label>
            <select class="form-control" id="merriedstatus" value=""  name="marital_status"  tabindex="7">
                <!-- <option value= "" selected="">Choose...</option> -->
                <option value="single" {{ (isset($personal_detail) ? ($personal_detail->marital_status == 'single' ? 'selected' : '') :  old('marital_status') == 'single' ? 'selected' : '' ) }} >Single</option>
                <option value="married" {{ (isset($personal_detail) ? ($personal_detail->marital_status == 'married' ? 'selected' : '') :  old('marital_status') == 'married' ? 'selected' : '' ) }} >Married</option>
                <option value="divorce" {{ (isset($personal_detail) ? ($personal_detail->marital_status == 'divorce' ? 'selected' : '') :  old('marital_status') == 'divorce' ? 'selected' : '' ) }} >Divorce</option>
            </select>
            @if ($errors->has('marital_status'))
                <span class="errr-validation">{{ $errors->first('marital_status') }}</span>
            @endif
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-sm-12 ">
            <div class="custom-file">
                <label class="custom-file-label" for="inputGroupFile02">Choose Profile Image</label>
                @if(empty($personal_detail))
                <input type="file" name="image"  tabindex="8" class="custom-file-input" id="inputGroupFile02" accept="image/png, image/gif, image/jpeg">
                
                <div class="file mt-2">
                    <span id="img-error" class="errr-validation">
                        @if ($errors->has('image'))
                            {{ $errors->first('image') }}
                         @endif
                    </span>
                </div>   
                @else
                    <input type="file" name="image"tabindex="8"  class="custom-file-input" id="inputGroupFile02" accept="image/png, image/gif, image/jpeg">
                    
                    <div class="file mt-2">
                        @if ($errors->has('image'))
                        <span class="errr-validation">{{ $errors->first('image') }}</span>
                        @endif
                    </div>    
                    <div class="imageset mt-4 m-4">
                        <img src="{{asset('console/upload/employee/profileimage/'.$personal_detail->image)}}" height="120px" width="100px"> 
                    </div>    
                @endif    
                
            </div>
        </div>
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Current Residence Type</label>
            <select class="form-control"  name="residencetype" tabindex="9">
            <option value="" selected="">Select Choose</option>
                @foreach($current_residency as $curr)

                  
                <option value="{{$curr->id}}" {{ (isset($personal_detail) ? ($personal_detail->current_residence_type_id == $curr->id ? 'selected' : '') :  old('residencetype') == $curr->id ? 'selected' : '' ) }}>{{$curr->type}}</option>

                @endforeach
            </select>
            @if ($errors->has('residencetype'))
                <span class="errr-validation">{{ $errors->first('residencetype') }}</span>
            @endif
        </div>
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Mode Of Transportation</label>
            <select class="form-control" value="{{old('transportationmode')}}" name="transportationmode" tabindex="10">
            <option value="" selected="">Select Choose</option>
                @foreach($mode_transportation as $mode)
                        <option value="{{$mode->id}}" {{ (isset($personal_detail) ? ($personal_detail->	mode_of_transportation_id  == $mode->id ? 'selected' : '') :  old('transportationmode') == $mode->id ? 'selected' : '' ) }}>{{$mode->type}}</option>
                    @endforeach
            </select>
            @if ($errors->has('transportationmode'))
                <span class="errr-validation">{{ $errors->first('transportationmode') }}</span>
            @endif
        </div>
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Details Of Disability</label>
            <textarea  class="form-control form-control-lg" tabindex="11" name="disabilitydtls" cols="30" placeholder="Enter Details Of disaility">
                {{ (isset($personal_detail) ? $personal_detail->details_of_disability :  old('disabilitydtls')) }}
            </textarea>
            @if ($errors->has('disabilitydtls'))
                <span class="errr-validation">{{ $errors->first('disabilitydtls') }}</span>
            @endif
        </div>
        
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Total Experience</label>
            <input type="number" name="totalexperience" tabindex="12" value = "{{ (isset($personal_detail) ? $personal_detail->total_of_experience :  old('totalexperience')) }}" value="{{old('totalexperience')}}" class="form-control form-control-lg" placeholder="Total Experience">
            @if ($errors->has('totalexperience'))
                <span class="errr-validation">{{ $errors->first('totalexperience') }}</span>
            @endif
        </div>

        <h5 class="font-weight-semibold p-t-20 m-b-20">Current Address</h5>

        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
           
        </div>

        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label for="inputAddress">Current Address</label>
            <textarea  rows="6" tabindex="13" name="current_address" class="form-control form-control-lg craddress" id="inputAddress" placeholder="1234 Main St">
                  {{ (isset($personal_detail) ? $personal_detail->current_address :  old('current_address')) }}
            </textarea>
            @if ($errors->has('current_address'))
                <span class="errr-validation">{{ $errors->first('current_address') }}</span>
            @endif
        </div>
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Country</label>
            <select class="form-control crcountry" tabindex="14" id="current_country"  name="current_country">
                <option value="" selected="">Select Country</option>
                @foreach($country as $con)
                        <option value="{{$con->id}}" {{ (isset($personal_detail) ? ($personal_detail->current_country_id  == $con->id ? 'selected' : '') :  old('current_country') == $con->id ? 'selected' : '' ) }}>{{$con->name}}  </option>
                        
                    @endforeach
            </select>
            @if ($errors->has('current_country'))
                <span class="errr-validation">{{ $errors->first('current_country') }}</span>
            @endif
        </div>
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>State</label>
            <select class="form-control" tabindex="15" value="" id="current_state"  name="current_state">
                
            </select>
            @if ($errors->has('current_state'))
                <span class="errr-validation">{{ $errors->first('current_state') }}</span>
            @endif
        </div>
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>City</label>
            <select class="form-control" tabindex="16" id="current_city"  name="current_city">
                
                
            </select>
            @if ($errors->has('current_city'))
                <span class="errr-validation">{{ $errors->first('current_city') }}</span>
            @endif
        </div>
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Pincode</label>
            <input type="text" tabindex="17" name="current_pincode" value = "{{ (isset($personal_detail) ? $personal_detail->current_pincode :  old('current_pincode')) }}"  class="form-control form-control-lg crpincode" placeholder="Enter current pincode">
            @if ($errors->has('current_pincode'))
                <span class="errr-validation">{{ $errors->first('current_pincode') }}</span>
            @endif
        </div>
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                
        </div>

        <!-- <div class="container sameadd">
            <div class="row">
                <label>
                    <input type="checkbox" name="homepostalcheck" id="homepostalcheck"/>Same as above:
                </label>
                <br>  
            </div> 
        </div> -->

        <h5 class="font-weight-semibold p-t-20 m-b-20">Permanent Address</h5>
        
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
           
        </div>

       
        <div class="container" id="replace">

            <div class="row" >

                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                    <label for="inputAddress2">Permanent Address</label>
                    <textarea  rows="6"  tabindex="18" name="permanent_address"   class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        {{ (isset($personal_detail) ? $personal_detail->permanent_address :  old('permanent_address')) }}
                    </textarea>
                    @if ($errors->has('permanent_address'))
                        <span class="errr-validation">{{ $errors->first('permanent_address') }}</span>
                    @endif
                </div>
        
                <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
                    <label>Country </label>
                    <select class="form-control"  tabindex="19" id="permanent_country" name="permanent_country">
                        <option value="" selected="">Select Country</option>
                        @foreach($country as $con)
                            <option value="{{$con->id}}" {{ (isset($personal_detail) ? ($personal_detail->permanent_country_id  == $con->id ? 'selected' : '') :  old('current_country') == $con->id ? 'selected' : '' ) }}>{{$con->name}}  </option>
                        @endforeach
                    </select>
                    @if ($errors->has('permanent_country'))
                        <span class="errr-validation">{{ $errors->first('permanent_country') }}</span>
                    @endif
                </div>
        
                <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
                    <label>State</label>
                    <select class="form-control"  tabindex="20" id="permanent_state"  name="permanent_state" >
                        
                        
                    </select>
                    @if ($errors->has('permanent_state'))
                        <span class="errr-validation">{{ $errors->first('permanent_state') }}</span>
                    @endif
                </div>
        
                <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
                    <label>City</label>
                    <select class="form-control"id="permanent_city"  tabindex="21" name="permanent_city">
                        
                            
                    </select>
                    @if ($errors->has('permanent_city'))
                        <span class="errr-validation">{{ $errors->first('permanent_city') }}</span>
                    @endif
                </div>
        
        
                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                    <label>Pincode</label>
                    <input type="text" name="permanent_pincode"  tabindex="22" value = "{{ (isset($personal_detail) ? $personal_detail->permanent_pincode :  old('permanent_pincode')) }}"  class="form-control form-control-lg" placeholder="Enter permanant pincode">
                    @if ($errors->has('permanent_pincode'))
                        <span class="errr-validation">{{ $errors->first('permanent_pincode') }}</span>
                    @endif
                </div>

            </div>

        </div>
       
        <div class="form-card-footer card-footer p-t-20 p-0 text-right">
            <!-- <div class="btn-group mr-2" role="group" aria-label="Second group">
                <a href="" >
                    <button class="theme-btn-outline">cancel</button>
                </a>
            </div> -->
            <div class="btn-group mr-2" role="group" aria-label="Second group">
                <button type="submit"  id="personalDetailBtn" value="submit" name="submit" class="theme-btn text-white">Save</button>
            </div>
        </div>        
    </div> 
</form>


@push('scripts')
 <script>
    $(document).ready(function () {
        /* date picker code start*/ 
            $(".theme-date-picker").datepicker();
        /* date picker code end*/ 

         /* country select than after state fetch  code start*/ 

            var curentState =  '{{ old("current_state") }}' ? '{{ old("current_state") }}' : '{{ $personal_detail->current_state_id ?? 0}}';
            var countryID = '{{ old("current_country") }}' ? '{{ old("current_country") }}' :'{{ $personal_detail->current_country_id ?? 0}}'; 
            console.log('countryID ::',countryID);
            console.log('curentState ::',curentState);
             
            getStates(countryID,'current_state',curentState);
            
            var permentState =  '{{ old("permanent_state") }}' ? '{{ old("permanent_state") }}' : '{{ $personal_detail->permanent_state_id ?? 0 }}';
            var countryID =  '{{ old("permanent_country") }}' ? '{{ old("permanent_country") }}' : '{{ $personal_detail->permanent_country_id ?? 0 }}';
             getStates(countryID,'permanent_state',permentState);


            function getStates(countryId,place,stateId = '0') {
                $.ajax({
                    url:"{{route('getstate')}}",
                    type: "GET",
                    data: {
                        cid: countryId
                    },
                    success: function(result) {
                        $.each(result.states, function (key, value) {
                            var selected = '';
                            if(stateId == value.id){
                                selected = 'selected'; 
                            }
                            $('#'+place).append('<option value="' + value.id + '" '+selected+'>' + value.name + '</option>');
                        });
                            
                    }
                });
            } 
            $('#current_country').on('change', function () {
                console.log('SDVsdvsdzv');
                var countryID = $(this).val();
                console.log(countryID);
                getStates(countryID,'current_state');
            });   
                
            $('#permanent_country').on('change', function () {
                console.log('SDVsdvsdzv');
                var countryID = $(this).val();
                console.log(countryID);
                getStates(countryID,'permanent_state');
            });  
                
         /* country select than after state fetch  code end */    
         
         /* state select than after city fetch  code start*/ 

            var curentCity ='{{ old("current_city") }}' ? '{{ old("current_city") }}' : '{{ $personal_detail->current_city_id ?? 0}}'; 
            var stateID = '{{ old("current_state") }}' ? '{{ old("current_state") }}' : '{{ $personal_detail->current_state_id  ?? 0}}'; 
           
            console.log('stateID ::',stateID);
            console.log('curentCity ::',curentCity);

            getCitys(stateID,'current_city',curentCity);


            
            var permentCity = '{{ old("permanent_city") }}' ? '{{ old("permanent_city") }}' : '{{ $personal_detail->permanent_city_id  ?? 0}}'; 
            var stateID = '{{ old("permanent_state") }}' ? '{{ old("permanent_state") }}' : '{{ $personal_detail->permanent_state_id ?? 0}}';  
            
            
            getCitys(stateID,'permanent_city',permentCity);


            function getCitys(stateID,place,cityId = '0') {
                $.ajax({
                    url:"{{route('getcity')}}",
                    type: "GET",
                    data: {
                        sid: stateID
                    },
                    success: function(result) {
                        $.each(result.cities, function (key, value) {
                            var selected = '';
                            if(cityId == value.id){
                                selected = 'selected'; 
                            }
                            $('#'+place).append('<option value="' + value.id + '" '+selected+'>' + value.name + '</option>');
                        });
                            
                    }
                });
            } 
            $('#current_state').on('change', function () {
                console.log('rreena');
                var stateID = $(this).val();
                console.log(stateID);
                getCitys(stateID,'current_city');
            });   
                
            $('#permanent_state').on('change', function () {
                console.log('rity');
                var stateID = $(this).val();
                console.log(stateID);
                getCitys(stateID,'permanent_city');
            });  
                
         /* state select than after city fetch  code end */ 

         /*  same as address code start*/

            // $('#homepostalcheck').click(function(){
            //     if ($("#homepostalcheck").is(":checked")) 
            //     {
            //         console.log('same as address button entered');

              
            //         add=`
            //         <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            //         <label for="inputAddress2">Permanent Address</label>
            //         <textarea  rows="6"  tabindex="18" name="permanent_address"   class="form-control praddress" id="inputAddress2" placeholder="Apartment, studio, or floor"></textarea>

            //         </div>

            //         <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            //         <label>Country </label>
            //         <select class="form-control prcountry"  tabindex="19" id="permanent_country" name="permanent_country">
            //             <option value="" selected="">Select Country</option>
            //             @foreach($country as $con)
            //                 <option value="{{$con->id}}" {{ (isset($personal_detail) ? ($personal_detail->permanent_country_id  == $con->id ? 'selected' : '') :  old('current_country') == $con->id ? 'selected' : '' ) }}>{{$con->name}}  </option>
            //             @endforeach
                    
            //         </select>

            //         </div>

            //         <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            //         <label>State</label>
            //         <select class="form-control"  tabindex="20" id="permanent_state"  name="permanent_state" >
            //         <option value="" selected="">Select State</option>

                        
            //         </select>

            //         </div>

            //         <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            //         <label>City</label>
            //         <select class="form-control"id="permanent_city"  tabindex="21" name="permanent_city">
            //         <option value="" selected="">Select city</option>
                    
                            
            //         </select>

            //         </div>


            //         <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            //         <label>Pincode</label>
            //         <input type="text" name="permanent_pincode"  tabindex="22" value = ""  class="form-control form-control-lg prpincode" placeholder="Enter permanant pincode">

            //         </div>

            //         `;


            //         $( "#replace" ).replaceWith(add);

            //         $craddress=$('.craddress').val();
            //         console.log($craddress);

            //         $('.praddress').val($craddress);





            //         $crpincode=$('.crpincode').val();
            //         console.log($crpincode);

            //         $('.prpincode').val($crpincode);



            //         $crcountry=$('.crcountry').val();
            //         console.log($crcountry);
            //         $('.prcountry').val($crcountry);    


            //     }
            //     else
            //     {
            //         console.log('unchecked');

            //         added=`
            //         <div class="row" >

            //             <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            //                 <label for="inputAddress2">Permanent Address</label>
            //                 <textarea  rows="6"  tabindex="18" name="permanent_address"   class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            //                     {{ (isset($personal_detail) ? $personal_detail->permanent_address :  old('permanent_address')) }}
            //                 </textarea>
            //                 @if ($errors->has('permanent_address'))
            //                     <span class="errr-validation">{{ $errors->first('permanent_address') }}</span>
            //                 @endif
            //             </div>

            //             <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            //                 <label>Country </label>
            //                 <select class="form-control"  tabindex="19" id="permanent_country" name="permanent_country">
            //                     <option value="" selected="">Select Country</option>
            //                     @foreach($country as $con)
            //                         <option value="{{$con->id}}" {{ (isset($personal_detail) ? ($personal_detail->permanent_country_id  == $con->id ? 'selected' : '') :  old('current_country') == $con->id ? 'selected' : '' ) }}>{{$con->name}}  </option>
            //                     @endforeach
            //                 </select>
            //                 @if ($errors->has('permanent_country'))
            //                     <span class="errr-validation">{{ $errors->first('permanent_country') }}</span>
            //                 @endif
            //             </div>

            //             <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            //                 <label>State</label>
            //                 <select class="form-control"  tabindex="20" id="permanent_state"  name="permanent_state" >
                                
                                
            //                 </select>
            //                 @if ($errors->has('permanent_state'))
            //                     <span class="errr-validation">{{ $errors->first('permanent_state') }}</span>
            //                 @endif
            //             </div>

            //             <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            //                 <label>City</label>
            //                 <select class="form-control"id="permanent_city"  tabindex="21" name="permanent_city">
                                
                                    
            //                 </select>
            //                 @if ($errors->has('permanent_city'))
            //                     <span class="errr-validation">{{ $errors->first('permanent_city') }}</span>
            //                 @endif
            //             </div>


            //             <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            //                 <label>Pincode</label>
            //                 <input type="text" name="permanent_pincode"  tabindex="22" value = "{{ (isset($personal_detail) ? $personal_detail->permanent_pincode :  old('permanent_pincode')) }}"  class="form-control form-control-lg" placeholder="Enter permanant pincode">
            //                 @if ($errors->has('permanent_pincode'))
            //                     <span class="errr-validation">{{ $errors->first('permanent_pincode') }}</span>
            //                 @endif
            //             </div>

            //         </div>

            //         `;

            //         $( "#replace" ).replaceWith(added);
            //     }
            // })

         /*  same as address code end*/

         

    });

</script>
 @endpush   
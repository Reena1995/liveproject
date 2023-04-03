
<form id="employmentform"  name="employmentform" action="{{route('organization.employment.add')}}"  method="post" enctype="multipart/form-data">
    <div class="form-row">
        @csrf

        <input type="hidden" name="user_id" value="{{$emp->uuid}}">

        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Date Of Joining</label>
            <input type="date" name="date_of_joining"  value = "{{ (isset($employment_detail) ? $employment_detail->date_of_joining :  old('date_of_joining')) }}" class="form-control form-control-lg" placeholder="Enter Father Name">
            @if ($errors->has('date_of_joining'))
                <span class="errr-validation">{{ $errors->first('date_of_joining') }}</span>
            @endif
        </div>  
       
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Date Of Resigning</label>
            <input type="date" name="date_of_resigning"  value = "{{ (isset($employment_detail) ? $employment_detail->date_of_resigning :  old('date_of_resigning')) }}" class="form-control form-control-lg" placeholder="Select Date Of Birth">
            @if ($errors->has('date_of_resigning'))
                <span class="errr-validation">{{ $errors->first('date_of_resigning') }}</span>
            @endif
        </div>

        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Date Of Leaving</label>
            <input type="date" name="date_of_leaving"  value = "{{ (isset($employment_detail) ? $employment_detail->date_of_leaving :  old('date_of_leaving')) }}" class="form-control form-control-lg" placeholder="Select Date Of Birth">
            @if ($errors->has('date_of_leaving'))
                <span class="errr-validation">{{ $errors->first('date_of_leaving') }}</span>
            @endif
        </div>
       
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Reason For Leaving</label>
            <textarea  class="form-control form-control-lg"  name="reason_for_leaving"  cols="30" placeholder="Enter Details Of reason for_ eaving">{{ (isset($employment_detail) ? $employment_detail->reason_for_leaving : old('reason_for_leaving')) }}</textarea>
            @if ($errors->has('reason_for_leaving'))
                <span class="errr-validation">{{ $errors->first('reason_for_leaving') }}</span>
            @endif
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-12 ">
            
                <label>Resign Letter</label>
                @if(empty($employment_detail))
                <input type="file" name="resign_letter_pdf" class="form-control form-control-lg" id="inputGroupFile9" >
                
                <div class="file mt-2">
                    <span id="resign-error" class="errr-validation">
                        @if ($errors->has('resign_letter_pdf'))
                            {{ $errors->first('resign_letter_pdf') }}
                            @endif
                            </span>
                </div>   
                @else
                    <input type="file" name="resign_letter_pdf" class="form-control form-control-lg" id="inputGroupFile02" accept="image/png, image/gif, image/jpeg">
                    
                    <div class="file mt-2">
                        @if ($errors->has('resign_letter_pdf'))
                        <span class="errr-validation">{{ $errors->first('resign_letter_pdf') }}</span>
                        @endif
                    </div>    
                    <div class="imageset mt-4 m-4">
                        <img src="{{asset('console/upload/employee/resignletter/'.$employment_detail->resign_letter_pdf)}}" height="120px" width="100px"> 
                    </div>    
                @endif    
                
          
        </div>

        
        <div class="form-card-footer card-footer p-t-20 p-0 text-right">
            <!-- <div class="btn-group mr-2" role="group" aria-label="Second group">
                <a href="" >
                    <button class="theme-btn-outline">cancel</button>
                </a>
            </div> -->
            <div class="btn-group mr-2" role="group" aria-label="Second group">
                <button type="submit"  id="employmentDetailBtn" value="submit" name="submit" class="theme-btn text-white">Save</button>
            </div>
        </div>        
    </div> 
</form>
@push('scripts')
 
 @endpush   
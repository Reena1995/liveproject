<form id="bank_form_id"  name="bank_form_id" action="{{route('organization.bank.add')}}"  method="post" enctype="multipart/form-data">
    <div class="form-row">
        @csrf
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Account Holder Name</label>
            <input type="text" name="ac_holder_name"  value = "{{ (isset($emp_bank_profile) ? $emp_bank_profile->ac_holder_name :  old('ac_holder_name')) }}"  class="form-control form-control-lg" placeholder="Enter Account Holder Name">
            @if ($errors->has('ac_holder_name'))
                <span class="errr-validation">{{ $errors->first('ac_holder_name') }}</span>
            @endif
        </div>  
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">

            <label>Bank Name</label>
            <input type="text" name="bank_name"  value = "{{ (isset($emp_bank_profile) ? $emp_bank_profile->bank_name :  old('bank_name')) }}"  class="form-control form-control-lg" placeholder="Enter Bank Name">
            @if ($errors->has('bank_name'))
                <span class="errr-validation">{{ $errors->first('bank_name') }}</span>
            @endif
        </div>
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Branch Name</label>
            <input type="text" name="branch_name"  value = "{{ (isset($emp_bank_profile) ? $emp_bank_profile->branch_name :  old('branch_name')) }}"  class="form-control form-control-lg" placeholder="Enter Branch name">
            @if ($errors->has('branch_name'))
                <span class="errr-validation">{{ $errors->first('branch_name') }}</span>
            @endif
        </div>  
      
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Account No</label>
            <input type="text" name="account_no"  value = "{{ (isset($emp_bank_profile) ? $emp_bank_profile->account_no :  old('account_no')) }}"  class="form-control form-control-lg" placeholder="Enter Branch name">
            @if ($errors->has('account_no'))
                <span class="errr-validation">{{ $errors->first('account_no') }}</span>
            @endif
        </div>

        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label> Ifsc Code</label>
            <input type="text" name="ifsc_code"  value = "{{ (isset($emp_bank_profile) ? $emp_bank_profile->ifsc_code	 :  old('ifsc_code	')) }}"  class="form-control form-control-lg" placeholder="Enter ifsc code">
            @if ($errors->has('ifsc_code'))
                <span class="errr-validation">{{ $errors->first('ifsc_code') }}</span>
            @endif
        </div>
        
       
        
        
        <div class="form-card-footer card-footer p-t-20 p-0 text-right">
            <!-- <div class="btn-group mr-2" role="group" aria-label="Second group">
                <a href="" >
                    <button class="theme-btn-outline">cancel</button>
                </a>
            </div> -->
            <div class="btn-group mr-2" role="group" aria-label="Second group">
                <button type="submit"  value="submit" name="submit" class="theme-btn text-white">Save</button>
            </div>
        </div>        
    </div> 
</form>
@push('scripts')
 <script>
    
</script>
 @endpush   
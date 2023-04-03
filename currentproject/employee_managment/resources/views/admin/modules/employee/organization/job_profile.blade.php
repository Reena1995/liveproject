<form id="jobprofileform_id"  name="job_profile_add" action="{{route('organization.jobprofile.add')}}"  method="post" enctype="multipart/form-data">
    <div class="form-row">
        @csrf
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Conmpany Employee Id</label>
            <input type="text" name="company_employee_id"  value = "{{ (isset($emp_job_profile) ? $emp_job_profile->company_employee_id :  old('company_employee_id')) }}"  class="form-control form-control-lg" placeholder="Enter company employee id">
            @if ($errors->has('company_employee_id'))
                <span class="errr-validation">{{ $errors->first('company_employee_id') }}</span>
            @endif
        </div>  

        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Company Employee Device Id</label>
            <input type="text" name="company_emp_device_id"  value = "{{ (isset($emp_job_profile) ? $emp_job_profile->company_emp_device_id	 :  old('company_emp_device_id')) }}"  class="form-control form-control-lg" placeholder="Enter company employee device id">
            @if ($errors->has('company_emp_device_id'))
                <span class="errr-validation">{{ $errors->first('company_emp_device_id') }}</span>
            @endif
        </div>
          
       
        

        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Select Department</label>
            <select class="form-control"  name="department_id">
                <option value="" selected="">Select Department</option>
                @foreach($department as $depart)
                        <option value="{{$depart->id}}" {{ (isset($emp_job_profile) ? ($emp_job_profile->department_id  == $depart->id ? 'selected' : '') :  old('department_id') == $depart->id ? 'selected' : '' ) }}>{{$depart->name}}  </option>
                        
                    @endforeach
            </select>
            @if ($errors->has('department_id'))
                <span class="errr-validation">{{ $errors->first('department_id') }}</span>
            @endif
        </div>

       

        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Select Designation</label>
            <select class="form-control"  name="designation_id">
                <option value="" selected="">Select Designation</option>
                @foreach($designation as $desig)
                        <option value="{{$desig->id}}" {{ (isset($emp_job_profile) ? ($emp_job_profile->designation_id  == $desig->id ? 'selected' : '') :  old('designation_id') == $desig->id ? 'selected' : '' ) }}>{{$desig->name}}  </option>
                        
                    @endforeach
            </select>
            @if ($errors->has('designation_id'))
                <span class="errr-validation">{{ $errors->first('designation_id') }}</span>
            @endif
        </div>
        
      
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Select Organization Role</label>
            <select class="form-control"  name="organization_role_id">
                <option value="" selected="">Select Organization Role</option>
                @foreach($organization_role as $org_role)
                        <option value="{{$org_role->id}}" {{ (isset($emp_job_profile) ? ($emp_job_profile->organization_role_id   == $org_role->id ? 'selected' : '')  :  old('organization_role_id') == $org_role->id ? 'selected' : '' ) }}>{{$org_role->name}}  </option>
                        
                    @endforeach
            </select>
            @if ($errors->has('organization_role_id'))
                <span class="errr-validation">{{ $errors->first('organization_role_id') }}</span>
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
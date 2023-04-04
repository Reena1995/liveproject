<form id="jobprofileform_id"  name="job_profile_add" action=""  method="post" enctype="multipart/form-data">
    <div class="form-row">
        @csrf
       
        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Conmpany Employee Id</label>
            <input type="text" name="company_employee_id"  value = "{{  $emp_job_profile->company_employee_id  }}"  class="form-control form-control-lg" readonly> 
        </div>  

        <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
            <label>Company Employee Device Id</label>
            <input type="text" name="company_emp_device_id"  value = "{{ $emp_job_profile->company_emp_device_id}}"  class="form-control form-control-lg"  readonly>
           
        </div>
        
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Department</label>
            <input type="text" name="department_id"  value = "{{$emp_job_profile->departmentActive->name}}"  class="form-control form-control-lg"  readonly> 
        </div>

        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Designation</label>
            <input type="text" name="designation_id"  value = "{{$emp_job_profile->designationActive->name}}"  class="form-control form-control-lg"  readonly> 
           
        </div>
    
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Organization Role</label>
            <input type="text" name="organization_role_id"  value = "{{$emp_job_profile->organizationRoleActive->name}}"  class="form-control form-control-lg"  readonly>   
        </div>

    </div> 
</form>
@push('scripts')
 <script>
    
</script>
 @endpush   
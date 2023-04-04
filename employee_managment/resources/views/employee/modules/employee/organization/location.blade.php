
<form id="emp_location_id"  name="emp_location_id" action=""  method="post" enctype="multipart/form-data">
    <div class="form-row">
        @csrf
        
        
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Company Location</label>
            <input type="text" name="company_location_id"  value = "{{$emp_location_details->companyLocationActive->name}}"  class="form-control form-control-lg"  readonly> 
            
        </div>
        
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Company Location Type</label>
            <input type="text" name="company_location_type_id"  value = "{{$emp_location_details->companyLocationTypeActive->type}}"  class="form-control form-control-lg"  readonly> 
           
        </div>
        
         
    </div> 
</form>
@push('scripts')
 <script>
    
</script>
 @endpush   
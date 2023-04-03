
<form id="emp_location_id"  name="emp_location_id" action="{{route('organization.location.add')}}"  method="post" enctype="multipart/form-data">
    <div class="form-row">
        @csrf
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">
        
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Company Location</label>
            <select class="form-control"  name="company_location_id">
                <option value="" selected="">Select Company Location</option>
                @foreach($company_location as $location)
                        <option value="{{$location->id}}" {{ (isset($emp_location_details) ? ($emp_location_details->company_location_id  == $location->id ? 'selected' : '') :  old('organization_role_id') == $location->id ? 'selected' : '' ) }}>{{$location->name}}  </option>
                        
                    @endforeach
            </select>
           
        </div>
        
        <div class="form-group floating-label show-label col-lg-6 col-md-6 col-sm-12">
            <label>Company Location Type</label>
            <select class="form-control"  name="company_location_type_id">
            <option value="" selected="">Select Location Type</option>
                @foreach($company_location_type as $type)
                        <option value="{{$type->id}}" {{ (isset($emp_location_details) ? ($emp_location_details->company_location_type_id   == $type->id ? 'selected' : '') :  old('company_location_type_id ') == $type->id ? 'selected' : '' ) }}>{{$type->type}}</option>
                    @endforeach
            </select>
            
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
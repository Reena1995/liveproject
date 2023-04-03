<form id="document_deatil_add" name="document_deatil_add"  action="{{route('personal.document.add')}}"  method="post" enctype="multipart/form-data">
@csrf
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">
       
     
        @if(count($empDocumentDetails))
             @foreach($empDocumentDetails as $empdoc)        
                            <div class="form-row">

                                <input type="hidden" name="document_uuid[]" value="{{$empdoc->uuid}}"> 
                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                    <label>Document Type</label>
                                    <input type="hidden" name="type[]"  value="{{$empdoc->documentName->id}}" >
                                    <input type="text"  value="{{$empdoc->documentName->type}}" class="form-control form-control-lg" readonly>
                                </div>

                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                    <div class="custom-file">
                                            <input type="file"  name="documents[]" class="" id="inputGroupFile02" >
                                             <div class="imageset mt-4 m-4">
                                                <img src="{{asset('console/upload/employee/document/'.$empdoc->file)}}" height="120px" width="100px"> 
                                            </div> 
                                    </div>        
                                    
                                </div>


                            </div>
                           
                @endforeach 
            @else  
            
            @if(count($document))
                            @foreach($document as $doc)
                            <div class="form-row">
                          
                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">

                                    <label>Document Type</label>
                                    <input type="hidden" name="type[]"  value="{{$doc->id}}" >
                                    <input type="text"   value="{{$doc->type}}" class="form-control form-control-lg" readonly>
                                </div>
                                @if ($errors->has('type[]'))
                                        <span class="errr-validation">{{ $errors->first('type[]') }}</span>
                                    @endif

                                <div class="form-group floating-label col-lg-6 col-md-6 col-sm-12">
                                    <div class="custom-file">
                                            <input type="file" value="" data-key="doc_image" name="documents[]"  id="inputGroupFile02" >
                                    </div>
                                    @if ($errors->has('documents[]'))
                                        <span class="errr-validation">{{ $errors->first('documents[]') }}</span>
                                    @endif
                                    
                                </div>


                            </div>
                           @endforeach
            @endif     
        @endif 

        <div class="form-card-footer card-footer p-t-20 p-0 text-right">
                    <!-- <div class="btn-group mr-3" role="group" aria-label="Second group">
                        <a href="" >
                            <button class="theme-btn-outline">cancel</button>
                        </a>
                    </div> -->
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="button"  id="doctBtn"  class="theme-btn text-white">Save</button>
                    </div>
            </div>    




      
</form>

@push('scripts')
 <script>
    
</script>
 @endpush   
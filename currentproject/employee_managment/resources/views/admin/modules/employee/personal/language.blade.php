<form id="langauge_form_id"  name="langauge_add" action="{{route('personal.langauge.add')}}"  method="post" enctype="multipart/form-data">
@csrf
        <input type="hidden" name="user_id" value="{{$emp->uuid}}">
    <div class="row">
        <div class="col-12">
            <table class="table language_table">
                <thead>
                    <tr>
                    <th scope="col">Languages Know</th>
                    <th scope="col">Read</th>
                    <th scope="col">Write</th>
                    <th scope="col">Speak</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($emp_languages))
                        @foreach($emp_languages as $r => $emp_language)
                            <tr>
                                <td>
                                    <input type="hidden" name="lang_uuid[]" value="{{$emp_language->uuid}}"> 
                                    <div class="form-group floating-label mb-0">
                                        <input type="hidden" name="language_id[]"  value="{{$emp_language->languageName->id}}" >
                                        <input type="text"  value="{{$emp_language->languageName->name}}" readonly class="form-control form-control-lg">
                                    </div>  
                                </td>
                                
                                <td><input type="checkbox" id="read" name="read[{{$r}}]" value="YES" {{$emp_language->read == 'YES' ? 'checked' : ''}}></td>
                                <td><input type="checkbox" id="write" name="write[{{$r}}]" value="YES" {{$emp_language->write == 'YES' ? 'checked' : ''}}></td>
                                <td><input type="checkbox" id="speak" name="speak[{{$r}}]" value="YES" {{$emp_language->speak == 'YES' ? 'checked' : ''}}></td>
                            </tr>
                         @endforeach   
                    @else
                        @if(count($langauge))
                            @foreach($langauge as $k => $lang)
                            <tr>
                                <td>
                                    <div class="form-group floating-label mb-0">
                                        <input type="hidden" name="language_id[]"  value="{{$lang->id}}" >
                                        <input type="text"  value="{{$lang->name}}" class="form-control form-control-lg" readonly>
                                    </div>  
                                </td>
                                
                                <td><input type="checkbox" id="read" name="read[{{$k}}]" value="YES"></td>
                                
                                <td><input type="checkbox" id="write" name="write[{{$k}}]" value="YES"></td>
                                <td><input type="checkbox" id="speak" name="speak[{{$k}}]" value="YES"></td>
                            </tr>
                            @endforeach
                        @endif  
                    @endif
                </tbody>
            </table>
        </div>
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
</form>

@push('scripts')
 <script>
    
</script>
 @endpush   
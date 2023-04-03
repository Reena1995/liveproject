<script>

    /* employee register validation start */
    $(document).ready(function(){

            $("#employee_register").validate({
                rules : {
                    first_name : "required",  
                    last_name : "required",
                    company_mail : "required",  
                    mobile_no :  { required : true,
                            number:true,
                            minlength:10,
                            maxlength:10
                        }                  
                },
                messages : {
                    first_name : "Please Enter a First Name ",
                    last_name : "Please Enter  a Last Name ",
                    company_mail : "Please Enter an Email Id  ",
                    mobile_no : {
                            required : "Please enter a Mobile Number.",
                            number:'Please enter valid Number.',
                            minlength : "Please enter at least 10 digit Number.",
                            maxlength : "Please enter at least 10 digit Number.",
                        },
                },
                errorClass: "custom-error",
                errorElement: "div",
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(element).append(error)
                    } else {
                        console.log(element.prev());
                        error.insertAfter(element);
                    }
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
       
        /* employee register validation start */
        
        /*personal deatils  Frontend validation start*/
          var isEditImage = '{{ !empty($personal_detail) && ($personal_detail->image) }}' ? 2:1; 
       
            $(document).delegate('#personalDetailBtn','click',function(){
                isImageValidation() 
                formSubmitPersonal();  
            });

            function isImageValidation(){
                 console.log('isEditImage :',isEditImage);
                var img = $('#inputGroupFile02').val();
                var html = '';
                console.log('img ::',img);
                if(img == '' && (isEditImage == 1)){
                    html = 'Please select image';
                    $('#img-error').html(html);
                    return false;
                }   
                $('#img-error').html(html);
                console.log(img);
                console.log('Html ::    ',html);
                return true;
            }
            function formSubmitPersonal(){
                console.log('asd');
                $("#personalDetailForm").validate({
                    rules : {
                        fathername : "required",  
                        mothername : "required", 
                        dob : "required",  
                        gender : "required",    
                        bloodgroup : "required",  
                        alternateno : { required : true,
                            number:true,
                            minlength:10,
                            maxlength:10
                        },    
                        marital_status : "required",  
                        //image :  {extension:'jpg|jpeg|png|ico|bmp'},    
                        residencetype : "required",     
                        transportationmode : "required",    
                        disabilitydtls : "required",  
                        totalexperience : "required",
                        current_address : "required",  
                        permanent_address : "required", 
                        current_country : "required",  
                        permanent_country : "required",    
                        current_state : "required",  
                        permanent_state : "required",    
                        current_city : "required",  
                        permanent_city : "required",    
                        current_pincode : {required: true,number:true},  
                        permanent_pincode : {required: true,number:true},    
                        
                    },
                    messages : {
                        fathername : "Please Enter a fathername ",
                        mothername : "Please Enter  a mothername ",
                        dob : "Please select a date of birth ",
                        gender : "Please Select  a gender ",
                        bloodgroup : "Please Enter a bloodgroup ",
                        alternateno : {
                            required : "Please enter a Mobile Number.",
                            number:'Please enter valid Number.',
                            minlength : "Please enter at least 10 digit Number.",
                            maxlength : "Please enter at least 10 digit Number.",
                        },
                        marital_status : "Please Select a marital status ",
                       // image : {extension:"only jpg ,jpeg ,pdf"},
                        residencetype : "Please Select a residencetype ",
                        transportationmode : "Please Select  a transportationmode ",
                        disabilitydtls : "Please Enter a disability details ",
                        totalexperience : "Please Enter a totalexperience ",  
                        current_address : "Please Enter a Address ",
                        permanent_address : "Please Enter  a Address ",
                        current_country : "Please Select a Country ",
                        permanent_country : "Please Select  a Country ",
                        current_state : "Please Select a State ",
                        permanent_state : "Please Select  a State ",
                        current_city : "Please Select  a City",
                        permanent_city : "Please Select  a City",
                        current_pincode :  {required: "Please Enter a pincode",number:"Please enter numbers Only"},
                        permanent_pincode :  {required: "Please Enter a pincode",number:"Please enter numbers Only"},
                    },
                    errorClass: "custom-error",
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        console.log(element.attr("type"),'placement');
                        if((element.attr("type") == 'radio')){                       
                            $(element).parents('.gender').append(error)
                        }else if (element.attr("type") == 'file') {
                            $('.file').append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler : function(form){
                        if(!isImageValidation()){
                            return false;
                        }else{
                            form.submit();
                        }
                    }
                });
            }
         /*personal deatils validation Frontend jquery */

         /*employee education validation start */

                $('#educationDetailBtn').on('click', function(event) {
                    var isValid = 1;
                    event.preventDefault()
                  
                    console.log('subbbbbbbbb');
                
                    $('#education_deatil_add :input').each(function(index,ele) {
                        console.log('xxxx');
                        var input = $(this);
                        console.log(ele);
                        console.log($(ele).val());
                        console.log($(ele).val().length , 'condition');
                        
                        if($(ele).val().length === 0){

                            console.log('check');

                            if($(ele).attr('type') == 'text')
                            {
                               
                                var elementNamee=$(ele).attr('name');
                                var elename = elementNamee.split('[]');
                                console.log('zzzzzzzzz');
                                console.log(elename);
                                isValid = 2;
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                            }

                            if($(ele).attr('type') == 'file')
                            {
                                console.log('zzzzzzzzz');
                               
                                
                                if($(ele).attr('data-key') == 'new_image'){

                                    var elementNamee=$(ele).attr('name');
                                    var elename = elementNamee.split('[]');
                                    console.log(elename);
                                    isValid = 2;
                                    $(ele).parents('.form-group').find('.error').remove();
                                    ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                                }
                            }

                           
                        }
                        else if($(ele).attr('data-key') == 'per'){

                                var mobNum = this.value;
                                var numericCheck=$.isNumeric(mobNum);

                            if($.isNumeric(mobNum))
                            {
                                if (mobNum>1 || mobNum<100) {
                                console.log('percentage');
                                    isValid = 1;
                                    $(ele).parents('.form-group').find('.error').remove();
                            
                                } else {
                                
                                console.log('else12');
                                isValid = 2;
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">100 between</p>'));
                        
                                }
                                                    
                            }
                            else{
                                    isValid = 2;
                                    $(ele).parents('.form-group').find('.error').remove();
                                    ($(ele).parents('.form-group').append('<p class="error">Please enter only digit number</p>'));
                                
                            
                                }

                        }  
                       
                        else
                        {
                            $(ele).parents('.form-group').find('.error').remove();
                        }
                       
                    });
                    if(isValid == 2){
                        return false;
                    }else{
                        $("#education_deatil_add").submit();
                    }
                  
                   

                });

            /*employee education validation end */   

         /* job profile validation start */
            
            $("#jobprofileform_id").validate({

                rules : {
                    company_employee_id : "required",  
                    company_emp_device_id : "required",
                    department_id  : "required", 
                    designation_id  : "required",
                    organization_role_id   : "required", 
           
                },
                messages : {
                    company_employee_id : "Please enter company employeeid",
                    company_emp_device_id : "Please enter company_emp_device_id",
                    department_id : "Please select department",
                    designation_id : "Please select designation",
                    organization_role_id : "Please select organization role id",
                   
                },
                errorClass: "custom-error",
                errorElement: "div",
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(element).append(error)
                    } else {
                        console.log(element.prev());
                        error.insertAfter(element);
                    }
                },
                submitHandler : function(form){
                    form.submit();
                }
            });
         
         /* job profile validation end */

          /*bank deatils validation start */

            $("#bank_form_id").validate({
                rules : {
                    ac_holder_name	 : "required",  
                    bank_name : "required",
                    branch_name  : "required", 
                    account_no  : "required",
                    ifsc_code   : "required", 
           
                },
                messages : {
                    ac_holder_name	 : "Please enter ac holder name	",
                    bank_name : "Please enter 	bank name",
                    branch_name : "Please enter	branch name",
                    account_no : "Please enter account no",
                    ifsc_code : "Please enter ifsc code",
                   
                },
                errorClass: "custom-error",
                errorElement: "div",
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(element).append(error)
                    } else {
                        console.log(element.prev());
                        error.insertAfter(element);
                    }
                },
                submitHandler : function(form){
                    form.submit();
                }
            });

          /*bank deatils validation end */

          /*employment deatils  validation start */
           
            var isEditResign = '{{ !empty($employment_detail) && ($employment_detail->resign_letter_pdf) }}' ? 2:1; 
       
            $(document).delegate('#employmentDetailBtn','click',function(){
                isResignValidation() 
                formSubmitEmployment();  
            });
            function isResignValidation(){
                 console.log('isEditResign :',isEditResign);
                var resign = $('#inputGroupFile9').val();
                var html1 = '';
                console.log('resign ::',resign);
               
                if(resign == '' && (isEditResign == 1)){
                    html = 'Please select resign pdf';
                    $('#resign-error').html(html);
                    return false;
                }   
                $('#resign-error').html(html1);
                console.log(resign);
                console.log('Html ::    ',html1);
                return true;
            }
            function formSubmitEmployment(){
                console.log('asd');
                $("#employmentform").validate({
                    rules : {
                         
                        date_of_joining	 : "required",  
                        date_of_resigning : "required",
                        date_of_leaving  : "required", 
                        reason_for_leaving  : "required"
                       
                    },
                    messages : {
                        date_of_joining	 : "Please select date of joining",
                        date_of_resigning : "Please select date of resigning",
                        date_of_leaving : "Please select date of leaving",
                        reason_for_leaving : "Please enter for leaving for reason"
                       
                       
                    },
                    errorClass: "custom-error",
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        console.log(element.attr("type"),'placement');
                        if((element.attr("type") == 'radio')){                       
                            $(element).parents('.gender').append(error)
                        }else if (element.attr("type") == 'file') {
                            $('.file').append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler : function(form){
                        if(!isImageValidation()){
                            return false;
                        }else{
                            form.submit();
                        }
                    }
                });
            }

          /*employment deatils  validation end */

           /*employee location histories validation start */

                $("#emp_location_id").validate({
                    rules : {
                        company_location_id 	 : "required",  
                        company_location_type_id   : "required"
                    
            
                    },
                    messages : {
                        company_location_id 	 : "Please select company location",
                        company_location_type_id  : "Please select company location type",
                    
                    
                    },
                    errorClass: "custom-error",
                    errorElement: "div",
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(element).append(error)
                        } else {
                            console.log(element.prev());
                            error.insertAfter(element);
                        }
                    },
                    submitHandler : function(form){
                        form.submit();
                    }
                });

            /*employee location histories validation end */


             /*employee document validation start */

                $('#doctBtn').on('click', function(event) {
                    var isValid = 1;
                    event.preventDefault()
                  
                    console.log('subbbbbbbbb');
                
                    $('#document_deatil_add :input').each(function(index,ele) {
                        console.log('xxxx');
                        var input = $(this);
                        console.log(ele);
                        console.log($(ele).val());
                        console.log($(ele).val().length , 'condition');
                        
                        if($(ele).val().length === 0){

                            console.log('check');
                           
                            if($(ele).attr('type') == 'file')
                            {
                                console.log('zzzzzzzzz');
                                if($(ele).attr('data-key') == 'doc_image'){
                                    isValid = 2;
                                    $(ele).parents('.form-group').find('.error').remove();
                                    ($(ele).parents('.form-group').append('<p class="error">This field is required</p>'));
                                }
                            }

                           
                        }
                        else
                        {
                            $(ele).parents('.form-group').find('.error').remove();
                        }
                       
                    });
                    if(isValid == 2){
                        return false;
                    }else{
                        $("#document_deatil_add").submit();
                    }
                  
                   

                });

            /*employee document validation end */   

              /*employee asset validation start */

                $('#assetbtn').on('click', function(event) {
                    var isValid = 1;
                    event.preventDefault()
                  
                    console.log('subbbbbbbbb');
                
                    $('#emp_asset_deatil_add :input').each(function(index,ele) {
                        console.log('xxxx');
                        var input = $(this);
                        console.log(ele);
                        console.log($(ele).val());
                        console.log($(ele).val().length , 'condition');
                        
                        if($(ele).val().length === 0){

                            console.log('check');

                            if($(ele).attr('type') == 'text')
                            {
                               
                                var elementNamee=$(ele).attr('name');
                                var elename = elementNamee.split('[]');
                                console.log('zzzzzzzzz');
                                console.log(elename);
                                isValid = 2;
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                            }

                            if($(ele).attr('type') == 'date')
                            {
                                var elementNamee=$(ele).attr('name');
                                var elename = elementNamee.split('[]');
                                isValid = 2;
                                console.log('zzzzzzzzz');
                                console.log(elename);
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                            }
                           
                            if($(ele).attr('type') == 'file')
                            {
                                console.log('zzzzzzzzz');
                               
                                
                                if($(ele).attr('data-key') == 'image_fill'){

                                    var elementNamee=$(ele).attr('name');
                                    var elename = elementNamee.split('[]');
                                    console.log(elename);
                                    isValid = 2;
                                    $(ele).parents('.form-group').find('.error').remove();
                                    ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                                }
                            }

                           
                        }
                        else
                        {
                            $(ele).parents('.form-group').find('.error').remove();
                        }
                       
                    });
                    if(isValid == 2){
                        return false;
                    }else{
                        $("#emp_asset_deatil_add").submit();
                    }
                  
                   

                });

            /*employee asset validation end */ 


             /*employee professional validation start */

                $('#profBtn').on('click', function(event) {
                    var isValid = 1;
                    event.preventDefault()
                  
                    console.log('subbbbbbbbb');
                
                    $('#emp_proessional_add :input').each(function(index,ele) {
                        console.log('xxxx');
                        var input = $(this);
                        console.log(this.tagName);
                        // console.log($(ele).val());
                       
                        console.log('bbbbbbbbb');
                        // console.log($(ele).val().length , 'condition');
                        
                        if($(ele).val().length === 0){

                            console.log('check');

                            if($(ele).attr('type') == 'text')
                            {
                               
                                var elementNamee=$(ele).attr('name');
                                var elename = elementNamee.split('[]');
                                console.log('zzzzzzzzz');
                                console.log(elename);
                                isValid = 2;
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                            }

                            if($(ele).attr('type') == 'date')
                            {
                                var elementNamee=$(ele).attr('name');
                                var elename = elementNamee.split('[]');
                                isValid = 2;
                                console.log('zzzzzzzzz');
                                console.log(elename);
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                            }

                            if($(ele).attr('type') == 'file')
                            {
                                console.log('ffffffffff');
                               
                                
                                if($(ele).attr('data-key') == 'certificate_image'){

                                    var elementNamee=$(ele).attr('name');
                                    var elename = elementNamee.split('[]');
                                    console.log(elename);
                                    isValid = 2;
                                    $(ele).parents('.form-group').find('.error').remove();
                                    ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                                }
                            }

                            if(!($(ele).val())){

                                if(this.tagName == 'TEXTAREA'){

                                    if(!$.trim($(".textArea").val()))
                                    {
                                        isValid = 2;
                                        console.log('textareacheck');

                                        console.log($(ele));
                                        var elementNamee=$(ele).attr('name');
                                        var elename = elementNamee.split('[]');
                                        console.log(elename);
                                        $(ele).parents('.form-group').find('.error').remove();
                                        ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                                    }else{
                                        isValid = 1;

                                    }
                            }
                            }else{
                                    isValid = 1;

                            }
                         
                           
                        }
                        else
                        {
                            isValid = 1;
                            $(ele).parents('.form-group').find('.error').remove();
                        }
                       
                    });
                    console.log('isValid',isValid);
                    if(isValid == 2){
                        return false;
                    }else{
                        $("#emp_proessional_add").submit();
                    }
                  
                           

                });

            /*employee professional validation end */ 


            /*employee work validation start */

                $('#workBtn').on('click', function(event) {

                    var isValid = 1;
                    event.preventDefault()
                  
                    console.log('subbbbbbbbb');
                
                    $('#emp_work_add :input').each(function(index,ele) {
                        console.log('xxxx');
                        var input = $(this);
                        console.log(ele);
                        console.log($(ele).val());
                        console.log($(ele).val().length , 'condition');
                        
                        if($(ele).val().length === 0){

                            console.log('check');

                            if($(ele).attr('type') == 'text')
                            {
                               
                                var elementNamee=$(ele).attr('name');
                                var elename = elementNamee.split('[]');
                                console.log('zzzzzzzzz');
                                console.log(elename);
                                isValid = 2;
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">Thiss '+elename[0]+'  is required</p>'));
                            }

                            if($(ele).attr('type') == 'date')
                            {
                                var elementNamee=$(ele).attr('name');
                                var elename = elementNamee.split('[]');
                                isValid = 2;
                                console.log('zzzzzzzzz');
                                console.log(elename);
                                $(ele).parents('.form-group').find('.error').remove();
                                ($(ele).parents('.form-group').append('<p class="error">Thiss '+elename[0]+'  is required</p>'));
                            }
                          
                          
                           
                            if($(ele).attr('type') == 'file')
                            {
                                console.log('zzzzzzzzz');
                               
                                
                                if($(ele).attr('data-key') == 'exp_image'){

                                    var elementNamee=$(ele).attr('name');
                                    var elename = elementNamee.split('[]');
                                    console.log(elename);
                                    isValid = 2;
                                    $(ele).parents('.form-group').find('.error').remove();
                                    ($(ele).parents('.form-group').append('<p class="error">Thiss '+elename[0]+'  is required</p>'));
                                }
                            }

                            if(!($(ele).val())){

                                    if(this.tagName == 'TEXTAREA'){

                                        if(!$.trim($(".textArea").val()))
                                        {
                                           
                                            console.log('textareacheck');

                                            console.log($(ele));
                                            var elementNamee=$(ele).attr('name');
                                            var elename = elementNamee.split('[]');
                                            console.log(elename);
                                            isValid = 2;
                                            $(ele).parents('.form-group').find('.error').remove();
                                            ($(ele).parents('.form-group').append('<p class="error">Thiss '+elename[0]+'  is required</p>'));
                                        }else{
                                            isValid = 1;

                                        }
                                    }
                                    }else{
                                            isValid = 1;

                            }

                            if($(ele).attr('data-key') == 'address'){

                            var elementNamee=$(ele).attr('name');
                            var elename = elementNamee.split('[]');
                            console.log(elename);
                            isValid = 2;
                            $(ele).parents('.form-group').find('.error').remove();
                            ($(ele).parents('.form-group').append('<p class="error">Thiss '+elename[0]+'  is required</p>'));
                            }


                           
                        }
                        else if($(ele).attr('data-key') == 'contact'){

                            var mobNum = this.value;
                            var numericCheck=$.isNumeric(mobNum);

                            if($.isNumeric(mobNum))
                            {
                                    if(mobNum.length==10){
                                        console.log('else1');
                                            isValid = 1;
                                            $(ele).parents('.form-group').find('.error').remove();
                                    

                                    } else {
                                            isValid = 2;
                                        console.log('else12');

                                        $(ele).parents('.form-group').find('.error').remove();
                                        ($(ele).parents('.form-group').append('<p class="error">Please put 10  digit mobile number</p>'));
                                    
                                
                                    }
                                    
                            }
                            else{
                                        isValid = 2;
                                        $(ele).parents('.form-group').find('.error').remove();
                                        ($(ele).parents('.form-group').append('<p class="error">Please enter only digit number</p>'));
                                    
                                
                            }
                        }   
                        else
                        {
                            $(ele).parents('.form-group').find('.error').remove();
                        }
                       
                    });
                    if(isValid == 2){
                        return false;
                    }else{
                        $("#emp_work_add").submit();
                    }
                  
                   

                });

            /*employee work validation end */ 


            /*employee family validation start */

                    $('#familyBtn').on('click', function(event) {

                        var isValid = 1;
                        event.preventDefault()

                        console.log('subbbbbbbbb');

                        $('#emp_family_add :input').each(function(index,ele) {
                            console.log('xxxx');
                            var input = $(this);
                            console.log(ele);
                            console.log($(ele).val());
                            console.log($(ele).val().length , 'condition');
                            
                            if($(ele).val().length === 0){

                                console.log('check');

                                if($(ele).attr('type') == 'text')
                                {
                               
                                    var elementNamee=$(ele).attr('name');
                                    var elename = elementNamee.split('[]');
                                    console.log('zzzzzzzzz');
                                    console.log(elename);
                                    isValid = 2;
                                    $(ele).parents('.form-group').find('.error').remove();
                                    ($(ele).parents('.form-group').append('<p class="error">This '+elename[0]+'  is required</p>'));
                                }

                              
                            
                            }
                            else if($(ele).attr('data-key') == 'mob'){

                                var mobNum = this.value;
                                var numericCheck=$.isNumeric(mobNum);

                                if($.isNumeric(mobNum))
                                {
                                        if(mobNum.length==10){
                                                isValid = 1;
                                            console.log('else1');
                                        
                                                $(ele).parents('.form-group').find('.error').remove();
                                        

                                        } else {
                                            isValid = 2;
                                            console.log('else12');

                                            $(ele).parents('.form-group').find('.error').remove();
                                            ($(ele).parents('.form-group').append('<p class="error">Please put 10  digit mobile number</p>'));
                                        
                                    
                                        }
                                        
                                }
                                else{

                                            isValid = 2;
                                            $(ele).parents('.form-group').find('.error').remove();
                                            ($(ele).parents('.form-group').append('<p class="error">Please enter only digit number</p>'));
                                        
                                    
                                }
                            } 
                            else
                            {
                                $(ele).parents('.form-group').find('.error').remove();
                            }
                        
                        });
                        if(isValid == 2){
                            return false;
                        }else{
                            $("#emp_family_add").submit();
                        }



                    });

            /*employee family validation end */ 


            /*employee emergrncy validation start */

                    $('#emeBtn').on('click', function(event) {

                            var isValid = 1;
                            event.preventDefault()

                            console.log('subbbbbbbbb');

                            $('#emp_emergency_add :input').each(function(index,ele) {
                                // console.log('xxxx');
                                var input = $(this);
                                // console.log(ele);
                                // console.log($(ele).val());

                                // console.log($(ele).val().length , 'condition');
                                
                                if($(ele).val().length === 0){

                                    console.log('check');

                                    if($(ele).attr('type') == 'text')
                                    {
                                       
                                        var elementNamee=$(ele).attr('name');
                                        var elename = elementNamee.split('[]');
                                        console.log('zzzzzzzzz');
                                        console.log(elementNamee);
                                        console.log(elename);
                                        isValid = 2;
                                        $(ele).parents('.form-group').find('.error').remove();
                                        ($(ele).parents('.form-group').append('<p class="error">This ssss'+elename[0]+'  is required</p>'));

                                       
                                            
                                    }
                                   
                                    
                                    if(!($(ele).val())){

                                        if(this.tagName == 'TEXTAREA'){

                                            if(!$.trim($(".textArea").val()))
                                            {
                                                var textareaNamee=$(ele).attr('name');
                                                var textname=textareaNamee.split('[]');
                                                console.log(textareaNamee);
                                                console.log(textname);
                                                isValid = 2;
                                                console.log('textareacheck');

                                                console.log($(ele));
                                                $(ele).parents('.form-group').find('.error').remove();
                                                ($(ele).parents('.form-group').append('<p class="error">This '+textname[0]+' is required</p>'));
                                            }else{
                                                isValid = 1;

                                            }
                                        }
                                        }else{
                                                isValid = 1;

                                        }

                                
                                }
                                
                                else if($(ele).attr('data-key') == 'mobile'){

                                    var mobNum = this.value;
                                    var numericCheck=$.isNumeric(mobNum);

                                    if($.isNumeric(mobNum))
                                    {
                                            if(mobNum.length==10){
                                                console.log('else1');
                                                     isValid = 1;
                                                    $(ele).parents('.form-group').find('.error').remove();
                                               
                                    
                                            } else {
                                                
                                                console.log('else12');
                                                 isValid = 2;
                                                $(ele).parents('.form-group').find('.error').remove();
                                                ($(ele).parents('.form-group').append('<p class="error">Please put 10  digit mobile number</p>'));
                                           
                                            }
                                            
                                    }
                                    else{
                                                 isValid = 2;
                                                $(ele).parents('.form-group').find('.error').remove();
                                                ($(ele).parents('.form-group').append('<p class="error">Please enter only digit number</p>'));
                                            
                                           
                                    }
                                   
                                }    
                                    
                                else
                                {

                                    $(ele).parents('.form-group').find('.error').remove();
                                   
                                }

                            });
                            
                            if(isValid == 2){
                                return false;
                            }else{
                                $("#emp_emergency_add").submit();
                            }


                    });

            /*employee emergrncy validation end */ 
    });        
           
</script>  
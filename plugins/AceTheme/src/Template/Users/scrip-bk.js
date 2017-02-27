

    $( function() {
      $('#modal-wizard-container').ace_wizard()
        .on('actionclicked.fu.wizard' , function(e, info){
            // if(!$('.form-register form').valid()) e.preventDefault();
            if(info.step == 3) {
              if(!$('#validation-form').valid()) e.preventDefault();
            }
        })
        .on('finished.fu.wizard', function(e) {
          
        }).on('stepclick.fu.wizard', function(e){
          e.preventDefault();//this will prevent clicking and selecting steps
          // if(!$('.form-register form').valid()) e.preventDefault();
        });
        $('.btn-prev').on('click',function(){
          $('.form-register form').submit(false);
        });
        $( ".datepicker" ).datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: 'yy-mm-dd',
            yearRange: "-100:+0",
        });

         $('.form-register form').validate({
            rules: {
                mobile: {
                  required: true,
                  number: true
                },
                start_work: {
                  required: true,
                  date: true
                },
                password: {
                  required: true,
                  minlength: 6
                },
                confirm_password: {
                  equalTo: "#password"
                },
                username:{
                  required:true,
                  minlength: 5,
                  uniqueUserName:true
                },
                email:{
                  required:true,
                  uniqueEmail:true,
                  email:true
                }
          },
          submitHandler: function (form) {
            return true;
          }
        });
         var response;
         var timer;
          $.validator.addMethod(
              "uniqueUserName", 
              function(value, element) {
                clearTimeout(timer);
                  timer = setTimeout(function(){
                  $.ajax({
                      type: "POST",
                      url: "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>",
                      data: {'username':value},
                      async: false,
                      dataType:"json",
                      success: function(data)
                      {
                          console.log(data);
                          response = ( data.status == 'exist' ) ? false : true ;
                      }
                   });
                  },1000);
                  return response;
              },
              "Username is Already Taken"
          );
          $.validator.addMethod(
              "uniqueEmail", 
              function(value, element) {
                clearTimeout(timer);
                  timer = setTimeout(function(){
                    $.ajax({
                        type: "POST",
                        url: "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>",
                        data: {'email':value},
                        async: false,
                        dataType:"json",
                        success: function(data)
                        {
                            console.log(data);
                            response = ( data.status == 'exist' ) ? false : true ;
                        }
                     });
                  },1000);
                    return response;
              },
              "Email address is Already Taken"
          );

    } );
    
   $('select[name=candidate_id]').on('change',function(event){
       var id = $(this).val();
       var url = "<?=$this->Url->build(['controller'=>'candidates','action'=>'getCandidate'])?>"
       $.post(url,{"id":id},function(resData){
           var data = $.parseJSON(resData);
           $.each(data,function(key,val){
               $('input[name='+key+']').val(val);
               if(key=='position')
                   $('select[name=dept]').val(val);
           });
       });
   });
   
  /* $('input[name=username]').on('blur',function(){
       var eleUsername = $( this );
       if(eleUsername.val() == '' || eleUsername.val() == null) return;
       var classUsername = $( this ).parent('div.input');
       classUsername.append('<img src="/ace_theme/img/../images/loading.gif" class="user-loading"/>');
       var processing=false;
       clearTimeout(timer);
       timer = setTimeout( function(){
           if (!processing){
               processing=true;
               var url = "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>";
               $.post(url,{ username:eleUsername.val() },function(res){
                   $('i.error').remove();
                   var data = $.parseJSON(res);
                   classUsername.find('.user-loading').remove();
                   if(data.status == 'exist'){
                       classUsername.addClass('has-error');
                       validation = false;
                       classUsername.append('<i class="error">Username is exist, please pick a another username!</i>');
                   }else{
                       classUsername.removeClass('has-error');
                       validation = true;
                       classUsername.append('<i class="success"></i>');
                   }
               });
           }
       }
       ,1000);
   });*/
    /*
    *
    *    $('.has-error') : show error to input element
    *
    */
   /*$('input[name=email]').on('blur',function(){

       var eleEmail = $( this );
       var classEmail = $('.input.email');
       if(eleEmail.val() == '' || eleEmail.val() == null) return;
       classEmail.append('<img src="/ace_theme/img/../images/loading.gif" class="user-loading"/>');

       var processing=false;
       clearTimeout(timer);
       timer = setTimeout( function(){
           if (!processing){
               processing=true;
               var url = "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>";
               $.post(url,{ email:eleEmail.val() },function(res){
                    $('i.error').remove();
                   var data = $.parseJSON(res);
                   classEmail.find('.user-loading').remove();
                   if(data.status == 'exist'){
                       classEmail.addClass('has-error');
                       eleEmail.addClass('error');
                       validation = false;
                       classEmail.append('<i class="error">Username is exist, Please pick a another email!</i>');
                   }else{
                       eleEmail.removeClass('error');
                       classEmail.removeClass('has-error');
                       validation = true;
                   }
               });
           }
       }
       ,1000);
   });*/
    //load data form to modal preview
    function loadDataModal(){
        $('.form-register input').each(function () {
            $(this).on('change',function () {
                var iname = $(this).attr('id');
                var idname = '#get_'+iname;
                var text = $(this).val();
                $('#reviewUser').find(idname).html(text);
            });
        });
        $('.form-register select').each(function(){
            $(this).on('change',function () {
                var iname = $(this).attr('id');
                var idname = '#get_'+iname;
                var text = $(this).find('option:selected').text();
                $('#reviewUser').find(idname).html(text);
            });

        })

    }
    loadDataModal();

  
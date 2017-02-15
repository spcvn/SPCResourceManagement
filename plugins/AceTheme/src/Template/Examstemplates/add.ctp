<div class="page-header">
    <h1>
        <?= __('exam')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('add_exam')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="exams area-add content">
    <div class="form-add-exam">
        <?= $this->Form->create($examstemplate) ?>
            <div class="row form-group required">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('template_name')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="name" class="width-100" />
                </div>
            </div>
            <div class="row form-group required">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('number_of_question')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="num_questions" class="width-100 num" />
                </div>
            </div>
            <div class="row form-group required">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('duration')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="duration" class="width-100 num" />
                </div>
                <div class="col-sm-3">
                    <span><?= __('minute')?>(s)</span>
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('section')?></label>
                <div class="col-xs-12 col-sm-10 section-add">
                    <div class="row line-add">
                        <div class="col-sm-6">
                            <select class="width-100" name='sections[_ids][]'>
                                <?php
                                    foreach ($sections as $key=>$value) {
                                        echo "<option value='$key'>$value</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input onchange="hasChanged($(this))" type="text" min="0" max="100" class="width-80 num percent-section" name="sections[ratio][]" value="100"/>
                            <span>%</span>
                        </div>
                        <div class="col-sm-4 actions">
                            <a class="btn btn-remove"><i class="fa fa-remove"></i></a>
                            <a class="btn btn-add">+</i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-10 col-sm-push-2">
                    <div class="row">
                        <label class="col-sm-6 text-right">Total</label>
                        <div class="col-xs-2">
                            <input class="total-percent width-80" type="text" value="100" readonly/> <span>%</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row actions">
                <div class="col-xs-push-2 col-xs-9">
                    <button type="reset" class="btn btn-default btn-reset">Reset</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        <?= $this->Form->end() ?>


    </div>
</div>
<script>
    var line = 1;

    var per = 100;
    function addline(){
        var str = '<div class="row line-add">'+
            '<div class="col-sm-6">'+
            '<select class="width-100" name="sections[_ids][]">'+
            '<?php
                            foreach ($sections as $key=>$value) {
                                echo "<option value=\'$key\'>$value</option>";
                            }
                        ?>'+
            '</select>'+
            '</div>'+
            '<div class="col-sm-2">'+
            '<input type="text" name="sections[ratio][]" class="width-80 percent-section" onchange="hasChanged($(this))" />'+
            ' <span>%</span>'+
            '</div>'+
            '<div class="col-sm-4 actions">'+
            '<a class="btn btn-remove"><i class="fa fa-remove"></i></a>'+
            ' <a class="btn btn-add">+</i></a>'+
            '</div>'+
            '</div>';

        $('.line-add .btn-add').each(function (index) {
            $(this).click(function(e){
                e.preventDefault();
                line++;
                $('.section-add').append(str);
                if($(this).is(':focus')){

                }else {
                    /*$('.percent-section').each(function(){
                        if($( this ).hasClass('hasChanged')){
                            console.log($(this).val());
                        }else{
                            $( this ).val(Math.round(per/line));
                        }
                    });*/

                }
                addline();

                resetPercent();
                finishCount();
            });
        });
    }
    function finishCount(){
        //tinh total :
        var total = countval();
        if(total>100){
            setvaluelastchildex(total);
            countval();
        }else {
            setvaluelastchildsu(total);
            countval();
        }
    }
    function countval() {
        var sum = 0;
        $('.line-add').each(function() {
            $(this).find('input').each(function(){
                sum += parseInt($(this).val());
            });
            $('.total-percent').val(sum);
        });
        return sum;
    }
    function setvaluelastchildex(total) {
        var _this = $('.line-add:last-child .percent-section');
        var _itsval = _this.val();
        var lost =  total - per;
        _this.val(_itsval-lost);
    }
    function setvaluelastchildsu(total) {
        var _this = $('.line-add:last-child .percent-section');
        var _itsval = _this.val();
        var lost = per - total;
        _this.val(parseInt(_itsval)+ parseInt(lost))
    }
    function resetPercent(){

        stillPer= 100;
        var cHasChanged = $('.section-add').find('.hasChanged').length;
        var numLine = $('.section-add').find('.percent-section').length;

        $('.percent-section').each(function (e) {
            if($( this ).hasClass('hasChanged')){
                stillPer = stillPer - $(this).val();
            }
        });
        var lineNotChanged = numLine - cHasChanged;
        var valInput = stillPer/lineNotChanged;
        $('.percent-section').each(function (e) {
            if(!$( this ).hasClass('hasChanged')){
                $( this ).val(Math.round(valInput));
            }
        });
    }

//    function removeline(){
//        $(this).parent().parent().remove();
//        removeline();
//    }

    function validateEmpty(){
        $(".form-add-exam form").submit(function(){
            var isFormValid = true;
            $(this).find('.error').hide();
            $(".required input").each(function(){
                if ($.trim($(this).val()).length == 0){
                    /*$(this).parent().addClass("error");*/
                    $(this).parent().append('<p class="error">Please fill in all the required fields (indicated by *)</p>');
                    isFormValid = false;
                }
                else{
                    $(this).parent().find('.error').hide();
                }
            });

            return isFormValid;
        });
    }
    function validatePercent(){
        var __this = $('.percent-section');
        __this.each(function(){
            $(this).blur(function(){
                var input = $(this);
                var percent = parseInt($(this).val());
                    $('.percent-section').each(function () {
                        console.log($(this));
                    });

            })
        })
    }
    $(document).ready(function(){
        $('.btn-remove').each(function () {
           $(this).confirm({
               content: "Are you sure you want to remove this section?",
               title: "",
               buttons: {
                   yes: {
                       btnClass:'btn-danger',
                   },
                   no: {
                       keys: ['N'],
                   },
               }
           });
        });

        addline();
        validateEmpty();
        validatePercent();
    });
    function hasChanged(e) {
        console.log(e.val());
        e.addClass('hasChanged');
        resetPercent();
        finishCount();
    }

</script>
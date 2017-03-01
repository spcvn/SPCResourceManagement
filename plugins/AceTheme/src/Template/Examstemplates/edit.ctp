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
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('template_name')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="name" value="<?=$examstemplate->name?>" class="width-100" />
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('number_of_question')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="num_questions" value="<?=$examstemplate->num_questions?>" class="width-100" />
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('duration')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="duration" value="<?=$examstemplate->duration?>" class="width-100" />
                </div>
                <div class="col-sm-3">
                    <span><?= __('minute')?>(s)</span>
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-3 col-lg-2 control-label"><?= __('description')?></label>
                <div class="col-xs-10 col-sm-5">
                    <textarea class="form-control" name="description" id="form-field-1" placeholder="Description "><?=$examstemplate->description?></textarea>
                </div>
                <div class="col-xs-2 col-sm-3">
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('section')?></label>
                    <div class="col-xs-12 col-sm-10 section-add">
                <?php 
                foreach ($examstemplate->sections as $key => $objSection) {
                    ?>
                        <div class="row line-add">
                            <div class="col-sm-6">
                                <select class="width-100" name='sections[<?=$key?>][id]' onChange="enableSeleced()">
                                    <?php
                                        foreach ($sections as $sKey=>$value) {
                                            $selected = ($sKey == $objSection->id)?"selected='selected'":"";
                                            echo "<option value='$sKey' $selected >$value</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="width-80 percent-section" name="sections[<?=$key?>][_joinData][ratio]" value="<?=$objSection->_joinData->ratio?>"/>
                                <span>%</span>
                            </div>
                            <div class="col-sm-4 actions">
                                <a class="btn btn-remove"><i class="fa fa-remove"></i></a>
                                <a class="btn btn-add">+</i></a>
                            </div>
                        </div>

                    <?php
                }
                ?>
                    </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-10 col-sm-push-2">
                    <label class="col-sm-6 text-right">Total</label>
                    <div class="col-xs-2">
                        <input class="total-percent width-80" type="text" value="100" readonly/> <span>%</span>
                    </div>
                </div>

            </div>
            <div class="row actions">
                <div class="col-xs-push-2 col-xs-9">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        <?= $this->Form->end() ?>


    </div>
</div>
<script type="text/javascript">
    var line = $('.line-add').length;
    var _Per_input_change = 0;
    var per = 100;
    var countSections = $('.line-add').length; //<?=$sections->count()?>;
    var numSections = <?=count($examstemplate->sections)?>;
    function addline(){
        var str = '<div class="row line-add">'+
            '<div class="col-sm-6">'+
            '<select class="width-100" name="sections['+numSections+'][id]" onChange="enableSeleced()">'+
            '<?php
                            foreach ($sections as $key=>$value) {
                                echo "<option value=\'$key\'>$value</option>";
                            }
                        ?>'+
            '</select>'+
            '</div>'+
            '<div class="col-sm-2">'+
            '<input type="text" name="sections['+numSections+'][_joinData][ratio]" class="width-80 percent-section" onchange="hasChanged($(this))" />'+
            ' <span>%</span>'+
            '</div>'+
            '<div class="col-sm-4 actions">'+
            '<a class="btn btn-remove"><i class="fa fa-remove"></i></a>'+
            ' <a class="btn btn-add">+</i></a>'+
            '</div>'+
            '</div>';


            $('.section-add').on('click','.btn-add',function(e){
                /*
                * Count section to append 
                */
                if(countSections < 2) {
                    $.alert('Not enought section for this exam template!');
                    return;
                }
                countSections--;

                e.preventDefault();
                line++;
                $('.section-add').append(str);

                resetPercent();
                finishCount();
                disableSection();
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

        stillPer = 100;
        var cHasChanged = $('.section-add').find('.hasChanged').length;
        var numLine = $('.section-add').find('.percent-section').length;

        $('.percent-section').each(function (e) {
            if($( this ).hasClass('hasChanged')){
                stillPer = stillPer - $(this).val();
            }
        });
        var lineNotChanged = numLine - cHasChanged;
        var valInput = stillPer/lineNotChanged;
        _Per_input_change = valInput;


        $('.percent-section').each(function (e) {
            if(!$( this ).hasClass('hasChanged')){
                $( this ).val(Math.round(valInput));
            }
        });
    }

    function removeline(){
        
        $('.section-add').each(function(){
            $(this).on('click','.btn-remove',function () {
                if(line <=1) return;
                line--;
                countSections++;
                $(this).parent().parent().remove();
                resetPercent();
                finishCount();
            });
        });
    }

    function validateEmpty(){
        $(document).on('submit','.form-add-exam form', function(e){

            $(this).find('.error').remove();
            $(".required input[type=text]").each(function(){

                if ($(this).val() === ""){
                    e.preventDefault();
                    $(this).parent().append('<p class="error">Please fill in all the required fields (*)</p>');
                    return false;
                }
                else{
                    $(this).parent().find('.error').remove();
                }
            });
        });
    }
    function validatePercent(){
        var __this = $('.percent-section');
        __this.each(function(){
            $(this).blur(function(){
                var percent = parseInt($(this).val());
                    $('.percent-section').each(function () {
                        console.log($(this));
                    });

            })
        })
    }

    /* 
    * function disableSection
    * Disable section choosed
    */
    var m = [];
    function disableSection(){
        enableSeleced();
        $('.section-add select:last option:not([disabled])').first().attr("selected", "selected");
        enableSeleced();
    }
    function enableSeleced(){
        $('.section-add select option[disabled=disabled]').each(function(){
            $(this).removeAttr('disabled');
        });
        var i = 1;
        $('.section-add select option:selected').each(function(){
            m[i++]= $(this).val();
        });
        $('.section-add select').each(function(){
           $.each(m,function(key,val){
            if(typeof(val) != "undefined"){
                $('.section-add select option[value='+val+']').attr('disabled','disabled');
            }
           }); 
        });
    }
    $(document).ready(function(){
        $('form').submit(function(){
            $('.section-add select option[disabled=disabled]').each(function(){
                $(this).removeAttr('disabled');
            });
        });

        addline();
        removeline();
        validateEmpty();
        validatePercent();
    });
    function hasChanged(e) {

        if( e.val() < 0 || e.val() === ''){
            return;
        }
        e.addClass('hasChanged');
        e.removeClass('noChange');
        resetPercent();
        finishCount();
        if(e.val() > 100 || _Per_input_change < 0){
            e.val(0);
            resetPercent();
            finishCount();
        }
    }

</script>
<!-- <script>
    var line = 1;
    var per = 100;
    var numSections = <?=count($examstemplate->sections)?>;
    console.log(numSections);
    function addline(){
        numSections = numSections + 1;
        var str = '<div class="row line-add">'+
            '<div class="col-sm-6">'+
            '<select class="width-100" name="sections['+numSections+'][id]">'+
            '<?php
                            foreach ($sections as $key=>$value) {
                                echo "<option value=\'$key\'>$value</option>";
                            }
                        ?>'+
            '</select>'+
            '</div>'+
            '<div class="col-sm-2">'+
            '<input type="text" name="sections['+numSections+'][_joinData][ratio]" class="width-80 percent-section" onchange="hasChanged($(this))" />'+
            ' <span>%</span>'+
            '</div>'+
            '<div class="col-sm-4 actions">'+
            '<a class="btn btn-remove"><i class="fa fa-remove"></i></a>'+
            ' <a class="btn btn-add">+</i></a>'+
            '</div>'+
            '</div>';

        $('.line-add .btn-add').each(function (index) {
            $(this).click(function(){
                line++;
                $('.section-add').append(str);
                if($(this).is(':focus')){

                }else {
                    $('.percent-section').each(function(){
                        if($( this ).hasClass('hasChanged')){
                            console.log($(this).val());
                        }else{
                            $( this ).val(Math.round(per/line));
                        }
                    });

                }
                var total = countval();
                if(total>100){
                    setvaluelastchildex(total);
                    countval();
                }else {
                    setvaluelastchildsu(total);
                    countval();
                }

                addline();
            });
        });
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

//    function removeline(){
//        $(this).parent().parent().remove();
//        removeline();
//    }
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
    });
    function hasChanged(e) {
        console.log(e.val());
        e.addClass('hasChanged');
    }
//    removeline();
</script> -->
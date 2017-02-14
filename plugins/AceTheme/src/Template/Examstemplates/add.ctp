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
                    <input type="text" name="name" class="width-100" />
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('number_of_question')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="num_questions" class="width-100" />
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('duration')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" name="duration" class="width-100" />
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
                            <input type="text" class="width-80 percent-section" name="sections[ratio][]" value="100"/>
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
                    <label class="col-sm-6 text-right">Total</label>
                    <div class="col-xs-2">
                        <input class="total-percent width-80" type="text" value="100" readonly/> <span>%</span>
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
</script>
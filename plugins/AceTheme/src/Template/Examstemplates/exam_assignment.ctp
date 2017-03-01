<div class="page-header">
    <h1>
        <?= __('exam')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('create_a_template')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="assignment content">
    <div class="form-assignment">
        <form method="post" action="<?=$this->Url->build(['controller'=>'quizs', 'action'=>'generate'])?>">
            <div class="row input select required">
                <label class="col-sm-3 col-lg-2"><?= __('candidate_name')?>:</label>
                <div class="col-sm-9 col-lg-10">
                    <div class="autocomplete_wrap">
                        <input id="autoCandidate" placeholder="Please select...">
                        <input type="hidden" name="candidate_id" id="autoCandidate_hidden" value="" />
                    </div>
                </div>
            </div>
            <div class="row input select required">
                <label class="col-sm-3 col-lg-2"><?= __('template_type')?>:</label>
                <div class="col-sm-9 col-lg-10">
                    <div class="autocomplete_wrap">
                        <input id="autoTemplate" placeholder="Please select...">
                        <input type="hidden" name="template_id" id="autoTemplate_hidden" value="" />
                    </div>
                </div>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('duration')?>:</label>
                <label class="col-sm-10"><strong id="duration">0</strong> minutes</label>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('number_of_question')?>:</label>
                <label class="col-sm-10"><strong id="num_questions">0</strong> questions</label>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('question')?>:</label>
                <label class="col-sm-10"><strong id="ratio">---</strong></label>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('description')?>:</label>
                <label class="col-sm-3 col-xs-10">
                    <strong id="description">Description</strong>
                </label>
            </div>
            <div class="row actions">
                <div class="col-sm-10 col-sm-push-2">
                    <button type="button" class="btn btn-default"><?= __('cancle')?></button>
                    <button type="submit" class="btn btn-info"><?= __('assign')?></button>
                </div>
            </div>
        </form>
    </div>
    <?=$assign_candidate_id?>
</div>
<?php
    function cvExamtemplate($templates){
        $str = '[';
        foreach ($templates as $val) {
            $ratio = "";
            foreach ($val->sections as $section) {
                $ratio .= $section->name.': '.$section->_joinData->ratio.'%; ';
            }
            $str.= '{ 
                label: "'.$val->name.'", 
                value: "'.$val->id.'",
                duration: "'.$val->duration.'",
                num_questions: "'.$val->num_questions.'",
                ratio: "'.$ratio.'",
                description: "'.$val->description.'",
            },';
        }
        $str .= ' ]';
        $str = str_replace(", ]", "]", $str);
        return $str;
    }
    function cvCandidates($templates){
        $str = '[';
        foreach ($templates as $key=>$val) {
            $str.= '{ label: "'.$val.'", value: "'.$key.'" },';
        }
        $str .= ' ]';
        $str = str_replace(", ]", "]", $str);
        return $str;
    }
?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script>
    function autoSelectSearch(e,data){
        $(e).autocomplete({
            source: data,
            minLength:0,
            select: function( event, ui ) {
                $(e).val(ui.item.label);
                $(e+'_hidden').val(ui.item.value);
                if(e=='#autoTemplate'){
                    $('strong#duration').text(ui.item.duration);
                    $('strong#num_questions').text(ui.item.num_questions);
                    $('strong#ratio').text(ui.item.ratio);
                    $('strong#description').text(ui.item.description);
                }
                return false;
            },
            focus: function( event, ui ) {
                $(e).val(ui.item.label);
                $(e+'_hidden').val(ui.item.value);
                if(e=='#autoTemplate'){
                    $('strong#duration').text(ui.item.duration);
                    $('strong#num_questions').text(ui.item.num_questions);
                    $('strong#ratio').text(ui.item.ratio);
                    $('strong#description').text(ui.item.description);
                }
                return false;
            },
            create: function( event, ui ) {
                if(e=='#autoCandidate'){
                    console.log(data);
                    var id = <?= isset($assign_candidate_id)?$assign_candidate_id:0 ?>;
                    $.each(data,function(key,value){
                        if(id == value.value){
                            $(e).val(value.label);
                        }    
                    });
                    
                    $(e+'_hidden').val(<?=$assign_candidate_id?>);
                }
                return false;
            },
        }).bind('focus', function(){ $(this).autocomplete("search"); } );
    }//assign_candidate_id
    $(document).ready(function () {
        var availableCandiadte = <?=cvCandidates($candidates)?>;
        var availableTemplate = <?=cvExamtemplate($examstemplates)?>;
        var idc= '#autoCandidate';
        var idt= '#autoTemplate';
        autoSelectSearch(idc, availableCandiadte);
        autoSelectSearch(idt, availableTemplate);
    });
</script>
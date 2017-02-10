<div class="page-header">
    <h1>
        <?= __('exam')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('create_a_template')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="assignment">
    <div class="form-assignment">
        <form>
            <div class="row input select required">
                <label class="col-sm-2"><?= __('candidate_name')?>:</label>
                <div class="col-sm-10">
                    <div class="autocomplete_wrap">
                        <input id="autoCandidate" placeholder="Please select...">
                    </div>
                </div>
            </div>
            <div class="row input select required">
                <label class="col-sm-2"><?= __('template_type')?>:</label>
                <div class="col-sm-10">
                    <div class="autocomplete_wrap">
                        <input id="autoTemplate" placeholder="Please select...">
                    </div>
                </div>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('duration')?>:</label>
                <label class="col-sm-10">20 minutes</label>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('number_of_question')?>:</label>
                <label class="col-sm-10">20 questions</label>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('question')?>:</label>
                <label class="col-sm-10">HTML: 50%; CSS: 25%; JAVASCRIPT: 25</label>
            </div>
            <div class="row input text">
                <label class="col-sm-2"><?= __('description')?>:</label>
                <label class="col-sm-10">Description content</label>
            </div>
            <div class="row actions">
                <div class="col-sm-10 col-sm-push-2">
                    <button type="button" class="btn btn-default"><?= __('cancle')?></button>
                    <button type="submit" class="btn btn-info"><?= __('assign')?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script>
    function autoSelectSearch(e,data){
        $(e).autocomplete({
            source: data,
            minLength:0
        }).bind('focus', function(){ $(this).autocomplete("search"); } );
    }
    $(document).ready(function () {
        var availableCandiadte = [
            'Nguyen Ngoc Thao',
            'Nguyen Hoai Duc',
            'Nguyen Minh Son',
            'Ta Minh Trung',
            'Pham Thuy',
            'Nguyen Thanh Sang',
            'Vo Nhan '
        ];
        var availableTemplate = [
            'Front-end Developer',
            'Back-end Developer',
            'Designer',
            'Admin'
        ];
        var idc= '#autoCandidate';
        var idt= '#autoTemplate';
        autoSelectSearch(idc, availableCandiadte);
        autoSelectSearch(idt, availableTemplate);
    });
</script>
<div class="exams area-add content">
    <div class="form-add-exam">
        <form>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('exam_name')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" class="width-100" />
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('number_of_question')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" class="width-100" />
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('duration')?></label>
                <div class="col-xs-12 col-sm-5">
                    <input type="text" class="width-100" />
                </div>
                <div class="col-sm-3">
                    <span>minute(s)</span>
                </div>
            </div>
            <div class="row form-group">
                <label  class="col-xs-12 col-sm-2 control-label"><?= __('section')?></label>
                <div class="col-xs-12 col-sm-10">
                    <div class="row line-add">
                        <div class="col-sm-6">
                            <select class="width-100">
                                <option>HTML</option>
                                <option>CSS</option>
                                <option>Php</option>
                                <option>Photoshop</option>
                                <option>Adobe Illustrator</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="width-80" />
                            <span>%</span>
                        </div>
                        <div class="col-sm-4 actions">
                            <a class="btn btn-remove"><i class="fa fa-remove"></i></a>
                        </div>
                    </div>
                    <div class="row line-add">
                        <div class="col-sm-6">
                            <select class="width-100">
                                <option>HTML</option>
                                <option>CSS</option>
                                <option>Php</option>
                                <option>Photoshop</option>
                                <option>Adobe Illustrator</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="width-80" />
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
                <label class="col-xs-7 text-right">Total</label>
                <div class="col-xs-2">
                    <input class="total-percent width-80" type="text" value="100" readonly/> <span>%</span>
                </div>
            </div>
            <div class="row actions">
                <div class="col-xs-push-2 col-xs-9">
                    <button type="reset" class="btn btn-default btn-reset">Reset</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </form>


    </div>
</div>
<script>
    $(document).ready(function(){
        $('.btn-remove').confirm({
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
    })
</script>
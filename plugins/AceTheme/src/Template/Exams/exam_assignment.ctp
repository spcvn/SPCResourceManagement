<div class="assignment">
    <div class="form-assignment">
        <form>
            <div class="row input select required">
                <label class="col-sm-2"><?= __('candidate_name')?>:</label>
                <div class="col-sm-10">
                    <select>
                        <option>Nguyen Van A</option>
                        <option>Nguyen Van B</option>
                        <option>Pham Thuy</option>
                    </select>
                </div>
            </div>
            <div class="row input select required">
                <label class="col-sm-2"><?= __('exam_template')?>:</label>
                <div class="col-sm-10">
                    <select>
                        <option>Front-end Development</option>
                        <option>Back-end Development</option>
                        <option>Design</option>
                    </select>
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
                    <button type="submit" class="btn btn-info"><?= __('assign')?></button>
                    <button type="submit" class="btn btn-default"><?= __('cancle')?></button>
                </div>
            </div>
        </form>
    </div>
</div>

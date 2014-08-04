<script>
    $(function() {
        $('.answer-add').on('click', function() {
            var i = $('.answer-holder').length;
            $('<div class="answer-holder form-group">' +
                    '<label for="<?php echo $model; ?>' + i +
                    'Attachment" class="col col-sm-3 control-label required">' +
                    'Đính kèm ' + i +
                    '</label>' +
                    '<div class="input-append  form-group col col-sm-7">' +
                    '<input class="form-control input-sm" name="data[<?php echo $model; ?>][' + i + '][attachment]" type="file"  id="answer_' + i + '">' +
                    '</div>' +
                    '<button class="answer-delete btn btn-warning">Xóa</button>' +
                    '</div>').appendTo($('#answers'));
            i++;
            return false;
        });

        $(document).on('click', '.answer-delete', function() {
            $(this).parent('.answer-holder').remove();
            return false;
        });
    });

</script>
<div class="form-group">
    <label for="<?php echo $model; ?>0Attachment" class="col col-sm-3 control-label required">Tài liệu Đính kèm</label>

    <div class="col col-sm-7">
        <div class=" answer-holder input-append form-group">
            <input class="form-control" name="data[<?php echo $model; ?>][0][attachment]" type="file" id="answer[]">

        </div>

    </div>
    <button class="btn btn-success answer-add"><i class="icon-plus"></i>Thêm đính kèm</button>

</div>
<div id="answers">

</div>
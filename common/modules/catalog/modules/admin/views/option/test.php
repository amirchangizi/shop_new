<table id="option_values" class="table table-responsiv">
    <thead>
    <tr>
        <th><?= Yii::t('app','name') ?></th>
        <th><?= Yii::t('app','image') ?></th>
        <th><?= Yii::t('app','sort_order') ?></th>
        <th>remove</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($modelsOptionValue as $index => $modelOptionValue): ?>
        <tr>
            <td><?= $form->field($modelOptionValue, '['.$index.']name')->textInput()->label(false) ?></td>
            <td><?= $form->field($modelOptionValue, '['.$index.']image')->fileInput()->label(false) ?></td>
            <td><?= $form->field($modelOptionValue, '['.$index.']sort_order')->textInput()->label(false) ?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>


<script >

    $(document).ready(function () {
        var counter = 1;

        $("#add-row").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><div class="form-group field-optionvalue-' + counter + '-name required"> <input type="text" id="optionvalue-' + counter + '-name" class="form-control" name="OptionValue[' + counter + '][name]"> <div class="help-block"></div></div></td>';
            cols += '<input type="hidden" name="OptionValue[' + counter + '][image]" value="">';
            cols += '<td><input type="file" id="optionvalue-' + counter + '-image" name="OptionValue[' + counter + '][image]"></td>';
            cols += '<td><input type="text" id="optionvalue-' + counter + '-sort_order" class="form-control" name="OptionValue[' + counter + '][sort_order]"></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("#option_values").append(newRow);
            counter++;
        });



        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });


    });
</script>
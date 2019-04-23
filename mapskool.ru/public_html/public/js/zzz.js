

$(function() {

    $('.addNewStr').on('click', function(){
        var $form = $(this).closest('.form-group');
        var $table = $form.find('table');
        var numberNow = $table.find('.myIdElement:last').text();
        var numberNext = parseInt(numberNow);
        numberNext++;

        var elements = $table.find('tbody tr:first').clone();
        console.log(elements);
        elements.find('.myIdElement').text(numberNext);
        elements.find('input, textarea').val('');
        $table.find('tbody').append(elements);
    });

    $('.deleteNewStr').on('click', function(){

        var value = $(this).parent().find('tbody tr').not(':first');
        if (value.length) {
            value.last().remove();
        } else {
            $(this).parent().find('tbody tr').first().find('input, textarea').val('');
        }

    });
});

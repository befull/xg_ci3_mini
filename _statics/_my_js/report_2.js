/**
 * Created by Administrator on 2018-04-19.
 */

function rs_del(ts){
    $(ts).parent().parent().remove();
}

$(function () {

    // add one
    $('.add_one').bind('click', function () {
        var ts = $(this);
        var box = ts.parent().parent();
        var body = box.find('.check_tbody');
        var temp = box.find('.temp_rs').children().html();
        body.append(temp);
    });

});
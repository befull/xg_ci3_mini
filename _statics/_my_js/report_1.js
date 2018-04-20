/**
 * Created by Administrator on 2018-04-19.
 */


function init_get_base_info(){
    var f = $('#my_form');
    $('#get_base_info').bind('click', function () {
        var po_num = f.find("input[name='Po_Num']").val();
        $.getJSON(base_url+'/init/ajax_get_base_info?po_num='+po_num, function (json) {
            $.each(json, function(i,item){
                f.find("input[name='"+i+"']").val(item);
            });
        });
        //f.find("input[name='Name']").val('aaaee');
    });
}


$(function () {
    init_get_base_info();

});
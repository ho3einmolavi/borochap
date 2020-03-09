$(function() {
    var _clicked = false;
        
    $('#btn_select').click(function(){
        _clicked = false;
        $(this).hide();
        $('#selectable li').removeAttr('unselectable style');
        $('.ui-selecting').addClass('ui-selected').removeClass('ui-selecting');
    });
    
    $('#selectable li').click(function(){
        if(!_clicked){
            _clicked = true;
            $('.ui-selected').removeClass('ui-selected');
            $('#selectable li').attr('unselectable', 'on').css('user-select', 'none');
            $('#btn_select').show();
        }
        
        if($(this).hasClass('ui-selecting')){
            $(this).removeClass('ui-selecting');
        }else{
            $(this).addClass('ui-selecting');
        }
    });
});  
    
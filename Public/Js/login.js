$(document).ready(
   
    function(){
        $('#btnIngresar').click(
            function(){
                $.post(
                    $(this).attr('dataUrlIn'), 
                    $('#fromLogin').serialize(),
                    function(data){
                        let lineas = data.split('|');
                        if($.trim(lineas[0]) == 'ERROR'){
                            $('#msgin').html(lineas[1])
                        } else {
                            location = $.trim(data);
                        }
                    }
                )
            }
        )
    }

);
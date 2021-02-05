// COMBO local
 $(document).ready(function() {
     var idlocal1 = $('#idlocal1').val();
                    $.ajax({
                            url: "http://localhost/havanna/Views/auditoria/getLocales.php",
                            type: "POST",
                            dataType: 'html',
                            data: {"idlocal1" : idlocal1},
                            success: function(response)
                            {
                                $('.selector-local select').html(response).fadeIn();
                            }
                    });
 });
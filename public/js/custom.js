$(document).ready(function () {    
    $.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },	
    });
    $(document).ready(function(){
        var bookId = 0; 
        $('.js-adding-modal').on('click', function () {  
            bookId = $(this).attr('bookId');
        })

        $('.js-add-book').on('click', function () {  
            var surname = $('#surname').val();
            var date = $('#date').val();
            var phone = $('#phone').val();
            if (phone == "" || date == "" || surname == "")	{
                $('.auth-error').html('Заполните все поля');
            }
            else{
                $.ajax({ 
                    type: "POST",
                    url: "/ajaxAdd", 
                    data: {
                        'bookId' : bookId,
                        'surname' : surname, 
                        'date' : date,
                        'phone' : phone,
                    }, 
                    success: function(result){     
                        $('#surname').val('');
                        $('#date').val('');
                        $('#phone').val('');
                        $('.js-add-book').addClass('disabled');
                        $('.auth-error').removeClass('text-danger').html('Спасибо за заказ');
                        setTimeout(function(){ 
                            jQuery('#addModal').modal('hide');
                            $('.auth-error').addClass('text-danger');            
                            $('.js-add-book').removeClass('disabled');
                            $('.auth-error').html('');
                        }, 2000);
                        location.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            }
        })
    });
});


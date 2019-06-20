/*Cart*/
$('body').on('click', '.add-to-cart-link', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1;

    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
        type: 'GET',
        success: function(res){
            showCart(res)
        },
        error: function(){
            alert('Ошибка ! Товар не найден')
        }
    });

});

function showCart(cart){
    if ($.trim(cart) === '<h3>Пусто</h3>' || $.trim(cart) === '<h3>Empty<h3>'){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }
    else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}
/*Cart*/

$('#currency').change(function (){
    window.location = '/currency/' + $(this).val();
});
/* Search */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/search/typeahead?query=%QUERY'
     }
});

products.initialize();

$('#typeahead').typeahead(
    {
        highlight: true
    },
    {
        name: 'products',
        display: 'title',
        limit: 9,
        source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion){
    window.location = '/search/?s=' + encodeURIComponent(suggestion.title);
});
/* End Search */


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

$('#cart .modal-body').on('click', '.del-item', function() {
    var id = $(this).data('id');

    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function (){
            alert('Error! Try again later');
        }
    });
});

function showCart(cart){
    if ($.trim(cart) == '<h3>Пусто</h3>' || $.trim(cart) == '<h3>Empty</h3>'){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }
    else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();

    if ($('.cart-sum').text()){
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    }
    else {
        $('.simpleCart_total').text('Empty');
    }
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res)
        },
        error: function(){
            alert('Error! Please, try again later');
        }
    });
}

function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res)
        },
        error: function(){
            alert('Error! Please, try again later');
        }
    });
}
/* End Cart */

$('#currency').change(function (){
    window.location = '/currency/' + $(this).val();
});
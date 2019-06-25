/* Search */
var orders = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/admin/search/orders?query=%QUERY'
    }
});

orders.initialize();

$('.typeahead').typeahead(
    {
        highlight: true
    },
    {
        name: 'orders',
        display: 'id',
        limit: 9,
        source: orders
    });

$('.typeahead').bind('typeahead:select', function(ev, suggestion){
    window.location = '/admin/search/order?s=' + encodeURIComponent(suggestion.id);
});
/* End Search */
/* Search */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/admin/search/products?query=%QUERY'
    }
});

products.initialize();

$('.typeahead').typeahead(
    {
        highlight: true
    },
    {
        name: 'products',
        display: 'title',
        limit: 9,
        source: products
    });

$('.typeahead').bind('typeahead:select', function(ev, suggestion){
    window.location = '/admin/search/product?s=' + encodeURIComponent(suggestion.title);
});
/* End Search */
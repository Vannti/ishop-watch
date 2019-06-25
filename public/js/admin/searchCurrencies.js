/* Search */
var currencies = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/admin/search/currencies?query=%QUERY'
    }
});

currencies.initialize();

$('.typeahead').typeahead(
    {
        highlight: true
    },
    {
        name: 'currencies',
        display: 'code',
        limit: 9,
        source: currencies
    });

$('.typeahead').bind('typeahead:select', function(ev, suggestion){
    window.location = '/admin/search/currency?s=' + encodeURIComponent(suggestion.code);
});
/* End Search */
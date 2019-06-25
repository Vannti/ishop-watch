/* Search */
var brands = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/admin/search/brands?query=%QUERY'
    }
});

brands.initialize();

$('.typeahead').typeahead(
    {
        highlight: true
    },
    {
        name: 'brands',
        display: 'title',
        limit: 9,
        source: brands
    });

$('.typeahead').bind('typeahead:select', function(ev, suggestion){
    window.location = '/admin/search/brand?s=' + encodeURIComponent(suggestion.title);
});
/* End Search */
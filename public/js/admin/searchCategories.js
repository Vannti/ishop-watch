/* Search */
var categories = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/admin/search/categories?query=%QUERY'
    }
});

categories.initialize();

$('.typeahead').typeahead(
    {
        highlight: true
    },
    {
        name: 'categories',
        display: 'title',
        limit: 9,
        source: categories
    });

$('.typeahead').bind('typeahead:select', function(ev, suggestion){
    window.location = '/admin/search/category?s=' + encodeURIComponent(suggestion.title);
});
/* End Search */
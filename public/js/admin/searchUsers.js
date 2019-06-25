/* Search */
var users = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/admin/search/users?query=%QUERY'
    }
});

users.initialize();

$('.typeahead').typeahead(
    {
        highlight: true
    },
    {
        name: 'users',
        display: 'login',
        limit: 9,
        source: users
    });

$('.typeahead').bind('typeahead:select', function(ev, suggestion){
    window.location = '/admin/search/user?s=' + encodeURIComponent(suggestion.login);
});
/* End Search */

window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:Bmatovu" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Bmatovu.html">Bmatovu</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Bmatovu_Publishable" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Bmatovu/Publishable.html">Publishable</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Bmatovu_Publishable_Publishable" class="opened">                    <div style="padding-left:44px" class="hd leaf">                        <a href="Bmatovu/Publishable/Publishable.html">Publishable</a>                    </div>                </li>                            <li data-name="class:Bmatovu_Publishable_PublishedScope" class="opened">                    <div style="padding-left:44px" class="hd leaf">                        <a href="Bmatovu/Publishable/PublishedScope.html">PublishedScope</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Bmatovu.html", "name": "Bmatovu", "doc": "Namespace Bmatovu"},{"type": "Namespace", "link": "Bmatovu/Publishable.html", "name": "Bmatovu\\Publishable", "doc": "Namespace Bmatovu\\Publishable"},
            
            {"type": "Trait", "fromName": "Bmatovu\\Publishable", "fromLink": "Bmatovu/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html", "name": "Bmatovu\\Publishable\\Publishable", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_bootPublishable", "name": "Bmatovu\\Publishable\\Publishable::bootPublishable", "doc": "&quot;Boot the has-drafts trait for a model.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_initializePublishable", "name": "Bmatovu\\Publishable\\Publishable::initializePublishable", "doc": "&quot;Initialize this trait for an instance.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_publish", "name": "Bmatovu\\Publishable\\Publishable::publish", "doc": "&quot;Save instance of this model as published.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_unpublish", "name": "Bmatovu\\Publishable\\Publishable::unpublish", "doc": "&quot;Toogle model instance state to non-published.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_draft", "name": "Bmatovu\\Publishable\\Publishable::draft", "doc": "&quot;Save instance of this model as a draft.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_publishing", "name": "Bmatovu\\Publishable\\Publishable::publishing", "doc": "&quot;Register a \&quot;publishing\&quot; model event callback with the dispatcher.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_published", "name": "Bmatovu\\Publishable\\Publishable::published", "doc": "&quot;Register a \&quot;published\&quot; model event callback with the dispatcher.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_unpublishing", "name": "Bmatovu\\Publishable\\Publishable::unpublishing", "doc": "&quot;Register a \&quot;unpublishing\&quot; model event callback with the dispatcher.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_unpublished", "name": "Bmatovu\\Publishable\\Publishable::unpublished", "doc": "&quot;Register a \&quot;unpublished\&quot; model event callback with the dispatcher.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_isPublished", "name": "Bmatovu\\Publishable\\Publishable::isPublished", "doc": "&quot;Determine if the model instance is published.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_getPublishedAtColumn", "name": "Bmatovu\\Publishable\\Publishable::getPublishedAtColumn", "doc": "&quot;Get the name of the \&quot;published at\&quot; column.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\Publishable", "fromLink": "Bmatovu/Publishable/Publishable.html", "link": "Bmatovu/Publishable/Publishable.html#method_getQualifiedPublishedAtColumn", "name": "Bmatovu\\Publishable\\Publishable::getQualifiedPublishedAtColumn", "doc": "&quot;Get the fully qualified \&quot;published at\&quot; column.&quot;"},
            
            {"type": "Class", "fromName": "Bmatovu\\Publishable", "fromLink": "Bmatovu/Publishable.html", "link": "Bmatovu/Publishable/PublishedScope.html", "name": "Bmatovu\\Publishable\\PublishedScope", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Bmatovu\\Publishable\\PublishedScope", "fromLink": "Bmatovu/Publishable/PublishedScope.html", "link": "Bmatovu/Publishable/PublishedScope.html#method_apply", "name": "Bmatovu\\Publishable\\PublishedScope::apply", "doc": "&quot;Apply the scope to a given Eloquent query builder.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\PublishedScope", "fromLink": "Bmatovu/Publishable/PublishedScope.html", "link": "Bmatovu/Publishable/PublishedScope.html#method_extend", "name": "Bmatovu\\Publishable\\PublishedScope::extend", "doc": "&quot;Extend the query builder with the needed functions.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\PublishedScope", "fromLink": "Bmatovu/Publishable/PublishedScope.html", "link": "Bmatovu/Publishable/PublishedScope.html#method_addWithDrafts", "name": "Bmatovu\\Publishable\\PublishedScope::addWithDrafts", "doc": "&quot;Add the with-drafts extension to the builder.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\PublishedScope", "fromLink": "Bmatovu/Publishable/PublishedScope.html", "link": "Bmatovu/Publishable/PublishedScope.html#method_addOnlyPublished", "name": "Bmatovu\\Publishable\\PublishedScope::addOnlyPublished", "doc": "&quot;Add the only-published extension to the builder.&quot;"},
                    {"type": "Method", "fromName": "Bmatovu\\Publishable\\PublishedScope", "fromLink": "Bmatovu/Publishable/PublishedScope.html", "link": "Bmatovu/Publishable/PublishedScope.html#method_addOnlyDrafts", "name": "Bmatovu\\Publishable\\PublishedScope::addOnlyDrafts", "doc": "&quot;Add the only-drafts extension to the builder.&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});



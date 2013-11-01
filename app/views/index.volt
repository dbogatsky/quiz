<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('css/style.css') }}
    </head>
    <body>
        <header>
            {% if player %}
                <a href="/end">Log Out</a>
            {% endif %}
        </header>

        {{ content() }}

        <hr>
        <footer>
            <p>&copy; Company 2013</p>
        </footer>

    </body>
</html>
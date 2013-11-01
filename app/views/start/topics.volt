{{ content() }}

<p>Hi {{ name }}, let's start the Football Guiz!</p>

<p>You are registered as {{ email }}.</p>

<p>Please select game topic:</p>

{{ form('method' : 'post') }}
    {% for topic in topics %}
        {{ radio_field('topic_id', 'id' : topic.id, 'value' : topic.id) }}
        <label>{{ topic.name }}</label>
    {% endfor %}
    {{ submit_button('Send') }}
</form>


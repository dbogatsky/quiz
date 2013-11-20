{{ content() }}

{{ form('method' : 'post') }}
    <p>{{ question['text_en'] }}</p>
    {% for answer in question['answers'] %}
        {{ radio_field('answer_id', 'id' : answer['id'], 'value' : answer['id']) }}
        <label>{{ answer['text_en'] }}</label>
    {% endfor %}
    {{ submit_button('Send') }}
</form>


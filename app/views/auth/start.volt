{{ content() }}

{{ form('method' : 'post') }}
    <label>Name</label>
    {{ text_field('name') }}
    <label>Email</label>
    {{ text_field('email') }}
    {{ submit_button('Send') }}
</form>
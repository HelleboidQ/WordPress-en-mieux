 
{% for article in articles %}
<div class="col-md-12">
    {{ article.titre }} - Le {{ article.date | date("d/m/Y") }}
    <br />
    {{ article.contenu | slice(0,46) }}... 
    <br />
    <a href="{{url}}article/{{ article.id }}/{{ article.titre | url_encode(true) }}"> Plus ... </a>

</div>
{% endfor %}

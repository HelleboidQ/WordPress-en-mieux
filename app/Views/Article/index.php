 
{% for article in articles %}
<div class="col-md-12">
    {{ article.titre }} - Le {{ article.date | date("d/m/Y") }} - Par {{ article.user.login }} - {{ article.categorie.titre }}
    <br />
    {{ article.contenu | slice(0,46) }}...  
    <br />
    <a href="{{url}}article/{{ article.id }}" > Plus ... </a> 
</div>
{% endfor %}

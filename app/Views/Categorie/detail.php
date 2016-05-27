{% if article | length > 0 %}

<div class="container">

    <a href="{{url}}"><span class="glyphicon glyphicon-home"></span></a> > <a href="{{url}}categorie">Catégorie</a> > {{
    categorie.titre }}

    <hr>

    <div class="allposts">
        {% for article in article %}
        <div class="col-md-4">
            <article>
                <a href="{{url}}article/{{ article.id }}">
                    <img src="{{url}}{{ article.image }}" alt="{{ article.titre }}">
                    <div class="degpost"></div>
                    <div class="titlepost">
                        <h3>{{ article.titre }}</h3>
                    </div>
                    <div class="infospost">
                <span class="datepost">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Le {{ article.date | date("d/m/Y") }}
                </span>
                <span class="catpost">
                    <i class="glyphicon glyphicon-tags" aria-hidden="true"></i>{{ article.categorie.titre }}
                </span>
                    </div>
                    <div class="extrait">
                        <p>{{ article.contenu | slice(0,230) }}...</p>
                    </div>
                </a>
            </article>
        </div>
        {% endfor %}
    </div>
</div>
{% else %}

<div class="container">
    Aucune catégorie n'est disponible
</div>

{% endif %}
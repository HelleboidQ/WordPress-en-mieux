
<div class="container">

    <a href="{{url}}"><span class="glyphicon glyphicon-home"></span></a> > Catégorie

    <hr>

    <div class="col-md-12">
        {% for categorie in categories %}
        <a href="{{url}}categorie/{{ categorie.id }}">
            <div class="col-md-3 text-center">
                <div class="jumbotron">
                    <span class="glyphicon glyphicon-{{ categorie.titre }}"></span>
                    {{ categorie.titre | upper}}
                </div>
            </div>
        </a>
        {% endfor %}
    </div>

</div>
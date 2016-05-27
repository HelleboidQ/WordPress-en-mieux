
<div class="container">

    <a href="{{url}}"><span class="glyphicon glyphicon-home"></span></a> <i class="glyphicon glyphicon-menu-right"></i> Catégorie

    <hr>

    <div class="col-md-12 col-xs-2">
        {% for categorie in categories %}
        <a href="{{url}}categorie/{{ categorie.id }}">
            <div class="col-md-3 col-xs-12 text-center">
                <div class="jumbotron">
                    <span class="glyphicon glyphicon-{{ categorie.titre }}"></span>
                    {{ categorie.titre | upper}}
                </div>
            </div>
        </a>
        {% endfor %}
    </div>

</div>
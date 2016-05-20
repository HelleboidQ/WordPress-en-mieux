<div class="container">

    <a href="{{url}}"><span class="glyphicon glyphicon-home"></span></a> > Catégorie

    <hr>

    {% for categorie in categories %}
    <div class="col-md-12">
        <a href="{{url}}categorie/{{ categorie.id }}">
            <div class="col-md-3 text-center">
                <div class="jumbotron">

                    <span class="glyphicon glyphicon-{{ categorie.titre }}"></span>

                    {{ categorie.titre | upper}}
                </div>
            </div>
        </a>
    </div>
    {% endfor %}
</div>
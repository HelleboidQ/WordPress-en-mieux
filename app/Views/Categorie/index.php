<div class="container">

    <a href="{{url}}"><span class="glyphicon glyphicon-home"></span></a> > Catégorie

    <hr>

    {% for categorie in categories %}
    <div class="col-md-12">
        {{ categorie.titre }}
        <a href="{{url}}categorie/{{ categorie.id }}"> Plus ... </a>
    </div>
    {% endfor %}
</div>
<form action="{{ siteurl }}admin/updateArticle/{{ article.id }}" method="post">

    <img class="col-md-6" src="{{ siteurl }}{{ article.image }}"/>
    <div class="col-md-6">
        <div class="form-group">

            <label>Catégorie : </label>
            <select class="form-control" name="categorie">
                {% for categorie in categories %}
                <option value="{{ categorie.id}}">{{ categorie.titre}}</option>
                {% endfor %}
            </select>

            <label>Titre : </label>
            <input type="text" name="titre" class="form-control" value="{{ article.titre }}">
            <label>Contenu : </label>
            <textarea name="contenu" id="contenu" class="form-control">{{ article.contenu }}</textarea>
            <input type="submit" class="btn btn-primary btn-block" name="modifier" value="Modifier"/>
        </div>
    </div>
</form>

<script>
    CKEDITOR.replace('contenu');
</script>
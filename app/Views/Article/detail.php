<div class="col-md-12">
    <a href="{{url}}">Accueil</a> > <a href="{{url}}categorie/{{ article.id_categorie }}">{{ article.categorie.titre }}</a> > {{ article.titre }}

    <hr>

    <h2>{{ article.titre | capitalize }}</h2>

    <div class="row">
        <div class="author col-md-6">
            <small><i>Le {{ article.date | date("d/m/Y") }} - Par {{ article.user.login }}</i></small>
        </div>
    </div>
    <div class="row detailArticle">
        <div class="col-md-12 text-justify">
            <img id="imgArticle" class="pull-left col-md-3" src="{{url}}{{ article.image }}"/>
            <p class="contenu">{{ article.contenu }}</p>
        </div>
    </div>


    <h2>Les commentaires : </h2>
    {% for com in commentaires %}
    <div class="row">
        <div class="col-md-12" id="commentaires">
            <div class="well" id="{{ com.getId() }}">
                <div class="col-md-12">
                    {% if isAdmin %}
                    <a href="{{ url }}admin/supprimer_commentaire/{{ com.getID() }}/{{ article.id }}" ><i class="glyphicon glyphicon-remove pull-right"></i></a>
                    {% endif %}
                    <small><i>@Author : {{ com.getUsername() }}</i></small> - <small><i>Le : {{ article.date | date("d/m/Y") }}</i></small>
                </div>
                {{ com.contenu }}
            </div>

        </div>
    </div>
    {% endfor %}
    {% if isConnecte %}
    <h3>Ajouter un commentaire :</h3>
    <form method="POST" action="{{url}}article/ajouter_un_commentaire/{{ article.id }}">
        <div class="form-group">
            <label for="commentaire">Commentaire : </label>
            <textarea id="commentaire" class="form-control" placeholder="Votre commentaire" name="contenu"></textarea>
            <button type="submit" value="ajouterCommentaire" class="btn btn-success pull-right">Ajouter</button>
        </div>
    </form>
    {% endif %}

</div>

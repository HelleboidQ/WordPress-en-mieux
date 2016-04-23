<div class="col-md-12">
    <a href="{{url}}categorie/{{ article.id_categorie }}">{{ article.categorie.titre }}</a> > {{ article.titre }}
    <hr> 

    {{ article.titre }} - Le {{ article.date | date("d/m/Y") }} - Par {{ article.user.login }} 
    <br /> <br />
    {{ article.contenu  }} 
    <br /> <br />


    Ajouter un commentaire :   
    <form method="POST" action="<?= URL; ?>#">
        <label for="commentaire">Commentaire : </label>
        <br /> 
        <textarea id="commentaire" class=""></textarea> 
        <br />
        <button type="submit" value="ajouterCommentaire" class="btn btn-default">Ajouter</button> 
    </form>


</div>

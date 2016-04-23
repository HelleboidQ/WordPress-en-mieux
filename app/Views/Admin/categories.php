<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addCategorie">
    AJOUTER UNE CATEGORIE
</button>

<!-- Modal -->
<div class="modal fade" id="addCategorie" tabindex="-1" role="dialog" aria-labelledby="addCategorie">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter une catégorie</h4>
            </div>
            <form action="{{ siteurl }}admin/addCategorie" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <input id="titre" type="text" class="form-control" name="titre" placeholder="Titre">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <input class="btn btn-success" type="submit" name="ajouter" value="Ajouter">
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>titre</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
    <!-- AFFICHAGE DES CATEGORIES -->
    {% for c in categories %}
        <tr>
            <td>{{ c.id }}</td>
            <td>{{ c.titre }}</td>
            <td><a class="btn btn-danger" href="{{ siteurl }}admin/deleteCategorie/{{ c.id }}">SUPPRIMER</a></td>
        </tr>
    {% endfor %}
    </tbody>
</table>
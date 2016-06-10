<div class="container">

 
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addArticle">
        AJOUTER UN ARTICLE
    </button>

    <!-- Modal --> 
    <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticle">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un article</h4>
                </div>
                <form action="{{ siteurl }}admin/addArticle" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Categorie : </label>
                            <select name="categorie" class="form-control">
                                {% for categorie in categories %}
                                <option value="{{ categorie.id }}">{{ categorie.titre }}</option>
                                {% endfor %}
                            </select>
                            <label>Image : </label>
                            <input type="file" name="image">
                            <label for="titre">Titre :</label>
                            <input id="titre" type="text" class="form-control" name="titre" placeholder="Titre">
                            <label>Contenu : </label>
                            <textarea id="contenu" name="contenu" class="form-control" placeholder="Contenu"></textarea>

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
                <th>Titre</th>
                <th>Contenu</th>
                <th>Date</th>
                <th>User</th>
                <th>Categorie</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            {% for article in articles %}
            <tr>
                <td>{{ article.id }}</td>
                <td>{{ article.titre }}</td>
                <td>{{ article.contenu | slice(0,46) | escape }}...</td>
                <td>{{ article.date }}</td>
                <td>
                    {% for user in users %}
                    {% if user.id == article.id_user %}
                    {{ user.login }}
                    {% endif %}
                    {% endfor %}
                </td>
                <td>
                    {% for categorie in categories %}
                    {% if categorie.id == article.id_categorie %}
                    {{ categorie.titre }}
                    {% endif %}
                    {% endfor %}
                </td>
                <td>
                    <!-- Single button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ siteurl }}admin/deleteArticle/{{ article.id }}">SUPPRIMER</a></li>
                            <li><a href="{{ siteurl }}admin/UpdateArticle/{{ article.id }}">MODIFIER</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table> 

</div>

<script>

    $(document).ready(function () {
        $('#contenu').summernote({
            height: 500,
            minHeight: 500,
            maxHeight: null,
            toolbar: [
                ['main', ['style']],
                ['style', ['bold', 'italic', 'underline', 'strikethroungh', 'superscript', 'subscript', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                ['misc', ['codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function (files, editor, welEditable) {
                    console.log(welEditable);
                    data = new FormData();
                    data.append("img", files[0]);
                    $.ajax({
                        data: data,
                        type: "POST",
                        url: "http://localhost/basenova/admin/articleAjoutImage",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (url) {
                            $('#contenu').summernote('insertImage', url);
                        }
                    });
                }
            }
        });

    });

</script>

</div>
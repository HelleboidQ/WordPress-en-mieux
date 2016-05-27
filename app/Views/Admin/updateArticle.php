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
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Date</th>
        <th>User</th>
        <th>ACTIONS</th>
    </tr>
    </thead>
    <tbody>
    {% for article in articles %}
        <tr>
            <td>{{ article.id }}</td>
            <td>{{ article.titre }}</td>
            <td>{{ article.contenu }}</td>
            <td>{{ article.date }}</td>
            <td>
                {% for user in users %}
                    {% if user.id == article.idUser %}
                        {{ user.login }}
                    {% endif %}
                {% endfor %}
            </td>
            <td>
                {% for categorie in categories %}
                    {% if categorie.id == article.idCategorie %}
                        {{ categorie.titre }}
                    {% endif %}
                {% endfor %}
            </td>
            <td>ACTION</td>
        </tr>
    {% endfor %}
    </tbody>
</table>
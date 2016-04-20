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
            <td>{{ c.id }}</td><td>{{ c.titre }}</td><td><button class="btn btn-default">Action</button></td>
        </tr>
    {% endfor %}
    </tbody>
</table>
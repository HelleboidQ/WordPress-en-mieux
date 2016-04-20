<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Login</th>
        <th>Mail</th>
        <th>Admin</th>
        <th>ACTIONS</th>
    </tr>
    </thead>
    <tbody>
    {% for user in users %}
    <tr>
        <td>{{ user.id }}</td>
        <td>{{ user.login }}</td>
        <td>{{ user.email }}</td>
        <td>{{ user.admin }}</td>
        <td>ACTION</td>
    </tr>
    {% endfor %}
    </tbody>
</table>
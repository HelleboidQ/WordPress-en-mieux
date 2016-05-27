<div class="container">

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
            <td>
                <div class="material-switch">
                    <input id="someSwitchOptionDanger{{user.getId()}}" name="someSwitchOption{{user.getId()}}" type="checkbox" {{((user.admin)?"checked":"") }} />
                    <label for="someSwitchOptionDanger{{user.getId()}}" class="label-danger"></label>
                </div>
            </td>
            <!--<td>{{ user.admin }}</td>-->
            <td><a class="btn btn-danger" href="{{ siteurl }}admin/deleteUser/{{ user.id }}">SUPPRIMER</a></td>
        </tr>
        {% endfor %}
        </tbody>
    </table>
</div>
<div class="col-md-12">
    {% for ar in article %}
    {{ ar.titre }} - Le {{ ar.date | date("d/m/Y") }} - Par {{ ar.user.login }}
    <br />
    <a href="{{url}}article/{{ ar.id }}" > Plus ... </a> 
    <br /> <br /> 
    <hr>
    {% endfor %}
</div>

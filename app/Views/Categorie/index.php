 
{% for categorie in categories %}
<div class="col-md-12">
    {{ categorie.titre }} 
    <a href="{{url}}categorie/{{ categorie.id }}" > Plus ... </a> 
    <hr>
</div> 
{% endfor %}

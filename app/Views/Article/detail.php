
<div class="col-md-12">
    {{ article.titre }} - Le {{ article.date | date("d/m/Y") }} - Par {{ article.user.login }}
    <br /> <br />
    {{ article.contenu  }} 
    <br /> <br />

    Ajouter un commentaire : 


</div>

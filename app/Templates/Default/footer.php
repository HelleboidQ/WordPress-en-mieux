<div class="container">

    <hr>

</div>
<div id="footer">
    <div class="container">

        <p class="text-muted credit">Par Quentin H. et Jonathan L.</p>

    </div>
</div>

<?php
Assets::js([ 
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
]);

echo $js; //place to pass data / plugable hook zone
echo $footer; //place to pass data / plugable hook zone

?>

<script src="<?= SITEURL ?>assets/script.js"></script>

</body>
</html>

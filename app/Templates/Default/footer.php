</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            &copy; 2016 - Quentin, Jonathan
        </div>
    </div>
</div>

<?php
Assets::js([
    'https://code.jquery.com/jquery-1.12.1.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
]);

echo $js; //place to pass data / plugable hook zone
echo $footer; //place to pass data / plugable hook zone

?>

<script src="<?= SITEURL ?>assets/script.js"></script>

</body>
</html>

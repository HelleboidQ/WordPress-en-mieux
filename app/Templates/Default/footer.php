
<div id="footer">
    <div class="container">
        <p class="text-muted credit">Example courtesy <a href="http://martinbean.co.uk">Martin Bean</a> and <a href="http://ryanfait.com/sticky-footer/">Ryan Fait</a>.</p>
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

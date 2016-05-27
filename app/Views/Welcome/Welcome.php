
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">LOGO</div>
                <div class="panel-body">
                    <p class="col-md-6"><img src='<?= Url::templatePath(); ?>images/nova.png' alt='<?= SITETITLE; ?>'>
                    </p>
                    <p class="col-md-6">On sait depuis longtemps que travailler avec du texte lisible et contenant du
                        sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même.
                        L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il
                        possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle
                        du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web
                        ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous
                        conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs
                        versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire
                        d'y rajouter de petits clins d'oeil, voire des phrases embarassantes).</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">DERNIERS ARTICLES</div>
                <div class="panel-body">
                    <?php
                    foreach ($articles as $a):
                        ?>
                        <a href="article/<?= $a->getId(); ?>">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <div class="thumbnail">
                                    <img src="<?= $siteurl . $a->image; ?>"/>
                                    <div class="caption">
                                        <h4><?= $a->titre ?></h4>
                                        <p><?= substr($a->contenu, 0, 50) ?><span class="glyphicon glyphicon-option-horizontal"></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
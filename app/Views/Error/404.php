<?php

use Core\Error;
?>
<style>
    #restart{
        display:none;
    }
    #pause{
        display:none;
    }
    #score1{
        display:none;
    } 
    #vie1{
        display:none;
    }
    .timer1{
        display:none;
    } 
    #difficulte{
        display:none;
    } 
</style>


<div class="container content">
    <div class="row">
        <div class="col-md-12">

            <h1>Page 404 :(</h1>

            La page "<?php echo $data['error']; ?>" n'existe pas.

            <hr />
 
          
             <div>
                <a href="#" id="start">Démarrer</a> 
                <a href="#" id="restart">Redémarrer</a>
                <a href="#" id="pause">Pause</a>
                <span id="vie1"> Vie : </span> <span id="vie2">  </span>
                <span id="score1"> Score : </span> <span id="score2">  </span>				 
                <span id="message">  </span>

                <div id="difficulte">
                    <a href="#" id="facile">Facile</a> 
                    <a href="#" id="moyen">Moyen</a> 
                    <a href="#" id="difficile">DIFFICILE</a> 
                </div>
            </div>

            <canvas id="canvas" width="998" height="500" style="border:2px solid blue;margin: 0 auto;">

            </canvas>

        </div>
    </div>
</div>

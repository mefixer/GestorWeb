      <div class="row">
        <div class="col s12">
          <?php $a = 0; foreach ($activity as $filactivity):?>

          <?php $i = 0; foreach ($material as $filmaterial):?>
          <?php if($filactivity->material_idmaterial === $filmaterial->idmaterial && $filactivity->material_materialtype_idmaterialtype === '4'):?>
            <div class="card" id="card<?php echo $i?>">
              <div class="card-image">

                <div class="video-container">

                  <?php
                  $original = $filmaterial->link;
                  $length = strlen($original);
                  $base = substr($original,0,24);
                  $dir = substr($original, strpos($original, "=") + 1, $length);
                  $link = $base . "embed/" . $dir . "?enablejsapi=1";?>
                  <iframe width="360" height="480" src="<?php  echo $link;?>" frameborder="1" allowfullscreen></iframe>

                </div>

                <span class="card-title">ACTIVITY</span>
              </div>
              <div class="card-content">
                <h4><?php echo $filactivity->activityname?></h4>
                <p><?php echo $filactivity->descriptionleft?></p>
                <p><?php echo $filactivity->descriptionright?></p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
          <?php endif;?>
          <?php $i++; endforeach; ?>

          <?php $e = 0; foreach ($material as $filmaterial):?>
          <?php if($filactivity->material_idmaterial === $filmaterial->idmaterial && $filactivity->material_materialtype_idmaterialtype === '3'):?>
            <div class="card" id="card<?php echo $e?>">
              <div class="card-image">

                <video class="responsive-video" controls>
                    <source src="media/<?php echo $filmaterial->route?>" controls>
                </video>
              </div>
              <div class="card-content">
                <h4><?php echo $filactivity->activityname?></h4>
                <p><?php echo $filactivity->descriptionleft?></p>
                <p><?php echo $filactivity->descriptionright?></p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
          <?php endif;?>
          <?php $e++; endforeach; ?>

          <?php $ei = 0; foreach ($material as $filmaterial):?>
          <?php if($filactivity->material_idmaterial === $filmaterial->idmaterial && $filactivity->material_materialtype_idmaterialtype === '2'):?>
            <div class="card" id="card<?php echo $ei?>">
              <div class="card-image">
                <br>
                <audio controls>
                  <source src="media/<?php echo $filmaterial->route?>">
                    Tu navegador no soporta HTML5 audio.
                </audio>
                <br>
              </div>
              <div class="card-content">
                <h4><?php echo $filactivity->activityname?></h4>
                <p><?php echo $filactivity->descriptionleft?></p>
                <p><?php echo $filactivity->descriptionright?></p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
          <?php endif;?>
          <?php $ei++; endforeach; ?>

        <?php $ea = 0; foreach ($material as $filmaterial):?>
          <?php if($filactivity->material_idmaterial === $filmaterial->idmaterial && $filactivity->material_materialtype_idmaterialtype === '1'):?>
            <div class="card" id="card<?php echo $ea?>">
              <div class="card-image">
                <br>
                      <object data="media/<?php echo $filmaterial->route?>" type="application/pdf" width="950" height="480"/>
                <br>
              </div>
              <div class="card-content">
                <h4><?php echo $filactivity->activityname?></h4>
                <p><?php echo $filactivity->descriptionleft?></p>
                <p><?php echo $filactivity->descriptionright?></p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
          <?php endif;?>
        <?php $ea++; endforeach; ?>

          <?php $a++; endforeach; ?>
        </div>
      </div>
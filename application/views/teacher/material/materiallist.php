<div class="col s12 m6">
<?php $i = 0; foreach ($material as $filmaterial):?>
    <?php if($filmaterial->materialtype_idmaterialtype === '1'):?>
       <div class="card" id="cardpdf<?php echo $i?>">
              <div class="card-image">
                <br>
                      <object data="media/<?php echo $filmaterial->route?>" type="application/pdf" width="100%" height="100%"/>
                <br>
              </div>
              <div class="card-content">
                <h4><?php echo $filmaterial->materialname?></h4>
          <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
          <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
              </div>
              <div class="card-action">
                <button class="btn modal-trigger white black-text pulse"><i class="material-icons right">edit</i>Edit</button>
          <button class="btn red modal-trigger pulse"><i class="material-icons right">delete</i> Delete</button>
              </div>
            </div>
    <?php endif;?>
    <?php if($filmaterial->materialtype_idmaterialtype === '2'):?>
                  <div class="card" id="cardaudio<?php echo $i?>">
              <div class="card-image">
                <br>
                <audio controls>
                  <source src="media/<?php echo $filmaterial->route?>">
                    Tu navegador no soporta HTML5 audio.
                </audio>
                <br>
              </div>
              <div class="card-content">
                <h4><?php echo $filmaterial->materialname?></h4>
          <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
          <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
              </div>
              <div class="card-action">
                <button class="btn modal-trigger white black-text pulse"><i class="material-icons right">edit</i>Edit</button>
          <button class="btn red modal-trigger pulse"><i class="material-icons right">delete</i> Delete</button>
              </div>
            </div>
    <?php endif;?>
    <?php if($filmaterial->materialtype_idmaterialtype === '3'):?>
     <div class="card" id="cardvideo<?php echo $i?>">
      <div class="card-image">

        <video class="responsive-video" controls>
          <source src="media/<?php echo $filmaterial->route?>" controls>
          </video>
        </div>
        <div class="card-content">
          <h4><?php echo $filmaterial->materialname?></h4>
          <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
          <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
        </div>
        <div class="card-action">
          <button class="btn modal-trigger white black-text pulse"><i class="material-icons right">edit</i>Edit</button>
          <button class="btn red modal-trigger pulse"><i class="material-icons right">delete</i> Delete</button>
        </div>
      </div>
    <?php endif;?>
    <?php if($filmaterial->materialtype_idmaterialtype === '4'):?>
      <div class="card" id="cardyoutube<?php echo $i?>">
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

          <span class="card-title">Material</span>
        </div>
        <div class="card-content">
          <h4><?php echo $filmaterial->materialname?></h4>
          <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
          <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
        </div>
        <div class="card-action">
          <button class="btn modal-trigger white black-text pulse"><i class="material-icons right">edit</i>Edit</button>
          <button class="btn red modal-trigger pulse"><i class="material-icons right">delete</i> Delete</button>
        </div>
      </div>
    <?php endif;?>
<?php $i++; endforeach; ?>
</div>
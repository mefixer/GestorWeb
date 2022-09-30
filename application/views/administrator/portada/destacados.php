<div class="row">
        <div class="col s6">
            <form id="form_img" method="post" enctype="multipar/upload" action="">
                <div class="card">
                    <div class="card-content">
                        <h4 style="font-weight: bolder;">INGRESO DE DESTACADOS</h4><br>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="product_name" type="text" class="validate">
                                <label for="product_name">Titulo</label>
                            </div>
                            <div class="input-field col s12">
                                <label>Columna</label>
                                <input type="text" id="description">
                            </div>
                        </div>

                    </div>
                    <div class="card-action">
                        <div class="row">
                            <input type="file" name="file_img" id="file_img" class="form">
                        </div>
                        <div class="row">
                            <button type="submit" id="upload" class="btn green"><i class="material-icons">image</i> Guardar Destacado</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col s6">
            <div class="row">
                <div class="card">
                    <div class="card-content white-text">
                        <h4 style="font-weight: bolder;" class="black-text">LISTA DE DESTACADOS</h4>
                        <div class="row">
                            <?php if ($destacados == 0) : ?>
                                <p class="black-text">No Hay Destacados Almacenados!</p>
                            <?php else : ?>
                                <?php $a = 0;
                                foreach ($destacados as $fila) : ?>
                                    <div class="col s12">
                                        <div class="card ">
                                            <div class="card-image">
                                                <img src="img/<?php echo $fila->imagen ?>" >
                                                
                                                <span class="card-title"><?php echo $fila->titulo ?></span>
                                            </div>
                                            <div class="card-content white-text">
                                                <div class="">
                                                    <p class="black-text" for="rut"><?php echo $fila->columna ?></p>
                                                </div>
                                            </div>
                                            <div class="card-action">
                                                <button class="btn s6 blue lighten-5 black-text" id="edituser<?php echo $a ?>" onclick="editUser(<?php echo $fila->id ?>)"><i class="material-icons right">edit</i>Editar</button>
                                                <button class="btn s6 deep-orange darken-2" id="deleteuser<?php echo $a ?>" onclick="deleteUser(<?php echo $fila->id ?>)"><i class="material-icons right">delete</i>Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php $a++;
                                endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#form_img').on('submit', function(even) {
                even.preventDefault();
                $.ajax({
                    url: "<?php echo base_url(); ?>Upload/_UploadImage",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#dataimg').hmtl(data);
                    }
                });
            });
        });
    </script>
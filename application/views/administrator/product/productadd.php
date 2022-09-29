    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h4>INGRESO DE PRODUCTO</h4><br>
                        <div class="mb-3">
                            <input id="product_name" type="text" class="validate">
                            <label for="product_name">Nombre</label>
                        </div>
                        <div class="mb-3">
                            <label>Descripcion</label>
                            <input type="text" id="description">
                        </div>
                        <div class="mb-3">
                            <label>Stock</label>
                            <input type="text" id="stock">
                        </div>
                        <div class="mb-3">
                            <label>Precio</label>
                            <input type="text" id="price">
                        </div>

                </div>
                <div class="card-action">
                    <div class="row">
                        <?php echo form_open_multipart('upload/do_upload'); ?>
                        <input type="file" name="user_file" size="20" />

                        <a type="submit" value="upload" class="btn btn-primary">Guardar Producto</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4>LISTA DE PRODUCTOS</h4>
                        <div class="row">
                            <?php if ($producto == 0) : ?>
                                <p class="black-text">No Hay Productos almacenados!</p>
                            <?php else : ?>
                                <?php $a = 0;
                                foreach ($producto as $fila) : ?>
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-image">
                                                <img style="width: 5rem;" src="uploads/<?php echo $fila->img ?>">
                                                <span class="card-title"><?php echo $fila->name ?></span>
                                            </div>
                                            <div class="card-body">
                                                <div class="">
                                                    <p class="black-text" for=""><span>Descripción: </span><?php echo $fila->description ?></p>
                                                    <p class="black-text" for=""><span>Cantidad: </span><?php echo $fila->stock ?></p>
                                                    <p class="black-text" for=""><span>valor: </span><?php echo $fila->price ?></p>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <a class="btn" id="edituser<?php echo $a ?>" onclick="editUser(<?php echo $fila->id ?>)">Editar</a>
                                                <a class="btn" id="deleteuser<?php echo $a ?>" onclick="deleteUser(<?php echo $fila->id ?>)">Eliminar</a>
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
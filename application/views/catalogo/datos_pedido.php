<?php $cantidad = 0 ?>
<?php $data = $this->cart->contents(); ?>
<?php $t = 0; ?>
<?php foreach ($data as $fil4) : ?>
    <?php $cantidad += $fil4['qty'] ?>
<?php $t++;
endforeach; ?>
<div class="cover">
    <nav class="navbar">
        <div class="content-fluid">
            <div class="nav">
                <ul>
                    <li><a class="nav_a" onclick="catalogo()"> Tienda</a></li>
                    <li><a class="nav_a" onclick="verCarrito()"><i class="bi bi-cart"></i> <?php echo $cantidad ?></span></a><span></li>
                    <li><a class="nav_a" href="<?php echo base_url() ?>"><img src="img/logo.png" style="width: 20vh;"></a></li>
                    <li><a class="nav_a" onclick="revisar_pedido()"> Mi pedido</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <h4>Para continuar con tu pedido necesitamos algunos datos de ti: </h4>
        </div>

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="nombre_pedido" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_pedido">
            </div>
            <div class="mb-3">
                <label for="apellido_pedido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido_pedido">
            </div>
            <div class="mb-3">
                <label for="direc_pedido" class="form-label">Direccion</label>
                <textarea class="form-control" id="direc_pedido" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="email_pedido" class="form-label">Email</label>
                <input type="email" class="form-control" id="email_pedido">
            </div>
            <div class="mb-3">
                <label for="cel_pedido" class="form-label">+569</label>
                <input type="email" class="form-control" required maxlength="8" id="cel_pedido">
            </div>
        </div>
        <div class="col-8">
            <div class="">
                <div class="">
                    <p>Aqui solicitarás tu pedido, debes guardar el codigo que se te entregará, de todas formas en tu correo lo tendrás.</p>
                    <button class="btn btn-outline-success" id="btn_pedido" onclick="generar_solicitud()">Generar Solicitud</button>
                </div>
            </div>
            <div class="cards">
                <div class="card-content">
                    <label>Total Pedido</label>
                    <!-- mostramos la cantidad total en valor directamente de la clase cart -->
                    <p type="number">$ <?php echo number_format($this->cart->total()); ?></p>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <?php if ($this->cart->contents() == 0) : ?>
                    <p>No Hay productos seleccionados!</p>
                <?php else : ?>
                    <?php $a = 0;
                    foreach ($this->cart->contents() as $fila) : ?>
                        <div class="col">
                            <div class="card" style="width: 16rem;">
                                <?php if ($producto == 0) : ?>
                                    <!-- aqui preguntamos por los productos para extraer la imagen y verla en el carro -->
                                    <p class="black-text">No Hay Productos almacenados!</p>
                                <?php else : ?>
                                    <?php $a = 0;
                                    foreach ($producto as $fila2) : ?>
                                        <!-- asignamos la variable para poder recorrer el arreglo y asi poder verificar si el id del producto  para mostrar su imagen -->
                                        <?php if ($fila2->id == $fila['id']) : ?>
                                            <img src="uploads/<?php echo $fila2->img ?>" style="width: 100%;">
                                        <?php else : ?>
                                        <?php endif; ?>
                                    <?php $a++;
                                    endforeach; ?>
                                <?php endif; ?>
                                <div class="card-body">
                                <h4 class="card-title"><?php echo $fila2->name ?></h4>
                                    <input type="text" hidden id='rowid<?php echo $fila['rowid'] ?>'>
                                    <label>Cantidad</label>
                                    <p id="cantidad-cart<?php echo $fila['id'] ?>"><?php echo $fila['qty'] ?></p>
                                    <label>Valor</label>
                                    <p type="number" id="precio-cart<?php echo $fila['id'] ?>">$ <?php echo number_format($fila['price']) ?></p>
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
</div>
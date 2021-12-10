<div class="row">
    <form class="col s12">
        <div class="center">
            <h4 style="font-weight: bolder;">ORDEN DE COMPRA</h4>
        </div>
        <br>
        <div class="row">
            <div class="col s4 center">
                <div>
                    <p><label>TIPO DE ENTRADA:</label> ORDEN DE COMPRA</p>
                </div>
            </div>
            <div class="col s4 center">
                <p><label>FECHA DOCUMENTO:</label> <?php echo strtoupper(date('l jS \of F Y')) . "\n"; ?></p>
            </div>
            <div class="col s4 center">
                <p><label>UNIDAD:</label> MUNICIPAL</p>
            </div>

            <div class="col s12">
                <br>
                <table class="responsive-table bordered centered">
                    <tbody>
                        <tr>
                            <td><label>TEMA:</label></td>
                            <td><a class="btn-floating blue-grey lighten-1 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Fila"><i class="material-icons">add</i></a></td>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Nº</td>
                                            <td>CANTIDAD</td>
                                            <td>UNIDAD DE MEDIDA</td>
                                            <td>DETALLE</td>
                                            <td>ITEM</td>
                                            <td>PRECIO NETO</td>
                                        </tr>
                                        <tr id="f0_fila">
                                            <td><input id="f0_1" size="2" maxlength="8" value="" disabled></td>
                                            <td><input id="f0_2" size="4" maxlength="8" value=""></td>
                                            <td><input id="f0_3" size="15" maxlength="15" value=""></td>
                                            <td><input id="f0_4" size="55" maxlength="55" value=""></td>
                                            <td><input id="f0_5" size="35" maxlength="35" value=""></td>
                                            <td><input id="f0_6" size="12" maxlength="12" value=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col s12">
                <div class="row">
                <div class="col s2">
                        <label>CALCULO DE IVA</label>
                        <div>
                            <input class="with-gap" name="Calculo" type="radio" id="Calculo_1" checked>
                            <label for="Calculo_1">Afecto</label>
                        </div>
                        <div>
                            <input class="with-gap" type="radio" name="Calculo" id="Calculo_2">
                            <label for="Calculo_2">Exento</label>
                        </div>
                    </div>
                    <div class="col s2">
                        <label>FIRMA DOCUMENTO:</span></label>
                        <div>
                            <input class="with-gap" type="radio" name="firma" id="firma_1" checked>
                            <label for="firma_1">Si</label>
                        </div>
                        <div>
                            <input class="with-gap" type="radio" name="firma" id="firma_2">
                            <label for="firma_2">No</label>
                        </div>
                    </div>
                    <div class="col s2">
                        <p><label>UTM: </label><input type="number" disabled></p>
                    </div>
                    <div class="col s2">
                        <p><label>NETO:</label><input type="number" disabled></p>
                    </div>
                    <div class="col s2">
                        <p><label>IVA:</label><input type="number" disabled></p>
                    </div>
                    <div class="col s2">
                        <p><label>TOTAL:</label><input type="number" disabled></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
                <div class="col s6">
                    <p><label>DESTINO:</label><input type="number" disabled></p>
                </div>
                <div class="col s6">
                    <p><label>PROGRAMA:</label><input type="number" disabled></p>
                </div>
        </div>
        <div class="row">
            <div class="col s6">
                <p> </p>
            </div>
            <div class="col s6">
                <button class="waves-effect waves-light btn light-green lighten-4 black-text right"><i class="material-icons">check</i> SOLICITUD LISTA</button>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems, options);
    });

    // Or with jQuery
    $(document).ready(function() {
        $('.tooltipped').tooltip({
            delay: 50
        });
    });
    $(document).ready(function() {
        $('.collapsible').collapsible();
    });

    $(document).ready(function() {
        $('select').material_select();
    });
</script>
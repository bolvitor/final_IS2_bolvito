<h1 class="text-center">Formulario de puestos</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioAsignaciones">
        <input type="hidden" name="puesto_id" id="puesto_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="empleado_id">Empleado</label>
                    <select name="empleado_id" id="empleado_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($areas as $key => $area) : ?>
                            <option value="<?= $area['AREA_ID'] ?>"><?= $area['AREA_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
        </div>
        <div class="row mb-3">
                <div class="col">
                    <label for="area_id">Area</label>
                    <select name="area_id" id="area_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($areas as $key => $area) : ?>
                            <option value="<?= $area['AREA_ID'] ?>"><?= $area['AREA_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
        </div>
        <div class="row mb-3">
                <div class="col">
                    <label for="puesto_id">Puesto</label>
                    <select name="puesto_id" id="puesto_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($puestos as $key => $puesto) : ?>
                            <option value="<?= $puesto['PUE_ID'] ?>"><?= $puesto['PUE_DESCRIPCION'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioAsignaciones" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<div class="row justify-content-center" id="divTabla">
    <div class="col-lg-8">
        <h2>Listado de puestos</h2>
        <table class="table table-bordered table-hover" id="tablaPuestos">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>DESCRIPCION</th>
                    <th>SUELDO</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/asignaciones/index.js')  ?>"></script>
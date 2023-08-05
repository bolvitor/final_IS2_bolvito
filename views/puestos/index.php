<h1 class="text-center">Formulario de puestos</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioPuesto">
        <input type="hidden" name="puesto_id" id="puesto_id">
        <div class="row mb-3">
            <div class="col">
                <label for="puesto_descripcion">Nombre del puesto</label>
                <input type="text" name="puesto_descripcion" id="puesto_descripcion" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="puesto_sueldo">sueldo</label>
                <input type="number" step="0.01" min="0" name="puesto_sueldo" id="puesto_sueldo" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioPuesto" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
<script src="<?= asset('./build/js/puestos/index.js')  ?>"></script>
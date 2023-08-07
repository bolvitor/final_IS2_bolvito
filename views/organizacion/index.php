<h1 class="text-center">Lista de Empleados por Áreas</h1>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <?php foreach ($empleadosPorAreas as $area => $empleados) : ?>
            <h2><?= $area ?></h2>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>DPI</th>
                        <th>Puesto</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Sueldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empleados as $indice => $empleado) : ?>
                        <tr>
                            <td><?= $indice + 1 ?></td>
                            <td><?= $empleado['empleado_nombre'] ?></td>
                            <td><?= $empleado['empleado_dpi'] ?></td>
                            <td><?= $empleado['puesto_descripcion'] ?></td>
                            <td><?= $empleado['empleado_edad'] ?></td>
                            <td><?= $empleado['empleado_sexo'] ?></td>
                            <td><?= $empleado['puesto_sueldo'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endforeach ?>
    </div>
</div>

<script src="<?= asset('./build/js/organizaciones/index.js')  ?>"></script>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados por Áreas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .area-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-6">
        <h1 class="text-center display-6"><b>ORGANIZACIÓN DE LA EMPRESA</b></h1>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php foreach ($empleadosPorAreas as $area => $empleados) : ?>
                    <div class="mb-4">
                        <h2 class="area-title"><b><?= $area ?></b></h2>
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
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <script src="<?= asset('./build/js/organizaciones/index.js') ?>"></script>
</body>
</html>

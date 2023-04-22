<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Index</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel 6 con AJAX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Animales</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mantenimiento
                       </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Propietario</a></li>
                            <li><a class="dropdown-item" href="#">Médicos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Citas</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Lista de animales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Nuevo animal</button>
                    </li>
                </ul>
                <div class="tab-content py-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <h3>Lista de animales</h3>

                        <table class="table table-hover" id="tabla-animal">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Especie</th>
                                    <th>Genero</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody> --}}
                        </table>

                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <h3>Nuevo animal</h3>

                        <form id="registro-animal">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="txtNombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txtNombre">     
                            </div>
                            <select class="form-select" id="selEspecie" name="selEspecie" aria-label="Default select example">
                                <option selected>Especie</option>
                                <option value="Gato">Gato</option>
                                <option value="Perro">Perro</option>
                                <option value="Ave">Ave</option>
                                <option value="Otros">Otros</option>
                            </select>
                            <div class="form-group mt-3 mb-3">
                                
                 
                  
                                <label for="">Genero</label>
                         
                                <div class="form-check">
                                    <input class="form-check-input" value="Macho" type="radio" name="rbGenero" id="rbGeneroMacho">
                                    <label class="form-check-label" for="rbGeneroMacho">
                                        Macho
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Hembra" type="radio" name="rbGenero" id="rbGeneroHembra">
                                    <label class="form-check-label" for="rbGeneroHembra">
                                        Hembra
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        $(document).ready(function() {
            var tablaAnimal = $('#tabla-animal').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "{{ route('animal.index') }}",
                },
                columns:[
                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'especie'},
                    {data: 'genero'},
                    {data: 'action', orderable: false}
                ]
            });
        });
    </script>

    <script>
        $('#registro-animal').submit(function(e) {
            e.preventDefault();

            var nombre = $("#txtNombre").val();
            var especie = $("#selEspecie").val();
            var genero = $("input[name=rbGenero]:checked").val();
            var _token = $("input[name=_token]").val(); 
            
            $.ajax({
                url: "{{ route('animal.registrar') }}",
                type: "POST",
                data:{
                    nombre: nombre,
                    especie: especie,
                    genero: genero,
                    _token: _token,
                },
                
                success: function(response) {
                    if(response) {
                        $('#registro-animal')[0].reset();
                        toastr.success('El registro se ingreso correctamente.', 'Nuevo registro', {timeOut: 3000});
                        $('#tabla-animal').DataTable.ajax.reload();
                    }
                }
            });
        });
    </script>

</body>
</html>









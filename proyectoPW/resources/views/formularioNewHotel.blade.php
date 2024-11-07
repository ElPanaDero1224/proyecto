@extends('layouts.plantillanavbarA') 
@section('modulo', '| Nuevo Hotel')
@section('seccion')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-4 bg-light rounded">
                <div class="row">
                    <!-- Sección para la imagen -->
                    <div class="col-md-4 d-flex align-items-center justify-content-center" style="border: 2px solid #87CEEB; padding: 10px;">
                        <label for="imagen" style="width: 100%; cursor: pointer;">
                            <div class="text-center">
                                <!-- Imagen que se actualizará con la vista previa -->
                                <img id="preview" src="https://via.placeholder.com/100x100?text=+" alt="Subir imagen" style="width: 100%; max-width: 100px; display: block; margin: 0 auto;">
                            </div>
                            <input type="file" id="imagen" name="imagen" style="display: none;">
                        </label>
                    </div>
                    
                    <!-- Agrega el script de previsualización al final del formulario -->
                    <script>
                        document.getElementById('imagen').addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById('preview').src = e.target.result;
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>
                    

                    <!-- Campos del formulario -->
                    <div class="col-md-8">
                        <form action="{{ route('hotelesAdminformulario.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                                <small class="text-danger">{{ $errors->first('titulo') }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                <small class="text-danger">{{ $errors->first('descripcion') }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="ubicacion" class="form-label">Ubicación:</label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}">
                                <small class="text-danger">{{ $errors->first('ubicacion') }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio:</label>
                                <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}">
                                <small class="text-danger">{{ $errors->first('precio') }}</small>
                            </div>

                            <!-- Botones de acción -->
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('rutabusquedaHotelesAdmi') }}'">Cancelar</button>
                                <button type="button" class="btn btn-dark" onclick="window.location.href='{{ route('rutamodificarPoliticas') }}'">Añadir políticas de cancelación</button>
                                <button type="submit" class="btn btn-success">Añadir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SweetAlert para mostrar mensaje de éxito -->
@if(session('exito'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('exito') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        });
    </script>
@endif

@endsection

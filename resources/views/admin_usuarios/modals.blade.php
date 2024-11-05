<!-- Modal de registro -->
<div class="modal fade" id="createUserModal" tabindex="-1">
    <!-- Contenido similar al formulario de create.blade.php -->
</div>

<!-- Modal de edición -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <!-- Contenido similar al formulario de edit.blade.php -->
</div>

<!-- Modal de eliminación -->
<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5>¿Seguro que deseas eliminar a este usuario?</h5>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

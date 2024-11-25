<div class="modal fade" id="promoteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="promoteEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="promoteForm">
                @csrf
                <input type="hidden" id="promoteUserId" name="user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="promoteEmployeeLabel">Promover Empleado a Administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Promover</button>
                </div>
            </form>
        </div>
    </div>
</div>

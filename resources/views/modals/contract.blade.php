<div class="modal fade" id="contractEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="contractEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="contractForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="contractEmployeeLabel">Contratar Cliente como Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="employeeSelection">Seleccionar Cliente:</label>
                    <select class="form-control" id="employeeSelection" name="user_id"></select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Contratar</button>
                </div>
            </form>
        </div>
    </div>
</div>

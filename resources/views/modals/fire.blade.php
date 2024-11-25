<div class="modal fade" id="fireEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="fireEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="fireForm">
                @csrf
                <input type="hidden" id="fireUserId" name="user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="fireEmployeeLabel">Despedir Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Despedir</button>
                </div>
            </form>
        </div>
    </div>
</div>

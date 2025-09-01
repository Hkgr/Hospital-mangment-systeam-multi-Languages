<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/LaboratorieEmployee.AddEmployee') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laboratorie_employee.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{ trans('Dashboard/LaboratorieEmployee.EmployeeName') }}</label>
                    <input type="text" name="name" class="form-control"><br>

                    <label for="exampleInputPassword1">{{ trans('Dashboard/LaboratorieEmployee.Email') }}</label>
                    <input type="email" name="email" class="form-control"><br>

                    <label for="exampleInputPassword1">{{ trans('Dashboard/LaboratorieEmployee.Password') }}</label>
                    <input type="password" name="password" class="form-control"><br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/LaboratorieEmployee.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('Dashboard/LaboratorieEmployee.Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

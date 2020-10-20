
<form action="/logout" method="post">
    @csrf
    <div class="modal fade" id="logout" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Akan Logout ?

                    <input type="hidden" name="nama"
                           value="{{Session::get('name')}}">
                    <input type="hidden" name="nik"
                           value="{{Session::get('email')}}">
                    <input type="hidden" name="operator"
                           value="{{Session::get('login')}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Logout</button>
                </div>
            </div>
        </div>
    </div>

</form>

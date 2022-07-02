<div class="modal fade" id="coachModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="coachTitle"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-6">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name">
                            <span id="name-error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="place_of_birth" class="col-sm-6">Tempat Lahir</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
                            <span id="place-of-birth-error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth" class="col-sm-6">Tanggal Lahir</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                            <span id="date-of-birth-error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-6">Telepon</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="phone" name="phone">
                            <span id="phone-error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-6">Alamat</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address">
                            <span id="address-error" class="text-danger"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat" id="btn-save"><i class="fas fa-save"></i>
                    Simpan</button>
                <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">
                    <i class="fas fa-times-circle"> Batal</i></span>
                </button>
            </div>
        </div>
    </div>
</div>
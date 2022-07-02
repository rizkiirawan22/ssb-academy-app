<div class="modal fade" id="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="title"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="champion" class="col-sm-6">Juara</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="champion" name="champion">
                            <span id="champion-error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-6">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name">
                            <span id="name-error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-6">Tanggal</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date" name="date">
                            <span id="date-error" class="text-danger"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat" id="btn-save"><i
                        class="fas fa-save"></i>
                    Simpan</button>
                <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal">
                    <i class="fas fa-times-circle"> Batal</i></span>
                </button>
            </div>
        </div>
    </div>
</div>

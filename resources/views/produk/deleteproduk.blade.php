
<div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center ">
          <h4>yakin ingin menghapus <span class="text-danger">"{{ $data->nama_produk }}"</span></h4>
        </div>
        <div class="modal-footer">
            <div class=" d-flex  justify-content-center w-100">
                <button type="button" class="btn btn-secondary w-50 mx-1" data-bs-dismiss="modal">Batal</button>
                <a href="{{ route('produk.delete', $data->id) }}" type="button" class="btn btn-danger w-50 mx-1">Hapus</a>
            </div>
        </div>
      </div>
    </div>
  </div>

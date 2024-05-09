<?php
use Livewire\Volt\Component;
use App\Models\Produk;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use WithFileUploads;
    public $produks;
    public $page;
    public $kategori_id;
    public $nama_produk;
    public $harga_beli;
    public $harga_jual;
    public $stok;
    public $image_path;
    public $kategoris;

    public function mount($produks)
    {
        $this->kategori_id = $produks->kategori_produk_id;
        $this->nama_produk = $produks->nama_produk;
        $this->harga_beli = $produks->harga_beli;
        $this->harga_jual = $produks->harga_jual;
        $this->stok = $produks->stok;
    }

    public function change()
    {
        if ($this->harga_beli <= 0) {
            $this->harga_beli = null;
        }
        $kalipersen = $this->harga_beli * 1.3;
        $this->harga_jual = $kalipersen;
    }

    public function update()
    {
        $validatedData = $this->validate(
            [
                'kategori_id' => 'required',
                'nama_produk' => 'required',
                'harga_beli' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'stok' => 'required|numeric',
                'image_path' => 'nullable|image|mimes:jpeg,png|max:100',
            ],
            [
                'kategori_id.required' => 'Kategori produk harus diisi.',
                'nama_produk.required' => 'Nama produk harus diisi.',
                'harga_beli.required' => 'Harga beli harus diisi.',
                'harga_beli.numeric' => 'Harga beli harus berupa angka.',
                'harga_jual.required' => 'Harga jual harus diisi.',
                'harga_jual.numeric' => 'Harga jual harus berupa angka.',
                'stok.required' => 'Stok produk harus diisi.',
                'stok.numeric' => 'Stok produk harus berupa angka.',
                'image_path.image' => 'File harus berupa gambar.',
                'image_path.mimes' => 'File gambar harus berformat jpeg atau png.',
                'image_path.max' => 'Ukuran file gambar maksimal 100kb.',
            ],
        );

        $produks = Produk::find($this->produks->id);
        if ($this->produks) {
            if ($this->image_path) {
                Storage::disk('public')->delete('fotoproduk/' . $this->produks->image_path);
                $imageName = 'produk_' . date('YmdHis') . '.' . $this->image_path->getClientOriginalExtension();
                $this->image_path->storeAs('public/fotoproduk/', $imageName);
                $produks->image_path = $imageName;
            } else {
                $this->image_path = $produks->image_path;
            }
            $produks->update([
                'kategori_produk_id' => $this->kategori_id,
                'nama_produk' => $this->nama_produk,
                'harga_beli' => $this->harga_beli,
                'harga_jual' => $this->harga_jual,
                'stok' => $this->stok,
            ]);
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ubah.');
        }
        return redirect()->back()->with('error', 'Gagal menambahkan data produk. Silakan coba lagi.');
    }
};
?>
<div class="content w-100 m-5">
    <h3><span class="text-secondary ">Daftar Produk</span> > {{ $page }}</h1>
        <form wire:submit.prevent="update" class="w-100 d-flex" enctype="multipart/form-data">
            <div class="row w-100">
                <div class="col-md-12 d-flex w-100 justify-content-between mt-4">
                    <div class="kategori-input w-25">
                        <label for="">Kategori</label>
                        <select wire:model='kategori_id' class="form-select shadow-sm mt-2" name="kategori">
                            <option>Pilih Kategori</option>
                            @foreach ($kategoris as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="nama-barang ms-3 w-100 @error('nama_produk') is-invalid
                        @enderror">
                        <label for="">Nama Barang</label>
                        <input wire:model='nama_produk' name="nama_produk" type="text"
                            class="form-control shadow-sm w-100 mt-2">
                        @error('nama_produk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-between my-3">
                    <div class="harga-beli w-100">
                        <label for="">Harga Beli</label>
                        <input wire:keydown='change' wire:model.live='harga_beli' name="harga_beli" type="number"
                            class="form-control shadow-sm mt-2">
                        @error('harga_beli')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="harga-jual ms-3 w-100">
                        <label for="">Harga Jual</label>
                        <input wire:model='harga_jual' name="harga_jual" type="text" readonly
                            class="form-control shadow-sm w-100 mt-2 @error('kategori') is-invalid
                            @enderror ">
                        @error('harga_jual')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="stock-barang ms-3 w-100">
                        <label for="">Stock Barang</label>
                        <input wire:model='stok' name="stok" type="number"
                            class="form-control shadow-sm w-100 mt-2">
                        @error('stok')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div wire:model='image_path' id="upload" class="col-md-12 d-flex justify-content-between my-3">
                    <div class="addimg w-100 d-flex justify-content-center ">
                        <label for="addimg">

                            @if ($image_path)
                                <div style="border: solid"
                                    class="addimg-logo border-primary  d-flex justify-content-center align-items-center">
                                    <img width="200" class="img-fluid " src="{{ $image_path->temporaryUrl() }}">
                                </div>
                            @else
                                <div style="border: solid"
                                    class="addimg-logo border-primary d-flex justify-content-center align-items-center">
                                    <div class="text-center">
                                        <img width="150" class="img-default"
                                            src="{{ asset('storage/fotoproduk/' . $produks->image_path) }}"
                                            alt="">
                                        <p class="text-primary">{{ $produks->image_path }}</p>
                                    </div>
                                </div>
                            @endif
                        </label>
                        <input wire:model='image_path' name="image_path" id="addimg" type="file"
                            class="form-control shadow-sm w-100 mt-2 py-5" placeholder="">
                    </div>
                </div>
                @error('image_path')
                    <div class="error">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="submit mt-2 d-flex justify-content-end">
                    <div class="ntn-wrappaer w-50 d-flex justify-content-end px-0 ">
                        <a wire:navigate href="/produk" class="btn border-2  border-primary w-25 me-2"
                            type="submit">Batalkan</a>
                        <button class="btn btn-primary w-25 ms-2" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
</div>

@extends('navbar')
@section('content')
<!-- Modal Create Toko -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Toko</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('toko.member.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Nama Toko -->
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label fw-semibold">Nama Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-store"></i></span>
                            <input type="text" class="form-control" id="nama_toko" name="nama_toko" required placeholder="Masukan Nama Toko">
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Masukan Deskripsi Toko" rows="3"></textarea>
                        </div>
                    </div>
                    <!-- Gambar -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">Gambar Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                    </div>
                    <!-- Kontak Toko -->
                    <div class="mb-3">
                        <label for="kontak_toko" class="form-label fw-semibold">Kontak Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" id="kontak_toko" name="kontak_toko" maxlength="13" required placeholder="Masukan Nomor Telepon Toko">
                        </div>
                    </div>
                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <textarea class="form-control" id="alamat" name="alamat" required placeholder="Masukan Alamat Toko" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Toko -->
@foreach ($stores as $toko)
    <div class="modal fade" id="modalEditToko{{ $toko->id }}" tabindex="-1" aria-labelledby="modalEditTokoLabel{{ $toko->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTokoLabel{{ $toko->id }}">Edit Toko</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('toko.member.update', $toko->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <!-- Nama Toko -->
                        <div class="mb-3">
                            <label for="nama_toko_{{ $toko->id }}" class="form-label fw-semibold">
                                Nama Toko <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-store"></i>
                                </span>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_toko_{{ $toko->id }}"
                                    name="nama_toko"
                                    required
                                    placeholder="Masukan Nama Toko"
                                    value="{{ $toko->nama_toko }}">
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi_{{ $toko->id }}" class="form-label fw-semibold">
                                Deskripsi <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-file-lines"></i>
                                </span>
                                <textarea
                                    class="form-control"
                                    id="deskripsi_{{ $toko->id }}"
                                    name="deskripsi"
                                    required
                                    placeholder="Masukan Deskripsi Toko"
                                    rows="3">{{ $toko->deskripsi }}</textarea>
                            </div>
                        </div>

                        <!-- Gambar Lama -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar Toko Saat Ini</label>
                            <div>
                                <img
                                    src="{{ asset('storage/gambar-toko/'.$toko->gambar) }}"
                                    alt="Gambar Toko"
                                    class="img-fluid rounded"
                                    style="max-height: 150px; object-fit: cover;">
                            </div>
                        </div>

                        <!-- Gambar Baru (Opsional) -->
                        <div class="mb-3">
                            <label for="gambar_{{ $toko->id }}" class="form-label fw-semibold">
                                Ubah Gambar Toko (Opsional)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-image"></i>
                                </span>
                                <input
                                    type="file"
                                    class="form-control"
                                    id="gambar_{{ $toko->id }}"
                                    name="gambar"
                                    accept="image/*">
                            </div>
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti gambar.
                            </small>
                        </div>

                        <!-- Kontak Toko -->
                        <div class="mb-3">
                            <label for="kontak_toko_{{ $toko->id }}" class="form-label fw-semibold">
                                Kontak Toko <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="kontak_toko_{{ $toko->id }}"
                                    name="kontak_toko"
                                    maxlength="13"
                                    required
                                    placeholder="Masukan Nomor Telepon Toko"
                                    value="{{ $toko->kontak_toko }}">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat_{{ $toko->id }}" class="form-label fw-semibold">
                                Alamat <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </span>
                                <textarea
                                    class="form-control"
                                    id="alamat_{{ $toko->id }}"
                                    name="alamat"
                                    required
                                    placeholder="Masukan Alamat Toko"
                                    rows="3">{{ $toko->alamat }}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- Modal Tambah Produk -->
<div class="modal fade" id="modalCreateProduct" tabindex="-1" aria-labelledby="modalCreateProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateProductLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="stores_id" value="{{ $toko?->id }}">
                    {{-- Kategori --}}
                    <div class="mb-3">
                        <label for="categories_id" class="form-label fw-semibold">
                            Kategori <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-list"></i>
                            </span>
                            <select name="categories_id" id="categories_id" class="form-select" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori ?? $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Nama Produk --}}
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label fw-semibold">
                            Nama Produk <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-box"></i>
                            </span>
                            <input
                                type="text"
                                class="form-control"
                                id="nama_produk"
                                name="nama_produk"
                                required
                                placeholder="Masukan Nama Produk"
                                maxlength="100">
                        </div>
                    </div>
                    {{-- Harga --}}
                    <div class="mb-3">
                        <label for="harga" class="form-label fw-semibold">
                            Harga (Rp) <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-tag"></i>
                            </span>
                            <input
                                type="number"
                                class="form-control"
                                id="harga"
                                name="harga"
                                required
                                min="0"
                                placeholder="Masukan Harga Produk">
                        </div>
                    </div>
                    {{-- Stok --}}
                    <div class="mb-3">
                        <label for="stok" class="form-label fw-semibold">
                            Stok <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-boxes-stacked"></i>
                            </span>
                            <input
                                type="number"
                                class="form-control"
                                id="stok"
                                name="stok"
                                required
                                min="0"
                                placeholder="Masukan Stok Produk">
                        </div>
                    </div>
                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">
                            Deskripsi <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-file-lines"></i>
                            </span>
                            <textarea
                                class="form-control"
                                id="deskripsi"
                                name="deskripsi"
                                rows="3"
                                required
                                placeholder="Masukan Deskripsi Produk"></textarea>
                        </div>
                    </div>
                    {{-- Gambar --}}
                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">
                            Gambar Produk <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-image"></i>
                            </span>
                            <input
                                type="file"
                                class="form-control"
                                id="gambar"
                                name="gambar[]"
                                accept="image/*"
                                multiple
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update Produk -->
@foreach ($products as $product)
    <div class="modal fade" id="modalUpdateProduct{{ $product->id }}" tabindex="-1" aria-labelledby="modalUpdateProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUpdateProductLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- ROUTE KE UPDATE --}}
                <form action="{{ route('produk.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <input type="hidden" name="stores_id" value="{{ $product->stores_id }}">

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                                <select name="categories_id" class="form-select" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ $product->categories_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_kategori ?? $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Nama Produk --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-box"></i></span>
                                <input type="text" class="form-control" name="nama_produk" required maxlength="100"
                                    value="{{ $product->nama_produk }}">
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                <input type="number" class="form-control" name="harga" min="0" required
                                    value="{{ $product->harga }}">
                            </div>
                        </div>

                        {{-- Stok --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Stok <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-boxes-stacked"></i></span>
                                <input type="number" class="form-control" name="stok" min="0" required
                                    value="{{ $product->stok }}">
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                <textarea class="form-control" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
                            </div>
                        </div>

                        {{-- Gambar Lama --}}
                        <label class="form-label fw-semibold">Gambar Lama</label>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @foreach($product->imageProducts as $img)
                                <div class="position-relative" style="width: 80px">
                                    <img src="{{ asset('storage/gambar-produk/'.$img->nama_gambar) }}" class="rounded" style="width: 80px; height:80px; object-fit:cover;">
                                </div>
                            @endforeach
                        </div>

                        {{-- Upload Gambar Baru --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Tambah Gambar Baru (Opsional)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                <input type="file" class="form-control" name="gambar[]" accept="image/*" multiple>
                            </div>
                            <small class="text-muted">Kosongkan jika tidak ingin menambah gambar.</small>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<div class="container my-5">
    <!-- Alerts -->
    @if (Session::get('pesan'))
        <div class="alert alert-success alert-dismissible fade show mb-3 mt-2" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ Session::get('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>  
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Jika belum punya toko --}}
    @if(!$toko)
        <div class="text-center my-5">
            <h4 class="fw-bold mb-3">Anda belum memiliki toko</h4>
            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary mt-4">
                <i class="bi bi-shop me-1"></i> Buat Toko
            </a>
        </div>
    @else
        <!-- Profil Toko -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body d-flex flex-column flex-md-row align-items-center gap-3">

                <!-- Logo / Foto Toko -->
                <img src="{{ asset('storage/gambar-toko/' . $toko->gambar) }}" 
                    alt="Toko" 
                    class="rounded-circle border" 
                    width="100" 
                    height="100" 
                    style="object-fit: cover;">

                <!-- Info Toko -->
                <div>
                    <h3 class="mb-1 fw-bold">{{ $toko->nama_toko }}</h3>
                    <p class="mb-0">
                        <i class="bi bi-whatsapp me-1"></i>{{ $toko->kontak_toko }}
                    </p>
                </div>

                <!-- Tombol Edit -->
                <div class="ms-md-auto">
                    <a href="#" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalEditToko{{ $toko->id }}" 
                    class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit Toko
                    </a>
                </div>

            </div>
        </div>
        <!-- Deskripsi Toko -->
        <div class="mb-5">
            <h5 class="fw-semibold">Tentang Toko</h5>
            <p class="text-muted">{{ $toko->deskripsi }}</p>
        </div>
        <!-- Daftar Produk -->
        <div>
            <div class="d-flex">
                <h5 class="fw-semibold me-auto">Produk {{ $toko->nama_toko }}</h5>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalCreateProduct" class="btn btn-primary" >Tambah Produk</a>
            </div>
            <div class="row g-3 mt-3">
                @foreach($products as $p)
                <div class="col-6 col-md-3">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="{{route('produk.detail',Crypt::encrypt($p->id))}}" class="nav-link">
                            <img src="{{$p->imageProducts->first() ? asset('storage/gambar-produk/' . $p->imageProducts->first()->nama_gambar) : asset('asset/image/SkoolaAssets/no-image.png')}}" class="card-img-top" alt="{{ $p->nama_produk }}" style="object-fit:cover; height:200px;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1">{{ $p->nama_produk }}</h6>
                            <p class="text-muted small mb-2">Stok : {{ $p->stok }}</p>
                            <strong class="text-dark">Rp {{ number_format($p->harga, 0, ',', '.') }}</strong>
                        </div>
                        <div class="d-flex p-2">
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalUpdateProduct{{ $p->id }}" class="btn btn-primary me-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('produk.delete', Crypt::encrypt($p->id)) }}" class="btn btn-primary me-2"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>
@endsection

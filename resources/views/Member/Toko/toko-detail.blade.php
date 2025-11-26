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
            <form action="{{route('toko.admin.store')}}" method="post" enctype="multipart/form-data">
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
<div class="container my-5">
    <div class="d-flex align-items-center mb-4 mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-light me-3">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h2 class="mb-0">Toko <strong>{{ $store->nama_toko }}</strong></h2>
    </div>
    <!-- Profil Toko -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex flex-column flex-md-row align-items-center gap-3">
            <img src="{{ asset('storage/gambar-toko/' . $store->gambar) }}" alt="Toko" class="rounded-circle border" width="100" height="100" style="object-fit: cover;">
            <div>
                <h3 class="mb-1 fw-bold">{{$store->nama_toko}}</h3>
                <p class="mb-0"><i class="bi bi-whatsapp me-1"></i>{{$store->kontak_toko}}</p>
            </div>
            <div class="ms-md-auto">
                <a href="https://wa.me/628889410765" target="_blank" style="background-color: #020202ff;" class="btn btn-success">
                <i class="bi bi-whatsapp me-1" style="color: #16DB65"></i> Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
    <!-- Deskripsi Toko -->
    <div class="mb-5">
        <h5 class="fw-semibold">Tentang Toko</h5>
        <p class="text-muted">
        {{$store->deskripsi}}
        </p>
    </div>
    <!-- Daftar Produk -->
    <div>
        <h5 class="fw-semibold mb-3">Produk dari {{ $store->nama_toko }}</h5>
        <div class="row g-4">
            @foreach($products as $p)
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm border-0">
                    @php
                        $image = $p->imageProducts()->first()
                    @endphp
                    <img src="{{ $image ? asset('storage/gambar-produk/'.$image->nama_gambar) : asset('asset/image/no-image.jpg') }}"
                        class="card-img-top" alt="{{ $p->nama_produk }}" style="height:180px;object-fit:cover;">
                    <div class="card-body">
                        <h6 class="card-title mb-1">{{ $p->nama_produk }}</h6>
                        <p class="text-muted small mb-2">Stok : {{ $p->stok }}</p>
                        <strong class="text-dark">Rp{{ number_format($p->harga, 0, ',', '.') }}</strong>
                    </div>
                    <div class="d-flex p-2">
                        <a href="https://wa.me/{{ $p->store->kontak_toko }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->nama_produk) }}" class="btn btn-primary w-100">
                            <i class="bi bi-whatsapp me-2" style="color: #16DB65"></i> Chat Penjual
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
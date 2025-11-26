@extends('navbar')
@section('content')
<style>
    /* Palet Warna itemku:
       #F9F7F7 - Background utama
       #DBE2EF - Background secondary
       #3F72AF - Warna aksen
       #112D4E - Warna gelap
    */

    .form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
    }

    .form-card {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 8px 30px rgba(17, 45, 78, 0.1);
        animation: fadeInUp 0.6s ease;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 3px solid #DBE2EF;
    }

    .form-header h2 {
        color: #112D4E;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .form-header p {
        color: #6c757d;
        font-size: 1rem;
    }

    /* Alert Styling */
    .alert {
        border-radius: 12px;
        border: none;
        padding: 1rem 1.25rem;
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
        animation: slideDown 0.4s ease;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .alert ul {
        padding-left: 20px;
        margin-bottom: 0;
    }

    .fa-check-circle {
        color: #28a745;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        color: #112D4E;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: block;
    }

    label::after {
        content: " *";
        color: #dc3545;
    }

    .form-control,
    .form-select {
        border: 2px solid #DBE2EF;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #F9F7F7;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3F72AF;
        box-shadow: 0 0 0 0.2rem rgba(63, 114, 175, 0.15);
        background-color: #ffffff;
        outline: none;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    /* Select Dropdown */
    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%233F72AF'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 1.5rem;
        padding-right: 2.5rem;
    }

    /* File Input */
    input[type="file"] {
        padding: 0.5rem;
        cursor: pointer;
    }

    input[type="file"]::file-selector-button {
        background: linear-gradient(135deg, #DBE2EF 0%, #3F72AF 100%);
        color: #112D4E;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        font-weight: 600;
        cursor: pointer;
        margin-right: 1rem;
        transition: all 0.3s ease;
    }

    input[type="file"]::file-selector-button:hover {
        background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
        color: #F9F7F7;
        transform: translateY(-2px);
    }

    /* Button */
    .btn-primary {
        background: linear-gradient(135deg, #3F72AF 0%, #112D4E 100%);
        border: none;
        color: #F9F7F7;
        font-weight: 600;
        padding: 0.875rem 2.5rem;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(63, 114, 175, 0.3);
        width: 100%;
        margin-top: 1rem;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(63, 114, 175, 0.4);
        background: linear-gradient(135deg, #2d5a8f 0%, #0a1d35 100%);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    /* Button Icon */
    .btn-primary i {
        margin-right: 0.5rem;
    }

    /* Close Button */
    .btn-close {
        filter: brightness(0.8);
    }

    .btn-close:hover {
        filter: brightness(0.5);
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-container {
            padding: 1rem;
        }

        .form-card {
            padding: 1.5rem;
        }

        .form-header h2 {
            font-size: 1.5rem;
        }

        .btn-primary {
            padding: 0.75rem 1.5rem;
        }
    }

    /* Placeholder Styling */
    ::placeholder {
        color: #a0a0a0;
        opacity: 1;
    }

    /* Helper Text */
    .helper-text {
        font-size: 0.85rem;
        color: #6c757d;
        margin-top: 0.25rem;
        display: block;
    }
</style>

<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2><i class="bi bi-plus-circle-fill me-2" style="color: #3F72AF;"></i>Tambah Produk Baru</h2>
            <p>Lengkapi informasi produk yang ingin Anda jual di itemku</p>
        </div>

        @if (Session::get('pesan'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ Session::get('pesan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>  
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terdapat kesalahan:</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="stores_id" value="{{ $store->id }}">
            
            <div class="form-group">
                <label for="categories_id">Kategori Produk</label>
                <select name="categories_id" id="categories_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Contoh: Pensil 2B Merek ABC" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">Harga (Rp)</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Contoh: 5000" min="0" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" placeholder="Contoh: 100" min="0" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Jelaskan detail produk, spesifikasi, dan keunggulan produk Anda..." required></textarea>
                <small class="helper-text">Berikan deskripsi yang jelas dan menarik untuk produk Anda</small>
            </div>

            <div class="form-group">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar Produk</label>
                <input type="file" name="gambar[]" id="gambar" class="form-control" multiple accept="image/*" required>
                <small class="helper-text"><i class="bi bi-info-circle me-1"></i>Anda dapat mengunggah beberapa gambar sekaligus (maksimal 5 gambar)</small>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle-fill"></i>Tambah Produk
            </button>
        </form>
    </div>
</div>
@endsection
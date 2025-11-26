@extends('Administrator.sidebar')
@section('content')
<style>
/* admin-stores inline CSS — theme: itemku
   Palette:
   --bg-main: #F9F7F7
   --bg-secondary:#DBE2EF
   --accent: #3F72AF
   --accent-dark: #112D4E
*/

:root{
  --bg-main: #F9F7F7;
  --bg-secondary: #DBE2EF;
  --accent: #3F72AF;
  --accent-dark: #112D4E;

  --radius-lg: 12px;
  --radius-md: 10px;
  --radius-sm: 8px;

  --shadow-soft: 0 2px 15px rgba(17,45,78,0.08);
  --transition: 0.28s ease;
}

/* Layout */
.container {
  padding: 2rem;
}

/* header */
h2.fw-bold {
  color: var(--accent-dark);
  font-weight: 700;
}

/* hr */
hr {
  border: none;
  border-top: 2px solid var(--bg-secondary);
  opacity: 1;
}

/* Alerts */
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

.alert ul { padding-left: 20px; margin-bottom: 0; }

/* Buttons */
.btn-primary{
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
  border: none;
  color: var(--bg-main);
  font-weight: 600;
  padding: 0.625rem 1.5rem;
  border-radius: 10px;
  transition: transform var(--transition), box-shadow var(--transition);
  box-shadow: 0 2px 10px rgba(63,114,175,0.28);
}
.btn-primary:hover{
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(63,114,175,0.36);
  background: linear-gradient(135deg, #2d5a8f 0%, #0a1d35 100%);
}

.btn-secondary{
  background-color: var(--bg-secondary);
  border: 2px solid var(--accent);
  color: var(--accent-dark);
  font-weight: 600;
  border-radius: 10px;
}
.btn-secondary:hover{
  background-color: var(--accent);
  color: var(--bg-main);
}

.btn-warning{
  background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
  border: none;
  color: var(--accent-dark);
  font-weight: 600;
  transition: all 0.3s ease;
}
.btn-warning:hover{
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(255,193,7,0.3);
}

/* Modal */
.modal-content { border-radius: 20px; border: none; box-shadow: 0 10px 40px rgba(17,45,78,0.16); }
.modal-header{
  background: linear-gradient(135deg, var(--accent-dark) 0%, var(--accent) 100%);
  color: var(--bg-main);
  border-radius: 20px 20px 0 0;
  padding: 1.5rem;
}
.modal-title{ font-weight:700; color: var(--bg-main); }
.modal-body{ padding: 2rem; }
.modal-footer{ padding: 1rem 2rem; border-top: 2px solid var(--bg-main); }

/* Forms */
.form-label{ color: var(--accent-dark); font-weight:600; margin-bottom:0.5rem; }
.form-control, .form-select{
  border: 2px solid var(--bg-secondary);
  border-radius: 10px;
  padding: 0.625rem 0.875rem;
  transition: box-shadow var(--transition), border-color var(--transition);
  background: var(--bg-main);
}
.form-control:focus, .form-select:focus{
  border-color: var(--accent);
  box-shadow: 0 0 0 0.2rem rgba(63,114,175,0.12);
  background: #fff;
}
.input-group-text{
  background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-main) 100%);
  border: 2px solid var(--bg-secondary);
  color: var(--accent);
  font-weight: 600;
  border-radius: 10px 0 0 10px;
}
.input-group .form-control,
.input-group .form-select{
  border-left: none;
  border-radius: 0 10px 10px 0;
}
textarea.form-control{ resize: vertical; min-height: 80px; }

/* Table */
.table{
  background: #fff;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: var(--shadow-soft);
}
.table thead{
  /* original gradient kept for fallback but will be overridden below */
  background: linear-gradient(135deg, var(--accent-dark) 0%, var(--accent) 100%);
  color: var(--bg-main);
}
.table thead th{
  font-weight: 600;
  padding: 1rem;
  border: none;
  color: var(--bg-main);
}
.table tbody td{
  padding: 1rem;
  vertical-align: middle;
  color: var(--accent-dark);
  border-bottom: 1px solid #f6f7f8;
}
.table-striped tbody tr:nth-of-type(odd){ background: var(--bg-main); }
.table tbody tr:hover{ background: var(--bg-secondary); transition: background-color 0.25s ease; }

/* DataTables controls */
.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input{
  border: 2px solid var(--bg-secondary);
  border-radius: 8px;
  padding: 0.375rem 0.75rem;
  background: var(--bg-main);
}
.dataTables_wrapper .dataTables_length select:focus,
.dataTables_wrapper .dataTables_filter input:focus{
  border-color: var(--accent);
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(63,114,175,0.12);
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
  background: linear-gradient(135deg,var(--accent),var(--accent-dark)) !important;
  color: var(--bg-main) !important;
  border: none !important;
  border-radius: 8px !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover{
  background: var(--bg-secondary) !important;
  color: var(--accent-dark) !important;
}

/* Images */
.img-fluid{ border-radius: 10px; border: 2px solid var(--bg-secondary); padding: .25rem; object-fit: cover; }

/* Close button invert to be visible on dark header */
.btn-close { filter: brightness(0) invert(1); }

/* Small */
.text-danger{ color: #dc3545 !important; }
.text-muted{ color: #6c757d !important; }

/* Animations */
@keyframes slideDown{
  from{ opacity:0; transform: translateY(-20px); }
  to{ opacity:1; transform: translateY(0); }
}

/* Responsive */
@media (max-width:768px){
  .container{ padding:1rem; }
  .modal-body{ padding:1.5rem; }
  .table{ font-size:0.875rem; }
}

/* --- override khusus: keep table bg accent but text inside table black --- */

/* Make table body rows use accent gradient (visual) */
.table tbody tr {
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
}

/* Keep striped rows visually consistent (override Bootstrap stripe) */
.table.table-striped tbody tr:nth-of-type(odd) {
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%) !important;
}

/* Ensure table header stays as-is (white text on darker header) */
.table thead th { color: #ffffff !important; }

/* Force table cell text to accent-dark (blackish) — user requested black text */
.table tbody td,
.table tbody td * {
  color: var(--accent-dark) !important;
}

/* Make images keep border and not inherit text color */
.table tbody td img {
  filter: none;
  color: initial;
  background: transparent;
  border: 2px solid rgba(255,255,255,0.12);
  border-radius: 6px;
}

/* Keep buttons INSIDE tables blue gradient with white text
   and add outline-blue variant for icon-only / small controls */
.table .btn,
.table a.btn {
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%) !important;
  color: #ffffff !important;
  border: none !important;
  box-shadow: 0 6px 18px rgba(63,114,175,0.16) !important;
}

/* Outline-blue button (requested) */
.btn-table-outline {
  background: transparent;
  color: var(--accent);
  border: 2px solid var(--accent);
  padding: .35rem .6rem;
  border-radius: 8px;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: .35rem;
  text-decoration: none;
  transition: background var(--transition), color var(--transition), transform var(--transition), box-shadow var(--transition);
}

/* icon sizing inside button */
.btn-table-outline .bi,
.btn-table-outline .fa {
  font-size: 0.95rem;
  line-height: 1;
}

/* hover: penuh biru + teks putih */
.btn-table-outline:hover,
.btn-table-outline:focus {
  background: linear-gradient(135deg,var(--accent),var(--accent-dark));
  color: #fff;
  border-color: transparent;
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(63,114,175,0.16);
  text-decoration: none;
}

/* variant small (preserve btn-sm behavior) */
.btn-table-outline.btn-sm { padding: .28rem .5rem; font-size: .88rem; }

/* destructive variant for outline */
.btn-table-outline.danger {
  border-color: #e74c3c;
  color: #e74c3c;
}
.btn-table-outline.danger:hover {
  background: linear-gradient(135deg,#e74c3c,#c0392b);
  color: #fff;
}

/* If you want small buttons look consistent */
.table .btn-sm {
  padding: .35rem .6rem;
  border-radius: 8px;
}

/* Make plain links inside table rows use accent-dark (so they're black) */
.table tbody a {
  color: var(--accent-dark) !important;
  text-decoration: none;
}
.table tbody a:hover {
  text-decoration: underline;
  color: #0b2136 !important;
}

/* DataTables pagination contrast when table rows are dark */
.dataTables_wrapper .dataTables_paginate .paginate_button {
  background: rgba(255,255,255,0.06) !important;
  color: #ffffff !important;
  border: none !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark)) !important;
  color: #fff !important;
}

/* If some cells become hard to read (small muted text), increase opacity */
.table tbody .text-muted { color: rgba(17,45,78,0.9) !important; }

/* Respect reduced-motion */
@media (prefers-reduced-motion: reduce) {
  .table .btn, .table a.btn { transition: none !important; transform: none !important; }
}

/* ====== FORCE OVERRIDE: set table header to SOLID WHITE bg and black text ====== */
/* Specific selectors target DataTables-generated markup too and use !important so other rules won't win */
table.dataTable thead,
table.dataTable thead tr,
table.dataTable thead th,
.table thead,
.table thead tr,
.table thead th {
    background: #ffffff !important;            /* header background = white */
    color: var(--accent-dark) !important;      /* header text = dark (blackish) */
    border-bottom: 1px solid rgba(0,0,0,0.06) !important;
}

/* ensure all inline elements inside th (icons, spans) also appear dark */
table.dataTable thead th,
.table thead th,
.table thead th * {
    color: var(--accent-dark) !important;
}

/* handle case DataTables injects inline styles on <th> */
table.dataTable thead th[style] {
    background: #ffffff !important;
    color: var(--accent-dark) !important;
}
</style>

<!-- Modal Create Toko -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa-solid fa-store me-2"></i>Tambah Toko
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('toko.admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Nama Toko -->
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-store"></i></span>
                            <input type="text" class="form-control" id="nama_toko" name="nama_toko" required placeholder="Masukan Nama Toko">
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Masukan Deskripsi Toko" rows="3"></textarea>
                        </div>
                    </div>
                    <!-- Gambar -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                    </div>
                    <!-- Kontak Toko -->
                    <div class="mb-3">
                        <label for="kontak_toko" class="form-label">Kontak Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" id="kontak_toko" name="kontak_toko" maxlength="13" required placeholder="Masukan Nomor Telepon Toko">
                        </div>
                    </div>
                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <textarea class="form-control" id="alamat" name="alamat" required placeholder="Masukan Alamat Toko" rows="3"></textarea>
                        </div>
                    </div>
                    <!-- User ID -->
                    <div class="mb-3">
                        <label for="users_id" class="form-label">Pilih User <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <select name="users_id" id="users_id" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->username }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Toko -->
@foreach ( $stores as $store )
    <div class="modal fade" id="editToko{{ $store->id }}" tabindex="-1" aria-labelledby="editTokoLabel{{ $store->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTokoLabel{{ $store->id }}">
                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit Toko
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('toko.admin-update', Crypt::encrypt($store->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Nama Toko -->
                        <div class="mb-3">
                            <label for="nama_toko_{{ $store->id }}" class="form-label">Nama Toko <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-store"></i></span>
                                <input type="text" class="form-control" id="nama_toko_{{ $store->id }}" name="nama_toko" required
                                    value="{{ old('nama_toko', $store->nama_toko) }}" placeholder="Masukan Nama Toko">
                            </div>
                        </div>
                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi_{{ $store->id }}" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                <textarea class="form-control" id="deskripsi_{{ $store->id }}" name="deskripsi" required rows="3" placeholder="Masukan Deskripsi Toko">{{ old('deskripsi', $store->deskripsi) }}</textarea>
                            </div>
                        </div>
                        <!-- Gambar (opsional ganti) -->
                        <div class="mb-3">
                            <label for="gambar_{{ $store->id }}" class="form-label">Gambar Toko <small class="text-muted">(kosongkan jika tidak diganti)</small></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                <input type="file" class="form-control" id="gambar_{{ $store->id }}" name="gambar" accept="image/*">
                            </div>
                            @if($store->gambar)
                                <div class="mt-2">
                                    <small>Gambar saat ini:</small><br>
                                    <img src="{{ asset('storage/gambar-toko/' . $store->gambar) }}" alt="gambar toko" class="img-fluid" style="max-height:120px;">
                                </div>
                            @endif
                        </div>
                        <!-- Kontak Toko -->
                        <div class="mb-3">
                            <label for="kontak_toko_{{ $store->id }}" class="form-label">Kontak Toko <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" class="form-control" id="kontak_toko_{{ $store->id }}" name="kontak_toko" maxlength="15" required
                                    value="{{ old('kontak_toko', $store->kontak_toko) }}" placeholder="Masukan Nomor Telepon Toko">
                            </div>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat_{{ $store->id }}" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <textarea class="form-control" id="alamat_{{ $store->id }}" name="alamat" required rows="3" placeholder="Masukan Alamat Toko">{{ old('alamat', $store->alamat) }}</textarea>
                            </div>
                        </div>
                        <!-- User    ID  -->
                        <div class="mb-3">
                            <label class="form-label">Pemilik Toko</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" value="{{ $store->user->name ?? '—' }} ({{ $store->user->username ?? '' }})" disabled>
                                <input type="hidden" name="users_id" value="{{ $store->users_id }}">
                            </div>
                            <small class="text-muted">Pemilik toko tidak dapat diubah lewat form ini.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Perbarui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Alert -->
@if (Session::get('pesan'))
    <div class="alert alert-success alert-dismissible fade show mb-3 mt-2" role="alert">
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

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mt-4 fw-bold">
            <i class="bi bi-shop me-2" style="color: var(--accent);"></i>Manajemen Toko
        </h2>
        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary mt-4">
            <i class="bi bi-plus-circle me-2"></i>Tambah Toko
        </a>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Toko</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Kontak Toko</th>
                    <th>Alamat</th>
                    <th>Pemilik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $stores as $item )
                    <tr>
                        <td><strong>{{ $item->nama_toko }}</strong></td>
                        <td>{{ Str::limit($item->deskripsi, 50, '...') }}</td>
                        <td>
                            <img src="{{ $item->gambar ? asset('storage/gambar-toko/' . $item->gambar) : asset('images/placeholder-80.png') }}"
                                 width="80" height="80" alt="Gambar {{ $item->nama_toko }}">
                        </td>
                        <td>{{ $item->kontak_toko }}</td>
                        <td>{{ Str::limit($item->alamat, 40, '...') }}</td>
                        <td>{{ optional($item->user)->name ?? '—' }}</td>
                        <td>
                            <!-- Outline-blue edit -->
                            <a data-bs-toggle="modal" data-bs-target="#editToko{{ $item->id }}" class="btn-table-outline btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- Outline-blue delete (if you prefer red delete, add 'danger' class) -->
                            <a href="{{route('toko.admin.delete',Crypt::encrypt($item->id))}}" class="btn-table-outline btn-sm" onclick="return confirm('Yakin ingin menghapus toko ini?')" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTable init (pastikan jQuery & DataTables sudah dimuat di layout/ head) -->
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(difilter dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                },
                zeroRecords: "Tidak ada data yang ditemukan"
            }
        });
    });
</script>
@endsection

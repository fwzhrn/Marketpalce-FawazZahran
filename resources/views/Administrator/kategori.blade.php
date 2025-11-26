@extends('Administrator.sidebar')
@section('content')
<style>
/* theme-itemku for Kategori page
   Palette:
   --bg-main:     #F9F7F7
   --bg-secondary:#DBE2EF
   --accent:      #3F72AF
   --accent-dark: #112D4E
*/

:root{
  --bg-main: #F9F7F7;
  --bg-secondary: #DBE2EF;
  --accent: #3F72AF;
  --accent-700: #2d5a8f;
  --accent-dark: #112D4E;
  --muted: #6c757d;
  --danger: #dc3545;

  --radius-sm: 8px;
  --radius-md: 10px;
  --radius-lg: 14px;

  --shadow-soft: 0 6px 18px rgba(17,45,78,0.08);
  --transition: 0.24s ease;
}

/* Page layout */
.container {
  padding: 2rem;
  color: var(--accent-dark);
  background: transparent;
  min-height: calc(100vh - 40px);
}

/* Header */
h2.fw-bold {
  color: var(--accent-dark);
  font-weight: 700;
  font-size: 1.9rem;
}
.page-header-icon { color: var(--accent); margin-right: .5rem; font-size: 1.2rem; }

/* Divider */
hr {
  border: none;
  border-top: 2px solid var(--bg-secondary);
  margin: 0.8rem 0 1.25rem;
}

/* Alerts */
.alert {
  border-radius: 12px;
  border: none;
  padding: 1rem 1.25rem;
  font-size: 0.95rem;
  margin-bottom: 1rem;
  animation: slideDown .36s ease;
}
.alert-success { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
.alert-danger { background: #f8d7da; color: #721c24; border-left: 4px solid var(--danger); }

/* Buttons (itemku) */
.btn-primary {
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
  border: none;
  color: #F9F7F7;
  font-weight: 600;
  padding: 0.56rem 1.2rem;
  border-radius: 10px;
  box-shadow: 0 6px 18px rgba(63,114,175,0.16);
  transition: transform var(--transition), box-shadow var(--transition);
}
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(63,114,175,0.22); }
.btn-secondary {
  background: var(--bg-secondary);
  border: 2px solid var(--accent);
  color: var(--accent-dark);
  font-weight: 600;
  border-radius: 10px;
}
.btn-secondary:hover { background: var(--accent); color: #fff; }
.btn-warning{
  background: linear-gradient(135deg,#ffc107,#ff9800);
  color: var(--accent-dark);
  border: none;
  border-radius: 8px;
  font-weight: 600;
}
.btn-danger{
  background: linear-gradient(135deg, #dc3545, #c82333);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-weight: 600;
}

/* Outline-blue button — same as User page */
.btn-table-outline {
  background: transparent;
  color: var(--accent) !important;               /* teks biru */
  border: 2px solid var(--accent) !important;    /* outline biru */
  padding: .35rem .6rem;
  border-radius: 8px;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: .35rem;
  text-decoration: none;
  transition: background var(--transition), color var(--transition), transform var(--transition), box-shadow var(--transition);
}

.btn-table-outline .bi {
  font-size: 0.95rem;
  line-height: 1;
}

/* Hover: Biru penuh dengan teks putih */
.btn-table-outline:hover,
.btn-table-outline:focus {
  background: linear-gradient(135deg,var(--accent),var(--accent-dark));
  color: #fff !important;
  border-color: transparent !important;
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(63,114,175,0.16);
  text-decoration: none;
}

/* destructive outline variant */
.btn-table-outline.danger {
  border-color: #e74c3c !important;
  color: #e74c3c !important;
}
.btn-table-outline.danger:hover {
  background: linear-gradient(135deg,#e74c3c,#c0392b);
  color: #fff !important;
  border-color: transparent !important;
}

/* Modal */
.modal-content { border-radius: 14px; box-shadow: 0 20px 50px rgba(17,45,78,0.12); border: none; }
.modal-header {
  background: linear-gradient(135deg, var(--accent-dark), var(--accent));
  color: #fff;
  border-radius: 14px 14px 0 0;
  padding: 1rem 1.25rem;
}
.modal-title { font-weight: 700; }
.modal-body { padding: 1.4rem; }
.modal-footer { padding: .85rem 1.25rem; border-top: 2px solid #fff; }

/* Form elements */
.form-label { color: var(--accent-dark); font-weight: 600; margin-bottom: .4rem; }
.input-group-text {
  background: linear-gradient(135deg, var(--bg-secondary), #fff);
  border: 2px solid var(--bg-secondary);
  color: var(--accent);
  font-weight: 600;
  border-radius: 10px 0 0 10px;
}
.form-control, .form-select {
  border: 2px solid var(--bg-secondary);
  border-radius: 0 10px 10px 0;
  padding: .56rem .75rem;
  background: #fff;
  transition: box-shadow var(--transition), border-color var(--transition);
}
.form-control:focus, .form-select:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 6px rgba(63,114,175,0.06);
  outline: none;
}

/* Table styling */
.table {
  background: var(--bg-surface, #fff);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: var(--shadow-soft);
  border: 1px solid rgba(17,45,78,0.04);
}
.table thead {
  background: linear-gradient(90deg, var(--accent-dark), var(--accent));
  color: #fff;
}
.table thead th { font-weight: 600; padding: 1rem; border: none; }
.table tbody td {
  padding: .9rem; vertical-align: middle; color: var(--accent-dark); font-weight: 500;
  border-bottom: 1px solid #f6f7f8;
}
.table-striped tbody tr:nth-of-type(odd){ background: var(--bg-main); }
.table tbody tr:hover { background: var(--bg-secondary); transition: background var(--transition); }

/* Small helpers */
.btn-sm { padding: 0.35rem 0.6rem; border-radius: 8px; }
.bi { font-size: 1rem; }
.text-muted { color: var(--muted) !important; }
.text-danger { color: var(--danger) !important; }
.stats-badge { background: var(--bg-secondary); color: var(--accent-dark); padding: .2rem .6rem; border-radius: 999px; font-weight:700; }

/* Focus states for accessibility */
:focus-visible { outline: 3px solid rgba(63,114,175,0.16); outline-offset: 2px; border-radius: 8px; }

/* Animations */
@keyframes slideDown { from { opacity:0; transform: translateY(-14px);} to { opacity:1; transform: translateY(0);} }

/* Responsive */
@media (max-width: 768px){
  .container { padding: 1rem; }
  .modal-body { padding: 1rem; }
  .table thead th, .table tbody td { padding: .6rem; }
}
</style>

<!-- Modal Create Kategori -->
<div class="modal fade" id="modalKategori" tabindex="-1" aria-labelledby="modalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKategoriLabel">
                    <i class="bi bi-tags-fill me-2"></i>Tambah Kategori
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kategori.admin.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Nama Kategori -->
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">
                            Nama Kategori <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tags-fill"></i></span>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                placeholder="Masukkan Nama Kategori" required>
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

<!-- Modal Edit Kategori -->
@foreach ($kategori as $item)
<div class="modal fade" id="editKategori{{ $item->id }}" tabindex="-1" aria-labelledby="editKategoriLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriLabel{{ $item->id }}">
                    <i class="bi bi-pencil-square me-2"></i>Edit Kategori
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kategori.admin.update', Crypt::encrypt($item->id)) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Nama Kategori -->
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tags-fill"></i></span>
                            <input type="text" name="nama_kategori" class="form-control"
                                value="{{ $item->nama_kategori }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Update
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
            <i class="bi bi-tags-fill page-header-icon"></i>Manajemen Kategori
        </h2>
        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modalKategori" class="btn btn-primary mt-4">
            <i class="bi bi-plus-circle me-2"></i>Tambah Kategori
        </a>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr>
                        <td>
                            <i class="bi bi-tag-fill me-2" style="color: var(--accent);"></i>
                            <strong>{{$item->nama_kategori}}</strong>
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#editKategori{{$item->id}}" type="button" class="btn-table-outline btn-sm" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{route('kategori.admin.delete',Crypt::encrypt($item->id))}}" 
                               onclick="return confirm('Yakin ingin menghapus kategori ini?')" 
                               class="btn-table-outline btn-sm" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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
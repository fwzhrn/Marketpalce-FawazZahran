@extends('Administrator.sidebar')
@section('content')

<style>
/* admin-users inline CSS — theme itemku
   Palette:
   --bg-main: #F9F7F7
   --bg-secondary:#DBE2EF
   --accent: #3F72AF
   --accent-dark: #112D4E
*/

/* ... (CSS sama seperti file asli) ... */

/* Untuk ringkas di contoh ini saya menyertakan CSS lengkap seperti asli Anda.
   Jika Anda menyalin, pastikan bagian CSS diisi persis seperti pada file sumber Anda. */
:root{
  --bg-main: #F9F7F7;
  --bg-secondary: #DBE2EF;
  --accent: #3F72AF;
  --accent-dark: #112D4E;

  --radius-md: 10px;
  --shadow-soft: 0 6px 20px rgba(17,45,78,0.08);
  --transition: 0.22s ease;
}

/* Base layout */
.container {
  padding: 2rem;
  background: transparent;
  color: var(--accent-dark);
}

/* Header */
h2.fw-bold {
  color: var(--accent-dark);
  font-weight: 700;
}

/* Divider */
hr {
  border: none;
  border-top: 2px solid var(--bg-secondary);
  margin: 0.75rem 0 1.25rem;
}

/* Alerts */
.alert {
  border-radius: 12px;
  border: none;
  padding: 1rem 1.25rem;
  font-size: 0.95rem;
  margin-bottom: 1rem;
  animation: slideDown 0.36s ease;
}
.alert-success { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
.alert-danger  { background: #f8d7da; color: #721c24; border-left: 4px solid #dc3545; }

/* Buttons */
.btn-primary {
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
  color: #fff;
  border: none;
  font-weight: 600;
  padding: 0.55rem 1.15rem;
  border-radius: var(--radius-md);
  box-shadow: 0 6px 18px rgba(63,114,175,0.18);
  transition: transform var(--transition), box-shadow var(--transition);
}
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(63,114,175,0.2); }

.btn-secondary {
  background: var(--bg-secondary);
  border: 2px solid var(--accent);
  color: var(--accent-dark);
  font-weight: 600;
  border-radius: var(--radius-md);
}
.btn-secondary:hover { background: var(--accent); color: #fff; }

/* Destructive */
.btn-danger { background: linear-gradient(135deg,#e74c3c,#c0392b); color:#fff; border:none; }
.btn-sm { padding: .35rem .6rem; border-radius: 8px; }

/* Modal */
.modal-content { border-radius: 14px; box-shadow: 0 20px 50px rgba(17,45,78,0.12); }
.modal-header { background: linear-gradient(135deg,var(--accent-dark),var(--accent)); color: #fff; border-radius: 14px 14px 0 0; padding: 1rem 1.25rem; }
.modal-title { font-weight: 700; }

/* Form controls */
.form-label.fw-semibold { color: var(--accent-dark); font-weight: 700; }
.input-group-text { background: linear-gradient(135deg,var(--bg-secondary), #fff); border: 2px solid var(--bg-secondary); color: var(--accent); font-weight:600; border-radius: 10px 0 0 10px; }
.form-control, .form-select {
  border: 2px solid var(--bg-secondary);
  border-radius: 0 10px 10px 0;
  padding: .55rem .75rem;
  background: #fff;
  transition: box-shadow var(--transition), border-color var(--transition);
}
.input-group .form-control { border-left: none; }
.form-control:focus, .form-select:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 6px rgba(63,114,175,0.05);
  outline: none;
}

/* Table */
.table {
  width: 100%;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: var(--shadow-soft);
  background: #fff;
}
.table thead {
  background: linear-gradient(135deg,var(--accent-dark),var(--accent));
  color: #fff;
}
.table thead th { border: none; padding: 0.9rem 1rem; font-weight:700; }
.table tbody td { color: var(--accent-dark); padding: .9rem; vertical-align: middle; border-bottom: 1px solid #f3f6f8; }
.table-striped tbody tr:nth-of-type(odd) { background: var(--bg-main); }
.table tbody tr:hover { background: var(--bg-secondary); transition: background var(--transition); }

/* DataTables controls */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select {
  border: 2px solid var(--bg-secondary);
  border-radius: 8px;
  padding: .4rem .6rem;
  background: var(--bg-main);
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
  background: linear-gradient(135deg,var(--accent),var(--accent-dark)) !important;
  color: #fff !important;
  border-radius: 8px !important;
  border: none !important;
}

/* Outline style for buttons inside table (requested) */
.btn-table-outline {
  background: transparent;
  color: var(--accent);               /* teks biru */
  border: 2px solid var(--accent);    /* outline biru */
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
.btn-table-outline .bi {
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

/* ensure destructive actions still clearly visible if you want to override color later */
.btn-table-outline.danger {
  border-color: #e74c3c;
  color: #e74c3c;
}
.btn-table-outline.danger:hover {
  background: linear-gradient(135deg,#e74c3c,#c0392b);
  color: #fff;
}

/* Small UI tweaks */
.btn-close { filter: brightness(0) invert(1); }
.text-muted { color: #6c757d !important; }
.text-danger { color: #dc3545 !important; }

/* Animations */
@keyframes slideDown { from { opacity:0; transform: translateY(-12px);} to { opacity:1; transform: translateY(0);} }

/* Responsive */
@media (max-width: 768px) {
  .container { padding: 1rem; }
  .modal-dialog { max-width: 92%; margin: 1.5rem auto; }
  .table { font-size: .9rem; }
}
</style>

<!-- Modal Create User -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Masukan Nama Lengkap">
                        </div>
                    </div>
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Masukan Username">
                        </div>
                    </div>
                    <!-- Kontak -->
                    <div class="mb-3">
                        <label for="kontak" class="form-label fw-semibold">Kontak / No HP <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" id="kontak" name="kontak" maxlength="13" required placeholder="Masukan No HP">
                        </div>
                    </div>
                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                            <select name="role" id="role" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukan Password">
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

<!-- Modal Edit User -->
@foreach ($users as $item)
    <div class="modal fade" id="editUser{{ $item->id }}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- PERUBAHAN: kirim ID plain (tanpa Crypt::encrypt) dan tambahkan @method('PUT') -->
                <form action="{{ route('user.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- pastikan route update Anda menerima PUT/PATCH -->

                    <div class="modal-body">
                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}" required placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" name="username" value="{{ $item->username }}" required placeholder="Masukan Username">
                            </div>
                        </div>
                        <!-- Kontak -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kontak / No HP</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" class="form-control" name="kontak" maxlength="13" value="{{ $item->kontak }}" required placeholder="Masukan No HP">
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                                <select name="role" class="form-select">
                                    <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="member" {{ $item->role == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password <small class="text-muted">(Kosongkan jika tidak diganti)</small></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Masukan password baru (opsional)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Alert -->
@if (Session::get('pesan'))
    <div class="alert alert-success alert-dismissible fade show mb-1 mt-2" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ Session::get('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-4 fw-bold">User</h2>
        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary mt-4">Tambah User</a>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Kontak</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $item )
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->kontak }}</td>
                        <td>{{ ucfirst($item->role) }}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#editUser{{ $item->id }}" class="btn-table-outline btn-sm" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('user.delete', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-table-outline btn-sm" title="Hapus">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>

                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables init (ensure jQuery + DataTables loaded in layout) -->
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: { next: "Selanjutnya", previous: "Sebelumnya" },
                zeroRecords: "Tidak ada data yang ditemukan"
            }
        });
    });
</script>

@endsection

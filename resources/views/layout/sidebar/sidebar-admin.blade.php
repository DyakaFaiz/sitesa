<li class="nav-item @if($active == 'admin-dashboard') active @endif">
  <a href="{{ route('admin.index') }}">
    <i class="fas fa-home"></i>
    <p class="text-white">Dashboard</p>
  </a>
</li>
<li class="nav-item @if($active == 'admin-user') active @endif">
  <a href="{{ route('admin.user.index') }}">
    <i class="icon-user"></i>
    <p class="text-white">User</p>
  </a>
</li>
<li class="nav-item @if($active == 'admin-tesis') active @endif">
  <a href="{{ route('admin.tesis.index') }}">
    <i class="icon-envelope"></i>
    <p class="text-white">Tesis</p>
  </a>
</li>
<li class="nav-item @if($active == 'admin-ta') active @endif">
  <a href="{{ route('admin.ta.index') }}">
    <i class="icon-book-open"></i>
    <p class="text-white">Tugas Akhir</p>
  </a>
</li>
<li class="nav-item @if($active == 'admin-mahasiswa' || $active == 'admin-pengajuan' || $active == 'admin-dokumen-mhs') active @endif">
  <a
    data-bs-toggle="collapse"
    href="#dashboard"
    class="collapsed"
    aria-expanded="false"
  >
    <i class="fas fa-user-tie"></i>
    <p class="text-white">Mahasiswa</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="dashboard">
    <ul class="nav nav-collapse">
      <li class="nav-item @if($active == 'admin-mahasiswa') active @endif">
        <a href="{{ route('admin.mahasiswa') }}">
          <i class="icon-people"></i>
          <p class="text-white">Daftar Mahasiswa</p>
        </a>
      </li>
      <li class="nav-item @if($active == 'admin-pengajuan') active @endif">
        <a href="{{ route('admin.pengajuan') }}">
          <i class="icon-arrow-up-circle"></i>
          <p class="text-white">Pengajuan Bimbingan</p>
        </a>
      </li>
      <li class="nav-item @if($active == 'admin-dokumen-mhs') active @endif">
        <a href="{{ route('admin.index-akademik-mhs') }}">
          <i class="icon-arrow-up-circle"></i>
          <p class="text-white">Akademik Mahasiswa</p>
        </a>
      </li>
    </ul>
  </div>
</li>
<li class="nav-item @if($active == 'admin-pengajuan-pembimbing' || $active == 'list-dosen') active @endif">
  <a
    data-bs-toggle="collapse"
    href="#dosen"
    class="collapsed"
    aria-expanded="false"
  >
    <i class="fas fa-user-tie"></i>
    <p class="text-white">Dosen Pembimbing</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="dosen">
    <ul class="nav nav-collapse">
      <li class="nav-item @if($active == 'admin-pengajuan-pembimbing') active @endif">
        <a href="{{ route('admin.dosen.index') }}">
          <i class="icon-people"></i>
          <p class="text-white">Pengajuan</p>
        </a>
      </li>
      <li class="nav-item @if($active == 'list-dosen') active @endif">
        <a href="{{ route('admin.dosen.listDosen') }}">
          <i class="icon-arrow-up-circle"></i>
          <p class="text-white">List</p>
        </a>
      </li>
    </ul>
  </div>
</li>

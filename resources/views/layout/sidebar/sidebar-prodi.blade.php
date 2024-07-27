<li class="nav-item @if ($active == "dashboard") active @endif">
    <a href="#">
      <i class="fas fa-home"></i>
      <p>Dashboard</p>
    </a>
  </li>

  <li class="nav-item @if ($active == "pengajuan-prodi") active @endif">
    <a data-bs-toggle="collapse" href="#bimbingan">
      <i class="icon-people"></i>
      <p>Bimbingan</p>
      <span class="caret"></span>
    </a>
    <div class="collapse" id="bimbingan">
      <ul class="nav nav-collapse">
        <li class="@if ($active == "pengajuan-prodi") active @endif">
          <a href="{{ route('prodi.pengajuan') }}">
            <span class="sub-item">Pengajuan Pembimbing</span>
          </a>
        </li>
        <li class="@if ($active == "bimbingan-langsung") active @endif">
          <a href="{{ route('prodi.bimbingan') }}">
            <span class="sub-item">Sedang Bimbingan</span>
          </a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item @if ($active == "waktu-ta") active @endif">
    <a href="{{ route('prodi.waktu-ta') }}">
      <i class="icon-hourglass"></i>
      <p>Masa TA</p>
    </a>
  </li>
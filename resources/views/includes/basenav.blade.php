<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left bg-white" data-perfect-scrollbar>
            <div class="sidebar-block p-0 m-0">
                <div class="d-flex align-items-center sidebar-p-a border-bottom bg-light">
                    <a href="#" class="flex d-flex align-items-center text-body text-underline-0">
                      <?php
                      $words = explode(" ", Auth::user()->nama);
                      $acronym = "";
                      foreach ($words as $len => $w) {
                        if($len <2){
                          $acronym .= strtoupper($w[0]);
                        }
                      }
                       ?>
                        <span class="avatar avatar-sm mr-2">
                            <span class="avatar-title rounded-circle bg-soft-secondary text-muted">{{ $acronym }}</span>
                        </span>
                        <span class="flex d-flex flex-column">
                            <strong>{{ Auth::user()->nama }}</strong>
                            <small class="text-muted text-uppercase">{{ Auth::user()->role }}</small>
                        </span>
                    </a>
                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('akun.index') }}">Akun</a>
                            @if(Auth::user()->role == 'peserta')
                            <a class="dropdown-item" href="{{ route('akun.index').'#manage-team' }}">Edit Tim</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Keluar') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <!-- <a class="dropdown-item" rel="nofollow" data-method="delete" href="login.html">Logout</a> -->
                        </div>
                    </div>
                </div>
                <div class="sidebar-block p-0">
                    <div class="sidebar-heading">Informasi</div>
                    <ul class="sidebar-menu mt-0">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('jadwal.index') }}">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-calendar-alt"></i>
                                </span>
                                <span class="sidebar-menu-text">Jadwal</span>
                            </a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li class="sidebar-menu-item ml-20">
                            <a class="sidebar-menu-button" href="{{ route('jadwal.create') }}" style="padding-left:30px;background: rgba(0,0,0,0.05)">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-plus"></i><i class="fas fa-calendar-alt" style="font-size:10pt"></i>
                                </span>
                                <span class="sidebar-menu-text">Buat Jadwal</span>
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('pengumuman.index') }}">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-scroll"></i>
                                </span>
                                <span class="sidebar-menu-text">Pengumuman</span>
                            </a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li class="sidebar-menu-item ml-20">
                            <a class="sidebar-menu-button" href="{{ route('pengumuman.create') }}" style="padding-left:30px;background: rgba(0,0,0,0.05)">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-plus"></i><i class="fas fa-scroll" style="font-size:10pt"></i>
                                </span>
                                <span class="sidebar-menu-text">Buat Pengumuman</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                @if(Auth::user()->role == 'peserta' || Auth::user()->role == 'juri')
                <div class="sidebar-block p-0">
                    <div class="sidebar-heading">Kompetisi</div>
                    <ul class="sidebar-menu mt-0">
                        @if(Auth::user()->role == 'peserta')
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('pengumpulan.index') }}">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-file-upload"></i>
                                </span>
                                <span class="sidebar-menu-text">Pengumpulan</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'juri')
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('submisi.index') }}">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-file-download"></i>
                                </span>
                                <span class="sidebar-menu-text">Dokumen Lomba</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
                @if(Auth::user()->role == 'admin')
                <div class="sidebar-block p-0">
                    <div class="sidebar-heading">Pengelolaan</div>
                    <ul class="sidebar-menu mt-0">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('fakultas.index') }}">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-school"></i>
                                </span>
                                <span class="sidebar-menu-text">Fakultas</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('lomba.index') }}">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-compass"></i>
                                </span>
                                <span class="sidebar-menu-text">Bidang Lomba</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('akun.create') }}">
                                <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                  <i class="fas fa-user-tie"></i>
                                </span>
                                <span class="sidebar-menu-text">Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
                </ul>
            </div>
        </div>
    </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('admin/images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">N-Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  @if (!@empty(Auth::guard('admin')->user()->image))
                      <img src="{{ asset(Auth::guard('admin')->user()->image) }}" class="img-circle elevation-2"
                          alt="User Image">
                  @else
                      <img src="{{ asset('admin/images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                  @endif

              </div>
              <div class="info">
                  <a href="{{ url('NPanel/update-admin') }}"
                      class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ url('NPanel/dashboard') }}"
                          class="nav-link {{ Request::is('NPanel/dashboard') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-th"></i>
                          <p>Anasayfa</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ url('NPanel/homepage') }}"
                          class="nav-link {{ Request::is('NPanel/homepage') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-th"></i>
                          <p>Anasayfa Modülleri</p>
                      </a>
                  </li>

                  <li
                      class="nav-item {{ Request::is('NPanel/pages') || Request::is('NPanel/pages/add-edit-pages') ? 'menu-open' : '' }}">
                      <a href="{{ url('NPanel/pages') }}"
                          class="nav-link {{ Request::is('NPanel/pages') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Sayfalar
                          </p>
                      </a>
                  </li>
                  <li
                      class="nav-item {{ Request::is('NPanel/menus') || Request::is('NPanel/menus/crud') ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ Request::is('NPanel/menus') || Request::is('NPanel/update-admin') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Menü Yönetimi
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('NPanel/menus') }}"
                                  class="nav-link {{ Request::is('NPanel/menus') || Request::is('NPanel/menus/types/add-edit-type') || Request::is('NPanel/menus/types/add-edit-type/{id?}') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Menüler</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('NPanel/menus/types') }}"
                                  class="nav-link {{ Request::is('NPanel/menus/types') || Request::is('NPanel/menus/types/add-edit-type') || Request::is('NPanel/menus/types/add-edit-type/{id?}') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Menü Tipleri</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item {{ Request::is('NPanel/sliders') ? 'menu-open' : '' }}">
                      <a href="{{ url('NPanel/sliders') }}"
                          class="nav-link {{ Request::is('NPanel/sliders') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-pallet"></i>
                          <p>
                              Sliders
                          </p>
                      </a>
                  </li>
                  <li
                      class="nav-item {{ Request::is('NPanel/rooms') || Request::is('NPanel/rooms/features') || Request::is('NPanel/rooms/categories') ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ Request::is('NPanel/rooms') || Request::is('NPanel/rooms/features') || Request::is('NPanel/rooms/categories') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Oda Yönetimi
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('NPanel/rooms/categories') }}"
                                  class="nav-link {{ Request::is('NPanel/rooms/categories') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Oda Kategorileri</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('NPanel/rooms/features') }}"
                                  class="nav-link {{ Request::is('NPanel/rooms/features') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Oda Özellikleri</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('NPanel/rooms') }}"
                                  class="nav-link {{ Request::is('NPanel/rooms') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Odalar</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item {{ Request::is('NPanel/activities/update') ? 'menu-open' : '' }}">
                      <a href="{{ url('NPanel/activities/update') }}"
                          class="nav-link {{ Request::is('NPanel/activities/update') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tools"></i>
                          <p>
                              Aktiviteler Sayfası
                          </p>
                      </a>
                  </li>
                  <li
                      class="nav-item {{ Request::is('NPanel/blogs') || Request::is('NPanel/blogs/categories') ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ Request::is('NPanel/blogs') || Request::is('NPanel/blogs/categories') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Blog Yönetimi
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('NPanel/blogs/categories') }}"
                                  class="nav-link {{ Request::is('NPanel/blogs/categories') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Blog Kategorileri</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('NPanel/blogs') }}"
                                  class="nav-link {{ Request::is('NPanel/blogs') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Blog Yazıları</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li
                      class="nav-item {{ Request::is('NPanel/update-password') || Request::is('NPanel/update-admin') ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ Request::is('NPanel/update-password') || Request::is('NPanel/update-admin') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Hesabım
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('NPanel/update-password') }}"
                                  class="nav-link {{ Request::is('NPanel/update-password') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Parolamı Güncelle</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('NPanel/update-admin') }}"
                                  class="nav-link {{ Request::is('NPanel/update-admin') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Profilim</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item {{ Request::is('NPanel/settings/update') ? 'menu-open' : '' }}">
                      <a href="{{ url('NPanel/settings/update') }}"
                          class="nav-link {{ Request::is('NPanel/settings/update') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tools"></i>
                          <p>
                              Ayarlar
                          </p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

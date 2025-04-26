<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{route('dashboard')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="../../dist/assets/img/AdminLTELogo.png"
              alt="Healthy Habitat Network"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Healthy Habitat Network</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
            {{--Route for business--}}
            @if(Auth::check() && Auth::user()->role_id == 1)
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-table"></i>
                    <p>
                        Product Category
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('productservicecategories.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-table"></i>
                    <p>
                        Product Or Service Subcategory
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('product-subcategories.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Subcategories</p>
                        </a>
                    </li>
                </ul>
              </li>



              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-table"></i>
                    <p>
                        Areas
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('areas.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Areas</p>
                        </a>
                    </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-table"></i>
                    <p>
                        Businesses
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('businesses.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Businesses</p>
                        </a>
                    </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-table"></i>
                    <p>
                        Residents
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('areas.index')}}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Residents</p>
                        </a>
                    </li>
                </ul>
              </li>

              <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-table"></i>
                        <p>
                            Reports
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('areas.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Reports</p>
                            </a>
                        </li>
                    </ul>
              </li>
              @endif

              {{--Route for business--}}
              @if(Auth::check() && Auth::user()->role_id == 3)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-table"></i>
                        <p>
                            Products Or Services
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product-services.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Products Or Services</p>
                            </a>
                        </li>
                    </ul>
                </li>
              @endif
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>

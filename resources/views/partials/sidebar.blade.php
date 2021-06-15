<div class="c-sidebar c-sidebar-fixed c-sidebar-dark c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-title">Nav Title</li>
        @if(auth()->user()->role_id == App\Models\Role::ADMIN)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.user.index')}}">
                <i class="c-sidebar-nav-icon cil-speedometer"></i> User list
            </a>
        </li>
        @endif
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="#">
                <i class="c-sidebar-nav-icon cil-speedometer"></i> With badge
                <span class="badge badge-primary">NEW</span>
            </a>
        </li>
        <li class="c-sidebar-nav-item nav-dropdown">
            <a class="c-sidebar-nav-link nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="">
                        <i class="c-sidebar-nav-icon cil-puzzle"></i> Users
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="#">
                        <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown item
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
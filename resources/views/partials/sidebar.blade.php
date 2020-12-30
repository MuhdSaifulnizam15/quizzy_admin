<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.html">{{ route('home') }}">{{ env('APP_NAME') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">{{ route('home') }}">{{ env('APP_SHORT_NAME') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
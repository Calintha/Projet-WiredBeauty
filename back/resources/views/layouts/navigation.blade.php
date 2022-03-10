
  
<div class="wrapper">
    <nav class="flex-shrink-0 p-3 bg-white sticky-top vh-100" id="sidebar">
        <a href="/" class="d-flex align-items-center justify-content-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <span class="fw-bold">Wired Beauty</span>
        </a>
        <ul class="list-unstyled ps-0 text-center">
            <li class="mb-2">
                <a class="btn align-items-center rounded fw-bold" href="{{ route('members_dashboard') }}">Dashboard</a>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-2">
                <a href="{{ route('members_profile') }}"><button class="btn btn-toggle align-items-center rounded collapsed fw-bold mb-3">Profile</button></a>
            </li>
            <li class="mb-2">
                <a href="{{ route('members_report') }}"><button class="btn btn-toggle align-items-center rounded collapsed fw-bold mb-3">Reports</button></a>
            </li>
            <li class="mb-2">
                <a href="{{ route('members_template') }}"><button class="btn btn-toggle align-items-center rounded collapsed fw-bold mb-3">Templates</button></a>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-2">
                <button class="btn btn-toggle align-items-center rounded collapsed fw-bold mb-3">Informations</button>
            </li>
            <li><form method="POST" action="{{ route('logout') }}">@csrf<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"><i class="fas fa-sign-out-alt fa-2x"></i></a></form></li>
        </ul>
    </nav>
</div>
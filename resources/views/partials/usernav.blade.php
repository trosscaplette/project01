<div class="col-md-2">
    <ul class="nav flex-column position-fixed">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('profile.view') }}">
                {{ __('Profile') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('profile.featuredjobs') }}">Featured Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('profile.company')}}">Featured Companies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/home">Saved Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('alljobs')}}">All Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
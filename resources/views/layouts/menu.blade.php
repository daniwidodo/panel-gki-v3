<li class="nav-item">
    <a href="{{ route('ibadahs.index') }}"
       class="nav-link {{ Request::is('ibadahs*') ? 'active' : '' }}">
        <p>Ibadahs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('jemaats.index') }}"
       class="nav-link {{ Request::is('jemaats*') ? 'active' : '' }}">
        <p>Jemaats</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('agapes.index') }}"
       class="nav-link {{ Request::is('agapes*') ? 'active' : '' }}">
        <p>Agapes</p>
    </a>
</li>



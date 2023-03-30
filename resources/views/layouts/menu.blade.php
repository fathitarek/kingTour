<li class="nav-item">
    <a href="{{ route('currencies.index') }}"
       class="nav-link {{ Request::is('currencies*') ? 'active' : '' }}">
        <p>Currencies</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('airways.index') }}"
       class="nav-link {{ Request::is('airways*') ? 'active' : '' }}">
        <p>Airways</p>
    </a>
</li>



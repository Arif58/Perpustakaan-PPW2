
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/about">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/github">Github</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contact">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/buku">Buku</a>
  </li>
  @if(Auth::check() && Auth::user()->level == 'admin')
  <li class="nav-item">
    <a class="nav-link" href="/users">Users</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/galeri">Galeri</a>
  </li>
  @endif
</ul>
<!-- <div class="links">
    <a href="/">Home</a>
    <a href="/about">About us</a>
    <a href="/github">Github</a>
    <a href="/contact">Contact</a>
    <a href="/buku">Buku</a>
</div> -->
<nav class="lighten-1" style="background-color:rgb(89, 73, 63);height:50px;line-height:50px;margin-top:-20px;" role="navigation">
    <div class="nav-wrapper container">
      <div>
        <ul class="hide-on-med-and-down">
          @foreach($links as $link)
            <li>
                <a href="{{ $link->url }}" data-target="slide-out-{{ $link->id }}" class="open-side-nav">{{ $link->title }}</a>
            </li>
          @endforeach
        </ul>

        <ul id="nav-mobile" class="sidenav">
          @foreach($links as $link)
            <li>
                <a href="{{ $link->url }}" data-target="slide-out-{{ $link->id }}" class="open-side-nav">{{ $link->title }}</a>
            </li>
          @endforeach
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
      </div>
    </div>
</nav>
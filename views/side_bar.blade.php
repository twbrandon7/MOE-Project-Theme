<ul id="slide-out-{{ $id }}" class="sidenav">
    <li><a href="#!" class="close-side-nav"><i class="material-icons">arrow_back</i> Back</a></li>
    @foreach($links as $link)
        <li><a href="{{ $link->url }}" data-target="slide-out-{{ $link->id }}" class="open-side-nav">{{ $link->title }}</a></li>
    @endforeach
    {{-- <ul class="collapsible">
        <li>
            <div class="collapsible-header">
                <i class="material-icons">filter_drama</i>First
            </div>
            <div class="collapsible-body">
                <ul>
                    <li>
                        <div class="divider"></div>
                    </li>
                    <li>
                        <a class="subheader">Subheader</a>
                    </li>
                    <li>
                        <a href="#!">First Link With Icon</a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">place</i>Second</div>
            <div class="collapsible-body">
                <span>Lorem ipsum dolor sit amet.</span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body">
                <span>Lorem ipsum dolor sit amet.</span>
            </div>
        </li>
    </ul> --}}
</ul>
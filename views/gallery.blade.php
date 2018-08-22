<div class="slider">
    <ul class="slides">
        @foreach($ids as $key => $id)
            <li>
                <img src="{{ wp_get_attachment_image_src( $id, 'full' )[0] }}">
                <div class="caption ">
                    <h4 style="background-color:rgba(80,80,80,0.8); text-align:center; padding:10px;">
                        @if($title != null)
                            {{$title["common_title"]}}
                        @else
                            {{ $titles[$key] }}
                        @endif
                    </h4>
                    <h5 class="light grey-text text-lighten-3">
                        @if($title != null)
                            {{$title["common_subtitle"]}}
                        @else
                            {{ $titles[$key] }}
                        @endif
                    </h5>
                </div>
            </li>
        @endforeach
    </ul>
</div>
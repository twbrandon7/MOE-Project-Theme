<div class="slider">
    <ul class="slides">
        @foreach($ids as $key => $id)
            <li>
                <img src="{{ wp_get_attachment_image_src( $id, 'full' )[0] }}">
                @if($show_title == true)
                    <div class="caption {{ $aligns[$key%3] }}">
                        <h3>
                            <span style="background-color: rgba(40,40,40,0.5); padding:15px;">{{ $titles[$key] }}</span>
                        </h3>
                        @if($subtitles[$key] != "")
                            <h4 class="light grey-text text-lighten-3">
                                <span style="background-color: rgba(40,40,40,0.5); padding:10px;">{{ $subtitles[$key] }}</span>
                            </h4>
                        @endif
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
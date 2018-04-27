<div class="slider">
    <ul class="slides">
        @foreach($ids as $key => $id)
            <li>
                <img src="{{ wp_get_attachment_image_src( $id, 'full' )[0] }}">
            </li>
        @endforeach
    </ul>
</div>
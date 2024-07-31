<div class="cs_instagram">
    @foreach ($images as $image)
    <a href="https://www.instagram.com/" target="_blank" class="position-relative cs_instagram_item">
        <div class="cs_instagram_thumb position-relative">
            <img src="{{ Storage::url($image->image_url) }}" alt="Instagram">
        </div>
        <div class="cs_instagram_overlay position-absolute">
            <i class="fa-brands fa-instagram"></i>
        </div>
    </a>
    @endforeach
    
</div>

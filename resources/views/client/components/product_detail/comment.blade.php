<div class="cs_tab active" id="tab_4">
    <ul class="cs_client_review_list cs_mp0">
        @foreach ($reviews as $review)
            <li>
                <div class="cs_client_review">
                    <div class="cs_review_media">
                        <div class="cs_review_media_thumb">
                            <img src="{{ asset('storage/avatars/' . $review->user->avatar) }}" alt="Avatar">
                        </div>
                        <div class="cs_review_media_right">
                            <div class="cs_rating_container">
                                <div class="cs_rating cs_size_sm" data-rating="{{ $review->rating }}">
                                    <div class="cs_rating_percentage"
                                        style="width: {{ ($review->rating / 5) * 100 }}%;"></div>
                                </div>
                            </div>
                            <p class="mb-0 cs_primary_color cs_semibold">{{ $review->user->name }}</p>
                        </div>
                        <p class="cs_review_posted_by">{{ $review->created_at->format('F d, Y') }}</p>
                    </div>
                    <p class="cs_review_text">{{ $review->comments }}</p>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="cs_height_20 cs_height_lg_20"></div>

    @auth
        <form action="{{ route('reviews.store') }}" method="POST" class="row cs_review_form cs_gap_y_24">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="cs_input_rating_wrap">
                <p>Your rating *</p>
                <div class="cs_input_rating cs_accent_color" data-rating="0">
                    <i class="fa-regular fa-star" data-value="1"></i>
                    <i class="fa-regular fa-star" data-value="2"></i>
                    <i class="fa-regular fa-star" data-value="3"></i>
                    <i class="fa-regular fa-star" data-value="4"></i>
                    <i class="fa-regular fa-star" data-value="5"></i>
                </div>
                <input type="hidden" name="rating" id="rating" value="0">
            </div>
            <div class="cs_height_20 cs_height_lg_22"></div>
            <div class="col-lg-12">
                <textarea name="comment" rows="3" class="cs_form_field" placeholder="Write your review *"></textarea>
            </div>
            <div class="col-lg-12">
                <button class="cs_btn cs_style_1 cs_fs_16 cs_medium" type="submit">Submit Now</button>
            </div>
        </form>
    @endauth

    @guest
        <p>Please <a href="{{ route('customer.showAuthForm') }}">log in</a> to submit a review.</p>
    @endguest
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.cs_input_rating i');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating;
                updateStars(rating);
            });
        });

        function updateStars(rating) {
            stars.forEach(star => {
                star.classList.remove('fa-solid');
                star.classList.add('fa-regular');
                if (star.getAttribute('data-value') <= rating) {
                    star.classList.remove('fa-regular');
                    star.classList.add('fa-solid');
                }
            });
        }
    });
</script>

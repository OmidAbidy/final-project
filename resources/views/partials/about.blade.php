<section class="about fade-in">
    <div class="about-images" style="display: flex; align-items: center; padding:10px">
        <div style="flex: 1; padding: 20px; display: flex; flex-direction: column; justify-content: center;">
            <h2><i class="{{ $icon1 }}"></i> {{ $title1 }}</h2>
            <p>{{ $content1 }}</p>
        </div>
        <div style="flex: 1; text-align: center;">
            <img src="{{ asset($image1) }}" alt="Image" class="fade-in">
        </div>
    </div>
</section>

<section class="about fade-in">
    <div class="about-images" style="display: flex; align-items: center; flex-direction: row-reverse;">
        <div style="flex: 1; padding: 20px; display: flex; flex-direction: column; justify-content: center;">
            <h2><i class="{{ $icon2 }}"></i> {{ $title2 }}</h2>
            <p>{{ $content2 }}</p>
        </div>
        <div style="flex: 1; text-align: center;">
            <img src="{{ asset($image2) }}" alt="Image" class="fade-in">
        </div>
    </div>
</section>

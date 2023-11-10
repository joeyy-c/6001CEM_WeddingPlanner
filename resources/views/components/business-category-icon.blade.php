@props(['business_category'])

@php
    $category_icon = [
        "venue" => "champagne-glasses",
        "wedding_rentals" => "couch",
        "catering" => "utensils",
        "stylist" => "spa",
        "photography_and_videography" => "camera",
    ];
@endphp

<i class="fa-solid fa-{{ $category_icon[$business_category] }}"></i>
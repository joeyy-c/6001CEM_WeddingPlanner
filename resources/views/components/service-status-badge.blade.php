@props(['status'])

@php
    $badge_color = array(
        "Waiting for Vendor's Confirmation" => "warning"
    );
@endphp

<span class="badge text-bg-{{ $badge_color[$status] }} text-light">{{ $status }}</span>
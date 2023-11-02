@props(['status'])

@php
    $badge_color = array(
        'Waiting for Vendor\'s Confirmation' => 'warning',
        'Waiting for Deposit Payment' => 'warning',
        'Project Confirmed' => 'success',
        'Planning' => 'warning',
        'Preparation and Setup' => 'warning',
        'Completed' => 'success',
        'Cancelled' => 'danger',
    );
@endphp

<span class="badge bg-{{ $badge_color[$status] }} text-light">{{ $status }}</span>
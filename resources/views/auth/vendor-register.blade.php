<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vendor Register</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-10 border-primary p-5 wow blurIn" style="visibility: visible; animation-name: blurIn;">
        
            <form method="POST" action="{{ route('vendor-register') }}">
                @csrf

                <div class="row d-flex justify-content-around">
                    <div class="col-5">
                    <h4>Vendor Register</h4>
                    </div>

                    <div class="col-5">
                    </div>
                </div>

                <div class="row d-flex justify-content-around">
                    <div class="col-5">
                        <!-- Name -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="name">Name</label>
                            <input class="form-input" id="name" type="text" name="name" value="{{ old('name') }}" maxlength="50" required autofocus autocomplete="name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="phone">Phone</label>
                            <input class="form-input" id="phone" type="tel" name="user_info[phone]" value="{{ old('user_info.phone') }}" required autofocus autocomplete="phone">
                            <x-input-error :messages="$errors->get('user_info.phone')" class="mt-2" />
                        </div>

                        <!-- E-mail -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="email">E-mail</label>
                            <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="password">Password</label>
                            <input class="form-input" id="password" type="password" name="password" required autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="password_confirmation">Confirm Password</label>
                            <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-5">
                        <!-- Business Category -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="business_category">Business Category</label>
                            <select id="business_category" name="user_info[business_category]" class="form-select mt-1" required>
                                @php
                                    $business_categories = [
                                        'venue' => 'Venue',
                                        'wedding_rentals' => 'Wedding Rentals (Table and Chair)',
                                        'catering' => 'Catering',
                                        'stylist' => 'Stylist',
                                        'photography_and_videography' => 'Photography & Videography'
                                    ];
                                @endphp

                                @foreach ($business_categories as $value => $label)
                                    <option value="{{ $value }}" {{ old('user_info.business_category') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                                <!-- <option value="venue">Venue</option>
                                <option value="wedding_rentals">Wedding Rentals (Table and Chair)</option>
                                <option value="catering">Catering</option>
                                <option value="stylist">Stylist</option>
                                <option value="photography_and_videography">Photography & Videography</option> -->
                                <!-- <option value="entertainment">Entertainment</option>
                                <option value="decoration">Decoration</option> -->
                            </select>
                        </div>

                        <!-- Address -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="address">Address</label>
                            <input class="form-input" id="address" type="text" name="user_info[address]" value="{{ old('user_info.address') }}" maxlength="100" required autofocus autocomplete="address">
                        </div>

                        <!-- State -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="state">State</label>
                            <select id="state" name="user_info[state]" class="form-select mt-1" required>
                                @php
                                    $states = [
                                        'johor' => 'Johor',
                                        'kedah' => 'Kedah',
                                        'kelantan' => 'Kelantan',
                                        'malacca' => 'Malacca',
                                        'negeri_sembilan' => 'Negeri Sembilan',
                                        'pahang' => 'Pahang',
                                        'penang' => 'Penang',
                                        'perak' => 'Perak',
                                        'perlis' => 'Perlis',
                                        'sabah' => 'Sabah',
                                        'sarawak' => 'Sarawak',
                                        'selangor' => 'Selangor',
                                        'terengganu' => 'Terengganu',
                                    ];
                                @endphp

                                @foreach ($states as $value => $label)
                                    <option value="{{ $value }}" {{ old('user_info.state') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                                <!-- <option value="johor">Johor</option>
                                <option value="kedah">Kedah</option>
                                <option value="kelantan">Kelantan</option>
                                <option value="malacca">Malacca</option>
                                <option value="negeri_sembilan">Negeri Sembilan</option>
                                <option value="pahang">Pahang</option>
                                <option value="penang">Penang</option>
                                <option value="perak">Perak</option>
                                <option value="perlis">Perlis</option>
                                <option value="sabah">Sabah</option>
                                <option value="sarawak">Sarawak</option>
                                <option value="selangor">Selangor</option>
                                <option value="terengganu">Terengganu</option> -->
                            </select>
                        </div>

                        <!-- City -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="city">City</label>
                            <input class="form-input" id="city" type="text" name="user_info[city]" value="{{ old('user_info.city') }}" maxlength="30" required autofocus autocomplete="city">
                        </div>

                        <!-- Postal Code -->
                        <div class="form-wrap mb-5">
                            <label class="form-label-2" for="postal_code">Postal Code</label>
                            <input class="form-input" id="postal_code" type="number" name="user_info[postal_code]" value="{{ old('user_info.postal_code') }}" required autofocus autocomplete="postal_code">
                            <x-input-error :messages="$errors->get('user_info.postal_code')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex align-items-center justify-content-end mt-5">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button class="button button-jerry button-primary-dark ms-3" type="submit">
                                Register
                                <span class="button-jerry-line"></span>
                                <span class="button-jerry-line"></span>
                                <span class="button-jerry-line"></span>
                                <span class="button-jerry-line"></span>
                            </button>
                        </div>
                    </div>
                </div>

                
            </form>
        </div>
    </div>

    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

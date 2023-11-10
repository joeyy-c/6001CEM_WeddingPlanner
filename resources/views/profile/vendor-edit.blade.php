@extends('layouts.administrator')

@section('content')
  <!-- Profile Information -->
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Profile Information</h4>
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
          <p class="card-description mb-4">
            Update your account's profile information and email address.
          </p>

          @if (session('status') === 'profile-updated')
            <div class="alert alert-success col-md-6 mb-4">Profile has been successfully updated.</div>
          @endif

          <div class="row">
            <div class="col">
              <!-- Name -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required />
                      <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                  </div>
                </div>
              </div>

              <!-- E-mail -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail</label>
                    <div class="col-sm-8">
                      <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                      <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-secondary mt-2">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification" class="text-secondary">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-success">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                  </div>
                </div>
              </div>

              <!-- Phone -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-8">
                      <input type="text" id="phone" name="user_info[phone]" class="form-control" value="{{ old('user_info.phone', $user->user_info->phone) }}" required />
                      <x-input-error class="mt-2" :messages="$errors->get('user_info.phone')" />
                    </div>
                  </div>
                </div>
              </div>

               <!-- Phone -->
               <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Website Link</label>
                    <div class="col-sm-8">
                      <input type="url" id="website_link" name="user_info[website_link]" class="form-control" value="{{ old('user_info.website_link', $user->user_info->website_link) }}" required />
                      <x-input-error class="mt-2" :messages="$errors->get('user_info.website_link')" />
                    </div>
                  </div>
                </div>
              </div>

              <!-- Business Category -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Business Category</label>
                    <div class="col-sm-8 d-flex align-items-center">
                      <span class="badge badge-secondary text-light">{{ ucwords(str_replace('_', ' ', old('user_info.business_category', $user->user_info->business_category))) }}</span>
                      <input type="hidden" id="business_category" name="user_info[business_category]" class="form-control" value="{{ old('user_info.business_category', $user->user_info->business_category) }}" required />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <!-- Address -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-8">
                      <input type="text" id="address" name="user_info[address]" class="form-control" value="{{ old('user_info.address', $user->user_info->address) }}" required />
                    </div>
                  </div>
                </div>
              </div>

              <!-- State -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">State</label>
                    <div class="col-sm-8">
                      <select id="state" name="user_info[state]" class="form-control" required>
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
                                <option value="{{ $value }}" {{ old('user_info.state', $user->user_info->state) === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- City -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-8">
                      <input type="text" id="city" name="user_info[city]" class="form-control" value="{{ old('user_info.city', $user->user_info->city) }}" required />
                    </div>
                  </div>
                </div>
              </div>

              <!-- Postal Code -->
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Postal Code</label>
                    <div class="col-sm-8">
                      <input type="text" id="postal_code" name="user_info[postal_code]" class="form-control" value="{{ old('user_info.postal_code', $user->user_info->postal_code) }}" required />
                      <x-input-error class="mt-2" :messages="$errors->get('user_info.postal_code')" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Update Password -->
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Password</h4>
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
          <p class="card-description mb-4">
            Ensure your account is using a long, random password to stay secure.
          </p>

          @if (session('status') === 'password-updated')
            <div class="alert alert-success col-md-6 mb-4">Password has been successfully changed.</div>
          @endif

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Current Password</label>
                <div class="col-sm-8">
                  <input id="current_password" name="current_password" type="password" class="form-control" required/>
                  <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-8">
                  <input id="password" name="password" type="password" class="form-control" required/>
                  <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                  <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required/>
                  <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Account -->
    <!-- <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Delete Account</h4>
        <form class="form-sample">
          <p class="card-description mb-4">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
          </p>
          <button type="submit" class="btn btn-danger">Delete Account</button>
        </form>
      </div>
    </div>
  </div> -->
@endsection
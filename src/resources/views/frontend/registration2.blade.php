<!-- resources/views/auth/register.blade.php -->

@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card no-border shadow-lg overflow-hidden">
                    <div class="row g-0">
                        <!-- Image Column -->
                        <div class="col-md-6 d-none d-md-block">
                            <div class="h-100 position-relative">
{{--                                <img src="https://unsplash.com/photos/a-happy-young-man-with-small-sister-holding-bug-hotels-outdoors-in-backyard-laughing-B7qQHAKBO_E"--}}
{{--                                        alt="Community Image"--}}
{{--                                        class="img-fluid h-100 object-fit-cover">--}}
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-success bg-opacity-75 d-flex flex-column justify-content-center text-center p-4">
                                    <h2 class="text-white fw-bold mb-3">Join Our Community</h2>
                                    <p class="text-white lead">Connect with neighbors, local businesses, and council members to build a better community together.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold text-success">Create Your Account</h3>
                                        <p class="text-muted">Select your role to get started</p>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-success active" id="residentBtn">Resident</button>
                                            <button type="button" class="btn btn-outline-success" id="councilBtn">Council</button>
                                            <button type="button" class="btn btn-outline-success" id="businessBtn">Business</button>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Common Fields -->
                                        <div class="mb-3">
                                            <input type="hidden" name="role_id" id="role_id" value="4">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password-confirm" class="form-label">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="mb-3">
                                            <label for="contact_info" class="form-label">Contact Information</label>
                                            <input id="contact_info" type="text" class="form-control @error('contact_info') is-invalid @enderror" name="contact_info" value="{{ old('contact_info') }}" required>
                                            @error('contact_info')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="area_id" class="form-label">Area</label>
                                            <select id="area_id" class="form-select @error('area_id') is-invalid @enderror" name="area_id">
                                                @foreach($areas as $area)
                                                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                                        {{ $area->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('area_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Resident Specific Fields -->
                                        <div id="residentFields">
                                            <div class="mb-3">

                                                <label for="age" class="form-label">Age</label>
                                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" min="18">
                                                @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>



                                            <div class="mb-3">
                                                <label class="form-label">Interests</label>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @foreach($interests as $interest)
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="interests[]" value="{{ strtolower($interest->id) }}"
                                                                   id="interest-{{ strtolower($interest->id) }}"
                                                                {{ in_array(strtolower($interest->id), old('interests', [])) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="interest-{{ strtolower($interest->id) }}">
                                                                {{ $interest->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Council Specific Fields -->
                                        <div id="councilFields" style="display: none;">
{{--                                            <div class="mb-3">--}}
{{--                                                <label for="area_id" class="form-label">Area</label>--}}
{{--                                                <select id="area_id" class="form-select @error('area_id') is-invalid @enderror" name="area_id">--}}
{{--                                                    @foreach($areas as $area)--}}
{{--                                                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>--}}
{{--                                                         {{ $area->name }}--}}
{{--                                                        </option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                                @error('area_id')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                    <strong>{{ $message }}</strong>--}}
{{--                                                </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
                                        </div>

                                        <!-- Business Specific Fields -->
                                        <div id="businessFields" style="display: none;">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Business Address</label>
                                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="3">{{ old('address') }}</textarea>
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="logo" class="form-label">Business Logo (Optional)</label>
                                                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" accept="image/*">
                                                @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .nav-pills .nav-link {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            color: #495057;
            background-color: #f8f9fa;
            margin: 0 2px;
        }
        .nav-pills .nav-link.active {
            background-color: #0d6efd;
            color: white;
            box-shadow: 0 2px 5px rgba(13, 110, 253, 0.3);
        }
        .nav-pills .nav-link i {
            margin-right: 5px;
        }
        .card {
            border: none;
            border-radius: 15px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
        }
        .btn-primary {
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .object-fit-cover {
            object-fit: cover;
            object-position: center;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const residentBtn = document.getElementById('residentBtn');
            const councilBtn = document.getElementById('councilBtn');
            const businessBtn = document.getElementById('businessBtn');
            const userType = document.getElementById('role_id');

            const residentFields = document.getElementById('residentFields');
            const councilFields = document.getElementById('councilFields');
            const businessFields = document.getElementById('businessFields');

            // Resident button click
            residentBtn.addEventListener('click', function() {
                setActiveButton(residentBtn);
                userType.value = 4;
                residentFields.style.display = 'block';
                councilFields.style.display = 'none';
                businessFields.style.display = 'none';
            });

            // Council button click
            councilBtn.addEventListener('click', function() {
                setActiveButton(councilBtn);
                userType.value = 2;
                residentFields.style.display = 'none';
                councilFields.style.display = 'block';
                businessFields.style.display = 'none';
            });

            // Business button click
            businessBtn.addEventListener('click', function() {
                setActiveButton(businessBtn);
                userType.value = 3;
                residentFields.style.display = 'none';
                councilFields.style.display = 'none';
                businessFields.style.display = 'block';
            });

            function setActiveButton(activeBtn) {
                [residentBtn, councilBtn, businessBtn].forEach(btn => {
                    btn.classList.remove('active');
                    btn.classList.add('btn-outline-primary');
                });
                activeBtn.classList.add('active');
                activeBtn.classList.remove('btn-outline-primary');
            }

            // Set initial state based on old input or errors
            @if(old('role_id') == '2')
            councilBtn.click();
            @elseif(old('role_id') == '3')
            businessBtn.click();
            @endif
        });
    </script>
    @endpush

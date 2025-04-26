@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg overflow-hidden">
                    <div class="row g-0">
                        <!-- Image Column -->
                        <div class="col-md-6 d-none d-md-block">
                            <div class="h-100 position-relative">
                                <img src="https://unsplash.com/photos/a-happy-young-man-with-small-sister-holding-bug-hotels-outdoors-in-backyard-laughing-B7qQHAKBO_E"
                                     alt="Community Image"
                                     class="img-fluid h-100 object-fit-cover">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary bg-opacity-25 d-flex flex-column justify-content-center text-center p-4">
                                    <h2 class="text-white fw-bold mb-3">Join Our Community</h2>
                                    <p class="text-white lead">Connect with neighbors, local businesses, and council members to build a better community together.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Form Column -->
                        <div class="col-md-6">
                            <div class="card-body p-4 p-lg-5">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold text-success">Create Your Account</h3>
                                    <p class="text-muted">Select your role to get started</p>
                                </div>

                                <!-- Role Selection Tabs -->
                                <ul class="nav nav-pills nav-fill mb-4" id="roleTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="resident-tab" data-bs-toggle="pill"
                                                data-bs-target="#resident-form" type="button" role="tab">
                                            <i class="fas fa-home me-2"></i> Resident
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="council-tab" data-bs-toggle="pill"
                                                data-bs-target="#council-form" type="button" role="tab">
                                            <i class="fas fa-landmark me-2"></i> Council
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="business-tab" data-bs-toggle="pill"
                                                data-bs-target="#business-form" type="button" role="tab">
                                            <i class="fas fa-briefcase me-2"></i> Business
                                        </button>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content" id="roleTabsContent">
                                    <!-- Resident Form -->
                                    <div class="tab-pane fade show active" id="resident-form" role="tabpanel">
                                        <form method="POST" action="">
                                            @csrf
                                            <input type="hidden" name="role_id" value="resident">

                                            <div class="mb-3">
                                                <label for="resident_name" class="form-label">Full Name *</label>
                                                <input type="text" class="form-control @error('resident_name') is-invalid @enderror"
                                                       id="resident_name" name="name" value="{{ old('resident_name') }}" required>
                                                @error('resident_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="resident_email" class="form-label">Email *</label>
                                                <input type="email" class="form-control @error('resident_email') is-invalid @enderror"
                                                       id="resident_email" name="email" value="{{ old('resident_email') }}" required>
                                                @error('resident_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="resident_contact_info" class="form-label">Contact Info *</label>
                                                <input type="text" class="form-control @error('resident_contact_info') is-invalid @enderror"
                                                       id="resident_contact_info" name="resident_contact_info" value="{{ old('resident_contact_info') }}" required>
                                                @error('resident_contact_info')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="row g-2 mb-3">
                                                <div class="col-md-6">
                                                    <label for="resident_area" class="form-label">Location *</label>
                                                    <select class="form-select @error('resident_area') is-invalid @enderror"
                                                            id="resident_area" name="area_id" required>
                                                        <option value="">Select Area</option>
                                                        {{--                                                        @foreach($areas as $area)--}}
                                                        {{--                                                            <option value="{{ $area->id }}" {{ old('resident_area') == $area->id ? 'selected' : '' }}>--}}
                                                        {{--                                                                {{ $area->name }}--}}
                                                        {{--                                                            </option>--}}
                                                        {{--                                                        @endforeach--}}
                                                    </select>
                                                    @error('resident_area')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="resident_age" class="form-label">Age *</label>
                                                    <input type="number" class="form-control @error('resident_age_group') is-invalid @enderror" placeholder="Age" />
                                                    @error('resident_age_group')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row g-2 mb-3">
                                                <div class="col-md-6">
                                                    <label for="resident_password" class="form-label">Password *</label>
                                                    <input type="password" class="form-control @error('resident_password') is-invalid @enderror"
                                                           id="resident_password" name="password" required>
                                                    @error('resident_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="resident_password_confirmation" class="form-label">Confirm Password *</label>
                                                    <input type="password" class="form-control"
                                                           id="resident_password_confirmation" name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label">Interests</label>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @foreach(['Sports', 'Arts', 'Education', 'Tech', 'Health', 'Environment'] as $interest)
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="interests[]" value="{{ strtolower($interest) }}"
                                                                   id="interest-{{ strtolower($interest) }}"
                                                                {{ in_array(strtolower($interest), old('interests', [])) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="interest-{{ strtolower($interest) }}">
                                                                {{ $interest }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="fas fa-user-plus me-2"></i> Register as Resident
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Council Form -->
                                    <div class="tab-pane fade" id="council-form" role="tabpanel">
                                        <form method="POST" action="">
                                            @csrf
                                            <input type="hidden" name="role" value="council">

                                            <div class="mb-3">
                                                <label for="council_name" class="form-label">Full Name *</label>
                                                <input type="text" class="form-control @error('council_name') is-invalid @enderror"
                                                       id="council_name" name="name" value="{{ old('council_name') }}" required>
                                                @error('council_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="council_email" class="form-label">Council Email *</label>
                                                <input type="email" class="form-control @error('council_email') is-invalid @enderror"
                                                       id="council_email" name="email" value="{{ old('council_email') }}" required>
                                                @error('council_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="council_contact_info" class="form-label">Contact Info *</label>
                                                <input type="text" class="form-control @error('council_contact_info') is-invalid @enderror"
                                                       id="council_contact_info" name="council_contact_info" value="{{ old('council_contact_info') }}" required>
                                                @error('council_contact_info')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="resident_area" class="form-label">Council Location *</label>
                                                <select class="form-select @error('resident_area') is-invalid @enderror"
                                                        id="resident_area" name="area_id" required>
                                                    <option value="">Select Area</option>
                                                    {{--                                                        @foreach($areas as $area)--}}
                                                    {{--                                                            <option value="{{ $area->id }}" {{ old('resident_area') == $area->id ? 'selected' : '' }}>--}}
                                                    {{--                                                                {{ $area->name }}--}}
                                                    {{--                                                            </option>--}}
                                                    {{--                                                        @endforeach--}}
                                                </select>
                                                @error('resident_area')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="row g-2 mb-3">
                                                <div class="col-md-6">
                                                    <label for="council_password" class="form-label">Password *</label>
                                                    <input type="password" class="form-control @error('council_password') is-invalid @enderror"
                                                           id="council_password" name="password" required>
                                                    @error('council_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="council_password_confirmation" class="form-label">Confirm *</label>
                                                    <input type="password" class="form-control"
                                                           id="council_password_confirmation" name="password_confirmation" required>
                                                </div>
                                            </div>

{{--                                            <div class="mb-4">--}}
{{--                                                <label for="council_id_number" class="form-label">Council ID *</label>--}}
{{--                                                <input type="text" class="form-control @error('council_id_number') is-invalid @enderror"--}}
{{--                                                       id="council_id_number" name="id_number" value="{{ old('council_id_number') }}" required>--}}
{{--                                                @error('council_id_number')--}}
{{--                                                <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}

                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="fas fa-user-tie me-2"></i> Register as Council
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Business Form -->
                                    <div class="tab-pane fade" id="business-form" role="tabpanel">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="role" value="business">

                                            <div class="mb-3">
                                                <div class="col-md-6">
                                                    <label for="business_logo" class="form-label">Logo</label>
                                                    <input type="file" class="form-control @error('business_logo') is-invalid @enderror"
                                                           id="business_logo" name="logo" accept="image/*">
                                                    @error('business_logo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_name" class="form-label">Business Name *</label>
                                                <input type="text" class="form-control @error('business_name') is-invalid @enderror"
                                                       id="business_name" name="name" value="{{ old('business_name') }}" required>
                                                @error('business_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_email" class="form-label">Business Email *</label>
                                                <input type="email" class="form-control @error('business_email') is-invalid @enderror"
                                                       id="business_email" name="email" value="{{ old('business_email') }}" required>
                                                @error('business_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_contact" class="form-label">Contact Info*</label>
                                                <input type="text" class="form-control @error('business_contact') is-invalid @enderror"
                                                       id="business_contact" name="contact_no" value="{{ old('business_contact') }}" required>
                                                @error('business_contact')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_address" class="form-label">Address *</label>
                                                <textarea class="form-control @error('business_address') is-invalid @enderror"
                                                          id="business_address" name="address" rows="2" required>{{ old('business_address') }}</textarea>
                                                @error('business_address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="row g-2 mb-3">
                                                <div class="col-md-6">
                                                    <label for="business_password" class="form-label">Password *</label>
                                                    <input type="password" class="form-control @error('business_password') is-invalid @enderror"
                                                           id="business_password" name="password" required>
                                                    @error('business_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="business_password_confirmation" class="form-label">Confirm *</label>
                                                    <input type="password" class="form-control"
                                                           id="business_password_confirmation" name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="fas fa-store me-2"></i> Register Business
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign in</a></p>
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
            // Activate tab based on URL hash
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                const tab = document.querySelector(`.nav-link[data-bs-target="#${hash}"]`);
                if (tab) {
                    new bootstrap.Tab(tab).show();
                }
            }

            // Update URL hash when tab changes
            const tabElms = document.querySelectorAll('button[data-bs-toggle="pill"]');
            tabElms.forEach(tabEl => {
                tabEl.addEventListener('shown.bs.tab', function (event) {
                    const target = event.target.getAttribute('data-bs-target');
                    window.location.hash = target.substring(1);
                });
            });
        });
    </script>
@endpush

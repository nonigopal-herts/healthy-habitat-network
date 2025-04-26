@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0 text-center">Create Your Account</h3>
                    </div>

                    <div class="card-body">
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
                                    <input type="hidden" name="role" value="resident">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="resident_name" class="form-label">Full Name *</label>
                                            <input type="text" class="form-control @error('resident_name') is-invalid @enderror"
                                                   id="resident_name" name="name" value="{{ old('resident_name') }}" required>
                                            @error('resident_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="resident_email" class="form-label">Email *</label>
                                            <input type="email" class="form-control @error('resident_email') is-invalid @enderror"
                                                   id="resident_email" name="email" value="{{ old('resident_email') }}" required>
                                            @error('resident_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

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

                                        <div class="col-md-6">
                                            <label for="resident_area" class="form-label">Residential Area *</label>
                                            <select class="form-select @error('resident_area') is-invalid @enderror"
                                                    id="resident_area" name="area_id" required>
                                                <option value="">Select Area</option>
{{--                                                @foreach($areas as $area)--}}
{{--                                                    <option value="{{ $area->id }}" {{ old('resident_area') == $area->id ? 'selected' : '' }}>--}}
{{--                                                        {{ $area->name }}--}}
{{--                                                    </option>--}}
{{--                                                @endforeach--}}
                                            </select>
                                            @error('resident_area')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="resident_age_group" class="form-label">Age Group *</label>
                                            <select class="form-select @error('resident_age_group') is-invalid @enderror"
                                                    id="resident_age_group" name="age_group" required>
                                                <option value="">Select Age Group</option>
                                                <option value="child" {{ old('resident_age_group') == 'child' ? 'selected' : '' }}>Child (0-12)</option>
                                                <option value="teen" {{ old('resident_age_group') == 'teen' ? 'selected' : '' }}>Teen (13-19)</option>
                                                <option value="adult" {{ old('resident_age_group') == 'adult' ? 'selected' : '' }}>Adult (20-64)</option>
                                                <option value="senior" {{ old('resident_age_group') == 'senior' ? 'selected' : '' }}>Senior (65+)</option>
                                            </select>
                                            @error('resident_age_group')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Interests (Select up to 5)</label>
                                            <div class="row g-2">
                                                @foreach(['Sports', 'Arts', 'Education', 'Technology', 'Health', 'Environment', 'Cooking', 'Music'] as $interest)
                                                    <div class="col-md-3 col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="interests[]" value="{{ strtolower($interest) }}"
                                                                   id="interest-{{ strtolower($interest) }}"
                                                                {{ in_array(strtolower($interest), old('interests', [])) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="interest-{{ strtolower($interest) }}">
                                                                {{ $interest }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="fas fa-user-plus me-2"></i> Register as Resident
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Council Form -->
                            <div class="tab-pane fade" id="council-form" role="tabpanel">
                                <form method="POST" action="">
                                    @csrf
                                    <input type="hidden" name="role" value="council">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="council_name" class="form-label">Full Name *</label>
                                            <input type="text" class="form-control @error('council_name') is-invalid @enderror"
                                                   id="council_name" name="name" value="{{ old('council_name') }}" required>
                                            @error('council_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="council_email" class="form-label">Council Email *</label>
                                            <input type="email" class="form-control @error('council_email') is-invalid @enderror"
                                                   id="council_email" name="email" value="{{ old('council_email') }}" required>
                                            @error('council_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="council_password" class="form-label">Password *</label>
                                            <input type="password" class="form-control @error('council_password') is-invalid @enderror"
                                                   id="council_password" name="password" required>
                                            @error('council_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="council_password_confirmation" class="form-label">Confirm Password *</label>
                                            <input type="password" class="form-control"
                                                   id="council_password_confirmation" name="password_confirmation" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="council_position" class="form-label">Position *</label>
                                            <input type="text" class="form-control @error('council_position') is-invalid @enderror"
                                                   id="council_position" name="position" value="{{ old('council_position') }}" required>
                                            @error('council_position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="council_department" class="form-label">Department *</label>
                                            <select class="form-select @error('council_department') is-invalid @enderror"
                                                    id="council_department" name="department" required>
                                                <option value="">Select Department</option>
                                                <option value="planning" {{ old('council_department') == 'planning' ? 'selected' : '' }}>Planning</option>
                                                <option value="health" {{ old('council_department') == 'health' ? 'selected' : '' }}>Health</option>
                                                <option value="education" {{ old('council_department') == 'education' ? 'selected' : '' }}>Education</option>
                                                <option value="transport" {{ old('council_department') == 'transport' ? 'selected' : '' }}>Transport</option>
                                                <option value="environment" {{ old('council_department') == 'environment' ? 'selected' : '' }}>Environment</option>
                                            </select>
                                            @error('council_department')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="council_id_number" class="form-label">Council ID Number *</label>
                                            <input type="text" class="form-control @error('council_id_number') is-invalid @enderror"
                                                   id="council_id_number" name="id_number" value="{{ old('council_id_number') }}" required>
                                            @error('council_id_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="fas fa-user-tie me-2"></i> Register as Council Member
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Business Form -->
                            <div class="tab-pane fade" id="business-form" role="tabpanel">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="role" value="business">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="business_name" class="form-label">Business Name *</label>
                                            <input type="text" class="form-control @error('business_name') is-invalid @enderror"
                                                   id="business_name" name="name" value="{{ old('business_name') }}" required>
                                            @error('business_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="business_email" class="form-label">Business Email *</label>
                                            <input type="email" class="form-control @error('business_email') is-invalid @enderror"
                                                   id="business_email" name="email" value="{{ old('business_email') }}" required>
                                            @error('business_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="business_password" class="form-label">Password *</label>
                                            <input type="password" class="form-control @error('business_password') is-invalid @enderror"
                                                   id="business_password" name="password" required>
                                            @error('business_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="business_password_confirmation" class="form-label">Confirm Password *</label>
                                            <input type="password" class="form-control"
                                                   id="business_password_confirmation" name="password_confirmation" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="business_contact" class="form-label">Contact Number *</label>
                                            <input type="text" class="form-control @error('business_contact') is-invalid @enderror"
                                                   id="business_contact" name="contact_no" value="{{ old('business_contact') }}" required>
                                            @error('business_contact')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="business_type" class="form-label">Business Type *</label>
                                            <select class="form-select @error('business_type') is-invalid @enderror"
                                                    id="business_type" name="business_type" required>
                                                <option value="">Select Type</option>
                                                <option value="retail" {{ old('business_type') == 'retail' ? 'selected' : '' }}>Retail</option>
                                                <option value="service" {{ old('business_type') == 'service' ? 'selected' : '' }}>Service</option>
                                                <option value="hospitality" {{ old('business_type') == 'hospitality' ? 'selected' : '' }}>Hospitality</option>
                                                <option value="manufacturing" {{ old('business_type') == 'manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                                <option value="other" {{ old('business_type') == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('business_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="business_address" class="form-label">Business Address *</label>
                                            <textarea class="form-control @error('business_address') is-invalid @enderror"
                                                      id="business_address" name="address" rows="2" required>{{ old('business_address') }}</textarea>
                                            @error('business_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="business_registration" class="form-label">Registration Number *</label>
                                            <input type="text" class="form-control @error('business_registration') is-invalid @enderror"
                                                   id="business_registration" name="registration_no" value="{{ old('business_registration') }}" required>
                                            @error('business_registration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="business_logo" class="form-label">Business Logo</label>
                                            <input type="file" class="form-control @error('business_logo') is-invalid @enderror"
                                                   id="business_logo" name="logo" accept="image/*">
                                            @error('business_logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="fas fa-store me-2"></i> Register Business
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /*.nav-pills .nav-link {*/
        /*    transition: all 0.3s ease;*/
        /*    border-radius: 0.5rem;*/
        /*    padding: 0.75rem 1rem;*/
        /*}*/
        /*.nav-pills .nav-link.active {*/
        /*    background-color: #0d6efd;*/
        /*    box-shadow: 0 4px 6px rgba(13, 110, 253, 0.2);*/
        /*}*/
        /*.tab-pane {*/
        /*    padding: 1.5rem;*/
        /*    border: 1px solid #dee2e6;*/
        /*    border-top: none;*/
        /*    border-radius: 0 0 0.5rem 0.5rem;*/
        /*}*/
        /*.form-check-input:checked {*/
        /*    background-color: #0d6efd;*/
        /*    border-color: #0d6efd;*/
        /*}*/
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Activate the first tab if none is active
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                const tab = document.querySelector(`.nav-link[data-bs-target="#${hash}"]`);
                if (tab) {
                    new bootstrap.Tab(tab).show();
                }
            }

            // Store the active tab in sessionStorage
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

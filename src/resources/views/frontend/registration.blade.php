@extends('layouts.frontend')
@section('content')
    <!-- Main Content -->
    <div class="container my-5">
        <h4 class="fw-bold mb-3 text-center">Create an Account</h4>

        <!-- Toggle Buttons for Resident, Business, Council -->
        <div class="mb-4">
            <div class="btn-group d-flex justify-content-center" role="group">
                <!-- Active button will have the purple background, others remain outlined -->
                <button class="btn btn-outline-purple active-toggle" id="residentBtn">
                    Resident
                </button>
                <button class="btn btn-outline-purple" id="businessBtn">
                    Business
                </button>
                <button class="btn btn-outline-purple" id="councilBtn">
                    Council
                </button>
            </div>
        </div>

        <div class="row align-items-start">
            <!-- Image (left column) -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img
                    src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80"
                    alt="Register Image"
                    class="img-fluid rounded"
                />
            </div>

            <!-- Form Section (right column) -->
            <div class="col-md-6">
                <div class="bg-light p-4 rounded shadow-sm">
                    <form id="registerForm">
                        <!-- First Name and Last Name -->
                        <div class="row mb-3">
                            <div class="col">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="First name"
                                    required
                                />
                            </div>
                            <div class="col">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Last name"
                                    required
                                />
                            </div>
                        </div>

                        <!-- Email and Password -->
                        <div class="row mb-3">
                            <div class="col">
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email address"
                                    required
                                />
                            </div>
                            <div class="col">
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    required
                                />
                            </div>
                        </div>

                        <!-- Resident-specific Fields -->
                        <div class="row mb-3 resident-only">
                            <div class="col">
                                <input type="number" class="form-control" placeholder="Age" />
                            </div>

                            <div class="col">
                                <input type="hidden" name="role_id" class="form-control" value="3" />
                            </div>

                            <div class="col">
                                <select class="form-select">
                                    <option selected>Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 resident-only">
                            <select class="form-select">
                                <option selected>Select Location</option>
                                <option>London</option>
                                <option>Manchester</option>
                            </select>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <input
                                type="tel"
                                class="form-control"
                                placeholder="Phone number"
                            />
                        </div>

                        <!-- Business-specific Fields -->
                        <div class="mb-3 business-only d-none">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Company Name"
                            />
                        </div>

                        <div class="col">
                            <input type="hidden" name="role_id" class="form-control" value="2" />
                        </div>

                        <div class="mb-3 business-only d-none">
                <textarea
                    class="form-control"
                    placeholder="Company Description"
                ></textarea>
                        </div>

                        <!-- Message Field -->
                        <div class="mb-3">
                <textarea
                    class="form-control"
                    placeholder="Leave us a message..."
                ></textarea>
                        </div>

                        <!-- Resident-only Interests -->
                        <div class="mb-3 resident-only">
                            <label class="form-label">Interest</label><br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" />
                                <label class="form-check-label">Website design</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" />
                                <label class="form-check-label">UX design</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" />
                                <label class="form-check-label">Content creation</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" />
                                <label class="form-check-label">Strategy & consulting</label>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <button
                            type="submit"
                            class="btn text-white w-100"
                            style="background-color: #805ad5"
                        >
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

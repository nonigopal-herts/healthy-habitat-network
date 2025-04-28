@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <!-- Search and Filter -->
        <div class="card shadow-sm mb-5">
            <div class="card-body">
                <form class="row g-3">
                    <!-- Search -->
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                    </div>

                    <!-- Category -->
                    <div class="col-md-3">
                        <select name="category" class="form-select">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" name="min_price" class="form-control" placeholder="Min" value="{{ request('min_price') }}">
                            <span class="input-group-text">-</span>
                            <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ request('max_price') }}">
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>

                    <!-- Quick Filters -->
                    <div class="col-12 mt-3">
                        <div class="d-flex flex-wrap gap-2">
                            <div class="btn-group">
                                @foreach(['affordable' => '< $50', 'moderate' => '$50-$150', 'premium' => '> $150'] as $value => $label)
                                    <input type="radio" class="btn-check" name="price_tag" id="{{ $value }}"
                                           value="{{ $value }}" @checked(request('price_tag') == $value)>
                                    <label class="btn btn-outline-primary" for="{{ $value }}">{{ $label }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        <!-- Products Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <!-- Updated Image Section with Placeholder -->
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : $product->getImageUrl() }}"
                             class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="text-muted small mb-2">
                                {{ $product->category->name ?? 'Uncategorized' }}
                            </p>
                            <div class="mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= ($product->average_rating ?? 0) ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                            <h5 class="text-primary">&pound; {{ number_format($product->price, 2) }}</h5>

                            <!-- Voting Section -->
                            <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">100 total votes</small>
                                    <small class="text-success">50% positive</small>
                                </div>

                                @if(Auth::check() && Auth::user()->role_id == 4)
                                <form action="" method="POST" class="vote-form">
                                    @csrf
                                    <div class="btn-group w-100" role="group" style="height: 35px;">
                                        <button type="submit" name="vote" value="yes" class="btn btn-sm btn-outline-success py-0 px-2">
                                            <i class="fas fa-thumbs-up fa-xs"></i> {{ $product->yes_votes }}
                                        </button>
                                        <button type="submit" name="vote" value="no" class="btn btn-sm btn-outline-danger py-0 px-2">
                                            <i class="fas fa-thumbs-down fa-xs"></i> {{ $product->no_votes }}
                                        </button>
                                    </div>
                                </form>
                                @else
                                    <!-- Display for guests with error message -->
                                    <div class="guest-voting">
                                        <div class="btn-group voting-buttons">
                                            <button class="btn btn-sm btn-outline-secondary require-login" data-vote="yes">
                                                <i class="fas fa-thumbs-up"></i> {{ $product->yes_votes }}
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary require-login" data-vote="no">
                                                <i class="fas fa-thumbs-down"></i> {{ $product->no_votes }}
                                            </button>
                                        </div>
                                        <div class="alert alert-warning mt-2 login-prompt" style="display: none;">
                                            <p>Please login to vote!</p>
                                            {{--{{ route('resident.login') }}--}}
                                            <a href="" class="btn btn-sm btn-primary">Login</a>
                                            <button class="btn btn-sm btn-outline-secondary close-prompt">Close</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="{{route('products-services-details', $product->id)}}" class="btn btn-sm btn-outline-primary w-100">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No products or services found.</div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Add this to your layout file -->
    <div class="modal fade" id="voteLoginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login Required</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>You need to login as a resident to vote.</p>
                    <div class="d-flex justify-content-between">
                    {{--  <a href="" class="btn btn-primary">Login</a>--}}
                        <a href="" class="btn btn-primary">Login</a>
                        <button type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle click on vote buttons for guests
            document.querySelectorAll('.require-login').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    //alert('Hello');

                    // Hide all other prompts first
                    document.querySelectorAll('.login-prompt').forEach(prompt => {
                        prompt.style.display = 'none';
                    });

                    // Show the prompt for this button
                    const prompt = this.closest('.guest-voting').querySelector('.login-prompt');
                    prompt.style.display = 'block';

                    // Optional: Highlight which button was clicked
                    const voteType = this.getAttribute('data-vote');
                    prompt.querySelector('p').textContent = `Please login to vote "${voteType === 'yes' ? 'Yes' : 'No'}"!`;
                });
            });

            // Handle close button
            document.querySelectorAll('.close-prompt').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.closest('.login-prompt').style.display = 'none';
                });
            });
        });

        //Showing login form
        document.querySelectorAll('.require-login').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const modal = new bootstrap.Modal(document.getElementById('voteLoginModal'));
                modal.show();
            });
        });
    </script>
@endpush

<style>
    /* Makes buttons more compact */
    .btn-group-sm .btn {
    padding-top: 0.15rem;
    padding-bottom: 0.15rem;
    font-size: 0.75rem;
    line-height: 1.2;
    }

    /* Better icon alignment */
    .btn i.fas {
    vertical-align: middle;
    margin-right: 2px;
    }

    .voting-section {
        position: relative;
    }

    .login-prompt {
        position: absolute;
        z-index: 100;
        width: 100%;
        margin-top: 5px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .voting-buttons {
        width: 100%;
    }

    .voting-buttons .btn {
        flex: 1;
        text-align: center;
    }
</style>


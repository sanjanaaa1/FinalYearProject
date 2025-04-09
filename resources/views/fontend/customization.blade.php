

@extends('fontend.fontend-design')

@section('title')
Product Customization
@endsection

@section('content')
@include('session')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-5" style="color: #e91e63;">Product Customization</h1>
            
            <!-- @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif -->

            <p class="lead mb-4 text-center">Customize your product according to your preferences</p>

            <form method="POST" action="{{ route('product.customization.submit') }}">
                @csrf

                <div class="form-group mb-4">
                    <select id="product_id" class="form-control form-control-lg @error('product_id') is-invalid @enderror" name="product_id" required>
                        <option value="">Select a product</option>
                        @foreach($copperProducts as $product)
                            <option value="{{ $product->id }}" data-category="copper">{{ $product->title }}</option>
                        @endforeach
                        @foreach($brassProducts as $product)
                            <option value="{{ $product->id }}" data-category="brass">{{ $product->title }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Hidden category field that will be populated based on product selection -->
                <input type="hidden" id="product_category" name="product_category" value="">

                <div class="form-group mb-4">
                    <select id="size" class="form-control form-control-lg @error('size') is-invalid @enderror" name="size" required>
                        <option value="">Select size</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                    @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <textarea id="special_instructions" class="form-control form-control-lg @error('special_instructions') is-invalid @enderror" name="special_instructions" rows="6" placeholder="Enter the features you want to customize in the product"></textarea>
                    @error('special_instructions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg px-5 py-2" style="background-color: #e91e63; color: white; border-radius: 30px; min-width: 200px;">
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 12px 15px;
        font-size: 16px;
        color: #333;
        background-color: #fff;
        margin-bottom: 20px;
    }
    .form-control:focus {
        box-shadow: 0 0 0 2px rgba(233, 30, 99, 0.25);
        border-color: #e91e63;
    }
    .form-control::placeholder {
        color: #999;
    }
    select.form-control {
        appearance: auto;
        height: auto;
    }
    textarea.form-control {
        min-height: 120px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('product_id');
        const categoryInput = document.getElementById('product_category');
        
        productSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                const category = selectedOption.getAttribute('data-category');
                categoryInput.value = category;
            } else {
                categoryInput.value = '';
            }
        });
    });
</script>
@endsection
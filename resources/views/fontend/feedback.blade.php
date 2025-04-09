@extends('fontend.fontend-design')

@section('title')
Feedback Form
@endsection

@section('content')
<div class="container py-5">
  <div class="form-container" style="max-width: 500px; background-color: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin: auto;">
    <h2 style="text-align: center; color: #e91e63;">Feedback Form</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('feedback.submit') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="experience" style="display: block; margin-top: 15px;">How was your experience?</label>
        <select id="experience" name="experience" class="form-control @error('experience') is-invalid @enderror" required>
          <option value="">Select</option>
          <option value="excellent">Excellent</option>
          <option value="good">Good</option>
          <option value="average">Average</option>
          <option value="poor">Poor</option>
        </select>
        @error('experience')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="message" style="display: block; margin-top: 15px;">Tell us more</label>
        <textarea id="message" name="message" rows="4" class="form-control" placeholder="Write your feedback here..." required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
      </div>

      <div class="form-group">
        <label for="email" style="display: block; margin-top: 15px;">Your Email (optional)</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="example@example.com" style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc;">
      </div>

      <button type="submit" style="background-color: #e91e63; color: white; border: none; padding: 12px; border-radius: 5px; margin-top: 20px; cursor: pointer; width: 100%;">Submit Feedback</button>
    </form>
  </div>
</div>
@endsection
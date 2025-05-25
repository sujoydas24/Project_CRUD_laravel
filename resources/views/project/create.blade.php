@extends('project.layout')

@section('mainContent')

<div class="container mt-5">
  <h2 class="mb-4">Create Project</h2>

  <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Title -->
    <div class="mb-3">
      <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
      <input type="text" value="{{ old('title' )}}" class="form-control @error('title') 'is-invalid' @enderror" id="title" name="title" required>
      @error('title')
          <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Description -->
    <div class="mb-3">
      <label for="description" class="form-label">Project Description</label>
      <textarea value="{{old('description')}}" class="form-control @error('description') 'is-invalid' @enderror" id="description" name="description" rows="4"></textarea>
      @error('description')
          <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Project URL -->
    <div class="mb-3">
      <label for="project_url" class="form-label">Project URL</label>
      <input type="url" value="{{old('url')}}" class="form-control @error('url') 'is-invalid' @enderror" id="url" name="url" placeholder="https://example.com">
      @error('url')
          <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Image Upload -->
    <div class="mb-3">
      <label for="image" class="form-label">Project Image <span class="text-danger">*</span></label>
      <input type="file" class="form-control @error('img') 'is-invalid' @enderror" id="img" name="img" accept="image/*" required>
      @error('img')
          <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Status -->
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" id="status" name="status">
        <option value="Draft">Draft</option>
        <option value="Published">Published</option>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit Project</button>
  </form>
</div>
@endsection
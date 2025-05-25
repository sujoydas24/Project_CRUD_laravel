@extends('project.layout')

@section('mainContent')



    <!-- Main Content -->

    <div class="container">
        <div class="row">
            <div class="d-flex">
                <a href="{{route('project.create')}}" class="btn btn-dark">Create</a>
            </div>
            <div class="card p-0 mt-3">
                <h4> All Projects</h4>
                @if ($projects->isNotEmpty())
                    @foreach ($projects as $project)
                        <div class="d-flex">
                            <div class="container mt-5">
                                <div class="card shadow-sm" style="width: 18rem; margin: auto;">
                                    <img src="{{ asset('storage/' . $project->img) }}" class="card-img-top" alt="Project Image">

                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            {{$project->title}}
                                        </h5>

                                        <p class="card-text">
                                            {{$project->description}}
                                        </p>
                                        <div class="card-text">
                                            @if ($project->status == 'Published')
                                                    <span class="badge bg-success">Published</span>
                                                    @else
                                                    <span class="badge bg-danger">Draft</span>

                                                @endif
                                        </div><br>
                                        <div class="cart-text">
                                            {{$project->url}}
                                        </div><br>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{route('project.edit',$project->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{route('project.destroy',$project->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>no data inserted</h4>
                @endif

            </div>
        </div>
    </div>


@endsection
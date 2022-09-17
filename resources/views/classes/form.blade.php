<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @php
            $name = isset($class) ? "Update": "Add";
        @endphp
            {{ __($name.' class') }}
        </h2>
        <div class="col-12 text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('classes.index') }}">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </a>
        </div>
    </x-slot>
    <!-- Page content -->
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <!-- Page content -->
   
            <div class="card-body">
                @php
                 $action = isset($class) ? route('classes.update', [$class->id]) : route('classes.store');
                @endphp
                <form class="form" method="post" action="{{ $action }}" enctype="multipart/form-data">
                    @if (isset($class)) @method('PUT') @endif
                    @csrf
                    <div class="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label required" for="input-first-name">Name</label>
                                    <input type="text" id="input-first-name" name="name" class="form-control" placeholder="Name" value="{{ old('name', $class->name ?? '') }}" required>
                                    @error('name')
                                        <span class="validation invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label required" for="input-first-name">Seat</label>
                                    <input type="number" min="0" id="input-first-name" name="seat" class="form-control" placeholder="Seat" value="{{ old('seat', $class->seat ?? '') }}" required>
                                    @error('seat')
                                        <span class="validation invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label required" for="input-first-name">Description</label>
                                    <input type="text" min="0" id="input-first-name" name="description" class="form-control" placeholder="Description" value="{{ old('description', $class->description ?? '') }}" required>
                                    @error('description')
                                        <span class="validation invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <button  type="submit" class="btn btn-primary my-4"> {{$name}} </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

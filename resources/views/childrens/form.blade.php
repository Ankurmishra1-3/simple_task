<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @php
            $name = isset($children) ? "Update": "Add";
        @endphp
            {{ __($name.' Children') }}
        </h2>
        <div class="col-12 text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('childrens.index') }}">
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
                 $action = isset($children) ? route('childrens.update', [$children->id]) : route('childrens.store');
                @endphp
                <form class="form" method="post" action="{{ $action }}" enctype="multipart/form-data">
                    @if (isset($children)) @method('PUT') @endif
                    @csrf
                    <div class="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label required" for="input-first-name">Name</label>
                                    <input type="text" id="input-first-name" name="name" class="form-control" placeholder="Name" value="{{ old('name', $children->name ?? '') }}" required>
                                    @error('name')
                                        <span class="validation invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label required" for="input-first-name">Age</label>
                                    <input type="number" min="0" id="input-first-name" name="age" class="form-control" placeholder="Age" value="{{ old('age', $children->age ?? '') }}" required>
                                    @error('age')
                                        <span class="validation invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label required">Class</label>
                                    <select required class="form-control" aria-label="User Role" name="class_id">
                                        <option value="" hidden>Select Class</option>
                                        @if(isset($classes) && count($classes))
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" @if (isset($children) && $children->class_id == $class->id) selected @endif>{{ $class->name ?? ''}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('class_id')
                                        <span class="validation invalid-feedback" role="alert">
                                            <strong>{{ str_replace(' id', '', $message) }}</strong>
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

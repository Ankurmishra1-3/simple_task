<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $class->name }} Information
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
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3" for="input-name">Name:</label>
                                    <div class="col-md-9">
                                        {{ $class->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3">Seat:</label>
                                    <div class="col-md-9">
                                        {{ $class->seat ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3">Description:</label>
                                    <div class="col-md-9">
                                        {{ $class->description ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3">Childrens:</label>
                                    <div class="col-md-9">
                                        @foreach($class->childrens as $children)
                                            {{ $children->name ?? '' }},
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


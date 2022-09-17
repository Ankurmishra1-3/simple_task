<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $children->name }} Information
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
                <div class="pl-lg-4">
                    <div class="row">
                    <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3" for="input-name">Parent Name:</label>
                                    <div class="col-md-9">
                                        {{ $children->user ? $children->user->name : '--' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3" for="input-name">Name:</label>
                                    <div class="col-md-9">
                                        {{ $children->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3">Age:</label>
                                    <div class="col-md-9">
                                        {{ $children->age ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3">Class:</label>
                                    <div class="col-md-9">
                                        {{ $children->Class->name ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-control-label col-md-3">Status:</label>
                                    <div class="col-md-9">
                                    {{ ($children->status  == 1) ? 'Not In Roll' : 'In Roll' }}
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


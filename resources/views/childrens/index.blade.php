<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Childrens') }}
        </h2>
        <a href="{{ route('childrens.create') }}" class="btn btn-info btn-sm">Add</a>
    </x-slot>
    <!-- Page content -->
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <!-- Light table -->
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead class="thead-light">
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Parent Name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Status</th>
                            <th scope="col">Class</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($childrens as $index=>$children)
                            <tr>
                                <td> {{ $index + $childrens->firstItem() }} </td>
                                <td> {{ $children->user ? $children->user->name : '--' }} </td>
                                <td> {{ $children->name ? $children->name : '--' }} </td>
                                <td> {{ $children->age ?? '--' }} </td>
                                <td >
                                    <input type="button" children-id="{{ $children->id }}" status="{{ ($children->status  == 1) ? 2 : 1 }}" value="{{ ($children->status  == 1) ? 'In Roll' : 'Not In Roll' }}" class="changeStatus  btn btn-{{ ($children->status  == 1) ? 'success' : 'warning' }}" title="Change status to {{ ($children->status  == 1) ? 'Not In Roll' : 'In Roll' }}">
                                </td>
                                <td> {{ ($children->class && $children->class->name) ? $children->class->name : '--' }} </td>
                                
                                <td class="text-center">
                                    <a href="{{ route('childrens.show', [base64_encode($children->id)]) }}" class="btn btn-primary btn-sm">Show</a>
                                    <a href="{{ route('childrens.edit', [base64_encode($children->id)]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm" data-form="deleteForm-{{ $children->id }}">Delete</a>
                                    <form id="deleteForm-{{ $children->id }}" action="{{ route('childrens.destroy', [base64_encode($children->id)]) }}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <h2> No data Found </h2>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                {{ $childrens->withQueryString()->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
   
    </x-app-layout>


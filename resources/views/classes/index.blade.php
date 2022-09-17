<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Classes') }}
        </h2>
        <a href="{{ route('classes.create') }}" class="btn btn-info btn-sm">Add</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Seat</th>
                            <th scope="col">Total Occuplied Seat</th>
                            <th scope="col">Total Requested Seat</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($classes as $index=>$class)
                            <tr>
                                <td> {{ $index + $classes->firstItem() }} </td>
                                <td> {{ $class->name ?? '--' }} </td>
                                <td> {{ $class->seat ?? '--' }} </td>
                                <td> {{ $class->occupliedChildrens() ?? '0' }} </td>
                                <td> {{ $class->requestChildrens() ?? '0' }} </td> 
                                <td class="text-center">
                                     <a href="{{ route('classes.show', [base64_encode($class->id)]) }}" class="btn btn-primary btn-sm">Show</a>
                                    <a href="{{ route('classes.edit', [base64_encode($class->id)]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm" data-form="deleteForm-{{ $class->id }}">Delete</a>
                                    <form id="deleteForm-{{ $class->id }}" action="{{ route('classes.destroy', [base64_encode($class->id)]) }}" method="post">
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
                                {{ $classes->withQueryString()->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    </x-app-layout>


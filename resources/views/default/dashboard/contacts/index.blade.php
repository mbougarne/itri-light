@extends('default.dashboard.layouts.app')
{{-- Custom CSS --}}
@section('custom_css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection
{{-- Main Content --}}
@section('content')

<!-- Contacts -->
<div class="row">
    <div class="col-sm-12 col-md-8">
        <h3 class="mb-4">Contacts</h3>
        <p>
            <small>Manage your contacts</small>
        </p>
    </div>
</div>

<table id="contactsTable" class="table display">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sender</th>
            <th scope="col">Subject</th>
            <th scope="col">Is Read</th>
            <th scope="col">
                Manage <i class="icon-cogs"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contacts as $contact)
            <tr scope="row">
                <td>
                    {{ $loop->index + 1 }}
                </td>
                <td>
                    <p>
                        {{ $contact->first_name . ' ' . $contact->last_name }}
                        <br>
                        <small>
                            {{ $contact->email }}
                        </small>
                    </p>
                </td>
                <td>
                    <p>
                        {{ $contact->subject }}
                    </p>
                </td>
                <td>
                    @if ($contact->is_read)
                        <p>
                            <span class="badge badge-success p-2">
                                Read
                            </span>
                        </p>
                    @else
                        <p>
                            <span class="badge badge-secondary p-2">
                                Unread
                            </span>
                        </p>
                    @endif
                </td>
                <td>
                    <a
                        href="{{ route('contacts.single', $contact->id) }}" class="btn btn-sm btn-primary">
                        Reply <i class="icon-reply"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    <p>
                        <small class="text-muted">
                            You don't have any contact message yet!
                        </small>
                    </p>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>


@endsection
{{-- Custom Scripts --}}
@section('custom_scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#contactsTable').DataTable();
        } );
    </script>
@endsection

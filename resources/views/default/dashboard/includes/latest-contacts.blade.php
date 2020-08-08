<!-- Posts -->
<div class="row">
    <div class="col-12">
        <h3 class="mb-4">Latest Contact Messages</h3>
        <p>
            <small>Manage your contacts</small>
        </p>
    </div>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sender</th>
            <th scope="col">Subject</th>
            <th scope="col">Manage</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contacts as $contact)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>
                <p>
                    {{ $contact->first_name . ' ' . $contact->last_name }}
                    <br>
                    {{ $contact->email }}
                </p>
            </td>
            <td>
                <p>
                    {{ $contact->subject }}
                </p>
            </td>
            <td>
                <a
                    href="{{ route('contacts.single', $contact->id) }}"
                    class="btn btn-link">
                    Reply <i class="icon-reply"></i>
                </a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="4">
                    <p>
                        <small class="text-muted">
                            You don't have any contact message yet
                        </small>
                    </p>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

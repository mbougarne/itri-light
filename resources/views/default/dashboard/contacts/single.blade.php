@extends('default.dashboard.layouts.app')
{{-- Content --}}
@section('content')
{{-- Message --}}

<div class="row">
    <div class="col-12">
        <div class="card-primary">
            <div class="card-header bg-white border-0">
                <h4>
                    <b>Subject:</b>
                    {{ $contact->subject }}
                </h4>
            </div>
            {{-- Message --}}
            <div class="card-body">
                <p>
                    <span class="font-weight-bold text-dark">
                        From:
                    </span>
                    <span>
                        {{ $contact->first_name . ' ' . $contact->last_name }},
                        {{ $contact->email }}
                    </span>
                </p>
                <p>
                    <span class="font-weight-bold text-dark">
                        Sent At:
                    </span>
                    <small class="text-muted">
                        {{ $contact->created_at->toDayDateTimeString() }}
                    </small>
                </p>
                {!! app_parse_markdown($contact->body) !!}
            </div>
        </div>
    </div>
</div>

{{-- Reply --}}
<div class="row">
    <div class="col-12">
        {{-- Create Form --}}
        <form
            action="{{ route('contacts.reply', $contact->id)}}"
            method="POST">
            <h4>Reply</h4>
            {{-- First Name --}}
            <div class="form-group row align-items-center">
                <div class="col-12">
                    <label for="first_name">First Name</label>
                    <input
                        type="text"
                        name="first_name"
                        class="form-control @error('first_name') is-invalid @enderror"
                        id="first_name"
                        value="{{ old('first_name', $contact->first_name) }}"
                        required>
                    @error('first_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Subject --}}
            <div class="form-group row align-items-center">
                <div class="col-12">
                    <label for="subject">Subject</label>
                    <input
                        type="text"
                        name="subject"
                        class="form-control @error('subject') is-invalid @enderror"
                        id="subject"
                        value="{{ old('subject') }}"
                        required>
                    @error('subject')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Message --}}
            <div class="form-group row align-items-center">
                <div class="col-12">
                    <label for="body">Message</label>
                    <textarea
                        name="body"
                        class="form-control @error('subject') is-invalid @enderror"
                        id="body"
                        rows="3"
                        required>{{ old('body') }}</textarea>
                        <small class="text-danger">
                            You can use Markdown
                        </small>
                    @error('body')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                @csrf
                <button class="btn btn-lg btn-primary shadow-sm float-right">
                    Reply <i class="icon-reply"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

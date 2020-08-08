@section('content')

<div class="row d-flex mb-5">
    <div class="col-md-12 mb-4">
        <h2 class="h4 font-weight-bold text-center">
            {{ $page->title }}
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-10 mx-auto">
        <form action="{{ route('contacts.create') }}" method="POST">
            {{-- Name --}}
            <div class="form-group row">
                {{-- First Name --}}
                <div class="col-md-6">
                    <label for="first_name"> First Name </label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        class="form-control @error('first_name') is-invalid @enderror"
                        value="{{ old('first_name') }}"
                        required>
                    @error('first_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Last Name --}}
                <div class="col-md-6">
                    <label for="last_name"> Last Name </label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        value="{{ old('last_name') }}"
                        required>
                    @error('last_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Email --}}
            <div class="form-group row">
                {{-- Email Address --}}
                <div class="col-md-12">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Subject --}}
            <div class="form-group row">
                {{-- Subject --}}
                <div class="col-md-12">
                    <label for="subject">Subject</label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        class="form-control @error('subject') is-invalid @enderror"
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
            <div class="form-group row">
                {{-- Message --}}
                <div class="col-md-12">
                    <label for="body">Message</label>
                    <textarea
                        name="body"
                        id="body"
                        class="form-control @error('body') is-invalid @enderror"
                        rows="4"
                        required>{{ old('Subject') }}</textarea>
                    @error('body')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Send --}}
            <div class="form-group row">
                <div class="col-12">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Send Message
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

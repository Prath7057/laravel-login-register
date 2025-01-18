@extends('layout')
@section('title', 'DashBoard')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <button id="logout" type="button" class="btn btn-outline-primary">
            Log out
        </button>
    </div>
@endsection
@push('script')
    <script>
        document.getElementById('logout').addEventListener('click', function(e) {
            e.preventDefault();

            fetch("{{ route('logout') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.redirect) {
                        window.location.replace(data.redirect);
                    }
                })
                .catch(error => {
                    console.error('Logout failed', error);
                });
        });
    </script>
@endpush

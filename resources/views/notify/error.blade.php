@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.show({
                title: "Error",
                message: "{{ $error }}",
                theme: 'light',
                color: 'red',
                icon: 'icon-cross',
                position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            });
        </script>
    @endforeach
@endif

@if (session()->has('success'))
    <script>
        iziToast.show({
            title: "Success",
            message: "{{ session()->get('success') }}",
            theme: 'light',
            color: 'green',
            icon: 'icon-cross',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
        });
    </script>
@endif

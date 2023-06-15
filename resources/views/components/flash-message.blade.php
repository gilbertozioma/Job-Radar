@if(session()->has('message'))
    <script>
        // Display a success message using SweetAlert
        Swal.fire(
            'Done!', // Title of the alert
            '{{ session('message') }}', // Message content from the session
            'success' // Alert type (success in this case)
        );
    </script>
@endif

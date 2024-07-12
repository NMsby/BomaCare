<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-lg w-full p-8">
            <div class="p-6">
                <h2 class="text-center mb-4 font-semibold text-xl text-gray-800 leading-tight">Payment Form</h2>
                <form action="{{ route('process-payment') }}" method="POST" id="payment-form">
                    @csrf
                    <div class="form-group">
                        <label for="phone" class="font-semibold text-gray-800">Phone Number:</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="font-semibold text-gray-800">Amount:</label>
                        <input type="text" class="form-control" id="amount" name="amount" required>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded btn-block mt-4">
                        Pay
                    </button>
                </form>
                <img src="{{ asset('images/Mpesa Logo.jpg') }}" alt="Mpesa Logo" class="logo mt-4">
            </div>
        </div>
    </div>

    <div id="loading-spinner" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 opacity-50 flex items-center justify-center">
        <i class="fa fa-spinner fa-spin text-white text-4xl"></i>
    </div>

    <script>
        document.getElementById('payment-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Show loading spinner
            document.getElementById('loading-spinner').classList.remove('hidden');

            // Submit the form via AJAX
            let formData = new FormData(this);
            fetch(this.getAttribute('action'), {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "{{ route('success') }}";
                } else {
                    window.location.href = "{{ route('failed') }}";
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Hide loading spinner on error
                document.getElementById('loading-spinner').classList.add('hidden');
                alert('An error occurred. Please try again.');
            });
        });
    </script>
</x-app-layout>

<style>
    .max-w-lg {
        max-width: 36rem; /* Increase the max width */
    }
    .form-control {
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        width: 100%;
        padding: 0.75rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        margin-bottom: 1rem;
    }
    .logo {
        display: block;
        margin: 20px auto 0;
        width: 150px; /* Adjust the width as needed */
        height: auto; /* Keeps the aspect ratio */
    }
</style>

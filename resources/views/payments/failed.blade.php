<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Failed') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-lg w-full p-8">
            <div class="p-6">
                <h2 class="text-center mb-4 font-semibold text-xl text-gray-800 leading-tight">Payment Failed</h2>
                <div id="loading-spinner" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 opacity-50 flex items-center justify-center">
                    <i class="fa fa-spinner fa-spin text-white text-4xl"></i>
                </div>
                <div id="result-container" class="hidden mt-4">
                    <p id="result-description" class="text-center text-red-600 font-semibold"></p>
                    <button id="redirect-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show loading spinner initially
            document.getElementById('loading-spinner').classList.remove('hidden');

            // Simulate waiting for callback response (replace with actual logic)
            setTimeout(function () {
                // Replace with actual callback response handling logic
                let responseData = {
                    "resultCode": "1037",
                    "message": "Timeout in completing transaction",
                    "responseData": {
                        "ResponseCode": "0",
                        "ResponseDescription": "The service request has been accepted successfully",
                        "MerchantRequestID": "53e3-4aa8-9fe0-8fb5e4092cdd3590768",
                        "CheckoutRequestID": "ws_CO_09072024162714311724401027",
                        "ResultCode": "1037",
                        "ResultDesc": "DS timeout user cannot be reached"
                    }
                };

                // Hide loading spinner and show result container
                document.getElementById('loading-spinner').classList.add('hidden');
                document.getElementById('result-container').classList.remove('hidden');

                // Display result description
                document.getElementById('result-description').innerText = responseData.responseData.ResultDesc;

                // Handle redirect to dashboard
                document.getElementById('redirect-button').addEventListener('click', function () {
                    window.location.href = "{{ route('dashboard') }}"; // Replace with your actual dashboard route
                });
            }, 3000); // Simulated delay in milliseconds
        });
    </script>
</x-app-layout>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Ketix</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; background: #f3f4f6; }
    </style>
</head>
<body>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <a href="{{ url()->previous() }}" class="text-[#334EAC] mb-6 inline-block hover:underline">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
        
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-6">
            <div class="p-6 md:p-8 bg-gradient-to-r from-purple-800 to-indigo-900 text-white">
                <h1 class="text-3xl font-bold mb-2">Checkout Tiket</h1>
                <p class="opacity-90">{{ $event->name }} &bull; {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
            </div>
            
            <div class="p-6 md:p-8">
                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-6">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('checkout.store', $event->id) }}" method="POST" id="checkoutForm">
                    @csrf
                    
                    <div class="mb-8">
                        <label class="block text-gray-700 font-bold mb-2 text-lg">Jumlah Tiket</label>
                        <select name="quantity" id="quantity" class="w-full md:w-1/3 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-600 focus:outline-none bg-white">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{ $i }}">{{ $i }} Tiket (Rp {{ number_format($event->price * $i, 0, ',', '.') }})</option>
                            @endfor
                        </select>
                    </div>
                    
                    <div id="formsContainer">
                        <!-- Forms will be generated here by JS -->
                    </div>
                    <!-- Payment Method -->
<div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 mb-8">

    <h3 class="text-xl font-bold text-gray-800 mb-5">
        Metode Pembayaran
    </h3>

    <div class="space-y-4">

        <!-- BCA -->
        <label class="flex items-start p-4 border rounded-xl cursor-pointer hover:border-purple-500 transition">

            <input 
                type="radio" 
                name="payment_method" 
                value="BCA"
                class="mt-1 mr-4"
                checked
            >

            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-university text-blue-600 mr-2"></i>
                    <span class="font-bold text-gray-800">
                        Bank BCA
                    </span>
                </div>

                <p class="text-gray-600">
                    356478634924
                </p>

                <p class="text-sm text-gray-500">
                    a/n Kirana Ayunda
                </p>
            </div>

        </label>

        <!-- Mandiri -->
        <label class="flex items-start p-4 border rounded-xl cursor-pointer hover:border-purple-500 transition">

            <input 
                type="radio" 
                name="payment_method" 
                value="Mandiri"
                class="mt-1 mr-4"
            >

            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-university text-yellow-500 mr-2"></i>
                    <span class="font-bold text-gray-800">
                        Bank Mandiri
                    </span>
                </div>

                <p class="text-gray-600">
                    27893654832
                </p>

                <p class="text-sm text-gray-500">
                    a/n Kirana Ayunda
                </p>
            </div>

        </label>

    </div>

    <div class="mt-5 bg-yellow-50 border border-yellow-200 text-yellow-700 p-4 rounded-xl text-sm">
        <i class="fas fa-circle-info mr-2"></i>
        Setelah transfer, e-ticket akan dikirim ke email yang didaftarkan.
    </div>

</div>
                    <div class="border-t pt-6 mt-8">
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-gray-600 text-lg">Total Pembayaran:</span>
                            <span class="text-2xl font-bold text-purple-700" id="totalPriceDisplay">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                        </div>
                        
                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-4 px-8 rounded-xl transition duration-300 text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fas fa-lock mr-2"></i> Pesan Sekarang & Kirim E-Tiket
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const quantitySelect = document.getElementById('quantity');
        const formsContainer = document.getElementById('formsContainer');
        const basePrice = {{ $event->price }};
        const totalPriceDisplay = document.getElementById('totalPriceDisplay');

        function generateForms() {
            const qty = parseInt(quantitySelect.value);
            formsContainer.innerHTML = '';
            
            for(let i=1; i<=qty; i++) {
                let copyToggleHtml = '';
                if(i > 1) {
                    copyToggleHtml = `
                        <div class="mb-4 bg-purple-50 p-3 rounded-lg border border-purple-100 flex items-center">
                            <input type="checkbox" id="copy_from_1_${i}" class="copy-toggle w-5 h-5 text-purple-600 rounded" data-target="${i}">
                            <label for="copy_from_1_${i}" class="ml-3 text-purple-700 font-medium cursor-pointer">Samakan dengan data pemesan utama (Tiket 1)</label>
                        </div>
                    `;
                }

                const formHtml = `
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 mb-6 ticket-form-block" data-index="${i}">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Identitas Tiket ${i} ${i===1 ? '<span class="text-sm font-normal text-purple-600 bg-purple-100 px-2 py-1 rounded ml-2">Pemesan Utama</span>' : ''}</h3>
                        ${copyToggleHtml}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-600 text-sm font-medium mb-1">Nama Lengkap</label>
                                <input type="text" name="attendee_name[]" id="name_${i}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 outline-none" required>
                            </div>
                            <div>
                                <label class="block text-gray-600 text-sm font-medium mb-1">Nomor KTP</label>
                                <input type="text" name="attendee_ktp[]" id="ktp_${i}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 outline-none" required>
                            </div>
                            <div>
                                <label class="block text-gray-600 text-sm font-medium mb-1">No Telp</label>
                                <input type="text" name="attendee_phone[]" id="phone_${i}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 outline-none" required>
                            </div>
                            <div>
                                <label class="block text-gray-600 text-sm font-medium mb-1">Email (Pengiriman E-Tiket)</label>
                                <input type="email" name="attendee_email[]" id="email_${i}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-600 outline-none" required>
                            </div>
                        </div>
                    </div>
                `;
                formsContainer.insertAdjacentHTML('beforeend', formHtml);
            }

            attachCopyListeners();
        }

        function attachCopyListeners() {
            document.querySelectorAll('.copy-toggle').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const targetIdx = this.getAttribute('data-target');
                    if(this.checked) {
                        document.getElementById(`name_${targetIdx}`).value = document.getElementById('name_1').value;
                        document.getElementById(`ktp_${targetIdx}`).value = document.getElementById('ktp_1').value;
                        document.getElementById(`phone_${targetIdx}`).value = document.getElementById('phone_1').value;
                        document.getElementById(`email_${targetIdx}`).value = document.getElementById('email_1').value;
                    } else {
                        document.getElementById(`name_${targetIdx}`).value = '';
                        document.getElementById(`ktp_${targetIdx}`).value = '';
                        document.getElementById(`phone_${targetIdx}`).value = '';
                        document.getElementById(`email_${targetIdx}`).value = '';
                    }
                });
            });
            
            // If primary details change, update checked copies
            ['name', 'ktp', 'phone', 'email'].forEach(field => {
                const el = document.getElementById(`${field}_1`);
                if(el) {
                    el.addEventListener('input', function() {
                        document.querySelectorAll('.copy-toggle').forEach(checkbox => {
                            if(checkbox.checked) {
                                const targetIdx = checkbox.getAttribute('data-target');
                                document.getElementById(`${field}_${targetIdx}`).value = this.value;
                            }
                        });
                    });
                }
            });
        }

        quantitySelect.addEventListener('change', function() {
            const qty = parseInt(this.value);
            const total = qty * basePrice;
            totalPriceDisplay.innerHTML = 'Rp ' + total.toLocaleString('id-ID');
            generateForms();
        });

        // Init
        generateForms();
    </script>
</body>
</html>

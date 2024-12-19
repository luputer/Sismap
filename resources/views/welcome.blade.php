<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sismap - Sistem Manajemen Persediaan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.1.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: "#4F46E5",
                        secondary: "#10B981",
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200" x-data="{ darkMode: false, menuOpen: false }" :class="{ 'dark': darkMode }">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-2xl font-bold text-primary dark:text-white">Sismap</span>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-8">
                        <a href="#about" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Tentang</a>
                        <a href="#projects" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Tim</a>
                        <a href="#faq" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">FAQ</a>
                        <button @click="darkMode = !darkMode" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-white transition duration-150 ease-in-out">
                            <svg x-show="!darkMode" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="darkMode" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 dark:from-blue-800 dark:to-purple-900 overflow-hidden">
            <div class="max-w-7xl mx-auto py-20 px-4 sm:py-28 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        <div x-data="typewriter()" x-init="start()"
                            class="inline-block overflow-hidden whitespace-nowrap border-r-4 border-blue-700 pr-2">
                            <h1 class="text-5xl font-bold" x-text="text"></h1>
                        </div>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-100 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Mengelola dan mengoptimalkan persediaan barang secara efektif. Temukan perjalanan saya dalam pengembangan sistem.
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <a href="#projects" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                Lihat Tim Saya
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="/admin/login" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                Mulai
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <section id="about" class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Tentang Sismap</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                        Sistem Manajemen Persediaan Barang
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 lg:mx-auto">
                        Sismap adalah sistem manajemen yang dirancang untuk membantu perusahaan dalam mengelola persediaan barang secara efisien, mulai dari pencatatan barang, pengadaan, hingga distribusi.
                    </p>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-16 bg-gray-100 dark:bg-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center mb-12">
                    <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Tim</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                        Tim Pengembang Sismap
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @if($personalBrandData->isEmpty())
                        <p class="text-center col-span-full text-gray-500 dark:text-gray-400">Tidak ada gambar tersedia.</p>
                    @else
                        @foreach($personalBrandData as $data)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl bg-cover">
                                <img class="object-fit-cover" src="{{ asset('storage/' . $data->image) }}" alt="Image"
                                    class="w-full h-48 object-cover object-center" />
                                <div class="p-4">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $data->name }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $data->nim }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $data->alamat }}</p>
                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $data->deskripsi }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center mb-12">
                    <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">FAQ</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                        Pertanyaan yang Sering Diajukan
                    </p>
                </div>
                <div class="mt-12 max-w-lg mx-auto">
                    <div class="space-y-4">
                        <div x-data="{ open: false }" class="border-b border-gray-200">
                            <button @click="open = !open" class="flex justify-between items-center w-full py-4 text-left">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">Layanan apa saja yang Anda tawarkan?</span>
                                <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" class="mt-2 pb-4">
                                <p class="text-gray-600 dark:text-gray-300">Kami menawarkan berbagai layanan pengembangan web, termasuk pengembangan front-end, back-end, pengembangan full-stack, dan desain web.</p>
                            </div>
                        </div>
                        <div x-data="{ open: false }" class="border-b border-gray-200">
                            <button @click="open = !open" class="flex justify-between items-center w-full py-4 text-left">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">Berapa lama waktu yang dibutuhkan untuk menyelesaikan sebuah proyek?</span>
                                <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" class="mt-2 pb-4">
                                <p class="text-gray-600 dark:text-gray-300">Waktu proyek dapat bervariasi tergantung pada ruang lingkup dan kompleksitasnya. Sebuah situs web sederhana mungkin memerlukan waktu 2-4 minggu, sementara aplikasi web yang lebih kompleks bisa memakan waktu 2-3 bulan atau lebih.</p>
                            </div>
                        </div>
                        <div x-data="{ open: false }" class="border-b border-gray-200">
                            <button @click="open = !open" class="flex justify-between items-center w-full py-4 text-left">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">Apakah Anda menawarkan dukungan dan pemeliharaan berkelanjutan?</span>
                                <svg :class="{'rotate-180': open}" class="h-6 w-6 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" class="mt-2 pb-4">
                                <p class="text-gray-600 dark:text-gray-300">Ya, kami menawarkan paket dukungan dan pemeliharaan berkelanjutan untuk memastikan situs web Anda tetap terbarui, aman, dan berfungsi optimal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <p>&copy; 2024 Sismap, All Rights Reserved.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-blue-500 transition duration-150 ease-in-out">Privacy</a>
                    <a href="#" class="text-white hover:text-blue-500 transition duration-150 ease-in-out">Terms</a>
                </div>
            </div>
        </div>
    </footer>
</body>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('theme', () => ({
            darkMode: false,
            toggleTheme() {
                this.darkMode = !this.darkMode;
                localStorage.setItem('darkMode', this.darkMode);
            },
            init() {
                this.darkMode = localStorage.getItem('darkMode') === 'true';
                this.$watch('darkMode', val => localStorage.setItem('darkMode', val))
            }
        }))
    })

function typewriter() {
    return {
        text: '',
        texts: [
            'Sistem Management ',
            'Persedian barang '
        ],
        delay: 100,
        deleteDelay: 100,
        textIndex: 0,
        start() {
            this.type();
        },
        type() {
            let currentIndex = 0;
            const interval = setInterval(() => {
                this.text = this.texts[this.textIndex].slice(0, currentIndex + 1);
                currentIndex++;

                if (currentIndex === this.texts[this.textIndex].length) {
                    clearInterval(interval);
                    setTimeout(() => this.delete(), 2000); // Wait before deleting
                }
            }, this.delay);
        },
        delete() {
            let currentIndex = this.texts[this.textIndex].length;
            const interval = setInterval(() => {
                this.text = this.texts[this.textIndex].slice(0, currentIndex - 1);
                currentIndex--;

                if (currentIndex === 0) {
                    clearInterval(interval);
                    this.textIndex = (this.textIndex + 1) % this.texts.length; // Move to next text
                    setTimeout(() => this.type(), 500); // Wait before typing again
                }
            }, this.deleteDelay);
        }
    }
}

</script>
</html>

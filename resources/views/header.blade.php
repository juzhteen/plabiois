<nav class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between">

            <div class="flex space-x-4 justify-between w-full">
                <div>
                    <a href="/" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                        <img src="{{ asset('img/plabio-logo.png') }}" alt="PLabio logo" width="40px">
                        <span class="font-bold ml-4">Paulino Labio</span>
                    </a>
                </div>

                <div class="desktop-links md:flex items-center">
                    <a href="/" class="py-5 px-3 text-gray-700 hover:text-gray-900">Home</a>
                    <a href="{{ route('login') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Employee login</a>
                </div>

                <style>
                    @media screen and (max-width: 767px){
                        .desktop-links {
                            display: none;
                        }
                    }
                </style>

            </div>

    
            <div class="flex md:hidden items-center">
                <button class="mobile-menu-button">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div class="mobile-menu hidden md:hidden">
        <a href="/" class="block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
        <a href="/login" class="block py-2 px-4 text-sm hover:bg-gray-200">Employee login</a>
    </div>
</nav>

<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>

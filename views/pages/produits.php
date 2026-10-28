    <!-- Hero Section -->
    <section class="relative pt-20 pb-12 overflow-hidden min-h-[70vh] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="<?= e(url('/assets/images/crepes.webp')) ?>" alt="Produits AMORE MIO" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-playfair font-bold text-white mb-6">
                    Nos <span class="text-primary">Délices</span>
                </h1>
                <p class="text-lg text-white/90 mb-8 max-w-2xl mx-auto">
                    Découvrez notre sélection de glaces artisanales, créées avec passion et savoir-faire
                </p>
                <a href="#products" class="inline-block bg-primary text-white px-8 py-4 rounded-full hover:bg-primary-dark transition-all duration-300 transform hover:scale-105 font-semibold">
                    Voir le Menu
                </a>
            </div>
        </div>
    </section>

    <!-- Category Tabs -->
    <section class="bg-white sticky top-16 z-40 border-b border-gray-100">
        <div class="container mx-auto px-4">
            <!-- Mobile: full width with padding for scroll hint | Desktop: centered -->
            <div class="relative -mx-4 px-4 md:mx-0 md:px-0">
                <div class="flex overflow-x-auto no-scrollbar py-4 space-x-3 md:justify-center md:space-x-4 snap-x snap-mandatory">
                    <button class="category-tab active flex flex-col items-center min-w-max snap-center" data-filter="tous">
                    <div class="w-12 h-12 bg-accent rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="grid-3x3" class="w-5 h-5 text-primary"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-700">TOUT</span>
                </button>
                <button class="category-tab flex flex-col items-center min-w-max snap-center" data-filter="pot">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="cup-soda" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500">POT</span>
                </button>
                <button class="category-tab flex flex-col items-center min-w-max snap-center" data-filter="cornets">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="ice-cream-2" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500">CORNET</span>
                </button>
                <button class="category-tab flex flex-col items-center min-w-max snap-center" data-filter="emporter">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="package" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500">EMPORTER</span>
                </button>
                <button class="category-tab flex flex-col items-center min-w-max snap-center" data-filter="milkshakes">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="coffee" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500">MILKSHAKES</span>
                </button>
                <button class="category-tab flex flex-col items-center min-w-max snap-center" data-filter="crepes">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="triangle" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500">CRÊPES</span>
                </button>
                <button class="category-tab flex flex-col items-center min-w-max snap-center" data-filter="douceur">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="candy" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500">DOUCEUR</span>
                </button>
                <button class="category-tab flex flex-col items-center min-w-max snap-center" data-filter="chaudes">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-2">
                        <i data-lucide="coffee" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500">CHAUDES</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-16 bg-pattern-1">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3" id="productsGrid">
                <!-- Products will be loaded dynamically by JavaScript -->
            </div>
            
            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-16">
                <div class="text-gray-500 text-lg">
                    <i data-lucide="search-x" class="w-16 h-16 mx-auto mb-4 text-gray-300"></i>
                    <p class="text-xl font-semibold mb-2">Aucun produit trouvé</p>
                    <p>Essayez une autre catégorie</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Include JavaScript -->
    <script src="<?= e(url('/assets/js/products.js')) ?>"></script>

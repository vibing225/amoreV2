    <!-- Hero Section -->
    <section class="relative pt-20 pb-12 overflow-hidden min-h-screen flex items-center bg-pattern-1">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6 lg:space-y-8 relative z-10 text-center lg:text-left">
                    <!-- Small Badge -->
                    <div class="flex items-center justify-center lg:justify-start space-x-2 animate-fadeIn">
                        <span class="text-xs sm:text-sm font-semibold text-primary tracking-wide uppercase">Amore Mio</span>
                        <div class="w-6 h-6 sm:w-8 sm:h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-sm sm:text-lg"></span>
                        </div>
                    </div>
                    
                    <!-- Main Heading -->
                    <div class="space-y-4 animate-fadeIn animation-delay-300">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 leading-tight font-playfair">
                            Succombez à nos<br>
                            <span class="text-primary">Délices Glacés</span>
                        </h1>
                        <p class="text-base sm:text-lg text-gray-600 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                            AMORE MIO crée des moments de bonheur inoubliables avec des glaces artisanales qui éveillent vos papilles.
                        </p>
                    </div>
                    
                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 animate-fadeIn animation-delay-600 justify-center lg:justify-start">
                        <a href="<?= e(url('/produits')) ?>" class="interactive-button bg-primary text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full hover:bg-primary-dark transition-all duration-300 transform hover:scale-105 font-semibold text-center shadow-lg shadow-green-900/20 text-sm sm:text-base pulse-glow">
                            Voir le Menu
                        </a>
                        <a href="<?= e(url('/contact')) ?>" class="interactive-button bg-white text-primary border-2 border-primary px-6 sm:px-8 py-3 sm:py-4 rounded-full hover:bg-green-50 transition-all duration-300 transform hover:scale-105 font-semibold text-center text-sm sm:text-base zoom-in-hover">
                            Nous Contacter
                        </a>
                    </div>
                </div>
                
                <!-- Right Content - Hero Image -->
                <div class="relative animate-fadeIn animation-delay-600 mt-8 lg:mt-0 order-first lg:order-last">
                    <!-- Mobile/Tablet Image -->
                    <div class="block lg:hidden">
                        <div class="relative z-10 transform hover:scale-105 transition-transform duration-500">
                            <img src="<?= e(url('/assets/images/hero.jpg')) ?>" alt="AMORE MIO Glaces" class="w-full max-w-sm mx-auto rounded-3xl shadow-2xl object-cover zoom-in-hover">
                        </div>
                    </div>
                    
                    <!-- Desktop Image (same as mobile) -->
                    <div class="hidden lg:block">
                        <div class="relative z-10 transform hover:scale-105 transition-transform duration-500">
                            <img src="<?= e(url('/assets/images/hero.jpg')) ?>" alt="AMORE MIO Glaces" class="w-full max-w-lg mx-auto rounded-3xl shadow-2xl object-cover zoom-in-hover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- About Section -->
    <section class="relative py-20 bg-pattern-2 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="fade-in-scroll">
                    <div class="inline-flex items-center bg-green-100 rounded-full px-4 py-2 mb-6">
                        <span class="text-primary font-semibold text-sm uppercase tracking-wide">Notre Histoire</span>
                        <svg class="ml-2 w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-playfair font-bold text-gray-900 mb-6 leading-tight">
                        Plus de 20 ans de
                        <span class="text-primary">Tradition Italienne</span>
                    </h2>
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                        AMORE MIO perpétue la tradition italienne de la glace artisanale. 
                        Chaque jour, nos maîtres glaciers créent des saveurs uniques en utilisant uniquement des 
                        ingrédients naturels et de première qualité.
                    </p>
                    <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                        Notre passion pour l'excellence nous pousse à innover constamment, tout en respectant 
                        les méthodes traditionnelles qui font la renommée de la glace italienne dans le monde entier.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="<?= e(url('/produits')) ?>" class="bg-primary text-white px-6 py-3 rounded-full hover:bg-primary-dark transition-all duration-300 transform hover:scale-105 font-semibold text-center">
                            Découvrir nos Produits
                        </a>
                        <a href="<?= e(url('/devenir-glacier')) ?>" class="bg-white text-primary border-2 border-primary px-6 py-3 rounded-full hover:bg-green-50 transition-all duration-300 transform hover:scale-105 font-semibold text-center">
                            Devenir Franchisé
                        </a>
                    </div>
                </div>
                
                <!-- Right Content - Images -->
                <div class="relative fade-in-scroll">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4 slide-in-left">
                            <img src="<?= e(url('/assets/images/IMG_5362.webp')) ?>" alt="Artisan Glacier" class="rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 zoom-in-hover card-lift">
                            <img src="<?= e(url('/assets/images/crepes.webp')) ?>" alt="Crêpes Artisanales" class="rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 zoom-in-hover card-lift">
                        </div>
                        <div class="space-y-4 mt-8 slide-in-right">
                            <img src="<?= e(url('/assets/images/milshake.webp')) ?>" alt="Milkshakes" class="rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 zoom-in-hover card-lift">
                            <img src="<?= e(url('/assets/images/IMG_5386.webp')) ?>" alt="Cornets de Glace" class="rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 zoom-in-hover card-lift">
                        </div>
                    </div>
                    
                    <!-- Floating Stats -->
                    <div class="absolute -top-4 -right-4 bg-white/90 backdrop-blur-sm rounded-2xl p-4 shadow-xl float-animation pulse-glow">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary text-glow">20+</div>
                            <div class="text-xs text-gray-600">Années d'Expérience</div>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-4 -left-4 bg-white/90 backdrop-blur-sm rounded-2xl p-4 shadow-xl float-animation pulse-glow" style="animation-delay: 1s;">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary text-glow">100%</div>
                            <div class="text-xs text-gray-600">Artisanal</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Background Decorations -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-green-200 rounded-full opacity-30 blur-2xl"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-yellow-200 rounded-full opacity-20 blur-3xl"></div>
    </section>

    <!-- Where to Find Us Section -->
    <section class="relative py-20 bg-pattern-1 overflow-hidden">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16 fade-in-scroll">
                <div class="inline-flex items-center bg-green-100 rounded-full px-4 py-2 mb-6">
                    <span class="text-primary font-semibold text-sm uppercase tracking-wide">Points de Vente</span>
                    <i data-lucide="map-pin" class="ml-2 w-5 h-5 text-primary"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-playfair font-bold text-gray-900 mb-6">
                    Où trouver nos
                    <span class="text-primary">Glaces</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Découvrez nos produits dans les meilleurs établissements de la ville
                </p>
            </div>

            <!-- Category Cards Only -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto">
                <!-- Supermarkets -->
                <div class="group bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 fade-in-scroll text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-primary to-green-600 rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="shopping-cart" class="w-8 h-8 md:w-10 md:h-10 text-white"></i>
                    </div>
                    <h3 class="text-base md:text-lg font-playfair font-bold text-gray-900">Supermarchés</h3>
                </div>

                <!-- Restaurants -->
                <div class="group bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 fade-in-scroll text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="utensils" class="w-8 h-8 md:w-10 md:h-10 text-white"></i>
                    </div>
                    <h3 class="text-base md:text-lg font-playfair font-bold text-gray-900">Restaurants</h3>
                </div>

                <!-- Hotels -->
                <div class="group bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 fade-in-scroll text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="building-2" class="w-8 h-8 md:w-10 md:h-10 text-white"></i>
                    </div>
                    <h3 class="text-base md:text-lg font-playfair font-bold text-gray-900">Hôtels</h3>
                </div>

                <!-- Other Glaciers -->
                <div class="group bg-white p-6 md:p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 fade-in-scroll text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="store" class="w-8 h-8 md:w-10 md:h-10 text-white"></i>
                    </div>
                    <h3 class="text-base md:text-lg font-playfair font-bold text-gray-900">Glaciers Partenaires</h3>
                </div>
            </div>

            <!-- CTA Button to Full Page -->
            <div class="text-center mt-12 fade-in-scroll">
                <a href="<?= e(url('/points-de-vente')) ?>" class="inline-flex items-center bg-primary text-white px-8 py-4 rounded-full hover:bg-primary-dark transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg">
                    <i data-lucide="map" class="w-5 h-5 mr-2"></i>
                    Voir tous les points de vente
                </a>
            </div>
        </div>

        <!-- Background Decorations -->
        <div class="absolute top-20 right-20 w-24 h-24 bg-green-200 rounded-full opacity-20 blur-2xl"></div>
        <div class="absolute bottom-20 left-20 w-32 h-32 bg-orange-200 rounded-full opacity-20 blur-3xl"></div>
    </section>

    <!-- Mission Section -->
    <section class="relative py-20 bg-pattern-2 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content - Image -->
                <div class="relative fade-in-scroll">
                    <div class="relative z-10 transform hover:scale-105 transition-transform duration-500">
                        <img src="<?= e(url('/assets/images/parfunamerana.webp')) ?>" alt="AMORE MIO Artisan" class="w-full max-w-lg mx-auto rounded-3xl shadow-2xl object-cover zoom-in-hover">
                    </div>
                    
                  
                    
                    
                </div>
                
                <!-- Right Content -->
                <div class="fade-in-scroll">
                    <div class="inline-flex items-center bg-green-100 rounded-full px-4 py-2 mb-6">
                        <span class="text-primary font-semibold text-sm uppercase tracking-wide">Notre Mission</span>
                        <svg class="ml-2 w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-playfair font-bold text-gray-900 mb-6 leading-tight">
                        Partager l'Art de la
                        <span class="text-primary">Glace Italienne</span>
                    </h2>
                    
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                        Faire découvrir à chacun le véritable goût de la glace artisanale italienne, 
                        préparée avec amour et expertise par nos maîtres glaciers.
                    </p>
                    
                    <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                        Nous nous engageons à offrir une expérience gustative exceptionnelle, en créant 
                        des moments de bonheur et de partage autour de nos créations glacées.
                    </p>
                    
                    <!-- Features List -->
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center bg-white/50 rounded-2xl p-4 hover:bg-white/80 transition-colors duration-300">
                            <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center mr-4">
                                <i data-lucide="clock" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Production quotidienne pour une fraîcheur optimale</span>
                        </div>
                        
                        <div class="flex items-center bg-white/50 rounded-2xl p-4 hover:bg-white/80 transition-colors duration-300">
                            <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center mr-4">
                                <i data-lucide="sparkles" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Recettes authentiques et innovantes</span>
                        </div>
                        
                        <div class="flex items-center bg-white/50 rounded-2xl p-4 hover:bg-white/80 transition-colors duration-300">
                            <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center mr-4">
                                <i data-lucide="star" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="text-gray-700 font-medium">Engagement envers l'excellence et la satisfaction client</span>
                        </div>
                    </div>
                    
                    <!-- CTA Button -->
                    <a href="<?= e(url('/devenir-glacier')) ?>" class="inline-flex items-center bg-primary text-white px-8 py-4 rounded-full hover:bg-primary-dark transition-all duration-300 transform hover:scale-105 font-semibold shadow-lg shadow-green-900/20">
                        <span>Devenir Franchisé</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Background Decorations -->
        <div class="absolute top-20 left-20 w-32 h-32 bg-green-200 rounded-full opacity-20 blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-orange-200 rounded-full opacity-30 blur-2xl"></div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary">
        <div class="container mx-auto px-6 text-center fade-in-scroll">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold text-white mb-6">Rejoignez l'Aventure AMORE MIO</h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                Découvrez nos opportunités de franchise et devenez glacier artisanal
            </p>
            <a href="<?= e(url('/devenir-glacier')) ?>" class="inline-block bg-white text-gray-900 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                En Savoir Plus
            </a>
        </div>
    </section>

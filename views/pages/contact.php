    <!-- Hero Section -->
    <section class="relative pt-24 pb-20 sm:pt-32 sm:pb-28 overflow-hidden bg-pattern-1">
        <!-- Background with ice cream imagery -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?w=1200&h=600&fit=crop" alt="Contact" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/30 via-transparent to-green-800/40"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 text-center relative z-10">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-playfair font-bold text-white mb-4 sm:mb-6 animate-fadeIn">Contactez-Nous</h1>
                <p class="text-lg sm:text-xl md:text-2xl text-white animate-fadeIn animation-delay-300">Nous sommes à votre écoute</p>
            </div>
        </div>
    </section>

    <!-- Priority Info -->
    <section class="py-16 bg-pattern-2">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center mb-10">
                <h2 class="text-3xl sm:text-4xl font-playfair font-bold text-primary mb-3">Infos Essentielles</h2>
                <p class="text-gray-700">Trouvez d'abord la boutique la plus proche, puis contactez-nous en cas de besoin.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="text-center fade-in-scroll">
                    <div class="w-16 h-16 bg-golden rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Nos Adresses</h3>
                    <p class="text-gray-700">3 points de vente a Conakry</p>
                    <p class="text-gray-500 text-sm mt-1">Consultez les cartes ci-dessous</p>
                </div>
                <div class="text-center fade-in-scroll animation-delay-300">
                    <div class="w-16 h-16 bg-golden rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Horaires</h3>
                    <p class="text-gray-700">Lun - Ven: 9h00 - 19h00</p>
                    <p class="text-gray-500 text-sm mt-1">Sam - Dim: 10h00 - 20h00</p>
                </div>
                <div class="text-center fade-in-scroll animation-delay-600">
                    <div class="w-16 h-16 bg-golden rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Contact Direct</h3>
                    <p class="text-gray-700">+224 XXX XXX XXX</p>
                    <p class="text-gray-500 text-sm mt-1">contact@amoremio.gn</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Locations, Hours & Contact Form -->
    <section class="py-16 bg-pattern-1">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 max-w-7xl mx-auto">
                <!-- Locations & Hours -->
                <div class="space-y-8 slide-up order-1">
                    <!-- Locations -->
                    <div class="bg-white rounded-2xl shadow-2xl p-8">
                        <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-6">Nos Points de Vente</h3>
                        <div class="space-y-4">
                            <?php foreach ($locations as $location): ?>
                                <div class="rounded-xl border border-gray-200 p-4 hover:border-primary/40 transition-colors">
                                    <p class="font-semibold text-gray-900"><?php echo htmlspecialchars($location['name']); ?></p>
                                    <p class="text-gray-700"><?php echo htmlspecialchars($location['address_line_1']); ?></p>
                                    <p class="text-gray-700 mb-3"><?php echo htmlspecialchars($location['address_line_2']); ?></p>
                                    <a
                                        href="<?php echo htmlspecialchars($location['maps_url']); ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors"
                                    >
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                                        Ouvrir dans Google Maps
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Opening Hours -->
                    <div class="bg-white rounded-2xl shadow-2xl p-8">
                        <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-6">Horaires d'Ouverture</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                <span class="font-semibold text-gray-700">Lundi - Vendredi</span>
                                <span class="text-gray-600">9h00 - 19h00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                <span class="font-semibold text-gray-700">Samedi</span>
                                <span class="text-gray-600">10h00 - 20h00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                <span class="font-semibold text-gray-700">Dimanche</span>
                                <span class="text-gray-600">10h00 - 18h00</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="font-semibold text-gray-700">Jours fériés</span>
                                <span class="text-gray-600">11h00 - 17h00</span>
                            </div>
                        </div>
                    </div>

                

                    <!-- Social Media -->
                    <div class="bg-gradient-to-br from-pink-200 to-pink-300 rounded-2xl shadow-2xl p-8 text-center">
                        <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-4">Suivez-nous</h3>
                        <p class="text-gray-800 mb-6">Restez connecté avec AMORE MIO sur les réseaux sociaux</p>
                        <div class="flex justify-center space-x-4">
                            <a href="#" class="w-14 h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-100 transition-all duration-300 transform hover:scale-110">
                                <svg class="w-7 h-7 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-14 h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-100 transition-all duration-300 transform hover:scale-110">
                                <svg class="w-7 h-7 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-14 h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-100 transition-all duration-300 transform hover:scale-110">
                                <svg class="w-7 h-7 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="slide-up order-2">
                    <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12">
                        <h2 class="text-3xl font-playfair font-bold text-primary mb-2">Besoin d'aide ? Ecrivez-nous</h2>
                        <p class="text-gray-600 mb-6">Pour une reservation, un evenement ou une demande speciale.</p>
                        
                        <?php if ($success_message): ?>
                            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                                <div class="flex items-center">
                                    <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                                    <?php echo htmlspecialchars($success_message); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($errors)): ?>
                            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                                <div class="flex items-start">
                                    <i data-lucide="alert-circle" class="w-5 h-5 mr-2 mt-0.5"></i>
                                    <div>
                                        <p class="font-semibold mb-2">Erreurs détectées :</p>
                                        <ul class="list-disc list-inside space-y-1">
                                            <?php foreach ($errors as $error): ?>
                                                <li><?php echo htmlspecialchars($error); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?= e(url('/contact')) ?>" method="POST" class="space-y-6">
                            <div class="form-group">
                                <label class="block text-gray-700 font-semibold mb-2">Nom complet *</label>
                                <input 
                                    type="text" 
                                    name="nom" 
                                    required 
                                    value="<?php echo htmlspecialchars($form_data['nom'] ?? ''); ?>"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg transition-all duration-300 focus:border-primary focus:ring-2 focus:ring-primary/20"
                                    placeholder="Votre nom"
                                >
                            </div>

                            <div class="form-group">
                                <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    required 
                                    value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg transition-all duration-300 focus:border-primary focus:ring-2 focus:ring-primary/20"
                                    placeholder="votre.email@exemple.fr"
                                >
                            </div>

                            <div class="form-group">
                                <label class="block text-gray-700 font-semibold mb-2">Téléphone *</label>
                                <input 
                                    type="tel" 
                                    name="telephone" 
                                    required 
                                    value="<?php echo htmlspecialchars($form_data['telephone'] ?? ''); ?>"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg transition-all duration-300 focus:border-primary focus:ring-2 focus:ring-primary/20"
                                    placeholder="+224 XXX XXX XXX"
                                >
                            </div>

                            <div class="form-group">
                                <label class="block text-gray-700 font-semibold mb-2">Message *</label>
                                <textarea 
                                    name="message" 
                                    required 
                                    rows="6" 
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg transition-all duration-300 focus:border-primary focus:ring-2 focus:ring-primary/20"
                                    placeholder="Votre message..."
                                ><?php echo htmlspecialchars($form_data['message'] ?? ''); ?></textarea>
                            </div>

                            <div class="form-group">
                                <button 
                                    type="submit" 
                                    class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                >
                                    <span class="flex items-center justify-center">
                                        <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                                        Envoyer le Message
                                    </span>
                                </button>
                            </div>
                            <?= csrf_field() ?>
    <?= honeypot_field() ?>
</form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-pattern-2">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-playfair font-bold text-center text-primary mb-12 fade-in-scroll">Questions Fréquentes</h2>
            <div class="max-w-3xl mx-auto space-y-4">
                <div class="bg-gray-50 rounded-lg p-6 hover-lift fade-in-scroll">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Livrez-vous à domicile ?</h3>
                    <p class="text-gray-700">Oui, nous proposons la livraison dans un rayon de 10 km autour de nos glaciers. Commandez via notre site ou par téléphone.</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 hover-lift fade-in-scroll">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Proposez-vous des glaces sans lactose ?</h3>
                    <p class="text-gray-700">Absolument ! Nous avons une gamme complète de sorbets 100% végétaux et des glaces à base de lait végétal.</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 hover-lift fade-in-scroll">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Peut-on commander pour des événements ?</h3>
                    <p class="text-gray-700">Oui, nous réalisons des prestations pour mariages, anniversaires et événements professionnels. Contactez-nous pour un devis personnalisé.</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 hover-lift fade-in-scroll">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Comment utiliser ma carte de fidélité ?</h3>
                    <p class="text-gray-700">Présentez votre carte ou votre numéro de membre à chaque achat. Vos points sont automatiquement crédités et utilisables immédiatement.</p>
                </div>
            </div>
        </div>
    </section>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($metaDescription) ?>">
    <link rel="icon" type="image/jpeg" href="<?= e(url('/assets/images/CONE.jpg')) ?>">
    
    <!-- Preload critical fonts to improve rendering -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Preload Lucide icons -->
    <link rel="preload" as="script" href="https://unpkg.com/lucide@0.525.0/dist/umd/lucide.js">
    
    <!-- Critical inline CSS for above-the-fold content -->
    <style>
        :root {
            --color-primary: #2D5016;
            --color-primary-dark: #99c17a;
            --color-accent: #E8F5E8;
            --color-accent-dark: #90C695;
            --color-bg-soft: #F0F8F0;
            --color-text-primary: #2D5016;
        }
        
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--color-bg-soft); margin: 0; padding: 0; }
        
        /* Navigation critical styles */
        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e5e7eb;
        }
        
        /* Hide elements until JavaScript loads */
        .interactive-button { transition: all 0.3s ease; }
        .interactive-button:hover { transform: scale(1.05); }
        
        /* Skeleton loading for images */
        img { background-color: #f0f0f0; }
        
        /* Mobile first responsive */
        @media (max-width: 768px) {
            #navbar { padding: 0.75rem 1rem; }
        }
    </style>
    
    <!-- Tailwind CSS - Load asynchronously -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Main styles -->
    <link rel="stylesheet" href="<?= e(url('/assets/css/styles.css')) ?>">
    
    <!-- Tailwind configuration (must be after Tailwind link) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'playfair': ['Playfair Display', 'serif'],
                        'poppins': ['Poppins', 'sans-serif']
                    },
                    colors: {
                        'primary': '#ec4899',
                        'secondary': '#f97316',
                        'accent': '#fbbf24',
                        'soft': '#fef7f7',
                        'golden': '#f59e0b'
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-soft">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md border-b border-gray-200 bg-pattern-1">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?= e(url('/')) ?>">
                        <img src="<?= e(url('/assets/images/Logo_Amore_Mio.png')) ?>" alt="AMORE MIO" class="h-12 w-auto">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= e(url('/')) ?>" class="text-gray-700 hover:text-primary transition-colors font-medium <?php echo ($current === '/') ? 'text-primary' : ''; ?>">Accueil</a>
                    <a href="<?= e(url('/produits')) ?>" class="text-gray-700 hover:text-primary transition-colors font-medium <?php echo ($current === '/produits') ? 'text-primary' : ''; ?>">Nos Produits</a>
                    <a href="<?= e(url('/points-de-vente')) ?>" class="text-gray-700 hover:text-primary transition-colors font-medium <?php echo ($current === '/points-de-vente') ? 'text-primary' : ''; ?>">Points de Vente</a>
                    <a href="<?= e(url('/devenir-glacier')) ?>" class="text-gray-700 hover:text-primary transition-colors font-medium <?php echo ($current === '/devenir-glacier') ? 'text-primary' : ''; ?>">Devenir Partenaire</a>
                    <a href="<?= e(url('/fidelite')) ?>" class="text-gray-700 hover:text-primary transition-colors font-medium <?php echo ($current === '/fidelite') ? 'text-primary' : ''; ?>">Fidélité</a>
                    <a href="<?= e(url('/contact')) ?>" class="bg-primary text-white px-6 py-2 rounded-full hover:bg-primary-dark transition-colors font-semibold <?php echo ($current === '/contact') ? 'bg-primary-dark' : ''; ?>">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-700 hover:text-primary hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
                <div class="px-4 py-4 space-y-3">
                    <a href="<?= e(url('/')) ?>" class="block text-gray-700 hover:text-primary transition-colors font-medium py-2 <?php echo ($current === '/') ? 'text-primary' : ''; ?>">Accueil</a>
                    <a href="<?= e(url('/produits')) ?>" class="block text-gray-700 hover:text-primary transition-colors font-medium py-2 <?php echo ($current === '/produits') ? 'text-primary' : ''; ?>">Nos Produits</a>
                    <a href="<?= e(url('/points-de-vente')) ?>" class="block text-gray-700 hover:text-primary transition-colors font-medium py-2 <?php echo ($current === '/points-de-vente') ? 'text-primary' : ''; ?>">Points de Vente</a>
                    <a href="<?= e(url('/devenir-glacier')) ?>" class="block text-gray-700 hover:text-primary transition-colors font-medium py-2 <?php echo ($current === '/devenir-glacier') ? 'text-primary' : ''; ?>">Devenir Partenaire</a>
                    <a href="<?= e(url('/fidelite')) ?>" class="block text-gray-700 hover:text-primary transition-colors font-medium py-2 <?php echo ($current === '/fidelite') ? 'text-primary' : ''; ?>">Fidélité</a>
                    <a href="<?= e(url('/contact')) ?>" class="block bg-primary text-white px-4 py-2 rounded-full text-center font-semibold mt-4 <?php echo ($current === '/contact') ? 'bg-primary-dark' : ''; ?>">Contact</a>
                </div>
            </div>
        </div>
    </nav>

<?= $content ?>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-pink-50 to-purple-50 text-gray-800 py-12 border-t border-pink-100">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-playfair font-bold text-primary mb-4">AMORE MIO</h3>
                    <p class="text-gray-600">L'excellence de la glace artisanale italienne</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="<?= e(url('/')) ?>" class="text-gray-600 hover:text-primary transition-colors">Accueil</a></li>
                        <li><a href="<?= e(url('/produits')) ?>" class="text-gray-600 hover:text-primary transition-colors">Nos Produits</a></li>
                        <li><a href="<?= e(url('/points-de-vente')) ?>" class="text-gray-600 hover:text-primary transition-colors">Points de Vente</a></li>
                        <li><a href="<?= e(url('/devenir-glacier')) ?>" class="text-gray-600 hover:text-primary transition-colors">Devenir Partenaire</a></li>
                        <li><a href="<?= e(url('/fidelite')) ?>" class="text-gray-600 hover:text-primary transition-colors">Carte de Fidélité</a></li>
                        <li><a href="<?= e(url('/contact')) ?>" class="text-gray-600 hover:text-primary transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Contact</h4>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center"><i data-lucide="phone" class="w-4 h-4 mr-2"></i> <?= e($site['phone']) ?></li>
                        <li class="flex items-center"><i data-lucide="mail" class="w-4 h-4 mr-2"></i> <?= e($site['email']) ?></li>
                        <li class="flex items-center"><i data-lucide="map-pin" class="w-4 h-4 mr-2"></i> <?= e($site['address']) ?></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center hover:bg-primary-dark transition-colors">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center hover:bg-primary-dark transition-colors">
                            <i data-lucide="instagram" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center hover:bg-primary-dark transition-colors">
                            <i data-lucide="twitter" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-pink-200 mt-8 pt-8 text-center text-gray-600">
                <p>&copy; 2025 AMORE MIO. Tous droits réservés.</p>
                <p>Conçu <a href="https://saminova.netlify.app" target="_blank" class="text-primary font-semibold">Saminova</a>.</p>
            </div>
        </div>
    </footer>

    <!-- Deferred Scripts -->
    <script>window.APP_BASE = <?= json_encode(rtrim((string) \App\Config::get('base_path', ''), '/')) ?>;</script>
    <script defer src="<?= e(url('/assets/js/script.js')) ?>"></script>
    <script defer src="<?= e(url('/assets/js/products.js')) ?>"></script>
    <script defer src="https://unpkg.com/lucide@0.525.0/dist/umd/lucide.js"></script>

    <script defer>
        // Initialize Lucide icons after DOM ready
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });

        // Setup lazy loading for images using IntersectionObserver
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.01
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-scroll').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>

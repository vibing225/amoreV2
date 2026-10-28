// Products Data - Clean and organized
const BASE = (typeof window !== 'undefined' && window.APP_BASE) ? window.APP_BASE : '';

const products = [
    // POT - Pots
    { id: 1, name: "Pot 1 Boule", price: 15000, category: "pot", image: BASE + "/assets/images/CONE.jpg", description: "Une boule de glace artisanale", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 2, name: "Pot 2 Boules", price: 25000, category: "pot", image: BASE + "/assets/images/IMG_5362.webp", description: "Deux boules de glace artisanale", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 3, name: "Pot 3 Boules", price: 35000, category: "pot", image: BASE + "/assets/images/hero.jpg", description: "Trois boules de glace artisanale", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 4, name: "Moyen Pot", price: 45000, category: "pot", image: BASE + "/assets/images/parfunamerana.webp", description: "Pot moyen jusqu'à 3 saveurs", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 5, name: "Grand Pot", price: 65000, category: "pot", image: BASE + "/assets/images/parfunamerana.webp", description: "Grand pot jusqu'à 4 saveurs", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 6, name: "Pot Géant", price: 80000, category: "pot", image: BASE + "/assets/images/parfunamerana.webp", description: "Pot géant jusqu'à 5 saveurs", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },

    // CORNETS - Cones
    { id: 7, name: "Cornet 1 Boule", price: 10000, category: "cornets", image: BASE + "/assets/images/CONE.jpg", description: "Cornet avec une boule de glace", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 8, name: "Cornet 2 Boules", price: 15000, category: "cornets", image: BASE + "/assets/images/IMG_5362.webp", description: "Cornet avec deux boules de glace", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 9, name: "Cornet Simple", price: 30000, category: "cornets", image: BASE + "/assets/images/CONE.jpg", description: "Cornet simple artisanal", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },
    { id: 10, name: "Cornet Double", price: 40000, category: "cornets", image: BASE + "/assets/images/CONE.jpg", description: "Cornet double portion", flavors: ["Vanille", "Chocolat", "Fraise", "Pistache", "Mangue", "Caramel", "Oreo", "Ashta"] },

    // MILKSHAKES - Milkshakes
    { id: 11, name: "Milkshake Classic", price: 45000, category: "milkshakes", image: BASE + "/assets/images/milshake.webp", description: "Milkshake onctueux aux saveurs classiques", flavors: ["Vanille", "Chocolat", "Fraise"] },
    { id: 12, name: "Milkshake Premium", price: 50000, category: "milkshakes", image: BASE + "/assets/images/milshake.webp", description: "Milkshake gourmet aux saveurs premium", flavors: ["Oreo", "Caramel"] },
    { id: 13, name: "Smoothie", price: 20000, category: "milkshakes", image: BASE + "/assets/images/hero.jpg", description: "Smoothie aux fruits frais" },

    // CRÊPES - Crepes
    { id: 14, name: "Crêpe Nature", price: 30000, category: "crepes", image: BASE + "/assets/images/crepes.webp", description: "Crêpe traditionnelle nature" },
    { id: 15, name: "Crêpe Nutella", price: 40000, category: "crepes", image: BASE + "/assets/images/crepes.webp", description: "Crêpe avec pâte à tartiner" },
    { id: 16, name: "Crêpe Sucre", price: 30000, category: "crepes", image: BASE + "/assets/images/crepes.webp", description: "Crêpe au sucre classique" },
    { id: 17, name: "Crêpe Amore Mio", price: 55000, category: "crepes", image: BASE + "/assets/images/crepes.webp", description: "Crêpe spéciale de la maison" },
    { id: 18, name: "Crêpe Nutella Banane", price: 55000, category: "crepes", image: BASE + "/assets/images/crepes.webp", description: "Crêpe Nutella avec banane fraîche" },
    { id: 19, name: "Crêpe Nutella Banane Glacée", price: 60000, category: "crepes", image: BASE + "/assets/images/crepes.webp", description: "Crêpe avec glace et banane fraîche" },

    // DOUCEUR - Sweets
    { id: 20, name: "Churros (3)", price: 30000, category: "douceur", image: BASE + "/assets/images/churros.avif", description: "3 churros croustillants" },
    { id: 21, name: "Churros (6)", price: 55000, category: "douceur", image: BASE + "/assets/images/churros.avif", description: "6 churros avec sucre" },
    { id: 22, name: "Churros (9)", price: 80000, category: "douceur", image: BASE + "/assets/images/churros.avif", description: "9 churros pour partager" },
    { id: 23, name: "Barbe à Papa", price: 20000, category: "douceur", image: BASE + "/assets/images/IMG_5386.webp", description: "Barbe à papa colorée" },
    { id: 24, name: "Verrine", price: 35000, category: "douceur", image: BASE + "/assets/images/crepes.webp", description: "Verrine gourmande" },

    // CHAUDES - Hot Drinks
    { id: 25, name: "Café", price: 25000, category: "chaudes", image: BASE + "/assets/images/cafe.webp", description: "Café expresso italien" },
    { id: 26, name: "Cappuccino", price: 35000, category: "chaudes", image: BASE + "/assets/images/cappu.webp", description: "Cappuccino crémeux" },
    { id: 27, name: "Chocolat Chaud", price: 35000, category: "chaudes", image: BASE + "/assets/images/hotc.webp", description: "Chocolat chaud onctueux" },
    { id: 28, name: "Thé Lipton", price: 20000, category: "chaudes", image: BASE + "/assets/images/parfuncitron.webp", description: "Thé Lipton classique" },
    { id: 29, name: "Thé Premium", price: 35000, category: "chaudes", image: BASE + "/assets/images/CONE.jpg", description: "Thé Kusmi, Damman ou Mariage Frères" },
    { id: 30, name: "Afogato", price: 45000, category: "chaudes", image: BASE + "/assets/images/parfuncitron.webp", description: "Café expresso sur glace vanille" },

    // EMPORTER - Take Away
    { id: 31, name: "Barquette 500ml", price: 120000, category: "emporter", image: BASE + "/assets/images/CONE.jpg", description: "Barquette 500ml à emporter" },
    { id: 32, name: "Barquette 1L", price: 185000, category: "emporter", image: BASE + "/assets/images/CONE.jpg", description: "Barquette 1L familiale" }
];

let currentProducts = [...products];
let currentFilter = 'tous';

// Format price function
function formatPrice(price) {
    return price.toLocaleString('fr-FR');
}

// Get flavor color function
function getFlavorColor(flavor) {
    const colors = {
        'Vanille': 'bg-yellow-100 text-yellow-800 border-yellow-200',
        'Chocolat': 'bg-amber-100 text-amber-800 border-amber-200',
        'Fraise': 'bg-pink-100 text-pink-800 border-pink-200',
        'Pistache': 'bg-green-100 text-green-800 border-green-200',
        'Mangue': 'bg-orange-100 text-orange-800 border-orange-200',
        'Caramel': 'bg-yellow-100 text-yellow-800 border-yellow-200',
        'Oreo': 'bg-gray-100 text-gray-800 border-gray-200',
        'Ashta': 'bg-blue-50 text-blue-800 border-blue-200',
        'Citron': 'bg-yellow-100 text-yellow-800 border-yellow-200',
        'Menthe': 'bg-green-100 text-green-800 border-green-200'
    };
    return colors[flavor] || 'bg-gray-100 text-gray-700 border-gray-200';
}

// Initialize products display
function displayProducts(productsToShow) {
    const grid = document.getElementById('productsGrid');
    const noResults = document.getElementById('noResults');
    
    if (productsToShow.length === 0) {
        grid.innerHTML = '';
        noResults.classList.remove('hidden');
        return;
    }
    
    noResults.classList.add('hidden');
    
    grid.innerHTML = productsToShow.map(product => `
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
            <div class="relative">
                <img src="${product.image}" alt="${product.name}" class="w-full h-32 sm:h-36 object-cover" loading="lazy">
                <div class="absolute top-2 right-2 bg-primary text-white px-2 py-1 rounded-full text-xs font-semibold">
                    ${formatPrice(product.price)} GF
                </div>
            </div>
            <div class="p-2 sm:p-3">
                <h3 class="text-xs sm:text-sm font-playfair font-bold text-gray-900 mb-1">${product.name}</h3>
                ${product.description ? `<p class="text-gray-600 text-xs mb-2 hidden sm:block">${product.description}</p>` : ''}
                ${product.flavors ? `
                    <div class="mb-2">
                        <p class="text-xs text-gray-500 mb-1">Parfums :</p>
                        <div class="flex flex-wrap gap-1">
                            ${product.flavors.slice(0, 5).map(flavor => `
                                <span class="inline-block text-xs px-1.5 py-0.5 rounded-full border ${getFlavorColor(flavor)}">${flavor}</span>
                            `).join('')}
                            ${product.flavors.length > 5 ? `<span class="text-xs text-gray-500">+${product.flavors.length - 5}</span>` : ''}
                        </div>
                    </div>
                ` : ''}
                <div class="flex justify-between items-center">
                    <span class="text-sm sm:text-lg font-bold text-primary">${formatPrice(product.price)} GF</span>
                </div>
            </div>
        </div>
    `).join('');
    
    // Initialize Lucide icons for dynamically added content
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
}

function getCategoryLabel(category) {
    const labels = {
        'classiques': 'Classique',
        'fruits': 'Fruit',
        'premium': 'Premium',
        'sorbets': 'Sorbet'
    };
    return labels[category] || category;
}

// Category tab functionality
document.querySelectorAll('.category-tab[data-filter]').forEach(btn => {
    btn.addEventListener('click', function() {
        // Update active state
        document.querySelectorAll('.category-tab[data-filter]').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        currentFilter = this.dataset.filter;
        filterProducts();
    });
});

function filterProducts() {
    currentProducts = products.filter(product => {
        const matchesCategory = currentFilter === 'tous' || product.category === currentFilter;
        return matchesCategory;
    });
    
    displayProducts(currentProducts);
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    displayProducts(products);
    
    // Category tab functionality
    document.querySelectorAll('.category-tab[data-filter]').forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active state
            document.querySelectorAll('.category-tab[data-filter]').forEach(b => {
                b.classList.remove('active');
                const icon = b.querySelector('.w-12');
                const text = b.querySelector('span');
                icon.classList.remove('bg-accent');
                icon.classList.add('bg-gray-100');
                icon.querySelector('i').classList.remove('text-primary');
                icon.querySelector('i').classList.add('text-gray-400');
                text.classList.remove('text-gray-700');
                text.classList.add('text-gray-500');
            });
            
            this.classList.add('active');
            const icon = this.querySelector('.w-12');
            const text = this.querySelector('span');
            icon.classList.add('bg-accent');
            icon.classList.remove('bg-gray-100');
            icon.querySelector('i').classList.add('text-primary');
            icon.querySelector('i').classList.remove('text-gray-400');
            text.classList.add('text-gray-700');
            text.classList.remove('text-gray-500');
            
            currentFilter = this.dataset.filter;
            filterProducts();
        });
    });
});

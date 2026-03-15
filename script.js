document.addEventListener('DOMContentLoaded', () => {
    
    // 1. GESTION DU PORTFOLIO (Filtres)
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(button => button.classList.remove('active'));
            btn.classList.add('active');
            
            const filterValue = btn.getAttribute('data-filter');

            galleryItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                if (filterValue === 'tous' || itemCategory === filterValue) {
                    item.classList.remove('hide');
                    // On force l'animation d'apparition
                    item.classList.remove('visible');
                    setTimeout(() => item.classList.add('visible'), 50);
                } else {
                    item.classList.add('hide');
                    item.classList.remove('visible');
                }
            });
        });
    });

    // 2. GESTION DU MENU MOBILE (Hamburger)
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    document.querySelectorAll('.nav-menu li a').forEach(lien => {
        lien.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // 3. MISE EN SURBRILLANCE DU MENU AU DÉFILEMENT (Scroll Spy)
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-menu li a');

    // Ajout d'une gestion plus fine du Scroll Spy pour éviter les clignotements
    let optionsSpy = {
        root: null,
        rootMargin: '-100px 0px -50% 0px', // Se déclenche quand la section occupe 50% de l'écran
        threshold: 0
    };

    const observerSpy = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                navLinks.forEach((link) => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').includes(id)) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, optionsSpy);

    sections.forEach((section) => {
        observerSpy.observe(section);
    });


    // 4. ANIMATIONS AU DÉFILEMENT (Nouveau !)
    // On utilise IntersectionObserver pour détecter l'apparition des éléments à l'écran
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15 // Se déclenche quand 15% de l'élément est visible
    };

    const observerAnimations = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // On ajoute la classe 'visible' qui déclenche l'animation CSS
                entry.target.classList.add('visible');
                // L'animation ne se joue qu'une fois
                observerAnimations.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // On applique l'observateur à tous les éléments que l'on veut animer
    // Ils doivent avoir la classe 'fade-in' dans le HTML
    document.querySelectorAll('.fade-in').forEach((element) => {
        observerAnimations.observe(element);
    });
});

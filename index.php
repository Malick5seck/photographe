<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographe Pro | Capturer vos moments</title>
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>

    <header id="header">
        <div class="logo">PHOTO.PRO</div>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <nav>
            <ul class="nav-menu">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#reservation">Réservation</a></li>
                <li><a href="#a-propos">À propos</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="accueil" class="hero">
        <div class="hero-content fade-in">
            <h1>Capturer vos moments les plus précieux</h1>
            <p>Photographie de mariage, portrait et événementiel.</p>
            <a href="#reservation" class="btn-gold">Réserver une séance</a>
        </div>
    </section>

    <section id="portfolio" class="portfolio-section">
        <h2 class="fade-in">Mon Portfolio</h2>
        <p class="portfolio-desc fade-in">Découvrez une sélection de mes meilleurs clichés.</p>
        
        <div class="filters fade-in">
            <button class="filter-btn active" data-filter="tous">Tous</button>
            <button class="filter-btn" data-filter="mariage">Mariage</button>
            <button class="filter-btn" data-filter="portrait">Portrait</button>
            <button class="filter-btn" data-filter="evenement">Événement</button>
        </div>
        
        <div class="gallery">
            <div class="gallery-item fade-in" data-category="mariage">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80" alt="Mariage">
            </div>
            <div class="gallery-item fade-in" data-category="portrait">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80" alt="Portrait">
            </div>
            <div class="gallery-item fade-in" data-category="evenement">
                <img src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?auto=format&fit=crop&w=800&q=80" alt="Événement">
            </div>
            </div>
    </section>

    <section id="services" class="services-section">
        <h2 class="fade-in">Mes Services & Tarifs</h2>
        <p class="services-desc fade-in">Des prestations sur-mesure pour immortaliser vos plus beaux instants.</p>
        
        <div class="pricing-cards">
            <div class="card fade-in" style="transition-delay: 0.1s;">
                <h3>Pack Portrait</h3>
                <p class="price">À partir de 150€</p>
                <ul>
                    <li>Séance d'1h en extérieur ou studio</li>
                    <li>15 photos retouchées en HD</li>
                    <li>Galerie en ligne privée</li>
                </ul>
                <a href="#reservation" class="btn-gold">Réserver</a>
            </div>

            <div class="card featured fade-in" style="transition-delay: 0.2s;">
                <div class="badge">Populaire</div>
                <h3>Pack Mariage</h3>
                <p class="price">À partir de 1200€</p>
                <ul>
                    <li>Couverture des préparatifs à la soirée</li>
                    <li>Minimum 400 photos retouchées</li>
                    <li>Coffret bois & Tirages</li>
                </ul>
                <a href="#reservation" class="btn-gold">Réserver</a>
            </div>

            <div class="card fade-in" style="transition-delay: 0.3s;">
                <h3>Pack Événement</h3>
                <p class="price">Sur devis</p>
                <ul>
                    <li>Anniversaires, baptêmes, soirées</li>
                    <li>Livrables rapides (sous 72h)</li>
                    <li>Droits d'utilisation inclus</li>
                </ul>
                <a href="#contact" class="btn-gold">Demander un devis</a>
            </div>
        </div>
    </section>

    <section id="reservation" class="reservation-section">
        <h2 class="fade-in">Réserver une séance</h2>
        <p class="fade-in">Remplissez le formulaire ci-dessous pour vérifier mes disponibilités.</p>
        
        <form action="traitement_reservation.php" method="POST" class="booking-form fade-in">
            <div class="input-group">
                <input type="text" name="nom" placeholder="Votre Nom complet" required>
                <input type="email" name="email" placeholder="Votre Email" required>
            </div>
            <div class="input-group">
                <input type="tel" name="telephone" placeholder="Votre Téléphone" required>
                <select name="type_seance" required>
                    <option value="" disabled selected>Type de séance</option>
                    <option value="Mariage">Mariage</option>
                    <option value="Portrait">Portrait</option>
                    <option value="Événement">Événement</option>
                    <option value="Famille">Famille</option>
                    <option value="Pro">Shooting professionnel</option>
                </select>
            </div>
            <div class="input-group">
                <input type="date" name="date_souhaitee" required>
                <input type="text" name="lieu" placeholder="Lieu souhaité" required>
            </div>
            <textarea name="message" rows="5" placeholder="Parlez-moi de votre projet..."></textarea>
            <button type="submit" class="btn-gold">Envoyer la réservation</button>
        </form>
    </section>

    <section id="a-propos" class="about-section">
        <div class="about-container">
            <div class="about-image fade-in">
                <img src="https://images.unsplash.com/photo-1554046920-90dc20696352?auto=format&fit=crop&w=800&q=80" alt="Portrait du photographe">
            </div>
            <div class="about-content fade-in">
                <h2>À propos de moi</h2>
                <h3 class="subtitle">Artiste de la lumière & conteur d'histoires</h3>
                <p>Passionné par la photographie depuis plus de 10 ans, mon approche se veut naturelle, spontanée et artistique. Mon but n'est pas seulement de prendre des photos, mais de capturer l'essence de vos émotions.</p>
                <p>Que ce soit pour le plus beau jour de votre vie, un portrait intimiste ou un événement d'entreprise, j'utilise la lumière pour sublimer chaque instant avec un style visuel à la fois moderne et intemporel.</p>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <h2 class="fade-in">Contact & Accès</h2>
        <p class="contact-desc fade-in">Une question ou un projet spécifique ? Discutons-en !</p>
        
        <div class="contact-container fade-in">
            <div class="contact-info">
                <div class="info-item">
                    <h4><i class="fa-solid fa-location-dot" style="color: var(--gold);"></i> Adresse</h4>
                    <p>Thiès, Sénégal</p>
                </div>
                <div class="info-item">
                    <h4><i class="fa-solid fa-envelope" style="color: var(--gold);"></i> Email</h4>
                    <p><a href="mailto:contact@tonsite.com">contact@tonsite.com</a></p>
                </div>
                <div class="info-item">
                    <h4><i class="fa-solid fa-phone" style="color: var(--gold);"></i> Téléphone</h4>
                    <p><a href="tel:+221700000000">+221 70 000 00 00</a></p>
                </div>
                <div class="info-item">
                    <h4>Réseaux Sociaux</h4>
                    <div class="social-links">
                        <a href="https://wa.me/221700000000" target="_blank" class="btn-social btn-whatsapp">
                            <i class="fa-brands fa-whatsapp"></i> WhatsApp
                        </a>
                        <a href="https://instagram.com" target="_blank" class="btn-social btn-instagram">
                            <i class="fa-brands fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="contact-map">
                <iframe src="https://maps.google.com/maps?q=Thi%C3%A8s,%20Senegal&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 PHOTO.PRO - Tous droits réservés.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
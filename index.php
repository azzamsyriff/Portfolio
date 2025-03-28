<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azzam | Frontend Developer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: rgba(255, 255, 255, 0.1);
            --secondary-color: #1e1e1e;
            --text-color: #f8f9fa;
            --text-muted: rgba(248, 249, 250, 0.7);
            --accent-color: #7b4dff;
            --accent-light: #9a7dff;
            --accent-dark: #5a30e5;
            --transition: 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --section-spacing: 6rem;
            --navbar-height: 70px;
            --glass-blur: blur(12px);
            --glass-border: 1px solid rgba(255, 255, 255, 0.1);
            --shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            --card-bg: rgba(30, 30, 30, 0.6);
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: #121212;
            color: var(--text-color);
            transition: var(--transition);
            line-height: 1.6;
            overflow-x: hidden;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--secondary-color);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 4px;
            transition: var(--transition);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-light);
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        p {
            color: var(--text-muted);
            font-size: 1.05rem;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        /* Base Styles */
        .container {
            width: 100%;
            max-width: 1200px;
            padding: 0 1.5rem;
            margin: 0 auto;
        }

        section {
            padding: var(--section-spacing) 0;
            position: relative;
        }

        .section-title {
            font-size: clamp(2rem, 5vw, 2.8rem);
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
            color: var(--text-color);
        }
        .section-title::after {
            content: '';
            position: absolute;
            width: 60%;
            height: 4px;
            bottom: -12px;
            left: 0;
            background: linear-gradient(90deg, var(--accent-color), var(--accent-light));
            border-radius: 2px;
            transform-origin: left;
            transform: scaleX(0);
            transition: transform 0.8s ease;
        }
        .section-title.in-view::after {
            transform: scaleX(1);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.9rem 1.8rem;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
            border: none;
            font-size: 1rem;
            white-space: nowrap;
        }
        .btn-primary {
            background: var(--accent-color);
            color: white;
            box-shadow: 0 4px 20px rgba(123, 77, 255, 0.3);
        }
        .btn-primary:hover {
            background: var(--accent-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(123, 77, 255, 0.4);
        }
        .btn-secondary {
            background: transparent;
            color: var(--accent-light);
            border: 2px solid var(--accent-color);
        }
        .btn-secondary:hover {
            background: rgba(123, 77, 255, 0.1);
            transform: translateY(-3px);
        }
        .btn-ghost {
            background: transparent;
            color: var(--text-color);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        .btn-ghost:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-3px);
        }

        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #121212;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        .preloader.hidden {
            opacity: 0;
            pointer-events: none;
        }
        .preloader-logo {
            font-family: "Space Grotesk", sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--accent-color), var(--accent-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 2rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards 0.3s;
        }
        .preloader-bar {
            width: 200px;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }
        .preloader-progress {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, var(--accent-color), var(--accent-light));
            transition: width 1.5s ease;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: var(--navbar-height);
            padding: 0 1.5rem;
            background: rgba(18, 18, 18, 0.9);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: var(--glass-border);
            transition: var(--transition);
        }
        .navbar.scrolled {
            height: 65px;
            background: rgba(18, 18, 18, 0.95);
            box-shadow: var(--shadow);
        }
        .logo {
            font-family: "Space Grotesk", sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--accent-color), var(--accent-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            z-index: 1;
        }
        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
        }
        .nav-links a {
            color: var(--text-muted);
            padding: 0.5rem 0;
            font-weight: 500;
            position: relative;
            transition: var(--transition);
            font-size: 1rem;
        }
        .nav-links a:hover,
        .nav-links a.active {
            color: var(--text-color);
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: var(--accent-color);
            transition: var(--transition);
        }
        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }
        .hamburger {
            display: none;
            cursor: pointer;
            z-index: 1001;
            width: 28px;
            height: 20px;
            position: relative;
            background: transparent;
            border: none;
        }
        .hamburger span {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: var(--text-color);
            border-radius: 2px;
            opacity: 1;
            left: 0;
            transform: rotate(0deg);
            transition: .25s ease-in-out;
        }
        .hamburger span:nth-child(1) {
            top: 0;
        }
        .hamburger span:nth-child(2) {
            top: 9px;
        }
        .hamburger span:nth-child(3) {
            top: 18px;
        }
        .hamburger.active span:nth-child(1) {
            top: 9px;
            transform: rotate(45deg);
        }
        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }
        .hamburger.active span:nth-child(3) {
            top: 9px;
            transform: rotate(-45deg);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: var(--navbar-height);
            position: relative;
            overflow: hidden;
        }
        .hero-content {
            max-width: 800px;
            text-align: center;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            padding: 2rem 0;
        }
        .hero h1 {
            font-size: clamp(2.2rem, 6vw, 3.5rem);
            margin-bottom: 1.5rem;
            line-height: 1.1;
            color: var(--text-color);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards 0.3s;
        }
        .hero p {
            font-size: clamp(1rem, 3vw, 1.25rem);
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards 0.6s;
        }
        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards 0.9s;
        }
        .hero-scroll {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--text-color);
            text-decoration: none;
            opacity: 0;
            animation: fadeIn 1s ease forwards 1.2s;
        }
        .hero-scroll span {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            opacity: 0.7;
        }
        .mouse {
            width: 24px;
            height: 36px;
            border: 2px solid var(--text-color);
            border-radius: 12px;
            position: relative;
            margin-bottom: 0.5rem;
        }
        .mouse::before {
            content: '';
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 8px;
            background: var(--text-color);
            border-radius: 2px;
            animation: scrollAnimation 2s infinite;
            opacity: 0.7;
        }
        @keyframes scrollAnimation {
            0% { top: 6px; opacity: 0.7; }
            50% { top: 12px; opacity: 0.3; }
            100% { top: 6px; opacity: 0.7; }
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
            align-items: center;
        }
        .about-image {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            max-width: 500px;
            margin: 0 auto;
        }
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: var(--transition);
        }
        .about-image:hover img {
            transform: scale(1.03);
        }
        .about-text h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--accent-light);
        }
        .about-text p {
            margin-bottom: 1.5rem;
        }
        .tech-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-bottom: 2rem;
        }
        .tech-stack span {
            background: rgba(123, 77, 255, 0.15);
            color: var(--accent-light);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: var(--transition);
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        .stat-item {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem 1rem;
            text-align: center;
            border: var(--glass-border);
            transition: var(--transition);
        }
        .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(123, 77, 255, 0.1);
        }
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent-light);
            margin-bottom: 0.3rem;
        }
        .stat-label {
            font-size: 0.85rem;
            opacity: 0.8;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(350px, 100%), 1fr));
            gap: 1.5rem;
        }
        .project-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            border: var(--glass-border);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
            border-color: rgba(123, 77, 255, 0.2);
        }
        .project-image {
            width: 100%;
            height: 180px;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        .project-card:hover .project-image img {
            transform: scale(1.05);
        }
        .project-card h3 {
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }
        .project-card p {
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }
        .project-links {
            display: flex;
            gap: 0.8rem;
        }

        /* Testimonials Section */
        .testimonials-slider {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
        }
        .testimonials-track {
            display: flex;
            transition: transform 0.5s ease;
        }
        .testimonial-card {
            min-width: 100%;
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2rem;
            border: var(--glass-border);
            transition: var(--transition);
        }
        .testimonial-content {
            font-size: 1.05rem;
            font-style: italic;
            margin-bottom: 1.5rem;
            position: relative;
            color: var(--text-muted);
        }
        .testimonial-content::before,
        .testimonial-content::after {
            content: '"';
            font-size: 3rem;
            color: var(--accent-color);
            opacity: 0.2;
            position: absolute;
            line-height: 1;
        }
        .testimonial-content::before {
            top: -15px;
            left: -10px;
        }
        .testimonial-content::after {
            bottom: -35px;
            right: -10px;
        }
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--accent-color);
        }
        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .author-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
        }
        .author-info p {
            font-size: 0.85rem;
            opacity: 0.7;
        }
        .slider-nav {
            display: flex;
            justify-content: center;
            gap: 0.8rem;
            margin-top: 2rem;
        }
        .slider-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transition: var(--transition);
        }
        .slider-dot.active {
            background: var(--accent-color);
            transform: scale(1);
        }

        /* Contact Section */
        .contact-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
        }
        .contact-info {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2rem;
            border: var(--glass-border);
            transition: var(--transition);
        }
        .contact-info h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--accent-light);
        }
        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }
        .contact-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(123, 77, 255, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.1rem;
            color: var(--accent-light);
            flex-shrink: 0;
        }
        .contact-text h4 {
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }
        .contact-text a, .contact-text p {
            font-size: 0.95rem;
            opacity: 0.8;
        }
        .contact-form {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2rem;
            border: var(--glass-border);
            transition: var(--transition);
        }
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        .form-group label {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0 0.5rem;
            background: var(--card-bg);
            transition: var(--transition);
            opacity: 0.8;
            pointer-events: none;
            font-size: 0.95rem;
        }
        input, textarea {
            width: 100%;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            color: var(--text-color);
            transition: var(--transition);
            font-size: 1rem;
        }
        input:focus, textarea:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 2px rgba(123, 77, 255, 0.2);
            outline: none;
            background: rgba(123, 77, 255, 0.05);
        }
        input:focus + label,
        textarea:focus + label,
        input:not(:placeholder-shown) + label,
        textarea:not(:placeholder-shown) + label {
            top: -0.6rem;
            left: 1rem;
            font-size: 0.8rem;
            opacity: 1;
            color: var(--accent-light);
        }
        textarea {
            min-height: 150px;
            resize: vertical;
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--accent-color);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 1rem;
            transform: translateX(150%);
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: 1000;
            max-width: min(350px, 90vw);
        }
        .notification.show {
            transform: translateX(0);
        }
        .notification-icon {
            font-size: 1.5rem;
        }
        .notification-content h4 {
            margin: 0 0 0.3rem 0;
            font-size: 1.1rem;
        }
        .notification-content p {
            margin: 0;
            opacity: 0.9;
            font-size: 0.9rem;
            color: white;
        }
        .close-notification {
            position: absolute;
            top: 8px;
            right: 8px;
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            opacity: 0.7;
            transition: var(--transition);
            font-size: 0.9rem;
        }
        .close-notification:hover {
            opacity: 1;
        }

        /* Footer */
        footer {
            padding: 4rem 0 2rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.2);
            border-top: var(--glass-border);
        }
        .footer-content {
            max-width: 600px;
            margin: 0 auto;
        }
        .logo-footer {
            font-family: "Space Grotesk", sans-serif;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--accent-color), var(--accent-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
            display: inline-block;
        }
        .footer-text {
            opacity: 0.8;
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.7;
        }
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .social-links a {
            color: var(--text-color);
            font-size: 1.3rem;
            opacity: 0.7;
            transition: var(--transition);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .social-links a:hover {
            opacity: 1;
            color: var(--accent-light);
            transform: translateY(-3px);
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        .footer-links a {
            color: var(--text-muted);
            transition: var(--transition);
            font-size: 0.95rem;
        }
        .footer-links a:hover {
            color: var(--accent-light);
        }
        .copyright {
            opacity: 0.6;
            font-size: 0.85rem;
            margin-top: 2rem;
        }

        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            background: var(--card-bg);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            transition: var(--transition);
            border: var(--glass-border);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: var(--shadow);
            z-index: 100;
            font-size: 1.2rem;
        }
        .theme-toggle:hover {
            transform: scale(1.1);
            background: var(--accent-color);
            color: white;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 5.5rem;
            right: 1.5rem;
            width: 45px;
            height: 45px;
            background: var(--card-bg);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
            opacity: 0;
            visibility: hidden;
            z-index: 99;
            border: var(--glass-border);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            box-shadow: var(--shadow);
        }
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        .back-to-top:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Light Mode */
        body.light-mode {
            background: #f8f9fa;
            --text-color: #2d2d2d;
            --text-muted: rgba(45, 45, 45, 0.7);
            --primary-color: rgba(255, 255, 255, 0.7);
            --secondary-color: #ffffff;
            --card-bg: rgba(255, 255, 255, 0.7);
            --glass-border: 1px solid rgba(0, 0, 0, 0.05);
        }
        body.light-mode .navbar {
            background: rgba(248, 249, 250, 0.9);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        body.light-mode .project-card,
        body.light-mode .testimonial-card,
        body.light-mode .contact-info,
        body.light-mode .contact-form,
        body.light-mode .stat-item {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        body.light-mode input,
        body.light-mode textarea {
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        body.light-mode .btn-ghost {
            border: 2px solid rgba(0, 0, 0, 0.1);
        }
        body.light-mode .tech-stack span {
            background: rgba(123, 77, 255, 0.1);
        }
        body.light-mode footer {
            background: rgba(0, 0, 0, 0.05);
        }

        /* Mobile Menu */
        @media (max-width: 768px) {
            :root {
                --section-spacing: 4rem;
                --navbar-height: 65px;
            }
            
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                height: 100vh;
                background: rgba(18, 18, 18, 0.95);
                backdrop-filter: var(--glass-blur);
                -webkit-backdrop-filter: var(--glass-blur);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 1.5rem;
                transition: var(--transition);
                z-index: 1000;
                border-left: var(--glass-border);
            }
            .nav-links.active {
                right: 0;
            }
            .hamburger {
                display: flex;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            .btn {
                width: 100%;
            }
            
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .project-links {
                flex-direction: column;
            }
            .project-links .btn {
                width: 100%;
            }
            
            .contact-container {
                grid-template-columns: 1fr;
            }
        }

        /* Small Devices */
        @media (max-width: 480px) {
            :root {
                --section-spacing: 3rem;
            }
            
            .container {
                padding: 0 1.25rem;
            }
            
            .section-title {
                font-size: 1.8rem;
                margin-bottom: 2rem;
            }
            
            .stats {
                grid-template-columns: 1fr;
            }
            
            .testimonial-card {
                padding: 1.5rem;
            }
            
            .theme-toggle,
            .back-to-top {
                width: 45px;
                height: 45px;
                bottom: 1rem;
                right: 1rem;
                font-size: 1.1rem;
            }
            .back-to-top {
                bottom: 5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-logo">Azzam</div>
        <div class="preloader-bar">
            <div class="preloader-progress"></div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="logo">Azzam</a>
        <ul class="nav-links">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Hello, I'm Azzam</h1>
                <p>A passionate frontend developer creating beautiful, functional websites that people love to use.</p>
                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">
                        View My Work
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        Contact Me
                        <i class="fas fa-paper-plane"></i>
                    </a>
                </div>
            </div>
        </div>
        <a href="#about" class="hero-scroll">
            <div class="mouse"></div>
            <span>Scroll Down</span>
        </a>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h2 class="section-title">About Me</h2>
            <div class="about-content">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Azzam" loading="lazy">
                </div>
                <div class="about-text">
                    <h3>Turning ideas into reality</h3>
                    <p>I'm a frontend developer with 3 years of experience building responsive, accessible websites and web applications. I love creating interfaces that are not only beautiful but also intuitive and enjoyable to use.</p>
                    <p>When I'm not coding, you can find me exploring new technologies, contributing to open-source projects, or helping others learn web development.</p>
                    <div class="tech-stack">
                        <span>JavaScript</span>
                        <span>React</span>
                        <span>Node.js</span>
                        <span>HTML</span>
                        <span>CSS/Scss</span>
                        <span>UI Design</span>
                    </div>
                    <div class="stats">
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Projects</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">3+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Client Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects">
        <div class="container">
            <h2 class="section-title">My Projects</h2>
            <div class="projects-grid">
                <!-- Projects will be dynamically inserted here -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials">
        <div class="container">
            <h2 class="section-title">What People Say</h2>
            <div class="testimonials-slider">
                <div class="testimonials-track">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            Azzam delivered our e-commerce platform ahead of schedule and exceeded all our expectations. His attention to detail and problem-solving skills are exceptional. The site has already increased our conversion rate by 35%.
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah Johnson" loading="lazy">
                            </div>
                            <div class="author-info">
                                <h4>Sarah Johnson</h4>
                                <p>CEO, TechSolutions Inc.</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            Working with Azzam was a game-changer for our startup. He not only built a beautiful dashboard but also implemented complex data visualizations that have helped us make better business decisions. Highly recommended!
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen" loading="lazy">
                            </div>
                            <div class="author-info">
                                <h4>Michael Chen</h4>
                                <p>Founder, DataInsights</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-nav">
                    <div class="slider-dot active"></div>
                    <div class="slider-dot"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Let's work together</h3>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Email</h4>
                                <a href="#">johndoe@gmail.com</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Phone</h4>
                                <a href="#">+1 (111) 001-002</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Location</h4>
                                <p>West Java, IDN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <input type="text" id="name" placeholder=" " required>
                        <label for="name">Your Name</label>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" placeholder=" " required>
                        <label for="email">Your Email</label>
                    </div>
                    <div class="form-group">
                        <textarea id="message" placeholder=" " required></textarea>
                        <label for="message">Your Message</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Send Message
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Notification -->
    <div class="notification" id="notification">
        <div class="notification-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="notification-content">
            <h4>Message Sent!</h4>
            <p>Thank you for reaching out. I'll get back to you soon.</p>
        </div>
        <button class="close-notification">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <a href="#" class="logo-footer">Azzam</a>
                <p class="footer-text">
                    Creating digital experiences that are both beautiful and functional.
                    Let's build something amazing together.
                </p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-codepen"></i></a>
                </div>
                <div class="footer-links">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#projects">Projects</a>
                    <a href="#contact">Contact</a>
                </div>
                <p class="copyright">© <span id="year"></span> Azzam. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Theme Toggle -->
    <button class="theme-toggle">
        <i class="fas fa-moon"></i>
    </button>

    <!-- Back to Top Button -->
    <div class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script>
        // DOM Elements
        const navbar = document.querySelector('.navbar');
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const navLinksItems = document.querySelectorAll('.nav-links a');
        const themeToggle = document.querySelector('.theme-toggle');
        const form = document.getElementById('contactForm');
        const notification = document.getElementById('notification');
        const closeNotification = document.querySelector('.close-notification');
        const yearElement = document.getElementById('year');
        const preloader = document.querySelector('.preloader');
        const preloaderProgress = document.querySelector('.preloader-progress');
        const backToTop = document.querySelector('.back-to-top');
        const sectionTitles = document.querySelectorAll('.section-title');
        const sliderTrack = document.querySelector('.testimonials-track');
        const sliderDots = document.querySelectorAll('.slider-dot');

        // Projects Data
        const projects = [
            { 
                title: 'E-Commerce Platform',
                desc: 'A full-featured online shopping platform with product management, cart functionality, and secure checkout.',
                tech: ['React', 'Node.js', 'MongoDB', 'Stripe'],
                image: 'https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            },
            {
                title: 'Dashboard Analytics',
                desc: 'Interactive data visualization dashboard with real-time updates and customizable reporting.',
                tech: ['Vue.js', 'Firebase', 'Chart.js'],
                image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            },
            {
                title: 'Task Manager App',
                desc: 'Productivity application for team collaboration with task assignment and progress tracking.',
                tech: ['React Native', 'GraphQL', 'MongoDB'],
                image: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            },
            {
                title: 'Weather Application',
                desc: 'Real-time weather forecasting app with location detection and 5-day predictions.',
                tech: ['React', 'OpenWeather API'],
                image: 'https://images.unsplash.com/photo-1492011221367-f47e3ccd77a0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            }
        ];

        // Testimonials Data
        let currentSlide = 0;
        const slideCount = document.querySelectorAll('.testimonial-card').length;

        // Initialize
        function init() {
            // Set current year
            yearElement.textContent = new Date().getFullYear();
            
            // Simulate preloader progress
            simulatePreload();
            
            // Render projects
            renderProjects();
            
            // Set up theme toggle
            setupTheme();
            
            // Set up mobile menu
            setupMobileMenu();
            
            // Set up form submission
            setupForm();
            
            // Set up scroll events
            setupScrollEvents();
            
            // Set up slider
            setupSlider();
            
            // Set up intersection observer for animations
            setupIntersectionObserver();
        }

        // Simulate Preloader
        function simulatePreload() {
            let progress = 0;
            const interval = setInterval(() => {
                progress += Math.random() * 10;
                preloaderProgress.style.width = `${Math.min(progress, 100)}%`;
                
                if (progress >= 100) {
                    clearInterval(interval);
                    setTimeout(() => {
                        preloader.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }, 500);
                }
            }, 100);
        }

        // Render Projects
        function renderProjects() {
            const projectsGrid = document.querySelector('.projects-grid');
            projectsGrid.innerHTML = projects.map(project => `
                <div class="project-card">
                    <div class="project-image">
                        <img src="${project.image}" alt="${project.title}" loading="lazy">
                    </div>
                    <h3>${project.title}</h3>
                    <p>${project.desc}</p>
                    <div class="tech-stack">
                        ${project.tech.map(tech => `<span>${tech}</span>`).join('')}
                    </div>
                    <div class="project-links">
                        <a href="#" class="btn btn-secondary">
                            Demo
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        <a href="#" class="btn btn-ghost">
                            View Code
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            `).join('');
        }

        // Theme Toggle
        function setupTheme() {
            const savedTheme = localStorage.getItem('theme');
            
            if (savedTheme) {
                document.body.classList.add(savedTheme);
                themeToggle.innerHTML = savedTheme === 'light-mode' 
                    ? '<i class="fas fa-sun"></i>' 
                    : '<i class="fas fa-moon"></i>';
            }

            themeToggle.addEventListener('click', () => {
                document.body.classList.toggle('light-mode');
                const theme = document.body.classList.contains('light-mode') ? 'light-mode' : '';
                localStorage.setItem('theme', theme);
                themeToggle.innerHTML = theme 
                    ? '<i class="fas fa-sun"></i>' 
                    : '<i class="fas fa-moon"></i>';
            });
        }

        // Mobile Menu
        function setupMobileMenu() {
            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                navLinks.classList.toggle('active');
                document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : 'auto';
            });

            // Close menu when clicking on a link
            navLinksItems.forEach(link => {
                link.addEventListener('click', () => {
                    hamburger.classList.remove('active');
                    navLinks.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            });
        }

        // Form Submission
        function setupForm() {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                // Show loading state on button
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Show notification
                notification.classList.add('show');
                
                // Reset form and button
                form.reset();
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
            });
            
            // Close notification
            closeNotification.addEventListener('click', () => {
                notification.classList.remove('show');
            });
        }

        // Scroll Events
        function setupScrollEvents() {
            // Navbar scroll effect
            window.addEventListener('scroll', () => {
                navbar.classList.toggle('scrolled', window.scrollY > 50);
                
                // Back to top button
                backToTop.classList.toggle('visible', window.scrollY > 300);
            });

            // Smooth Scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });
            
            // Back to top
            backToTop.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Active nav link based on scroll position
            window.addEventListener('scroll', setActiveNavLink);
            setActiveNavLink();
        }

        // Set Active Nav Link
        function setActiveNavLink() {
            const scrollPosition = window.scrollY;
            
            document.querySelectorAll('section').forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    document.querySelectorAll('.nav-links a').forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${sectionId}`) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }

        // Testimonial Slider
        function setupSlider() {
            sliderDots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    goToSlide(index);
                });
            });
            
            // Auto slide
            setInterval(() => {
                currentSlide = (currentSlide + 1) % slideCount;
                goToSlide(currentSlide);
            }, 5000);
        }
        
        function goToSlide(index) {
            currentSlide = index;
            sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update dots
            sliderDots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentSlide);
            });
        }

        // Intersection Observer for Animations
        function setupIntersectionObserver() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('section').forEach(section => {
                observer.observe(section);
            });
            
            sectionTitles.forEach(title => {
                observer.observe(title);
            });
        }

        // Initialize the app
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>
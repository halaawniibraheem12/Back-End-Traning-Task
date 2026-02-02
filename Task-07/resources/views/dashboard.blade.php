<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Cosmetics Management</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #8a4af3;
            --primary-light: #a36ef5;
            --primary-dark: #6a2cd8;
            --secondary: #ff6b8b;
            --accent: #36d1dc;
            --light: #f9f5ff;
            --dark: #2a2d43;
            --gray: #8c8fa6;
            --gray-light: #f0edf7;
            --success: #4cd964;
            --warning: #ffcc00;
            --danger: #ff3b30;
            --shadow: 0 10px 30px rgba(138, 74, 243, 0.1);
            --border-radius: 16px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f9f5ff 0%, #f0edf7 100%);
            color: var(--dark);
            min-height: 100vh;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid rgba(138, 74, 243, 0.1);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 25px 35px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            position: relative;
            z-index: 2;
        }

        .brand {
            flex: 1;
            min-width: 250px;
        }

        .brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            font-weight: 600;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            background: rgba(255, 255, 255, 0.2);
            padding: 12px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .tagline {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        /* Actions Panel */
        .actions-panel {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: flex-end;
        }

        .quick-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .btn-primary {
            background: white;
            color: var(--primary);
        }

        .btn-primary:hover {
            background: var(--light);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(138, 74, 243, 0.2);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .btn-add {
            background: var(--secondary);
            color: white;
            padding: 12px 24px;
            font-size: 0.95rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(255, 107, 139, 0.3);
        }

        .btn-add:hover {
            background: #ff5773;
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 8px 20px rgba(255, 107, 139, 0.4);
        }

        /* Main Content - Compact Design */
        .main-content {
            padding: 30px 35px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Welcome Section - Compact */
        .welcome-section {
            background: linear-gradient(135deg, rgba(138, 74, 243, 0.05) 0%, rgba(255, 107, 139, 0.05) 100%);
            border-radius: var(--border-radius);
            padding: 25px 30px;
            border: 1px solid rgba(138, 74, 243, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .welcome-info {
            flex: 1;
            min-width: 300px;
        }

        .welcome-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .welcome-title p {
            color: var(--gray);
            font-size: 1rem;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 15px;
            background: white;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            min-width: 280px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .user-details h4 {
            font-size: 1.1rem;
            margin-bottom: 4px;
            color: var(--dark);
        }

        .user-details p {
            color: var(--gray);
            font-size: 0.85rem;
            margin-bottom: 6px;
        }

        .user-role {
            display: inline-block;
            padding: 4px 10px;
            background: rgba(138, 74, 243, 0.1);
            color: var(--primary);
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        /* Date Time Section */
        .date-time-section {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .date-time-item {
            background: rgba(255, 255, 255, 0.7);
            padding: 10px 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Quick Actions - Compact (2 buttons only) */
        .quick-actions-section {
            background: white;
            border-radius: var(--border-radius);
            padding: 25px 30px;
            border: 1px solid rgba(138, 74, 243, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--primary);
            margin-bottom: 25px;
            text-align: center;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 700px;
            margin: 0 auto;
        }

        .action-card {
            background: var(--light);
            border-radius: 12px;
            padding: 25px;
            text-decoration: none;
            color: var(--dark);
            border: 1px solid rgba(138, 74, 243, 0.1);
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 20px;
            height: 100%;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(138, 74, 243, 0.15);
            border-color: var(--primary-light);
            background: white;
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .action-card:nth-child(1) .action-icon {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        }

        .action-card:nth-child(2) .action-icon {
            background: linear-gradient(135deg, #ff6b8b 0%, #ffcc00 100%);
        }

        .action-content {
            flex: 1;
        }

        .action-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .action-desc {
            color: var(--gray);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Footer */
        .footer {
            background: var(--light);
            padding: 20px 35px;
            border-top: 1px solid rgba(138, 74, 243, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer-info {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 600;
        }

        .footer-badge {
            background: white;
            padding: 8px 16px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            font-size: 0.85rem;
        }

        .copyright {
            color: var(--gray);
            font-size: 0.85rem;
        }

        /* Responsive Design */
        @media (max-width: 1100px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .actions-panel {
                width: 100%;
                align-items: flex-start;
            }
            
            .quick-actions {
                justify-content: flex-start;
            }
        }

        @media (max-width: 768px) {
            .header, .main-content, .footer {
                padding: 20px;
            }
            
            .brand h1 {
                font-size: 2rem;
            }
            
            .btn {
                padding: 8px 16px;
                font-size: 0.85rem;
            }
            
            .welcome-section {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }
            
            .welcome-info {
                text-align: center;
            }
            
            .user-badge {
                justify-content: center;
                min-width: auto;
                width: 100%;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .footer {
                flex-direction: column;
                text-align: center;
            }
            
            .footer-info {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .container {
                border-radius: 12px;
            }
            
            .header {
                padding: 20px;
            }
            
            .brand h1 {
                font-size: 1.8rem;
            }
            
            .quick-actions {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .action-card {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }
            
            .date-time-section {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-light);
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-light);
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }
    </style>
</head>
<body>

<div class="container">
    
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="brand">
                <h1>
                    <span class="brand-icon">
                        <i class="fas fa-gauge-high"></i>
                    </span>
                    Dashboard
                </h1>
                <p class="tagline">Manage your cosmetics products efficiently</p>
            </div>
            
            <div class="actions-panel">
                <div class="quick-actions">
                    @auth
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                    @endauth
                    
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
                
                <a href="{{ route('products.create') }}" class="btn btn-add">
                    <i class="fas fa-plus-circle"></i> Add New Product
                </a>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        
        <!-- Welcome Section - Compact -->
        <section class="welcome-section">
            <div class="welcome-info">
                <div class="welcome-title">
                    <h2>Welcome, {{ Auth::user()->name }}! 👋</h2>
                    <p>Ready to manage your cosmetics products?</p>
                </div>
                
                <div class="date-time-section">
                    <div class="date-time-item">
                        <i class="fas fa-calendar" style="color: var(--primary);"></i>
                        <span>{{ now()->format('F j, Y') }}</span>
                    </div>
                    <div class="date-time-item">
                        <i class="fas fa-clock" style="color: var(--primary);"></i>
                        <span class="time-update">{{ now()->format('h:i A') }}</span>
                    </div>
                </div>
            </div>
            
            <div class="user-badge">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="user-details">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p>{{ Auth::user()->email }}</p>
                    @if(Auth::user()->is_admin)
                    <span class="user-role">
                        <i class="fas fa-crown"></i> Administrator
                    </span>
                    @else
                    <span class="user-role">
                        <i class="fas fa-user"></i> Regular User
                    </span>
                    @endif
                </div>
            </div>
        </section>
        
        <!-- Quick Actions Section - 2 Actions Only -->
        <section class="quick-actions-section">
            <h2 class="section-title">Quick Actions</h2>
            
            <div class="actions-grid">
                <!-- Action 1: Add Product -->
                <a href="{{ route('products.create') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">Add New Product</div>
                        <div class="action-desc">Create and add new cosmetic products to your inventory with complete details including suppliers, pricing, and categories.</div>
                    </div>
                </a>
                
                <!-- Action 2: Profile Settings -->
                <a href="{{ route('profile.edit') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">Profile Settings</div>
                        <div class="action-desc">Update your personal information, change your password, and manage your account preferences and security settings.</div>
                    </div>
                </a>
            </div>
        </section>
        
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-info">
            <div class="footer-badge">
                <i class="fas fa-shield-check"></i>
                <span>Secure Session</span>
            </div>
            <div class="footer-badge">
                <i class="fas fa-database"></i>
                <span>Last Login: {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->diffForHumans() : 'First time' }}</span>
            </div>
        </div>
        
        <div class="copyright">
            <i class="fas fa-copyright"></i> {{ date('Y') }} Cosmetics Management System
        </div>
    </footer>
    
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update time every minute
    function updateTime() {
        const now = new Date();
        const timeElement = document.querySelector('.time-update');
        if (timeElement) {
            timeElement.textContent = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });
        }
    }
    
    updateTime();
    setInterval(updateTime, 60000);
    
    // Add hover effects
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 20,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>

</body>
</html>
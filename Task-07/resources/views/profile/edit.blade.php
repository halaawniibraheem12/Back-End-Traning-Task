<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings | Cosmetics Management</title>
    
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
            max-width: 1000px;
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

        /* Navigation Buttons */
        .nav-buttons {
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

        /* Main Content */
        .main-content {
            padding: 35px;
        }

        /* Profile Header */
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .profile-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-subtitle {
            color: var(--gray);
            font-size: 1rem;
            margin-top: 5px;
        }

        .back-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--primary-dark);
            gap: 12px;
        }

        /* Profile Container */
        .profile-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }

        @media (max-width: 900px) {
            .profile-container {
                grid-template-columns: 1fr;
            }
        }

        /* Sidebar */
        .profile-sidebar {
            background: var(--light);
            border-radius: var(--border-radius);
            padding: 25px;
            border: 1px solid rgba(138, 74, 243, 0.1);
            height: fit-content;
        }

        .user-card {
            text-align: center;
            margin-bottom: 25px;
        }

        .user-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 600;
            margin: 0 auto 20px;
            border: 5px solid white;
            box-shadow: 0 8px 20px rgba(138, 74, 243, 0.2);
        }

        .user-name {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .user-email {
            color: var(--gray);
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .user-role {
            display: inline-block;
            padding: 6px 15px;
            background: rgba(138, 74, 243, 0.1);
            color: var(--primary);
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .user-stats {
            display: flex;
            justify-content: space-around;
            margin: 25px 0;
            padding: 20px 0;
            border-top: 1px solid rgba(138, 74, 243, 0.1);
            border-bottom: 1px solid rgba(138, 74, 243, 0.1);
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            display: block;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--gray);
        }

        .sidebar-menu {
            list-style: none;
        }

        .menu-item {
            margin-bottom: 8px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: var(--dark);
            text-decoration: none;
            border-radius: 10px;
            transition: var(--transition);
        }

        .menu-link:hover {
            background: rgba(138, 74, 243, 0.1);
            color: var(--primary);
        }

        .menu-link.active {
            background: rgba(138, 74, 243, 0.15);
            color: var(--primary);
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        /* Profile Content */
        .profile-content {
            background: var(--light);
            border-radius: var(--border-radius);
            padding: 30px;
            border: 1px solid rgba(138, 74, 243, 0.1);
        }

        .content-section {
            margin-bottom: 35px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(138, 74, 243, 0.1);
        }

        .content-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .section-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--dark);
        }

        .section-description {
            color: var(--gray);
            font-size: 0.95rem;
            margin-top: 5px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .form-label .required {
            color: var(--danger);
            margin-left: 3px;
        }

        .form-hint {
            display: block;
            margin-top: 6px;
            font-size: 0.85rem;
            color: var(--gray);
        }

        /* Form Controls */
        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid rgba(138, 74, 243, 0.2);
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            color: var(--dark);
            background: white;
            transition: var(--transition);
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(138, 74, 243, 0.1);
        }

        .form-control::placeholder {
            color: #b8b8c5;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%238a4af3' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            padding-right: 45px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid rgba(138, 74, 243, 0.1);
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 14px 32px;
            font-size: 1rem;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(138, 74, 243, 0.3);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid rgba(138, 74, 243, 0.3);
            padding: 12px 28px;
            font-weight: 600;
        }

        .btn-outline:hover {
            background: rgba(138, 74, 243, 0.05);
            border-color: var(--primary);
        }

        .cancel-link {
            color: var(--gray);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .cancel-link:hover {
            color: var(--dark);
        }

        /* Password Requirements */
        .password-requirements {
            background: rgba(138, 74, 243, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }

        .requirements-title {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .requirement-list {
            list-style: none;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .requirement-item.valid {
            color: var(--success);
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
        @media (max-width: 768px) {
            .header, .main-content, .footer {
                padding: 20px;
            }
            
            .brand h1 {
                font-size: 2rem;
            }
            
            .profile-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn-primary, .btn-outline {
                width: 100%;
                justify-content: center;
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
                padding: 15px;
            }
            
            .brand h1 {
                font-size: 1.8rem;
            }
            
            .nav-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .user-stats {
                flex-direction: column;
                gap: 15px;
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

        /* Validation Styles */
        .error {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .is-invalid {
            border-color: var(--danger) !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(255, 59, 48, 0.1) !important;
        }

        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.5s ease;
            border-left: 4px solid;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .alert-success {
            background: rgba(76, 217, 100, 0.1);
            border-left-color: var(--success);
            color: #155724;
        }

        .alert-warning {
            background: rgba(255, 204, 0, 0.1);
            border-left-color: var(--warning);
            color: #856404;
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
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Profile Settings
                </h1>
                <p class="tagline">Manage your account information and preferences</p>
            </div>
            
            <div class="nav-buttons">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-gauge-high"></i> Dashboard
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-boxes-stacked"></i> All Products
                </a>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        
        <!-- Profile Header -->
        <div class="profile-header">
            <div>
                <h2 class="profile-title">My Profile</h2>
                <p class="profile-subtitle">Update your personal information and account settings</p>
            </div>
            <a href="{{ route('dashboard') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
        
        <!-- Success Message -->
        @if(session('status') == 'profile-updated')
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <div>Profile updated successfully!</div>
        </div>
        @endif
        
        @if(session('status') == 'password-updated')
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <div>Password updated successfully!</div>
        </div>
        @endif
        
        <!-- Profile Container -->
        <div class="profile-container">
            
            <!-- Sidebar -->
            <aside class="profile-sidebar">
                <!-- User Card -->
                <div class="user-card">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-email">{{ Auth::user()->email }}</div>
                    @if(Auth::user()->is_admin)
                    <div class="user-role">
                        <i class="fas fa-crown"></i> Administrator
                    </div>
                    @else
                    <div class="user-role">
                        <i class="fas fa-user"></i> Regular User
                    </div>
                    @endif
                </div>
                
                <!-- User Stats -->
                <div class="user-stats">
                    <div class="stat-item">
                        <span class="stat-value">{{ $productsCount ?? 0 }}</span>
                        <span class="stat-label">Products</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">{{ $memberSince ?? 'New' }}</span>
                        <span class="stat-label">Member</span>
                    </div>
                </div>
                
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="menu-item">
                        <a href="#profile-info" class="menu-link active">
                            <span class="menu-icon"><i class="fas fa-user"></i></span>
                            <span>Profile Information</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#update-password" class="menu-link">
                            <span class="menu-icon"><i class="fas fa-key"></i></span>
                            <span>Update Password</span>
                        </a>
                    </li>
                </ul>
            </aside>
            
            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Profile Information Form -->
                <section id="profile-info" class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Profile Information</h3>
                            <p class="section-description">Update your account's profile information</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        
                        <div class="form-grid">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="form-label">
                                    Full Name <span class="required">*</span>
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       class="form-control" 
                                       value="{{ old('name', Auth::user()->name) }}"
                                       required>
                                <span class="form-hint">Your full name as it should appear</span>
                                @error('name')
                                    <div class="error">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    Email Address <span class="required">*</span>
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="form-control" 
                                       value="{{ old('email', Auth::user()->email) }}"
                                       required>
                                <span class="form-hint">Your primary email address</span>
                                @error('email')
                                    <div class="error">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Profile Changes
                            </button>
                        </div>
                    </form>
                </section>
                
                <!-- Update Password Form -->
                <section id="update-password" class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Update Password</h3>
                            <p class="section-description">Ensure your account is using a strong password</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        
                        <!-- Password Requirements -->
                        <div class="password-requirements">
                            <div class="requirements-title">
                                <i class="fas fa-info-circle"></i> Password Requirements
                            </div>
                            <ul class="requirement-list">
                                <li class="requirement-item" id="req-length">
                                    <i class="fas fa-circle" style="font-size: 6px;"></i>
                                    At least 8 characters
                                </li>
                                <li class="requirement-item" id="req-uppercase">
                                    <i class="fas fa-circle" style="font-size: 6px;"></i>
                                    One uppercase letter
                                </li>
                                <li class="requirement-item" id="req-lowercase">
                                    <i class="fas fa-circle" style="font-size: 6px;"></i>
                                    One lowercase letter
                                </li>
                                <li class="requirement-item" id="req-number">
                                    <i class="fas fa-circle" style="font-size: 6px;"></i>
                                    One number
                                </li>
                            </ul>
                        </div>
                        
                        <div class="form-grid">
                            <!-- Current Password -->
                            <div class="form-group">
                                <label for="current_password" class="form-label">
                                    Current Password <span class="required">*</span>
                                </label>
                                <input type="password" 
                                       id="current_password" 
                                       name="current_password" 
                                       class="form-control"
                                       required>
                                <span class="form-hint">Enter your current password</span>
                                @error('current_password')
                                    <div class="error">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- New Password -->
                            <div class="form-group">
                                <label for="password" class="form-label">
                                    New Password <span class="required">*</span>
                                </label>
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="form-control"
                                       required>
                                <span class="form-hint">Enter your new password</span>
                                @error('password')
                                    <div class="error">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">
                                    Confirm Password <span class="required">*</span>
                                </label>
                                <input type="password" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       class="form-control"
                                       required>
                                <span class="form-hint">Re-enter your new password</span>
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key"></i> Update Password
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-info">
            <div class="footer-badge">
                <i class="fas fa-user-check"></i>
                <span>Last Updated: {{ Auth::user()->updated_at->diffForHumans() }}</span>
            </div>
            <div class="footer-badge">
                <i class="fas fa-calendar-alt"></i>
                <span>Member Since: {{ Auth::user()->created_at->format('M Y') }}</span>
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
    // Smooth scroll for menu links
    document.querySelectorAll('.menu-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            document.querySelectorAll('.menu-link').forEach(l => {
                l.classList.remove('active');
            });
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Scroll to section
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Password validation
    const passwordInput = document.getElementById('password');
    const currentPasswordInput = document.getElementById('current_password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            
            // Check requirements
            const hasLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasLowercase = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            
            // Update requirement indicators
            updateRequirement('req-length', hasLength);
            updateRequirement('req-uppercase', hasUppercase);
            updateRequirement('req-lowercase', hasLowercase);
            updateRequirement('req-number', hasNumber);
            
            // Validate password confirmation
            if (confirmPasswordInput.value) {
                validatePasswordMatch();
            }
        });
    }
    
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', validatePasswordMatch);
    }
    
    function updateRequirement(elementId, isValid) {
        const element = document.getElementById(elementId);
        if (element) {
            if (isValid) {
                element.classList.add('valid');
                element.innerHTML = `<i class="fas fa-check-circle"></i> ${element.textContent.replace('•', '')}`;
            } else {
                element.classList.remove('valid');
                element.innerHTML = `<i class="fas fa-circle" style="font-size: 6px;"></i> ${element.textContent.replace(/[✓•]/g, '')}`;
            }
        }
    }
    
    function validatePasswordMatch() {
        if (passwordInput && confirmPasswordInput) {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.classList.add('is-invalid');
            } else {
                confirmPasswordInput.classList.remove('is-invalid');
            }
        }
    }
    
    // Show/hide password
    const passwordFields = document.querySelectorAll('input[type="password"]');
    passwordFields.forEach(field => {
        const toggleBtn = document.createElement('button');
        toggleBtn.type = 'button';
        toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';
        toggleBtn.style.cssText = `
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 1rem;
        `;
        
        const wrapper = document.createElement('div');
        wrapper.style.position = 'relative';
        field.parentNode.insertBefore(wrapper, field);
        wrapper.appendChild(field);
        wrapper.appendChild(toggleBtn);
        
        toggleBtn.addEventListener('click', function() {
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    });
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = this.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                    
                    // Scroll to first error
                    if (isValid === false) {
                        field.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        field.focus();
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });
});
</script>

</body>
</html>
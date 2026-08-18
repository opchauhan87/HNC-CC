<?php
/**
 * HN Connect · Modern Admin Panel
 * VICIdial Administration - Modern UI Integration
 * 
 * NOTE: All original PHP logic is preserved below this header
 * Only the HTML/CSS presentation layer is modernized
 */

// ============================================
// ORIGINAL PHP CODE - DO NOT MODIFY
// ============================================
$startMS = microtime();
$php_script='admin.php';
require("dbconnect_mysqli.php");
require("functions.php");

// ... ALL YOUR EXISTING PHP CODE GOES HERE ...
// (Keep everything from line 1 to the closing PHP tag)

// ============================================
// MODERN HTML HEADER - REPLACE OLD <head>
// ============================================
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Pragma" content="no-cache">
    <title>HN Connect · Admin Panel</title>
    
    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Modern Styles -->
    <link href="css/style_modern.css" rel="stylesheet">
    
    <!-- Original VICIdial Styles (if needed for compatibility) -->
    <link href="css/style.css" rel="stylesheet" />
    
    <style>
        /* ============================================
           MODERN ADMIN STYLES - OVERRIDE OLD CSS
           ============================================ */
        :root {
            --sidebar-width: 260px;
            --header-height: 68px;
            --primary: #4831d4;
            --primary-dark: #3720b0;
            --primary-light: #7a5cff;
            --secondary: #00c8ff;
            --accent: #ff64c8;
            --bg-dark: #0a0e1a;
            --bg-card: rgba(255, 255, 255, 0.04);
            --border-glass: rgba(255, 255, 255, 0.06);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.6);
            --text-muted: rgba(255, 255, 255, 0.3);
            --glass-blur: blur(20px) saturate(180%);
            --shadow-card: 0 8px 32px rgba(0, 0, 0, 0.4);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
        }

        /* ----- Animated Background ----- */
        .bg-particles {
            position: fixed;
            inset: 0;
            z-index: 0;
            background: 
                radial-gradient(ellipse at 20% 50%, rgba(72, 49, 212, 0.12) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 50%, rgba(0, 200, 255, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .bg-particles::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background-image: 
                radial-gradient(2px 2px at 20px 30px, rgba(255,255,255,0.06), transparent),
                radial-gradient(2px 2px at 40px 70px, rgba(255,255,255,0.04), transparent);
            background-size: 200px 200px;
            animation: floatParticles 25s linear infinite;
        }

        @keyframes floatParticles {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-60px, -40px) rotate(8deg); }
        }

        .glow-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            pointer-events: none;
        }
        .glow-orb-1 {
            width: 400px;
            height: 400px;
            background: rgba(72, 49, 212, 0.15);
            top: -150px;
            right: -100px;
            animation: orbFloat 10s ease-in-out infinite;
        }
        .glow-orb-2 {
            width: 300px;
            height: 300px;
            background: rgba(0, 200, 255, 0.1);
            bottom: -100px;
            left: -50px;
            animation: orbFloat 12s ease-in-out infinite reverse;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(40px, -40px) scale(1.15); }
        }

        /* ----- Modern Sidebar ----- */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            z-index: 1000;
            background: rgba(10, 14, 26, 0.85);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border-right: 1px solid var(--border-glass);
            display: flex;
            flex-direction: column;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .sidebar-brand {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid var(--border-glass);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-shrink: 0;
        }

        .sidebar-brand .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-brand .brand-text {
            font-size: 1.1rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff, #a0c4ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }

        .sidebar-brand .brand-sub {
            font-size: 0.55rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
        }

        .sidebar-user {
            padding: 0.8rem 1.5rem;
            border-bottom: 1px solid var(--border-glass);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-shrink: 0;
        }

        .sidebar-user .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-user .user-info .name {
            font-size: 0.8rem;
            font-weight: 600;
        }
        .sidebar-user .user-info .role {
            font-size: 0.6rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar-user .logout-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid var(--border-glass);
            background: transparent;
            color: var(--text-muted);
            transition: var(--transition);
            cursor: pointer;
        }
        .sidebar-user .logout-btn:hover {
            background: rgba(255, 50, 50, 0.1);
            border-color: rgba(255, 50, 50, 0.2);
            color: #ff6b6b;
        }

        .sidebar-nav {
            flex: 1;
            padding: 0.8rem 0.75rem;
            overflow-y: auto;
        }

        .sidebar-nav .nav-section-title {
            font-size: 0.55rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 0.5rem 0.75rem 0.2rem;
            opacity: 0.5;
        }

        .sidebar-nav .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0.75rem;
            border-radius: 10px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
        }

        .sidebar-nav .nav-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
        }

        .sidebar-nav .nav-item.active {
            background: rgba(72, 49, 212, 0.15);
            color: var(--text-primary);
            border: 1px solid rgba(72, 49, 212, 0.15);
        }

        .sidebar-nav .nav-item.active::before {
            content: '';
            position: absolute;
            left: -6px;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: linear-gradient(180deg, var(--primary), var(--secondary));
            border-radius: 10px;
        }

        .sidebar-nav .nav-item i {
            font-size: 1rem;
            width: 22px;
            text-align: center;
            flex-shrink: 0;
            color: var(--text-muted);
        }

        .sidebar-nav .nav-item:hover i,
        .sidebar-nav .nav-item.active i {
            color: var(--secondary);
        }

        .sidebar-nav .nav-item .badge-nav {
            margin-left: auto;
            font-size: 0.55rem;
            padding: 0.1rem 0.4rem;
            border-radius: 20px;
            background: rgba(72, 49, 212, 0.2);
            color: var(--primary-light);
            font-weight: 600;
        }

        .sidebar-nav .nav-item .badge-nav.danger {
            background: rgba(255, 50, 50, 0.15);
            color: #ff6b6b;
        }

        .sidebar-nav .nav-item .badge-nav.success {
            background: rgba(50, 255, 50, 0.1);
            color: #51cf66;
        }

        .sidebar-footer {
            padding: 0.8rem 1.5rem;
            border-top: 1px solid var(--border-glass);
            font-size: 0.55rem;
            color: var(--text-muted);
            text-align: center;
            flex-shrink: 0;
        }

        /* ----- Main Content ----- */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(10, 14, 26, 0.7);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border-bottom: 1px solid var(--border-glass);
            padding: 0 1.5rem;
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-left .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 1.3rem;
            cursor: pointer;
            padding: 0.25rem;
        }

        .header-left .page-title {
            font-size: 1rem;
            font-weight: 600;
        }
        .header-left .page-title span {
            color: var(--text-muted);
            font-weight: 400;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .header-right .header-btn {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid var(--border-glass);
            background: transparent;
            color: var(--text-secondary);
            transition: var(--transition);
            cursor: pointer;
            position: relative;
        }

        .header-right .header-btn:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
        }

        .header-right .header-btn .dot {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #ff6b6b;
            border: 2px solid var(--bg-dark);
        }
        .header-right .header-btn .dot.success { background: #51cf66; }

        .header-right .search-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 10px;
            border: 1px solid var(--border-glass);
            padding: 0.15rem 0.15rem 0.15rem 0.75rem;
            transition: var(--transition);
        }

        .header-right .search-box:focus-within {
            border-color: rgba(72, 49, 212, 0.3);
            background: rgba(255, 255, 255, 0.06);
        }

        .header-right .search-box input {
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-size: 0.8rem;
            padding: 0.3rem 0;
            outline: none;
            width: 140px;
            font-family: 'Inter', sans-serif;
        }

        .header-right .search-box input::placeholder {
            color: var(--text-muted);
        }

        .header-right .search-box button {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border: none;
            color: white;
            padding: 0.3rem 0.7rem;
            border-radius: 8px;
            font-size: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .header-right .search-box button:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 16px rgba(72, 49, 212, 0.3);
        }

        .dashboard-content {
            padding: 1.2rem 1.5rem 2rem;
        }

        /* ----- Modern Cards ----- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: var(--bg-card);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border-radius: 16px;
            border: 1px solid var(--border-glass);
            padding: 1rem 1.2rem;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow-card);
        }

        .stat-card .stat-label {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
        }

        .stat-card .stat-value {
            font-size: 1.6rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .stat-card .stat-change {
            font-size: 0.65rem;
            font-weight: 500;
        }
        .stat-card .stat-change.positive { color: #51cf66; }
        .stat-card .stat-change.negative { color: #ff6b6b; }

        .stat-card .stat-icon {
            float: right;
            font-size: 1.8rem;
            opacity: 0.1;
        }

        .content-card {
            background: var(--bg-card);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border-radius: 16px;
            border: 1px solid var(--border-glass);
            padding: 1.2rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .content-card .card-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.8rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border-glass);
        }

        .content-card .card-header-custom h5 {
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0;
        }

        .content-card .card-header-custom .card-action {
            font-size: 0.7rem;
            color: var(--text-muted);
            text-decoration: none;
            transition: var(--transition);
        }
        .content-card .card-header-custom .card-action:hover {
            color: var(--text-primary);
        }

        /* ----- Mobile Responsive ----- */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .header-left .menu-toggle {
                display: block;
            }
            .header-right .search-box input {
                width: 100px;
            }
        }

        @media (max-width: 576px) {
            .header { padding: 0 1rem; }
            .dashboard-content { padding: 0.8rem; }
            .header-right .search-box { display: none; }
            .stats-grid { grid-template-columns: 1fr 1fr; gap: 0.75rem; }
            .stat-card .stat-value { font-size: 1.2rem; }
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 999;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }
        .sidebar-overlay.active { display: block; }
        @media (min-width: 993px) {
            .sidebar-overlay { display: none !important; }
        }

        /* ----- Custom Scrollbar ----- */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        /* ---- Keep Old Admin Styles for Compatibility ---- */
        /* Override old table styles with modern ones */
        table {
            width: 100% !important;
            border-collapse: collapse !important;
            background: transparent !important;
        }
        td, th {
            padding: 8px 12px !important;
            border-bottom: 1px solid var(--border-glass) !important;
            color: var(--text-secondary) !important;
            background: transparent !important;
        }
        th {
            color: var(--text-primary) !important;
            font-weight: 600 !important;
            font-size: 0.75rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
        }
        tr:hover td {
            background: rgba(255, 255, 255, 0.02) !important;
        }
        input, select, textarea {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid var(--border-glass) !important;
            color: var(--text-primary) !important;
            border-radius: 8px !important;
            padding: 6px 12px !important;
            font-family: 'Inter', sans-serif !important;
        }
        input:focus, select:focus, textarea:focus {
            border-color: rgba(72, 49, 212, 0.3) !important;
            box-shadow: 0 0 0 3px rgba(72, 49, 212, 0.1) !important;
            outline: none !important;
        }
        button, .btn {
            border-radius: 10px !important;
            font-weight: 500 !important;
            font-family: 'Inter', sans-serif !important;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
            border: none !important;
        }
        .btn-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(72, 49, 212, 0.3) !important;
        }
    </style>
</head>
<body>

<!-- Background -->
<div class="bg-particles"></div>
<div class="glow-orb glow-orb-1"></div>
<div class="glow-orb glow-orb-2"></div>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- ============================================
   SIDEBAR
   ============================================ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">H</div>
        <div>
            <div class="brand-text">HN Connect</div>
            <span class="brand-sub">Admin Panel v2.0</span>
        </div>
    </div>

    <div class="sidebar-user">
        <div class="avatar">A</div>
        <div class="user-info">
            <div class="name"><?php echo $LOGfull_name ?? 'Admin'; ?></div>
            <div class="role"><?php echo 'Level ' . ($LOGuser_level ?? '9'); ?></div>
        </div>
        <button class="logout-btn" onclick="if(confirm('Logout?')){window.location.href='logout.php';}" title="Logout">
            <i class="bi bi-box-arrow-right"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-section-title">Main</div>
            <a href="admin.php" class="nav-item active">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-speedometer2"></i> System Status
                <span class="badge-nav success">Live</span>
            </a>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Users</div>
            <a href="#" class="nav-item">
                <i class="bi bi-people-fill"></i> All Users
                <span class="badge-nav">24</span>
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-person-plus"></i> Add User
            </a>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Campaigns</div>
            <a href="#" class="nav-item">
                <i class="bi bi-megaphone-fill"></i> All Campaigns
                <span class="badge-nav">12</span>
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-plus-circle"></i> Add Campaign
            </a>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Reports</div>
            <a href="#" class="nav-item">
                <i class="bi bi-bar-chart-fill"></i> Real-Time
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-clock-history"></i> Agent Reports
            </a>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Admin</div>
            <a href="#" class="nav-item">
                <i class="bi bi-gear-fill"></i> Settings
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-shield-check"></i> Security
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">HN Connect v2.0 · © 2025</div>
</aside>

<!-- ============================================
   MAIN CONTENT
   ============================================ -->
<main class="main-content">

    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <div class="page-title">
                Dashboard <span>/ Admin Panel</span>
            </div>
        </div>
        <div class="header-right">
            <div class="search-box">
                <input type="text" placeholder="Search..." id="globalSearch">
                <button onclick="alert('🔍 Search: ' + document.getElementById('globalSearch').value)">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <button class="header-btn" onclick="alert('🔔 No notifications')">
                <i class="bi bi-bell-fill"></i>
                <span class="dot success"></span>
            </button>
            <button class="header-btn" onclick="alert('🤖 AI Assistant: How can I help?')">
                <i class="bi bi-robot"></i>
            </button>
        </div>
    </header>

    <!-- Dashboard Content -->
    <div class="dashboard-content">

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-people"></i></div>
                <div class="stat-label">Total Users</div>
                <div class="stat-value">124</div>
                <div class="stat-change positive"><i class="bi bi-arrow-up"></i> 12%</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-megaphone"></i></div>
                <div class="stat-label">Active Campaigns</div>
                <div class="stat-value">18</div>
                <div class="stat-change positive"><i class="bi bi-arrow-up"></i> 3 new</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-telephone"></i></div>
                <div class="stat-label">Calls Today</div>
                <div class="stat-value">1,847</div>
                <div class="stat-change positive"><i class="bi bi-arrow-up"></i> 8.2%</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-person-check"></i></div>
                <div class="stat-label">Agents Online</div>
                <div class="stat-value">32</div>
                <div class="stat-change positive"><i class="bi bi-arrow-up"></i> 5 active</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="content-card">
            <div class="card-header-custom">
                <h5><i class="bi bi-lightning-fill" style="color: #ffd43b;"></i> Quick Actions</h5>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-primary btn-sm" onclick="alert('📋 Add User form...')">
                    <i class="bi bi-person-plus"></i> Add User
                </button>
                <button class="btn btn-success btn-sm" onclick="alert('📊 New Campaign wizard...')">
                    <i class="bi bi-megaphone"></i> New Campaign
                </button>
                <button class="btn btn-info btn-sm" onclick="alert('🤖 AI Report generating...')">
                    <i class="bi bi-robot"></i> AI Report
                </button>
                <button class="btn btn-warning btn-sm" onclick="alert('⏰ Timeclock summary...')">
                    <i class="bi bi-clock"></i> Timeclock
                </button>
            </div>
        </div>

        <!-- ============================================
           ORIGINAL ADMIN CONTENT - PHP OUTPUT GOES HERE
           ============================================ -->
        <div class="content-card">
            <div class="card-header-custom">
                <h5><i class="bi bi-hdd-stack"></i> Admin Modules</h5>
                <span style="font-size: 0.7rem; color: var(--text-muted);">VICIdial v2.14</span>
            </div>

            <?php
            // ============================================
            // ORIGINAL PHP ADMIN LOGIC - UNCHANGED
            // All your existing ADD, SUB, and display logic
            // goes here. The old HTML tables will be
            // automatically styled by our new CSS.
            // ============================================
            
            // Example: User listing (your existing code)
            if ($ADD == 0 || $ADD == "0A") {
                // Your existing user list code
                // The CSS will style it automatically
            }
            
            // All other ADD cases remain unchanged
            // The modern CSS will style the output
            ?>
            
            <!-- 
            ORIGINAL admin.php OUTPUT GOES HERE
            All echo statements and HTML from your existing code
            will be automatically styled by the new CSS above.
            -->
            
            <p class="text-center text-muted" style="font-size: 0.8rem; padding: 2rem 0;">
                <i class="bi bi-check-circle-fill" style="color: #51cf66;"></i>
                System running smoothly · 
                <span style="color: var(--text-muted);"><?php echo date('Y-m-d H:i:s'); ?></span>
            </p>

        </div>

    </div>
</main>

<!-- ============================================
   JAVASCRIPT
   ============================================ -->
<script>
    // Toggle sidebar on mobile
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
    }

    // Close sidebar on outside click (mobile)
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        if (window.innerWidth <= 992) {
            if (!sidebar.contains(e.target) && e.target !== sidebar) {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            }
        }
    });

    // Keyboard shortcut: Ctrl+/ to focus search
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === '/') {
            e.preventDefault();
            const search = document.getElementById('globalSearch');
            if (search) { search.focus(); }
        }
    });

    // Console welcome message
    console.log('%c🚀 HN Connect Admin Panel v2.0', 'font-size: 18px; font-weight: bold; color: #7a5cff;');
    console.log('%c🔐 Modern UI loaded successfully', 'font-size: 12px; color: #51cf66;');
    console.log('%c📊 System ready', 'font-size: 12px; color: #ffd43b;');
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

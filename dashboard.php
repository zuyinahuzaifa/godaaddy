<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Sample data for dashboard metrics (replace with actual data from your database)
$metrics = [
    ['title' => 'Total Users', 'value' => '1,234', 'icon' => '👥'],
    ['title' => 'Total Sales', 'value' => '$5,678', 'icon' => '💰'],
    ['title' => 'New Orders', 'value' => '25', 'icon' => '📦'],
    ['title' => 'Total Products', 'value' => '789', 'icon' => '🛍️']
];

// Sample recent activities (replace with actual data)
$activities = [
    ['action' => 'New order received', 'time' => '5 minutes ago'],
    ['action' => 'User registration', 'time' => '10 minutes ago'],
    ['action' => 'Product updated', 'time' => '15 minutes ago'],
    ['action' => 'Payment received', 'time' => '30 minutes ago']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6b7280;
            --background-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-color: #1f2937;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: var(--card-bg);
            padding: 2rem;
            border-right: 1px solid var(--border-color);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 2rem;
            display: block;
            text-decoration: none;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-color);
            text-decoration: none;
            border-radius: 0.5rem;
            transition: var(--transition);
        }

        .nav-link:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Main Content Styles */
        .main-content {
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .welcome-text {
            font-size: 1.5rem;
            color: var(--text-color);
        }

        .logout-btn {
            background-color: var(--danger-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .logout-btn:hover {
            opacity: 0.9;
        }

        /* Metrics Grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* layouts/app.twig */
class __TwigTemplate_defb146c9b4032eb720ca70f9e7dcea3 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'head' => [$this, 'block_head'],
            'page_title' => [$this, 'block_page_title'],
            'topbar_actions' => [$this, 'block_topbar_actions'],
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\" data-theme=\"";
        // line 2
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "theme", [], "any", true, true, false, 2) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "theme", [], "any", false, false, false, 2)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "theme", [], "any", false, false, false, 2), "html", null, true)) : ("dark"));
        yield "\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield " — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["app_name"] ?? null), "html", null, true);
        yield "</title>
    <meta name=\"csrf-token\" content=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('csrf_token')->getCallable()(), "html", null, true);
        yield "\">

    
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap\" rel=\"stylesheet\">

    
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\">

    <style>
        :root {
            --accent: ";
        // line 18
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "accent_color", [], "any", true, true, false, 18) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "accent_color", [], "any", false, false, false, 18)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "accent_color", [], "any", false, false, false, 18), "html", null, true)) : ("#6366f1"));
        yield ";
            --accent-rgb: 99, 102, 241;
            --accent-hover: color-mix(in srgb, var(--accent) 85%, white);
        }

        [data-theme=\"dark\"] {
            --bg-base: #0a0a0f;
            --bg-surface: #111118;
            --bg-elevated: #18181f;
            --bg-hover: #1e1e28;
            --border: rgba(255,255,255,0.06);
            --border-strong: rgba(255,255,255,0.12);
            --text-primary: #f0f0f5;
            --text-secondary: rgba(240,240,245,0.55);
            --text-muted: rgba(240,240,245,0.3);
            --shadow: 0 4px 24px rgba(0,0,0,0.4);
        }

        [data-theme=\"light\"] {
            --bg-base: #f4f4f8;
            --bg-surface: #ffffff;
            --bg-elevated: #f8f8fc;
            --bg-hover: #ebebf3;
            --border: rgba(0,0,0,0.07);
            --border-strong: rgba(0,0,0,0.12);
            --text-primary: #0f0f18;
            --text-secondary: rgba(15,15,24,0.55);
            --text-muted: rgba(15,15,24,0.35);
            --shadow: 0 4px 24px rgba(0,0,0,0.08);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--bg-surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-logo {
            padding: 24px 24px 20px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-logo .logo-text {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 20px;
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 34px; height: 34px;
            background: var(--accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: white;
        }

        .sidebar-user {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: var(--accent);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 14px;
            color: white;
            overflow: hidden;
            flex-shrink: 0;
        }

        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .user-info .user-name {
            font-weight: 500;
            font-size: 13px;
            color: var(--text-primary);
        }

        .user-info .user-role {
            font-size: 11px;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .nav-section {
            margin-bottom: 24px;
        }

        .nav-section-title {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 0 12px;
            margin-bottom: 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 10px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.15s ease;
            margin-bottom: 2px;
            position: relative;
        }

        .nav-item:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
        }

        .nav-item.active {
            background: rgba(var(--accent-rgb), 0.12);
            color: var(--accent);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 60%;
            background: var(--accent);
            border-radius: 0 3px 3px 0;
        }

        .nav-item i { width: 18px; text-align: center; font-size: 14px; }

        .nav-badge {
            margin-left: auto;
            background: var(--accent);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 1px 6px;
            border-radius: 20px;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }

        /* Main content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .topbar {
            height: 64px;
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 18px;
        }

        .topbar-actions { display: flex; align-items: center; gap: 12px; }

        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 18px;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .btn-primary {
            background: var(--accent);
            color: white;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--bg-elevated);
            color: var(--text-secondary);
            border: 1px solid var(--border-strong);
        }

        .btn-secondary:hover { background: var(--bg-hover); color: var(--text-primary); }

        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }

        .btn-sm { padding: 5px 12px; font-size: 12px; }
        .btn-icon { padding: 8px; border-radius: 8px; }

        /* Page body */
        .page-body {
            padding: 28px;
            flex: 1;
        }

        /* Cards */
        .card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-family: 'Syne', sans-serif;
            font-size: 15px;
            font-weight: 700;
        }

        .card-body { padding: 24px; }

        /* Stats cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 80px; height: 80px;
            background: radial-gradient(circle at top right, rgba(var(--accent-rgb), 0.12), transparent 70%);
        }

        .stat-icon {
            width: 40px; height: 40px;
            border-radius: 12px;
            background: rgba(var(--accent-rgb), 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: var(--accent);
            margin-bottom: 14px;
        }

        .stat-value {
            font-family: 'Syne', sans-serif;
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Table */
        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 12px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 14px 16px;
            font-size: 13.5px;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td { border-bottom: none; }

        tr:hover td { background: var(--bg-hover); }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-success { background: rgba(34,197,94,0.12); color: #22c55e; }
        .badge-primary { background: rgba(var(--accent-rgb),0.12); color: var(--accent); }
        .badge-secondary { background: var(--bg-elevated); color: var(--text-secondary); }
        .badge-danger { background: rgba(239,68,68,0.12); color: #ef4444; }
        .badge-warning { background: rgba(245,158,11,0.12); color: #f59e0b; }

        /* Platform pills */
        .platform-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            background: var(--bg-elevated);
        }

        /* Forms */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            background: var(--bg-elevated);
            border: 1px solid var(--border-strong);
            border-radius: 10px;
            color: var(--text-primary);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.15s;
        }

        .form-control:focus {
            border-color: var(--accent);
            background: var(--bg-hover);
        }

        .form-control.error { border-color: #ef4444; }

        select.form-control { cursor: pointer; }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-error {
            font-size: 12px;
            color: #ef4444;
            margin-top: 4px;
        }

        /* Flash messages */
        .flash-container {
            position: fixed;
            top: 76px; right: 24px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-width: 380px;
        }

        .flash {
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease;
            box-shadow: var(--shadow);
        }

        .flash-success { background: rgba(34,197,94,0.15); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; }
        .flash-error { background: rgba(239,68,68,0.15); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; }
        .flash-info { background: rgba(var(--accent-rgb),0.15); border: 1px solid rgba(var(--accent-rgb),0.3); color: var(--accent); }

        @keyframes slideIn {
            from { transform: translateX(40px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Grid layouts */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .col-span-2 { grid-column: span 2; }

        /* Utilities */
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 12px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-6 { margin-bottom: 24px; }
        .text-sm { font-size: 13px; }
        .text-muted { color: var(--text-secondary); }
        .font-bold { font-weight: 700; }
        .font-syne { font-family: 'Syne', sans-serif; }
        .truncate { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 60px 24px;
        }

        .empty-state i {
            font-size: 48px;
            color: var(--text-muted);
            margin-bottom: 16px;
            display: block;
        }

        .empty-state h3 {
            font-family: 'Syne', sans-serif;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .empty-state p { color: var(--text-secondary); font-size: 14px; margin-bottom: 20px; }

        /* Pagination */
        .pagination {
            display: flex; align-items: center; gap: 6px;
            padding: 16px 24px;
            border-top: 1px solid var(--border);
        }

        .page-link {
            width: 34px; height: 34px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            color: var(--text-secondary);
            border: 1px solid var(--border);
            transition: all 0.15s;
        }

        .page-link:hover { background: var(--bg-hover); color: var(--text-primary); }
        .page-link.active { background: var(--accent); color: white; border-color: var(--accent); }
        .page-link.disabled { opacity: 0.4; pointer-events: none; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-strong); border-radius: 3px; }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }

        @media (max-width: 768px) {
            .grid-2, .grid-3 { grid-template-columns: 1fr; }
            .col-span-2 { grid-column: span 1; }
            .page-body { padding: 16px; }
        }
    </style>

    ";
        // line 580
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        // line 581
        yield "</head>
<body>

<aside class=\"sidebar\" id=\"sidebar\">
    <div class=\"sidebar-logo\">
        <a href=\"/\" class=\"logo-text\">
            <div class=\"logo-icon\"><i class=\"fas fa-calendar-alt\"></i></div>
            SMM Planner
        </a>
    </div>

    ";
        // line 592
        if ((($tmp = ($context["auth"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 593
            yield "    <div class=\"sidebar-user\">
        <div class=\"user-avatar\">
            ";
            // line 595
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "avatar", [], "any", false, false, false, 595)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 596
                yield "                <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "avatar", [], "any", false, false, false, 596), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "username", [], "any", false, false, false, 596), "html", null, true);
                yield "\">
            ";
            } else {
                // line 598
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "full_name", [], "any", true, true, false, 598)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "full_name", [], "any", false, false, false, 598), CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "username", [], "any", false, false, false, 598))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "username", [], "any", false, false, false, 598))))), "html", null, true);
                yield "
            ";
            }
            // line 600
            yield "        </div>
        <div class=\"user-info\">
            <div class=\"user-name\">";
            // line 602
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "full_name", [], "any", true, true, false, 602) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "full_name", [], "any", false, false, false, 602)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "full_name", [], "any", false, false, false, 602), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "username", [], "any", false, false, false, 602), "html", null, true)));
            yield "</div>
            <div class=\"user-role\">";
            // line 603
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "role", [], "any", false, false, false, 603), "html", null, true);
            yield "</div>
        </div>
    </div>
    ";
        }
        // line 607
        yield "
    <nav class=\"sidebar-nav\">
        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Main</div>
            <a href=\"/\" class=\"nav-item ";
        // line 611
        if (((($context["current_url"] ?? null) == "/") || (($context["current_url"] ?? null) == "/dashboard"))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-home\"></i> Dashboard
            </a>
            <a href=\"/posts\" class=\"nav-item ";
        // line 614
        if (CoreExtension::inFilter("/posts", ($context["current_url"] ?? null))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-edit\"></i> Posts
            </a>
            <a href=\"/calendar\" class=\"nav-item ";
        // line 617
        if ((($context["current_url"] ?? null) == "/calendar")) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-calendar\"></i> Calendar
            </a>
        </div>

        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Social</div>
            <a href=\"/accounts\" class=\"nav-item ";
        // line 624
        if (CoreExtension::inFilter("/accounts", ($context["current_url"] ?? null))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-share-alt\"></i> Accounts
            </a>
        </div>

        ";
        // line 629
        if ((($context["auth"] ?? null) && (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "role", [], "any", false, false, false, 629) == "admin"))) {
            // line 630
            yield "        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Admin</div>
            <a href=\"/users\" class=\"nav-item ";
            // line 632
            if (CoreExtension::inFilter("/users", ($context["current_url"] ?? null))) {
                yield "active";
            }
            yield "\">
                <i class=\"fas fa-users\"></i> Users
            </a>
        </div>
        ";
        }
        // line 637
        yield "
        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Account</div>
            <a href=\"/profile\" class=\"nav-item ";
        // line 640
        if ((($context["current_url"] ?? null) == "/profile")) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-user-circle\"></i> Profile
            </a>
        </div>
    </nav>

    <div class=\"sidebar-footer\">
        <a href=\"/logout\" class=\"nav-item\" style=\"color: #ef4444;\">
            <i class=\"fas fa-sign-out-alt\"></i> Sign Out
        </a>
    </div>
</aside>

<div class=\"main-content\">
    <header class=\"topbar\">
        <div class=\"flex items-center gap-3\">
            <button class=\"btn btn-secondary btn-icon\" id=\"sidebar-toggle\" style=\"display:none\">
                <i class=\"fas fa-bars\"></i>
            </button>
            <h1 class=\"topbar-title\">";
        // line 659
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</h1>
        </div>
        <div class=\"topbar-actions\">
            ";
        // line 662
        yield from $this->unwrap()->yieldBlock('topbar_actions', $context, $blocks);
        // line 663
        yield "            <a href=\"/posts/create\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> New Post
            </a>
        </div>
    </header>

    
    ";
        // line 670
        if ((($tmp = ($context["flash"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 671
            yield "    <div class=\"flash-container\" id=\"flash-container\">
        ";
            // line 672
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["flash"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 673
                yield "        <div class=\"flash flash-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "type", [], "any", false, false, false, 673), "html", null, true);
                yield "\">
            <i class=\"fas fa-";
                // line 674
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "type", [], "any", false, false, false, 674) == "success")) {
                    yield "check-circle";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "type", [], "any", false, false, false, 674) == "error")) {
                    yield "exclamation-circle";
                } else {
                    yield "info-circle";
                }
                yield "\"></i>
            ";
                // line 675
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "message", [], "any", false, false, false, 675), "html", null, true);
                yield "
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 678
            yield "    </div>
    ";
        }
        // line 680
        yield "
    <main class=\"page-body\">
        ";
        // line 682
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 683
        yield "    </main>
</div>

<script>
// Flash auto-dismiss
document.querySelectorAll('.flash').forEach(el => {
    setTimeout(() => {
        el.style.opacity = '0';
        el.style.transform = 'translateX(40px)';
        el.style.transition = 'all 0.3s ease';
        setTimeout(() => el.remove(), 300);
    }, 4000);
});

// Sidebar toggle for mobile
const toggle = document.getElementById('sidebar-toggle');
const sidebar = document.getElementById('sidebar');
if (window.innerWidth <= 1024) {
    toggle.style.display = 'flex';
    toggle.addEventListener('click', () => sidebar.classList.toggle('open'));
}

// Confirm deletes
document.querySelectorAll('[data-confirm]').forEach(el => {
    el.addEventListener('click', e => {
        if (!confirm(el.dataset.confirm)) e.preventDefault();
    });
});
</script>

";
        // line 713
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 714
        yield "</body>
</html>
";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Dashboard";
        yield from [];
    }

    // line 580
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 659
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Dashboard";
        yield from [];
    }

    // line 662
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_topbar_actions(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 682
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 713
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/app.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  937 => 713,  927 => 682,  917 => 662,  906 => 659,  896 => 580,  885 => 6,  878 => 714,  876 => 713,  844 => 683,  842 => 682,  838 => 680,  834 => 678,  825 => 675,  815 => 674,  810 => 673,  806 => 672,  803 => 671,  801 => 670,  792 => 663,  790 => 662,  784 => 659,  760 => 640,  755 => 637,  745 => 632,  741 => 630,  739 => 629,  729 => 624,  717 => 617,  709 => 614,  701 => 611,  695 => 607,  688 => 603,  684 => 602,  680 => 600,  674 => 598,  666 => 596,  664 => 595,  660 => 593,  658 => 592,  645 => 581,  643 => 580,  78 => 18,  64 => 7,  58 => 6,  51 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\" data-theme=\"{{ auth.theme ?? 'dark' }}\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Dashboard{% endblock %} — {{ app_name }}</title>
    <meta name=\"csrf-token\" content=\"{{ csrf_token() }}\">

    
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap\" rel=\"stylesheet\">

    
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\">

    <style>
        :root {
            --accent: {{ auth.accent_color ?? '#6366f1' }};
            --accent-rgb: 99, 102, 241;
            --accent-hover: color-mix(in srgb, var(--accent) 85%, white);
        }

        [data-theme=\"dark\"] {
            --bg-base: #0a0a0f;
            --bg-surface: #111118;
            --bg-elevated: #18181f;
            --bg-hover: #1e1e28;
            --border: rgba(255,255,255,0.06);
            --border-strong: rgba(255,255,255,0.12);
            --text-primary: #f0f0f5;
            --text-secondary: rgba(240,240,245,0.55);
            --text-muted: rgba(240,240,245,0.3);
            --shadow: 0 4px 24px rgba(0,0,0,0.4);
        }

        [data-theme=\"light\"] {
            --bg-base: #f4f4f8;
            --bg-surface: #ffffff;
            --bg-elevated: #f8f8fc;
            --bg-hover: #ebebf3;
            --border: rgba(0,0,0,0.07);
            --border-strong: rgba(0,0,0,0.12);
            --text-primary: #0f0f18;
            --text-secondary: rgba(15,15,24,0.55);
            --text-muted: rgba(15,15,24,0.35);
            --shadow: 0 4px 24px rgba(0,0,0,0.08);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-base);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--bg-surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-logo {
            padding: 24px 24px 20px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-logo .logo-text {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 20px;
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 34px; height: 34px;
            background: var(--accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: white;
        }

        .sidebar-user {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: var(--accent);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 14px;
            color: white;
            overflow: hidden;
            flex-shrink: 0;
        }

        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .user-info .user-name {
            font-weight: 500;
            font-size: 13px;
            color: var(--text-primary);
        }

        .user-info .user-role {
            font-size: 11px;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .nav-section {
            margin-bottom: 24px;
        }

        .nav-section-title {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 0 12px;
            margin-bottom: 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 10px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.15s ease;
            margin-bottom: 2px;
            position: relative;
        }

        .nav-item:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
        }

        .nav-item.active {
            background: rgba(var(--accent-rgb), 0.12);
            color: var(--accent);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 60%;
            background: var(--accent);
            border-radius: 0 3px 3px 0;
        }

        .nav-item i { width: 18px; text-align: center; font-size: 14px; }

        .nav-badge {
            margin-left: auto;
            background: var(--accent);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 1px 6px;
            border-radius: 20px;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }

        /* Main content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .topbar {
            height: 64px;
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 18px;
        }

        .topbar-actions { display: flex; align-items: center; gap: 12px; }

        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 18px;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .btn-primary {
            background: var(--accent);
            color: white;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--bg-elevated);
            color: var(--text-secondary);
            border: 1px solid var(--border-strong);
        }

        .btn-secondary:hover { background: var(--bg-hover); color: var(--text-primary); }

        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }

        .btn-sm { padding: 5px 12px; font-size: 12px; }
        .btn-icon { padding: 8px; border-radius: 8px; }

        /* Page body */
        .page-body {
            padding: 28px;
            flex: 1;
        }

        /* Cards */
        .card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-family: 'Syne', sans-serif;
            font-size: 15px;
            font-weight: 700;
        }

        .card-body { padding: 24px; }

        /* Stats cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 80px; height: 80px;
            background: radial-gradient(circle at top right, rgba(var(--accent-rgb), 0.12), transparent 70%);
        }

        .stat-icon {
            width: 40px; height: 40px;
            border-radius: 12px;
            background: rgba(var(--accent-rgb), 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: var(--accent);
            margin-bottom: 14px;
        }

        .stat-value {
            font-family: 'Syne', sans-serif;
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Table */
        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 12px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 14px 16px;
            font-size: 13.5px;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td { border-bottom: none; }

        tr:hover td { background: var(--bg-hover); }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-success { background: rgba(34,197,94,0.12); color: #22c55e; }
        .badge-primary { background: rgba(var(--accent-rgb),0.12); color: var(--accent); }
        .badge-secondary { background: var(--bg-elevated); color: var(--text-secondary); }
        .badge-danger { background: rgba(239,68,68,0.12); color: #ef4444; }
        .badge-warning { background: rgba(245,158,11,0.12); color: #f59e0b; }

        /* Platform pills */
        .platform-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            background: var(--bg-elevated);
        }

        /* Forms */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            background: var(--bg-elevated);
            border: 1px solid var(--border-strong);
            border-radius: 10px;
            color: var(--text-primary);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.15s;
        }

        .form-control:focus {
            border-color: var(--accent);
            background: var(--bg-hover);
        }

        .form-control.error { border-color: #ef4444; }

        select.form-control { cursor: pointer; }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-error {
            font-size: 12px;
            color: #ef4444;
            margin-top: 4px;
        }

        /* Flash messages */
        .flash-container {
            position: fixed;
            top: 76px; right: 24px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-width: 380px;
        }

        .flash {
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease;
            box-shadow: var(--shadow);
        }

        .flash-success { background: rgba(34,197,94,0.15); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; }
        .flash-error { background: rgba(239,68,68,0.15); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; }
        .flash-info { background: rgba(var(--accent-rgb),0.15); border: 1px solid rgba(var(--accent-rgb),0.3); color: var(--accent); }

        @keyframes slideIn {
            from { transform: translateX(40px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Grid layouts */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .col-span-2 { grid-column: span 2; }

        /* Utilities */
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 12px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-6 { margin-bottom: 24px; }
        .text-sm { font-size: 13px; }
        .text-muted { color: var(--text-secondary); }
        .font-bold { font-weight: 700; }
        .font-syne { font-family: 'Syne', sans-serif; }
        .truncate { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 60px 24px;
        }

        .empty-state i {
            font-size: 48px;
            color: var(--text-muted);
            margin-bottom: 16px;
            display: block;
        }

        .empty-state h3 {
            font-family: 'Syne', sans-serif;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .empty-state p { color: var(--text-secondary); font-size: 14px; margin-bottom: 20px; }

        /* Pagination */
        .pagination {
            display: flex; align-items: center; gap: 6px;
            padding: 16px 24px;
            border-top: 1px solid var(--border);
        }

        .page-link {
            width: 34px; height: 34px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            color: var(--text-secondary);
            border: 1px solid var(--border);
            transition: all 0.15s;
        }

        .page-link:hover { background: var(--bg-hover); color: var(--text-primary); }
        .page-link.active { background: var(--accent); color: white; border-color: var(--accent); }
        .page-link.disabled { opacity: 0.4; pointer-events: none; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-strong); border-radius: 3px; }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }

        @media (max-width: 768px) {
            .grid-2, .grid-3 { grid-template-columns: 1fr; }
            .col-span-2 { grid-column: span 1; }
            .page-body { padding: 16px; }
        }
    </style>

    {% block head %}{% endblock %}
</head>
<body>

<aside class=\"sidebar\" id=\"sidebar\">
    <div class=\"sidebar-logo\">
        <a href=\"/\" class=\"logo-text\">
            <div class=\"logo-icon\"><i class=\"fas fa-calendar-alt\"></i></div>
            SMM Planner
        </a>
    </div>

    {% if auth %}
    <div class=\"sidebar-user\">
        <div class=\"user-avatar\">
            {% if auth.avatar %}
                <img src=\"{{ auth.avatar }}\" alt=\"{{ auth.username }}\">
            {% else %}
                {{ auth.full_name|default(auth.username)|first|upper }}
            {% endif %}
        </div>
        <div class=\"user-info\">
            <div class=\"user-name\">{{ auth.full_name ?? auth.username }}</div>
            <div class=\"user-role\">{{ auth.role }}</div>
        </div>
    </div>
    {% endif %}

    <nav class=\"sidebar-nav\">
        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Main</div>
            <a href=\"/\" class=\"nav-item {% if current_url == '/' or current_url == '/dashboard' %}active{% endif %}\">
                <i class=\"fas fa-home\"></i> Dashboard
            </a>
            <a href=\"/posts\" class=\"nav-item {% if '/posts' in current_url %}active{% endif %}\">
                <i class=\"fas fa-edit\"></i> Posts
            </a>
            <a href=\"/calendar\" class=\"nav-item {% if current_url == '/calendar' %}active{% endif %}\">
                <i class=\"fas fa-calendar\"></i> Calendar
            </a>
        </div>

        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Social</div>
            <a href=\"/accounts\" class=\"nav-item {% if '/accounts' in current_url %}active{% endif %}\">
                <i class=\"fas fa-share-alt\"></i> Accounts
            </a>
        </div>

        {% if auth and auth.role == 'admin' %}
        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Admin</div>
            <a href=\"/users\" class=\"nav-item {% if '/users' in current_url %}active{% endif %}\">
                <i class=\"fas fa-users\"></i> Users
            </a>
        </div>
        {% endif %}

        <div class=\"nav-section\">
            <div class=\"nav-section-title\">Account</div>
            <a href=\"/profile\" class=\"nav-item {% if current_url == '/profile' %}active{% endif %}\">
                <i class=\"fas fa-user-circle\"></i> Profile
            </a>
        </div>
    </nav>

    <div class=\"sidebar-footer\">
        <a href=\"/logout\" class=\"nav-item\" style=\"color: #ef4444;\">
            <i class=\"fas fa-sign-out-alt\"></i> Sign Out
        </a>
    </div>
</aside>

<div class=\"main-content\">
    <header class=\"topbar\">
        <div class=\"flex items-center gap-3\">
            <button class=\"btn btn-secondary btn-icon\" id=\"sidebar-toggle\" style=\"display:none\">
                <i class=\"fas fa-bars\"></i>
            </button>
            <h1 class=\"topbar-title\">{% block page_title %}Dashboard{% endblock %}</h1>
        </div>
        <div class=\"topbar-actions\">
            {% block topbar_actions %}{% endblock %}
            <a href=\"/posts/create\" class=\"btn btn-primary\">
                <i class=\"fas fa-plus\"></i> New Post
            </a>
        </div>
    </header>

    
    {% if flash %}
    <div class=\"flash-container\" id=\"flash-container\">
        {% for msg in flash %}
        <div class=\"flash flash-{{ msg.type }}\">
            <i class=\"fas fa-{% if msg.type == 'success' %}check-circle{% elseif msg.type == 'error' %}exclamation-circle{% else %}info-circle{% endif %}\"></i>
            {{ msg.message }}
        </div>
        {% endfor %}
    </div>
    {% endif %}

    <main class=\"page-body\">
        {% block content %}{% endblock %}
    </main>
</div>

<script>
// Flash auto-dismiss
document.querySelectorAll('.flash').forEach(el => {
    setTimeout(() => {
        el.style.opacity = '0';
        el.style.transform = 'translateX(40px)';
        el.style.transition = 'all 0.3s ease';
        setTimeout(() => el.remove(), 300);
    }, 4000);
});

// Sidebar toggle for mobile
const toggle = document.getElementById('sidebar-toggle');
const sidebar = document.getElementById('sidebar');
if (window.innerWidth <= 1024) {
    toggle.style.display = 'flex';
    toggle.addEventListener('click', () => sidebar.classList.toggle('open'));
}

// Confirm deletes
document.querySelectorAll('[data-confirm]').forEach(el => {
    el.addEventListener('click', e => {
        if (!confirm(el.dataset.confirm)) e.preventDefault();
    });
});
</script>

{% block scripts %}{% endblock %}
</body>
</html>
", "layouts/app.twig", "/home/neyst/Загрузки/smm_planner/smm_output/templates/layouts/app.twig");
    }
}

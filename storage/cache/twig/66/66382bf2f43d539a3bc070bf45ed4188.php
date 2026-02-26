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

/* pages/login.twig */
class __TwigTemplate_dc397297ea5bcf609a0110a61144f82f extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\" data-theme=\"dark\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Sign In — SMM Planner</title>
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;500;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\">
    <style>
        :root {
            --accent: #6366f1;
            --accent-rgb: 99, 102, 241;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: #0a0a0f;
            color: #f0f0f5;
            min-height: 100vh;
            display: flex;
        }

        .login-bg {
            flex: 1;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0a0a0f 0%, #111128 50%, #0f0f1a 100%);
        }

        /* Animated background grid */
        .login-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(99,102,241,0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99,102,241,0.08) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
        }

        /* Glow orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: pulse 4s ease-in-out infinite alternate;
        }
        .orb-1 { width: 400px; height: 400px; background: #6366f1; top: -100px; left: -100px; }
        .orb-2 { width: 300px; height: 300px; background: #a855f7; bottom: -80px; right: -60px; animation-delay: 2s; }

        @keyframes pulse {
            from { transform: scale(1); opacity: 0.2; }
            to { transform: scale(1.15); opacity: 0.35; }
        }

        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            margin: 24px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-mark {
            width: 56px; height: 56px;
            background: var(--accent);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            color: white;
            margin: 0 auto 16px;
            box-shadow: 0 0 40px rgba(99,102,241,0.4);
        }

        .login-header h1 {
            font-family: 'Syne', sans-serif;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .login-header p {
            color: rgba(240,240,245,0.5);
            font-size: 14px;
        }

        .form-box {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 36px;
            backdrop-filter: blur(20px);
        }

        .form-group { margin-bottom: 18px; }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: rgba(240,240,245,0.5);
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: rgba(240,240,245,0.3);
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px 12px 40px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            color: #f0f0f5;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        .form-control:focus {
            border-color: var(--accent);
            background: rgba(99,102,241,0.08);
        }

        .form-control::placeholder { color: rgba(240,240,245,0.25); }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(240,240,245,0.6);
            cursor: pointer;
        }

        input[type=\"checkbox\"] {
            width: 16px; height: 16px;
            accent-color: var(--accent);
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: var(--accent);
            color: white;
            border: none;
            border-radius: 12px;
            font-family: 'Syne', sans-serif;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 20px rgba(99,102,241,0.35);
        }

        .btn-login:hover {
            background: #818cf8;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99,102,241,0.5);
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-error {
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.3);
            color: #f87171;
        }

        .demo-hint {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: rgba(240,240,245,0.3);
        }

        .demo-hint code {
            background: rgba(255,255,255,0.06);
            padding: 2px 6px;
            border-radius: 4px;
            color: rgba(240,240,245,0.5);
        }
    </style>
</head>
<body>
<div class=\"login-bg\">
    <div class=\"orb orb-1\"></div>
    <div class=\"orb orb-2\"></div>

    <div class=\"login-card\">
        <div class=\"login-header\">
            <div class=\"logo-mark\"><i class=\"fas fa-calendar-alt\"></i></div>
            <h1>Welcome back</h1>
            <p>Sign in to your SMM Planner workspace</p>
        </div>

        <div class=\"form-box\">
            ";
        // line 236
        if ((($tmp = ($context["flash"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 237
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["flash"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 238
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "type", [], "any", false, false, false, 238), "html", null, true);
                yield "\">
                        <i class=\"fas fa-exclamation-circle\"></i>
                        ";
                // line 240
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "message", [], "any", false, false, false, 240), "html", null, true);
                yield "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 243
            yield "            ";
        }
        // line 244
        yield "
            <form action=\"/login/process\" method=\"POST\">
                <input type=\"hidden\" name=\"_token\" value=\"";
        // line 246
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('csrf_token')->getCallable()(), "html", null, true);
        yield "\">

                <div class=\"form-group\">
                    <label class=\"form-label\">Email or Username</label>
                    <div class=\"input-wrap\">
                        <i class=\"fas fa-user\"></i>
                        <input type=\"text\" name=\"identifier\" class=\"form-control\" placeholder=\"admin@smmplanner.com\" required autofocus>
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"form-label\">Password</label>
                    <div class=\"input-wrap\">
                        <i class=\"fas fa-lock\"></i>
                        <input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"••••••••\" required>
                    </div>
                </div>

                <div class=\"remember-row\">
                    <label class=\"checkbox-label\">
                        <input type=\"checkbox\" name=\"remember\"> Remember me
                    </label>
                </div>

                <button type=\"submit\" class=\"btn-login\">Sign In →</button>
            </form>

            <div class=\"demo-hint\">
                Demo: <code>admin@smmplanner.com</code> / <code>Admin@123</code>
            </div>
        </div>
    </div>
</div>
</body>
</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/login.twig";
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
        return array (  308 => 246,  304 => 244,  301 => 243,  292 => 240,  286 => 238,  281 => 237,  279 => 236,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\" data-theme=\"dark\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Sign In — SMM Planner</title>
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Syne:wght@400;500;700;800&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\">
    <style>
        :root {
            --accent: #6366f1;
            --accent-rgb: 99, 102, 241;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: #0a0a0f;
            color: #f0f0f5;
            min-height: 100vh;
            display: flex;
        }

        .login-bg {
            flex: 1;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0a0a0f 0%, #111128 50%, #0f0f1a 100%);
        }

        /* Animated background grid */
        .login-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(99,102,241,0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99,102,241,0.08) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
        }

        /* Glow orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: pulse 4s ease-in-out infinite alternate;
        }
        .orb-1 { width: 400px; height: 400px; background: #6366f1; top: -100px; left: -100px; }
        .orb-2 { width: 300px; height: 300px; background: #a855f7; bottom: -80px; right: -60px; animation-delay: 2s; }

        @keyframes pulse {
            from { transform: scale(1); opacity: 0.2; }
            to { transform: scale(1.15); opacity: 0.35; }
        }

        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            margin: 24px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-mark {
            width: 56px; height: 56px;
            background: var(--accent);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            color: white;
            margin: 0 auto 16px;
            box-shadow: 0 0 40px rgba(99,102,241,0.4);
        }

        .login-header h1 {
            font-family: 'Syne', sans-serif;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .login-header p {
            color: rgba(240,240,245,0.5);
            font-size: 14px;
        }

        .form-box {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 36px;
            backdrop-filter: blur(20px);
        }

        .form-group { margin-bottom: 18px; }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: rgba(240,240,245,0.5);
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: rgba(240,240,245,0.3);
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px 12px 40px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            color: #f0f0f5;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        .form-control:focus {
            border-color: var(--accent);
            background: rgba(99,102,241,0.08);
        }

        .form-control::placeholder { color: rgba(240,240,245,0.25); }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(240,240,245,0.6);
            cursor: pointer;
        }

        input[type=\"checkbox\"] {
            width: 16px; height: 16px;
            accent-color: var(--accent);
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: var(--accent);
            color: white;
            border: none;
            border-radius: 12px;
            font-family: 'Syne', sans-serif;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 20px rgba(99,102,241,0.35);
        }

        .btn-login:hover {
            background: #818cf8;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99,102,241,0.5);
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-error {
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.3);
            color: #f87171;
        }

        .demo-hint {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: rgba(240,240,245,0.3);
        }

        .demo-hint code {
            background: rgba(255,255,255,0.06);
            padding: 2px 6px;
            border-radius: 4px;
            color: rgba(240,240,245,0.5);
        }
    </style>
</head>
<body>
<div class=\"login-bg\">
    <div class=\"orb orb-1\"></div>
    <div class=\"orb orb-2\"></div>

    <div class=\"login-card\">
        <div class=\"login-header\">
            <div class=\"logo-mark\"><i class=\"fas fa-calendar-alt\"></i></div>
            <h1>Welcome back</h1>
            <p>Sign in to your SMM Planner workspace</p>
        </div>

        <div class=\"form-box\">
            {% if flash %}
                {% for msg in flash %}
                    <div class=\"alert alert-{{ msg.type }}\">
                        <i class=\"fas fa-exclamation-circle\"></i>
                        {{ msg.message }}
                    </div>
                {% endfor %}
            {% endif %}

            <form action=\"/login/process\" method=\"POST\">
                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\">

                <div class=\"form-group\">
                    <label class=\"form-label\">Email or Username</label>
                    <div class=\"input-wrap\">
                        <i class=\"fas fa-user\"></i>
                        <input type=\"text\" name=\"identifier\" class=\"form-control\" placeholder=\"admin@smmplanner.com\" required autofocus>
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"form-label\">Password</label>
                    <div class=\"input-wrap\">
                        <i class=\"fas fa-lock\"></i>
                        <input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"••••••••\" required>
                    </div>
                </div>

                <div class=\"remember-row\">
                    <label class=\"checkbox-label\">
                        <input type=\"checkbox\" name=\"remember\"> Remember me
                    </label>
                </div>

                <button type=\"submit\" class=\"btn-login\">Sign In →</button>
            </form>

            <div class=\"demo-hint\">
                Demo: <code>admin@smmplanner.com</code> / <code>Admin@123</code>
            </div>
        </div>
    </div>
</div>
</body>
</html>
", "pages/login.twig", "/home/neyst/Загрузки/smm_planner/smm_output/templates/pages/login.twig");
    }
}

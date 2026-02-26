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

/* pages/calendar.twig */
class __TwigTemplate_9b48a80597217acfa2a3a1716b9fde29 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'page_title' => [$this, 'block_page_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/app.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layouts/app.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Content Calendar";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Content Calendar";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        yield "
<div style=\"display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;\">
    <div style=\"display:flex;align-items:center;gap:12px;\">
        ";
        // line 10
        $context["prevMonth"] = $this->extensions['Twig\Extension\CoreExtension']->modifyDate(($context["month"] ?? null), "-1 month", "Y-m");
        // line 11
        yield "        ";
        $context["nextMonth"] = $this->extensions['Twig\Extension\CoreExtension']->modifyDate(($context["month"] ?? null), "+1 month", "Y-m");
        // line 12
        yield "        <a href=\"/calendar?month=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate($this->extensions['Twig\Extension\CoreExtension']->modifyDate(($context["month"] ?? null), "-1 month"), "Y-m"), "html", null, true);
        yield "\" class=\"btn btn-secondary btn-icon\">
            <i class=\"fas fa-chevron-left\"></i>
        </a>
        <h2 style=\"font-family:'Syne',sans-serif;font-size:20px;font-weight:700;min-width:180px;text-align:center;\">
            ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["month"] ?? null), "F Y"), "html", null, true);
        yield "
        </h2>
        <a href=\"/calendar?month=";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate($this->extensions['Twig\Extension\CoreExtension']->modifyDate(($context["month"] ?? null), "+1 month"), "Y-m"), "html", null, true);
        yield "\" class=\"btn btn-secondary btn-icon\">
            <i class=\"fas fa-chevron-right\"></i>
        </a>
        <a href=\"/calendar\" class=\"btn btn-secondary btn-sm\">Today</a>
    </div>
    <a href=\"/posts/create\" class=\"btn btn-primary\"><i class=\"fas fa-plus\"></i> New Post</a>
</div>

";
        // line 26
        $context["firstDay"] = (($context["month"] ?? null) . "-01");
        // line 27
        $context["daysInMonth"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["firstDay"] ?? null), "t");
        // line 28
        $context["startDow"] = ($this->env->getFilter('number_format')->getCallable()($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["firstDay"] ?? null), "N")) % 7);
        // line 29
        yield "
<div class=\"card\">
    
    <div style=\"display:grid;grid-template-columns:repeat(7,1fr);border-bottom:1px solid var(--border);\">
        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]);
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            // line 34
            yield "        <div style=\"padding:12px 8px;text-align:center;font-size:12px;font-weight:600;letter-spacing:0.5px;color:var(--text-muted);text-transform:uppercase;\">
            ";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["day"], "html", null, true);
            yield "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['day'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        yield "    </div>

    
    <div style=\"display:grid;grid-template-columns:repeat(7,1fr);\">
        
        ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(0, (($context["startDow"] ?? null) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 44
            yield "        <div style=\"min-height:100px;border-right:1px solid var(--border);border-bottom:1px solid var(--border);padding:8px;background:var(--bg-base);opacity:0.4;\"></div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        yield "
        ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["daysInMonth"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["dayNum"]) {
            // line 48
            yield "            ";
            $context["dateStr"] = ((($context["month"] ?? null) . "-") . Twig\Extension\CoreExtension::sprintf($context["dayNum"], "%02d"));
            // line 49
            yield "            ";
            $context["today"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d");
            // line 50
            yield "            ";
            $context["isToday"] = (($context["dateStr"] ?? null) == ($context["today"] ?? null));
            // line 51
            yield "
            
            ";
            // line 53
            $context["dayPosts"] = [];
            // line 54
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["posts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 55
                yield "                ";
                $context["postDate"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "scheduled_at", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "scheduled_at", [], "any", false, false, false, 55), "Y-m-d")) : ($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "created_at", [], "any", false, false, false, 55), "Y-m-d")));
                // line 56
                yield "                ";
                if ((($context["postDate"] ?? null) == ($context["dateStr"] ?? null))) {
                    // line 57
                    yield "                    ";
                    $context["dayPosts"] = Twig\Extension\CoreExtension::merge(($context["dayPosts"] ?? null), [$context["post"]]);
                    // line 58
                    yield "                ";
                }
                // line 59
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            yield "
            <div style=\"
                min-height:100px;
                border-right:1px solid var(--border);
                border-bottom:1px solid var(--border);
                padding:8px;
                ";
            // line 66
            if ((($tmp = ($context["isToday"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "background:rgba(var(--accent-rgb),0.04);";
            }
            // line 67
            yield "                vertical-align:top;
            \">
                <div style=\"
                    width:26px;height:26px;
                    border-radius:50%;
                    display:flex;align-items:center;justify-content:center;
                    font-size:13px;font-weight:";
            // line 73
            yield (((($tmp = ($context["isToday"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("700") : ("400"));
            yield ";
                    margin-bottom:6px;
                    ";
            // line 75
            if ((($tmp = ($context["isToday"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "background:var(--accent);color:white;";
            } else {
                yield "color:var(--text-secondary);";
            }
            // line 76
            yield "                \">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["dayNum"], "html", null, true);
            yield "</div>

                ";
            // line 78
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["dayPosts"] ?? null), 0, 3));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 79
                yield "                <a href=\"/posts/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 79), "html", null, true);
                yield "/edit\" style=\"
                    display:block;
                    padding:3px 6px;
                    border-radius:5px;
                    font-size:11px;
                    margin-bottom:2px;
                    text-decoration:none;
                    overflow:hidden;
                    white-space:nowrap;
                    text-overflow:ellipsis;
                    background:";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 89)), "html", null, true);
                yield "22;
                    color:";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 90)), "html", null, true);
                yield ";
                    border-left:2px solid ";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 91)), "html", null, true);
                yield ";
                \" title=\"";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 92), "html", null, true);
                yield "\">
                    ";
                // line 93
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "scheduled_at", [], "any", false, false, false, 93)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "scheduled_at", [], "any", false, false, false, 93), "H:i"), "html", null, true);
                    yield " ";
                }
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 93), "html", null, true);
                yield "
                </a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            yield "
                ";
            // line 97
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["dayPosts"] ?? null)) > 3)) {
                // line 98
                yield "                <div style=\"font-size:10px;color:var(--text-muted);padding:2px 6px;\">+";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["dayPosts"] ?? null)) - 3), "html", null, true);
                yield " more</div>
                ";
            }
            // line 100
            yield "            </div>

            
            ";
            // line 103
            if ((((($context["startDow"] ?? null) + $context["dayNum"]) % 7) == 0)) {
                // line 104
                yield "            <div style=\"grid-column:1/-1;\"></div>
            ";
            }
            // line 106
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['dayNum'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        yield "    </div>
</div>

<div style=\"display:flex;gap:16px;flex-wrap:wrap;margin-top:16px;\">
    ";
        // line 111
        $context["seenPlatforms"] = [];
        // line 112
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 113
            yield "        ";
            if (!CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 113), ($context["seenPlatforms"] ?? null))) {
                // line 114
                yield "            ";
                $context["seenPlatforms"] = Twig\Extension\CoreExtension::merge(($context["seenPlatforms"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 114)]);
                // line 115
                yield "            <div style=\"display:flex;align-items:center;gap:6px;font-size:12px;color:var(--text-secondary);\">
                <div style=\"width:12px;height:12px;border-radius:3px;background:";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 116)), "html", null, true);
                yield ";\"></div>
                ";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 117)), "html", null, true);
                yield "
            </div>
        ";
            }
            // line 120
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        yield "</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/calendar.twig";
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
        return array (  357 => 121,  351 => 120,  345 => 117,  341 => 116,  338 => 115,  335 => 114,  332 => 113,  327 => 112,  325 => 111,  319 => 107,  313 => 106,  309 => 104,  307 => 103,  302 => 100,  296 => 98,  294 => 97,  291 => 96,  278 => 93,  274 => 92,  270 => 91,  266 => 90,  262 => 89,  248 => 79,  244 => 78,  238 => 76,  232 => 75,  227 => 73,  219 => 67,  215 => 66,  207 => 60,  201 => 59,  198 => 58,  195 => 57,  192 => 56,  189 => 55,  184 => 54,  182 => 53,  178 => 51,  175 => 50,  172 => 49,  169 => 48,  165 => 47,  162 => 46,  155 => 44,  151 => 43,  144 => 38,  135 => 35,  132 => 34,  128 => 33,  122 => 29,  120 => 28,  118 => 27,  116 => 26,  105 => 18,  100 => 16,  92 => 12,  89 => 11,  87 => 10,  82 => 7,  75 => 6,  64 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/app.twig' %}

{% block title %}Content Calendar{% endblock %}
{% block page_title %}Content Calendar{% endblock %}

{% block content %}

<div style=\"display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;\">
    <div style=\"display:flex;align-items:center;gap:12px;\">
        {% set prevMonth = month|date_modify('-1 month', 'Y-m') %}
        {% set nextMonth = month|date_modify('+1 month', 'Y-m') %}
        <a href=\"/calendar?month={{ month|date_modify('-1 month')|date('Y-m') }}\" class=\"btn btn-secondary btn-icon\">
            <i class=\"fas fa-chevron-left\"></i>
        </a>
        <h2 style=\"font-family:'Syne',sans-serif;font-size:20px;font-weight:700;min-width:180px;text-align:center;\">
            {{ month|date('F Y') }}
        </h2>
        <a href=\"/calendar?month={{ month|date_modify('+1 month')|date('Y-m') }}\" class=\"btn btn-secondary btn-icon\">
            <i class=\"fas fa-chevron-right\"></i>
        </a>
        <a href=\"/calendar\" class=\"btn btn-secondary btn-sm\">Today</a>
    </div>
    <a href=\"/posts/create\" class=\"btn btn-primary\"><i class=\"fas fa-plus\"></i> New Post</a>
</div>

{% set firstDay = month ~ '-01' %}
{% set daysInMonth = firstDay|date('t') %}
{% set startDow = firstDay|date('N')|number_format % 7 %}

<div class=\"card\">
    
    <div style=\"display:grid;grid-template-columns:repeat(7,1fr);border-bottom:1px solid var(--border);\">
        {% for day in ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] %}
        <div style=\"padding:12px 8px;text-align:center;font-size:12px;font-weight:600;letter-spacing:0.5px;color:var(--text-muted);text-transform:uppercase;\">
            {{ day }}
        </div>
        {% endfor %}
    </div>

    
    <div style=\"display:grid;grid-template-columns:repeat(7,1fr);\">
        
        {% for i in 0..startDow-1 %}
        <div style=\"min-height:100px;border-right:1px solid var(--border);border-bottom:1px solid var(--border);padding:8px;background:var(--bg-base);opacity:0.4;\"></div>
        {% endfor %}

        {% for dayNum in 1..daysInMonth %}
            {% set dateStr = month ~ '-' ~ dayNum|format('%02d') %}
            {% set today = 'now'|date('Y-m-d') %}
            {% set isToday = dateStr == today %}

            
            {% set dayPosts = [] %}
            {% for post in posts %}
                {% set postDate = post.scheduled_at ? post.scheduled_at|date('Y-m-d') : post.created_at|date('Y-m-d') %}
                {% if postDate == dateStr %}
                    {% set dayPosts = dayPosts|merge([post]) %}
                {% endif %}
            {% endfor %}

            <div style=\"
                min-height:100px;
                border-right:1px solid var(--border);
                border-bottom:1px solid var(--border);
                padding:8px;
                {% if isToday %}background:rgba(var(--accent-rgb),0.04);{% endif %}
                vertical-align:top;
            \">
                <div style=\"
                    width:26px;height:26px;
                    border-radius:50%;
                    display:flex;align-items:center;justify-content:center;
                    font-size:13px;font-weight:{{ isToday ? '700' : '400' }};
                    margin-bottom:6px;
                    {% if isToday %}background:var(--accent);color:white;{% else %}color:var(--text-secondary);{% endif %}
                \">{{ dayNum }}</div>

                {% for post in dayPosts|slice(0,3) %}
                <a href=\"/posts/{{ post.id }}/edit\" style=\"
                    display:block;
                    padding:3px 6px;
                    border-radius:5px;
                    font-size:11px;
                    margin-bottom:2px;
                    text-decoration:none;
                    overflow:hidden;
                    white-space:nowrap;
                    text-overflow:ellipsis;
                    background:{{ post.platform|platform_color }}22;
                    color:{{ post.platform|platform_color }};
                    border-left:2px solid {{ post.platform|platform_color }};
                \" title=\"{{ post.title }}\">
                    {% if post.scheduled_at %}{{ post.scheduled_at|date('H:i') }} {% endif %}{{ post.title }}
                </a>
                {% endfor %}

                {% if dayPosts|length > 3 %}
                <div style=\"font-size:10px;color:var(--text-muted);padding:2px 6px;\">+{{ dayPosts|length - 3 }} more</div>
                {% endif %}
            </div>

            
            {% if (startDow + dayNum) % 7 == 0 %}
            <div style=\"grid-column:1/-1;\"></div>
            {% endif %}
        {% endfor %}
    </div>
</div>

<div style=\"display:flex;gap:16px;flex-wrap:wrap;margin-top:16px;\">
    {% set seenPlatforms = [] %}
    {% for post in posts %}
        {% if post.platform not in seenPlatforms %}
            {% set seenPlatforms = seenPlatforms|merge([post.platform]) %}
            <div style=\"display:flex;align-items:center;gap:6px;font-size:12px;color:var(--text-secondary);\">
                <div style=\"width:12px;height:12px;border-radius:3px;background:{{ post.platform|platform_color }};\"></div>
                {{ post.platform|title }}
            </div>
        {% endif %}
    {% endfor %}
</div>

{% endblock %}
", "pages/calendar.twig", "/home/neyst/Загрузки/smm_planner/smm_output/templates/pages/calendar.twig");
    }
}

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

/* pages/posts-form.twig */
class __TwigTemplate_5d4637db4c0952ba7a3789152fe3312a extends Template
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
            'scripts' => [$this, 'block_scripts'],
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
        yield (((($tmp = ($context["post"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Edit Post") : ("New Post"));
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield (((($tmp = ($context["post"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Edit Post") : ("Create Post"));
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
<div style=\"max-width:760px;\">
    <div class=\"card\">
        <div class=\"card-header\">
            <span class=\"card-title\">";
        // line 11
        yield (((($tmp = ($context["post"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Edit Post") : ("New Post"));
        yield "</span>
            <a href=\"/posts\" class=\"btn btn-secondary btn-sm\"><i class=\"fas fa-arrow-left\"></i> Back</a>
        </div>
        <div class=\"card-body\">
            <form action=\"";
        // line 15
        yield (((($tmp = ($context["post"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("/posts/" . CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "id", [], "any", false, false, false, 15)) . "/edit"), "html", null, true)) : ("/posts/create"));
        yield "\" method=\"POST\">
                <input type=\"hidden\" name=\"_token\" value=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('csrf_token')->getCallable()(), "html", null, true);
        yield "\">

                <div class=\"form-group\">
                    <label class=\"form-label\">Post Title *</label>
                    <input type=\"text\" name=\"title\" class=\"form-control ";
        // line 20
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 20)) {
            yield "error";
        }
        yield "\"
                           value=\"";
        // line 21
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", true, true, false, 21) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", false, false, false, 21)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", false, false, false, 21), "html", null, true)) : (""));
        yield "\" placeholder=\"e.g. Monday Motivation Post\" required>
                    ";
        // line 22
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", true, true, false, 22)) {
            yield "<div class=\"form-error\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "title", [], "any", false, false, false, 22), "html", null, true);
            yield "</div>";
        }
        // line 23
        yield "                </div>

                <div class=\"form-group\">
                    <label class=\"form-label\">Content *</label>
                    <textarea name=\"content\" class=\"form-control ";
        // line 27
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 27)) {
            yield "error";
        }
        yield "\"
                              rows=\"6\" placeholder=\"Write your post content here...\" required>";
        // line 28
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "content", [], "any", true, true, false, 28) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "content", [], "any", false, false, false, 28)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "content", [], "any", false, false, false, 28), "html", null, true)) : (""));
        yield "</textarea>
                    ";
        // line 29
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", true, true, false, 29)) {
            yield "<div class=\"form-error\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "content", [], "any", false, false, false, 29), "html", null, true);
            yield "</div>";
        }
        // line 30
        yield "                    <div style=\"font-size:11px;color:var(--text-muted);margin-top:4px;\">
                        <span id=\"char-count\">0</span> / 2200 characters
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"form-label\">Hashtags</label>
                    <input type=\"text\" name=\"hashtags\" class=\"form-control\"
                           value=\"";
        // line 38
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "hashtags", [], "any", true, true, false, 38) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "hashtags", [], "any", false, false, false, 38)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "hashtags", [], "any", false, false, false, 38), "html", null, true)) : (""));
        yield "\" placeholder=\"#marketing #social #brand\">
                    <div style=\"font-size:11px;color:var(--text-muted);margin-top:4px;\">
                        Separate with spaces. Will be appended to your post.
                    </div>
                </div>

                <div class=\"grid-2\">
                    <div class=\"form-group\">
                        <label class=\"form-label\">Platform</label>
                        <select name=\"platform\" class=\"form-control\">
                            <option value=\"\">Select platform...</option>
                            ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["platforms"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 50
            yield "                            <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
            yield "\" ";
            if (((((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "platform", [], "any", true, true, false, 50) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "platform", [], "any", false, false, false, 50)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "platform", [], "any", false, false, false, 50)) : ("")) == $context["p"])) {
                yield "selected";
            }
            yield ">
                                ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["p"]), "html", null, true);
            yield "
                            </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        yield "                        </select>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"form-label\">Social Account</label>
                        <select name=\"social_account_id\" class=\"form-control\">
                            <option value=\"\">No specific account</option>
                            ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["accounts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["acc"]) {
            // line 62
            yield "                            <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "id", [], "any", false, false, false, 62), "html", null, true);
            yield "\" ";
            if (((((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "social_account_id", [], "any", true, true, false, 62) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "social_account_id", [], "any", false, false, false, 62)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "social_account_id", [], "any", false, false, false, 62)) : ("")) == CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "id", [], "any", false, false, false, 62))) {
                yield "selected";
            }
            yield ">
                                ";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "account_name", [], "any", false, false, false, 63), "html", null, true);
            yield " (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "platform", [], "any", false, false, false, 63)), "html", null, true);
            yield ")
                            </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['acc'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        yield "                        </select>
                    </div>
                </div>

                <div class=\"grid-2\">
                    <div class=\"form-group\">
                        <label class=\"form-label\">Schedule Date & Time</label>
                        <input type=\"datetime-local\" name=\"scheduled_at\" class=\"form-control\"
                               value=\"";
        // line 74
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "scheduled_at", [], "any", false, false, false, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "scheduled_at", [], "any", false, false, false, 74), "Y-m-d\\TH:i"), "html", null, true)) : (""));
        yield "\">
                        <div style=\"font-size:11px;color:var(--text-muted);margin-top:4px;\">
                            Leave empty to save as draft
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"form-label\">Status</label>
                        <select name=\"status\" class=\"form-control\">
                            <option value=\"draft\" ";
        // line 83
        if (((((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", true, true, false, 83) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 83)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 83)) : ("draft")) == "draft")) {
            yield "selected";
        }
        yield ">Draft</option>
                            <option value=\"scheduled\" ";
        // line 84
        if (((((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", true, true, false, 84) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 84)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 84)) : ("")) == "scheduled")) {
            yield "selected";
        }
        yield ">Scheduled</option>
                            <option value=\"published\" ";
        // line 85
        if (((((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", true, true, false, 85) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 85)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 85)) : ("")) == "published")) {
            yield "selected";
        }
        yield ">Published</option>
                            <option value=\"cancelled\" ";
        // line 86
        if (((((CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", true, true, false, 86) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 86)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "status", [], "any", false, false, false, 86)) : ("")) == "cancelled")) {
            yield "selected";
        }
        yield ">Cancelled</option>
                        </select>
                    </div>
                </div>

                <div style=\"display:flex;gap:12px;justify-content:flex-end;margin-top:8px;\">
                    <a href=\"/posts\" class=\"btn btn-secondary\">Cancel</a>
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-";
        // line 94
        yield (((($tmp = ($context["post"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("save") : ("plus"));
        yield "\"></i>
                        ";
        // line 95
        yield (((($tmp = ($context["post"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Save Changes") : ("Create Post"));
        yield "
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

";
        yield from [];
    }

    // line 105
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 106
        yield "<script>
const content = document.querySelector('textarea[name=\"content\"]');
const counter = document.getElementById('char-count');

function updateCounter() {
    const len = content.value.length;
    counter.textContent = len;
    counter.style.color = len > 2000 ? '#ef4444' : len > 1800 ? '#f59e0b' : 'var(--text-muted)';
}

content.addEventListener('input', updateCounter);
updateCounter();
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/posts-form.twig";
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
        return array (  302 => 106,  295 => 105,  281 => 95,  277 => 94,  264 => 86,  258 => 85,  252 => 84,  246 => 83,  234 => 74,  224 => 66,  213 => 63,  204 => 62,  200 => 61,  191 => 54,  182 => 51,  173 => 50,  169 => 49,  155 => 38,  145 => 30,  139 => 29,  135 => 28,  129 => 27,  123 => 23,  117 => 22,  113 => 21,  107 => 20,  100 => 16,  96 => 15,  89 => 11,  83 => 7,  76 => 6,  65 => 4,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/app.twig' %}

{% block title %}{{ post ? 'Edit Post' : 'New Post' }}{% endblock %}
{% block page_title %}{{ post ? 'Edit Post' : 'Create Post' }}{% endblock %}

{% block content %}

<div style=\"max-width:760px;\">
    <div class=\"card\">
        <div class=\"card-header\">
            <span class=\"card-title\">{{ post ? 'Edit Post' : 'New Post' }}</span>
            <a href=\"/posts\" class=\"btn btn-secondary btn-sm\"><i class=\"fas fa-arrow-left\"></i> Back</a>
        </div>
        <div class=\"card-body\">
            <form action=\"{{ post ? '/posts/' ~ post.id ~ '/edit' : '/posts/create' }}\" method=\"POST\">
                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\">

                <div class=\"form-group\">
                    <label class=\"form-label\">Post Title *</label>
                    <input type=\"text\" name=\"title\" class=\"form-control {% if errors.title is defined %}error{% endif %}\"
                           value=\"{{ post.title ?? '' }}\" placeholder=\"e.g. Monday Motivation Post\" required>
                    {% if errors.title is defined %}<div class=\"form-error\">{{ errors.title }}</div>{% endif %}
                </div>

                <div class=\"form-group\">
                    <label class=\"form-label\">Content *</label>
                    <textarea name=\"content\" class=\"form-control {% if errors.content is defined %}error{% endif %}\"
                              rows=\"6\" placeholder=\"Write your post content here...\" required>{{ post.content ?? '' }}</textarea>
                    {% if errors.content is defined %}<div class=\"form-error\">{{ errors.content }}</div>{% endif %}
                    <div style=\"font-size:11px;color:var(--text-muted);margin-top:4px;\">
                        <span id=\"char-count\">0</span> / 2200 characters
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"form-label\">Hashtags</label>
                    <input type=\"text\" name=\"hashtags\" class=\"form-control\"
                           value=\"{{ post.hashtags ?? '' }}\" placeholder=\"#marketing #social #brand\">
                    <div style=\"font-size:11px;color:var(--text-muted);margin-top:4px;\">
                        Separate with spaces. Will be appended to your post.
                    </div>
                </div>

                <div class=\"grid-2\">
                    <div class=\"form-group\">
                        <label class=\"form-label\">Platform</label>
                        <select name=\"platform\" class=\"form-control\">
                            <option value=\"\">Select platform...</option>
                            {% for p in platforms %}
                            <option value=\"{{ p }}\" {% if (post.platform ?? '') == p %}selected{% endif %}>
                                {{ p|title }}
                            </option>
                            {% endfor %}
                        </select>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"form-label\">Social Account</label>
                        <select name=\"social_account_id\" class=\"form-control\">
                            <option value=\"\">No specific account</option>
                            {% for acc in accounts %}
                            <option value=\"{{ acc.id }}\" {% if (post.social_account_id ?? '') == acc.id %}selected{% endif %}>
                                {{ acc.account_name }} ({{ acc.platform|title }})
                            </option>
                            {% endfor %}
                        </select>
                    </div>
                </div>

                <div class=\"grid-2\">
                    <div class=\"form-group\">
                        <label class=\"form-label\">Schedule Date & Time</label>
                        <input type=\"datetime-local\" name=\"scheduled_at\" class=\"form-control\"
                               value=\"{{ post.scheduled_at ? post.scheduled_at|date('Y-m-d\\\\TH:i') : '' }}\">
                        <div style=\"font-size:11px;color:var(--text-muted);margin-top:4px;\">
                            Leave empty to save as draft
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"form-label\">Status</label>
                        <select name=\"status\" class=\"form-control\">
                            <option value=\"draft\" {% if (post.status ?? 'draft') == 'draft' %}selected{% endif %}>Draft</option>
                            <option value=\"scheduled\" {% if (post.status ?? '') == 'scheduled' %}selected{% endif %}>Scheduled</option>
                            <option value=\"published\" {% if (post.status ?? '') == 'published' %}selected{% endif %}>Published</option>
                            <option value=\"cancelled\" {% if (post.status ?? '') == 'cancelled' %}selected{% endif %}>Cancelled</option>
                        </select>
                    </div>
                </div>

                <div style=\"display:flex;gap:12px;justify-content:flex-end;margin-top:8px;\">
                    <a href=\"/posts\" class=\"btn btn-secondary\">Cancel</a>
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"fas fa-{{ post ? 'save' : 'plus' }}\"></i>
                        {{ post ? 'Save Changes' : 'Create Post' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{% endblock %}

{% block scripts %}
<script>
const content = document.querySelector('textarea[name=\"content\"]');
const counter = document.getElementById('char-count');

function updateCounter() {
    const len = content.value.length;
    counter.textContent = len;
    counter.style.color = len > 2000 ? '#ef4444' : len > 1800 ? '#f59e0b' : 'var(--text-muted)';
}

content.addEventListener('input', updateCounter);
updateCounter();
</script>
{% endblock %}
", "pages/posts-form.twig", "/home/neyst/Загрузки/smm_planner/smm_output/templates/pages/posts-form.twig");
    }
}

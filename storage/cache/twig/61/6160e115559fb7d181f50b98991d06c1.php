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

/* pages/dashboard.twig */
class __TwigTemplate_74ee97e7ff69711fa10937bed33b38c2 extends Template
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
        yield "Dashboard";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Dashboard";
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
<div class=\"stats-grid\">
    <div class=\"stat-card\">
        <div class=\"stat-icon\"><i class=\"fas fa-edit\"></i></div>
        <div class=\"stat-value\">";
        // line 11
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "total", [], "any", true, true, false, 11) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "total", [], "any", false, false, false, 11)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "total", [], "any", false, false, false, 11), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Total Posts</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(99,214,142,0.12);color:#22c55e\"><i class=\"fas fa-check-circle\"></i></div>
        <div class=\"stat-value\">";
        // line 16
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "published", [], "any", true, true, false, 16) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "published", [], "any", false, false, false, 16)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "published", [], "any", false, false, false, 16), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Published</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(251,191,36,0.12);color:#f59e0b\"><i class=\"fas fa-clock\"></i></div>
        <div class=\"stat-value\">";
        // line 21
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "scheduled", [], "any", true, true, false, 21) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "scheduled", [], "any", false, false, false, 21)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["postStats"] ?? null), "scheduled", [], "any", false, false, false, 21), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Scheduled</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(168,85,247,0.12);color:#a855f7\"><i class=\"fas fa-users\"></i></div>
        <div class=\"stat-value\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('number_format')->getCallable()(($context["totalFollowers"] ?? null)), "html", null, true);
        yield "</div>
        <div class=\"stat-label\">Total Followers</div>
    </div>
</div>

<div class=\"grid-2\" style=\"gap:24px;margin-bottom:24px;\">

    
    <div class=\"card\">
        <div class=\"card-header\">
            <span class=\"card-title\">Upcoming Posts</span>
            <a href=\"/posts?status=scheduled\" class=\"btn btn-secondary btn-sm\">View all</a>
        </div>
        ";
        // line 39
        if ((($tmp = ($context["upcoming"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "        <div class=\"table-wrap\">
            <table>
                ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["upcoming"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 43
                yield "                <tr>
                    <td>
                        <div style=\"display:flex;align-items:center;gap:10px;\">
                            <span class=\"platform-pill\">
                                <i class=\"";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_icon')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 47)), "html", null, true);
                yield "\" style=\"color:";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 47)), "html", null, true);
                yield "\"></i>
                                ";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 48)), "html", null, true);
                yield "
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class=\"truncate\" style=\"max-width:160px;font-weight:500;color:var(--text-primary)\">";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 53), "html", null, true);
                yield "</div>
                        <div class=\"text-sm text-muted truncate\" style=\"max-width:160px\">";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "account_name", [], "any", false, false, false, 54), "html", null, true);
                yield "</div>
                    </td>
                    <td style=\"white-space:nowrap;font-size:12px;color:var(--text-muted)\">
                        ";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "scheduled_at", [], "any", false, false, false, 57), "M j, H:i"), "html", null, true);
                yield "
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            yield "            </table>
        </div>
        ";
        } else {
            // line 64
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-calendar-times\"></i>
            <h3>No upcoming posts</h3>
            <p>Schedule your first post to see it here</p>
            <a href=\"/posts/create\" class=\"btn btn-primary btn-sm\">Create Post</a>
        </div>
        ";
        }
        // line 71
        yield "    </div>

    
    <div class=\"card\">
        <div class=\"card-header\">
            <span class=\"card-title\">Connected Accounts</span>
            <a href=\"/accounts/create\" class=\"btn btn-secondary btn-sm\"><i class=\"fas fa-plus\"></i> Connect</a>
        </div>
        ";
        // line 79
        if ((($tmp = ($context["accounts"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 80
            yield "        <div class=\"table-wrap\">
            <table>
                ";
            // line 82
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["accounts"] ?? null), 0, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["acc"]) {
                // line 83
                yield "                <tr>
                    <td>
                        <div style=\"display:flex;align-items:center;gap:10px;\">
                            <div style=\"width:34px;height:34px;border-radius:50%;background:";
                // line 86
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "platform", [], "any", false, false, false, 86)), "html", null, true);
                yield "22;display:flex;align-items:center;justify-content:center;\">
                                <i class=\"";
                // line 87
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_icon')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "platform", [], "any", false, false, false, 87)), "html", null, true);
                yield "\" style=\"color:";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "platform", [], "any", false, false, false, 87)), "html", null, true);
                yield ";font-size:14px;\"></i>
                            </div>
                            <div>
                                <div style=\"font-weight:500;color:var(--text-primary);font-size:13px;\">";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "account_name", [], "any", false, false, false, 90), "html", null, true);
                yield "</div>
                                <div style=\"font-size:11px;color:var(--text-muted);\">";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "platform", [], "any", false, false, false, 91)), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"text-align:right;\">
                        <div style=\"font-weight:600;font-size:14px;\">";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('number_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "followers_count", [], "any", false, false, false, 96)), "html", null, true);
                yield "</div>
                        <div style=\"font-size:11px;color:var(--text-muted);\">followers</div>
                    </td>
                    <td>
                        <span class=\"badge ";
                // line 100
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "is_active", [], "any", false, false, false, 100)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "badge-success";
                } else {
                    yield "badge-secondary";
                }
                yield "\">
                            ";
                // line 101
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["acc"], "is_active", [], "any", false, false, false, 101)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Active") : ("Inactive"));
                yield "
                        </span>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['acc'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            yield "            </table>
        </div>
        ";
        } else {
            // line 109
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-share-alt\"></i>
            <h3>No accounts yet</h3>
            <p>Connect your social media accounts</p>
            <a href=\"/accounts/create\" class=\"btn btn-primary btn-sm\">Connect Account</a>
        </div>
        ";
        }
        // line 116
        yield "    </div>

</div>

<div class=\"card\">
    <div class=\"card-header\">
        <span class=\"card-title\">Recent Activity</span>
        <a href=\"/posts\" class=\"btn btn-secondary btn-sm\">All posts</a>
    </div>
    ";
        // line 125
        if ((($tmp = ($context["recentActivity"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 126
            yield "    <div class=\"table-wrap\">
        <table>
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Platform</th>
                    <th>Status</th>
                    <th>Engagement</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 139
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["recentActivity"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 140
                yield "            <tr>
                <td>
                    <div style=\"font-weight:500;color:var(--text-primary);max-width:200px;\" class=\"truncate\">";
                // line 142
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 142), "html", null, true);
                yield "</div>
                    <div class=\"text-sm text-muted truncate\" style=\"max-width:200px\">";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 143), 0, 60), "html", null, true);
                yield "...</div>
                </td>
                <td>
                    <span class=\"platform-pill\">
                        <i class=\"";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_icon')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 147)), "html", null, true);
                yield "\" style=\"color:";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 147)), "html", null, true);
                yield "\"></i>
                        ";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 148)), "html", null, true);
                yield "
                    </span>
                </td>
                <td><span class=\"badge ";
                // line 151
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('status_badge')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 151)), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 151)), "html", null, true);
                yield "</span></td>
                <td>
                    <span style=\"font-size:12px;color:var(--text-muted)\">
                        <i class=\"fas fa-heart\" style=\"color:#ef4444;margin-right:4px;\"></i>";
                // line 154
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likes_count", [], "any", false, false, false, 154), "html", null, true);
                yield "
                        <i class=\"fas fa-comment\" style=\"color:#6366f1;margin-left:8px;margin-right:4px;\"></i>";
                // line 155
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "comments_count", [], "any", false, false, false, 155), "html", null, true);
                yield "
                    </span>
                </td>
                <td class=\"text-muted text-sm\" style=\"white-space:nowrap;\">";
                // line 158
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('time_ago')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "updated_at", [], "any", false, false, false, 158)), "html", null, true);
                yield "</td>
                <td>
                    <div style=\"display:flex;gap:6px;\">
                        <a href=\"/posts/";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 161), "html", null, true);
                yield "/edit\" class=\"btn btn-secondary btn-icon btn-sm\" title=\"Edit\">
                            <i class=\"fas fa-pen\"></i>
                        </a>
                        <form action=\"/posts/";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 164), "html", null, true);
                yield "/delete\" method=\"POST\" style=\"display:inline\">
                            <input type=\"hidden\" name=\"_token\" value=\"";
                // line 165
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('csrf_token')->getCallable()(), "html", null, true);
                yield "\">
                            <button class=\"btn btn-danger btn-icon btn-sm\" data-confirm=\"Delete this post?\" title=\"Delete\">
                                <i class=\"fas fa-trash\"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 174
            yield "            </tbody>
        </table>
    </div>
    ";
        } else {
            // line 178
            yield "    <div class=\"empty-state\">
        <i class=\"fas fa-inbox\"></i>
        <h3>No posts yet</h3>
        <p>Create your first post to get started</p>
        <a href=\"/posts/create\" class=\"btn btn-primary\">Create Post</a>
    </div>
    ";
        }
        // line 185
        yield "</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/dashboard.twig";
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
        return array (  404 => 185,  395 => 178,  389 => 174,  374 => 165,  370 => 164,  364 => 161,  358 => 158,  352 => 155,  348 => 154,  340 => 151,  334 => 148,  328 => 147,  321 => 143,  317 => 142,  313 => 140,  309 => 139,  294 => 126,  292 => 125,  281 => 116,  272 => 109,  267 => 106,  256 => 101,  248 => 100,  241 => 96,  233 => 91,  229 => 90,  221 => 87,  217 => 86,  212 => 83,  208 => 82,  204 => 80,  202 => 79,  192 => 71,  183 => 64,  178 => 61,  168 => 57,  162 => 54,  158 => 53,  150 => 48,  144 => 47,  138 => 43,  134 => 42,  130 => 40,  128 => 39,  112 => 26,  104 => 21,  96 => 16,  88 => 11,  82 => 7,  75 => 6,  64 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/app.twig' %}

{% block title %}Dashboard{% endblock %}
{% block page_title %}Dashboard{% endblock %}

{% block content %}

<div class=\"stats-grid\">
    <div class=\"stat-card\">
        <div class=\"stat-icon\"><i class=\"fas fa-edit\"></i></div>
        <div class=\"stat-value\">{{ postStats.total ?? 0 }}</div>
        <div class=\"stat-label\">Total Posts</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(99,214,142,0.12);color:#22c55e\"><i class=\"fas fa-check-circle\"></i></div>
        <div class=\"stat-value\">{{ postStats.published ?? 0 }}</div>
        <div class=\"stat-label\">Published</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(251,191,36,0.12);color:#f59e0b\"><i class=\"fas fa-clock\"></i></div>
        <div class=\"stat-value\">{{ postStats.scheduled ?? 0 }}</div>
        <div class=\"stat-label\">Scheduled</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-icon\" style=\"background:rgba(168,85,247,0.12);color:#a855f7\"><i class=\"fas fa-users\"></i></div>
        <div class=\"stat-value\">{{ totalFollowers|number_format }}</div>
        <div class=\"stat-label\">Total Followers</div>
    </div>
</div>

<div class=\"grid-2\" style=\"gap:24px;margin-bottom:24px;\">

    
    <div class=\"card\">
        <div class=\"card-header\">
            <span class=\"card-title\">Upcoming Posts</span>
            <a href=\"/posts?status=scheduled\" class=\"btn btn-secondary btn-sm\">View all</a>
        </div>
        {% if upcoming %}
        <div class=\"table-wrap\">
            <table>
                {% for post in upcoming %}
                <tr>
                    <td>
                        <div style=\"display:flex;align-items:center;gap:10px;\">
                            <span class=\"platform-pill\">
                                <i class=\"{{ post.platform|platform_icon }}\" style=\"color:{{ post.platform|platform_color }}\"></i>
                                {{ post.platform|title }}
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class=\"truncate\" style=\"max-width:160px;font-weight:500;color:var(--text-primary)\">{{ post.title }}</div>
                        <div class=\"text-sm text-muted truncate\" style=\"max-width:160px\">{{ post.account_name }}</div>
                    </td>
                    <td style=\"white-space:nowrap;font-size:12px;color:var(--text-muted)\">
                        {{ post.scheduled_at|date('M j, H:i') }}
                    </td>
                </tr>
                {% endfor %}
            </table>
        </div>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-calendar-times\"></i>
            <h3>No upcoming posts</h3>
            <p>Schedule your first post to see it here</p>
            <a href=\"/posts/create\" class=\"btn btn-primary btn-sm\">Create Post</a>
        </div>
        {% endif %}
    </div>

    
    <div class=\"card\">
        <div class=\"card-header\">
            <span class=\"card-title\">Connected Accounts</span>
            <a href=\"/accounts/create\" class=\"btn btn-secondary btn-sm\"><i class=\"fas fa-plus\"></i> Connect</a>
        </div>
        {% if accounts %}
        <div class=\"table-wrap\">
            <table>
                {% for acc in accounts|slice(0, 6) %}
                <tr>
                    <td>
                        <div style=\"display:flex;align-items:center;gap:10px;\">
                            <div style=\"width:34px;height:34px;border-radius:50%;background:{{ acc.platform|platform_color }}22;display:flex;align-items:center;justify-content:center;\">
                                <i class=\"{{ acc.platform|platform_icon }}\" style=\"color:{{ acc.platform|platform_color }};font-size:14px;\"></i>
                            </div>
                            <div>
                                <div style=\"font-weight:500;color:var(--text-primary);font-size:13px;\">{{ acc.account_name }}</div>
                                <div style=\"font-size:11px;color:var(--text-muted);\">{{ acc.platform|title }}</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"text-align:right;\">
                        <div style=\"font-weight:600;font-size:14px;\">{{ acc.followers_count|number_format }}</div>
                        <div style=\"font-size:11px;color:var(--text-muted);\">followers</div>
                    </td>
                    <td>
                        <span class=\"badge {% if acc.is_active %}badge-success{% else %}badge-secondary{% endif %}\">
                            {{ acc.is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                </tr>
                {% endfor %}
            </table>
        </div>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-share-alt\"></i>
            <h3>No accounts yet</h3>
            <p>Connect your social media accounts</p>
            <a href=\"/accounts/create\" class=\"btn btn-primary btn-sm\">Connect Account</a>
        </div>
        {% endif %}
    </div>

</div>

<div class=\"card\">
    <div class=\"card-header\">
        <span class=\"card-title\">Recent Activity</span>
        <a href=\"/posts\" class=\"btn btn-secondary btn-sm\">All posts</a>
    </div>
    {% if recentActivity %}
    <div class=\"table-wrap\">
        <table>
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Platform</th>
                    <th>Status</th>
                    <th>Engagement</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for post in recentActivity %}
            <tr>
                <td>
                    <div style=\"font-weight:500;color:var(--text-primary);max-width:200px;\" class=\"truncate\">{{ post.title }}</div>
                    <div class=\"text-sm text-muted truncate\" style=\"max-width:200px\">{{ post.content|slice(0,60) }}...</div>
                </td>
                <td>
                    <span class=\"platform-pill\">
                        <i class=\"{{ post.platform|platform_icon }}\" style=\"color:{{ post.platform|platform_color }}\"></i>
                        {{ post.platform|title }}
                    </span>
                </td>
                <td><span class=\"badge {{ post.status|status_badge }}\">{{ post.status|title }}</span></td>
                <td>
                    <span style=\"font-size:12px;color:var(--text-muted)\">
                        <i class=\"fas fa-heart\" style=\"color:#ef4444;margin-right:4px;\"></i>{{ post.likes_count }}
                        <i class=\"fas fa-comment\" style=\"color:#6366f1;margin-left:8px;margin-right:4px;\"></i>{{ post.comments_count }}
                    </span>
                </td>
                <td class=\"text-muted text-sm\" style=\"white-space:nowrap;\">{{ post.updated_at|time_ago }}</td>
                <td>
                    <div style=\"display:flex;gap:6px;\">
                        <a href=\"/posts/{{ post.id }}/edit\" class=\"btn btn-secondary btn-icon btn-sm\" title=\"Edit\">
                            <i class=\"fas fa-pen\"></i>
                        </a>
                        <form action=\"/posts/{{ post.id }}/delete\" method=\"POST\" style=\"display:inline\">
                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\">
                            <button class=\"btn btn-danger btn-icon btn-sm\" data-confirm=\"Delete this post?\" title=\"Delete\">
                                <i class=\"fas fa-trash\"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
    {% else %}
    <div class=\"empty-state\">
        <i class=\"fas fa-inbox\"></i>
        <h3>No posts yet</h3>
        <p>Create your first post to get started</p>
        <a href=\"/posts/create\" class=\"btn btn-primary\">Create Post</a>
    </div>
    {% endif %}
</div>

{% endblock %}
", "pages/dashboard.twig", "/home/neyst/Загрузки/smm_planner/smm_output/templates/pages/dashboard.twig");
    }
}

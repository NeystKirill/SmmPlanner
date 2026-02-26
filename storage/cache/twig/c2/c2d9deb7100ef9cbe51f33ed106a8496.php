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

/* pages/posts.twig */
class __TwigTemplate_06bd4ef3c7dafc0f7365c91161e1c5e9 extends Template
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
        yield "Posts";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Posts";
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
<div class=\"stats-grid\" style=\"grid-template-columns:repeat(5,1fr);\">
    <div class=\"stat-card\">
        <div class=\"stat-value\">";
        // line 10
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", true, true, false, 10) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", false, false, false, 10)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total", [], "any", false, false, false, 10), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Total</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:#22c55e\">";
        // line 14
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "published", [], "any", true, true, false, 14) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "published", [], "any", false, false, false, 14)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "published", [], "any", false, false, false, 14), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Published</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:var(--accent)\">";
        // line 18
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "scheduled", [], "any", true, true, false, 18) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "scheduled", [], "any", false, false, false, 18)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "scheduled", [], "any", false, false, false, 18), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Scheduled</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:var(--text-muted)\">";
        // line 22
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "drafts", [], "any", true, true, false, 22) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "drafts", [], "any", false, false, false, 22)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "drafts", [], "any", false, false, false, 22), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Drafts</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:#ef4444\">";
        // line 26
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "failed", [], "any", true, true, false, 26) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "failed", [], "any", false, false, false, 26)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "failed", [], "any", false, false, false, 26), "html", null, true)) : (0));
        yield "</div>
        <div class=\"stat-label\">Failed</div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\" style=\"padding:16px 24px;\">
        <form action=\"/posts\" method=\"GET\" style=\"display:flex;gap:12px;flex-wrap:wrap;align-items:flex-end;\">
            <div style=\"flex:1;min-width:200px;\">
                <input type=\"text\" name=\"q\" value=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "search", [], "any", false, false, false, 35), "html", null, true);
        yield "\" placeholder=\"Search posts...\" class=\"form-control\" style=\"margin:0;\">
            </div>
            <div>
                <select name=\"status\" class=\"form-control\" style=\"margin:0;width:auto;\">
                    <option value=\"\">All Statuses</option>
                    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 41
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["s"], "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "status", [], "any", false, false, false, 41) == $context["s"])) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["s"]), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "                </select>
            </div>
            <div>
                <select name=\"platform\" class=\"form-control\" style=\"margin:0;width:auto;\">
                    <option value=\"\">All Platforms</option>
                    ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["platforms"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 49
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "platform", [], "any", false, false, false, 49) == $context["p"])) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["p"]), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        yield "                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-search\"></i> Filter</button>
            <a href=\"/posts\" class=\"btn btn-secondary\">Clear</a>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <span class=\"card-title\">";
        // line 61
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "total", [], "any", true, true, false, 61) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "total", [], "any", false, false, false, 61)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "total", [], "any", false, false, false, 61), "html", null, true)) : (0));
        yield " Posts</span>
        <a href=\"/posts/create\" class=\"btn btn-primary btn-sm\"><i class=\"fas fa-plus\"></i> New Post</a>
    </div>

    ";
        // line 65
        if ((($tmp = ($context["posts"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 66
            yield "    <div class=\"table-wrap\">
        <table>
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Platform</th>
                    <th>Account</th>
                    <th>Status</th>
                    <th>Scheduled</th>
                    <th>Engagement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["posts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 81
                yield "            <tr>
                <td style=\"max-width:250px;\">
                    <div style=\"font-weight:500;color:var(--text-primary);\" class=\"truncate\">";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 83), "html", null, true);
                yield "</div>
                    <div class=\"text-sm text-muted truncate\">";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 84), 0, 70), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 84)) > 70)) {
                    yield "...";
                }
                yield "</div>
                </td>
                <td>
                    ";
                // line 87
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 87)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 88
                    yield "                    <span class=\"platform-pill\">
                        <i class=\"";
                    // line 89
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_icon')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 89)), "html", null, true);
                    yield "\" style=\"color:";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('platform_color')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 89)), "html", null, true);
                    yield "\"></i>
                        ";
                    // line 90
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "platform", [], "any", false, false, false, 90)), "html", null, true);
                    yield "
                    </span>
                    ";
                } else {
                    // line 93
                    yield "                    <span class=\"text-muted text-sm\">—</span>
                    ";
                }
                // line 95
                yield "                </td>
                <td class=\"text-sm text-muted\">";
                // line 96
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "account_name", [], "any", true, true, false, 96) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["post"], "account_name", [], "any", false, false, false, 96)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "account_name", [], "any", false, false, false, 96), "html", null, true)) : ("—"));
                yield "</td>
                <td><span class=\"badge ";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFilter('status_badge')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 97)), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "status", [], "any", false, false, false, 97)), "html", null, true);
                yield "</span></td>
                <td class=\"text-sm text-muted\" style=\"white-space:nowrap;\">
                    ";
                // line 99
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "scheduled_at", [], "any", false, false, false, 99)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 100
                    yield "                        ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "scheduled_at", [], "any", false, false, false, 100), "M j, Y H:i"), "html", null, true);
                    yield "
                    ";
                } else {
                    // line 102
                    yield "                        <span style=\"color:var(--text-muted)\">—</span>
                    ";
                }
                // line 104
                yield "                </td>
                <td>
                    <div style=\"display:flex;gap:12px;font-size:12px;color:var(--text-muted);\">
                        <span><i class=\"fas fa-heart\" style=\"color:#ef4444\"></i> ";
                // line 107
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "likes_count", [], "any", false, false, false, 107), "html", null, true);
                yield "</span>
                        <span><i class=\"fas fa-comment\" style=\"color:var(--accent)\"></i> ";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "comments_count", [], "any", false, false, false, 108), "html", null, true);
                yield "</span>
                    </div>
                </td>
                <td>
                    <div style=\"display:flex;gap:6px;\">
                        <a href=\"/posts/";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 113), "html", null, true);
                yield "/edit\" class=\"btn btn-secondary btn-icon btn-sm\" title=\"Edit\">
                            <i class=\"fas fa-pen\"></i>
                        </a>
                        <form action=\"/posts/";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 116), "html", null, true);
                yield "/delete\" method=\"POST\">
                            <input type=\"hidden\" name=\"_token\" value=\"";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('csrf_token')->getCallable()(), "html", null, true);
                yield "\">
                            <button class=\"btn btn-danger btn-icon btn-sm\" data-confirm=\"Delete this post permanently?\" title=\"Delete\">
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
            // line 126
            yield "            </tbody>
        </table>
    </div>

    
    ";
            // line 131
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "last_page", [], "any", false, false, false, 131) > 1)) {
                // line 132
                yield "    <div class=\"pagination\">
        <a href=\"?page=";
                // line 133
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 133) - 1), "html", null, true);
                yield "&status=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "status", [], "any", false, false, false, 133), "html", null, true);
                yield "&platform=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "platform", [], "any", false, false, false, 133), "html", null, true);
                yield "&q=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "search", [], "any", false, false, false, 133), "html", null, true);
                yield "\"
           class=\"page-link ";
                // line 134
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 134) <= 1)) {
                    yield "disabled";
                }
                yield "\">
            <i class=\"fas fa-chevron-left\"></i>
        </a>
        ";
                // line 137
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "last_page", [], "any", false, false, false, 137)));
                foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                    // line 138
                    yield "            ";
                    if ((($context["p"] >= (CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 138) - 2)) && ($context["p"] <= (CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 138) + 2)))) {
                        // line 139
                        yield "            <a href=\"?page=";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                        yield "&status=";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "status", [], "any", false, false, false, 139), "html", null, true);
                        yield "&platform=";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "platform", [], "any", false, false, false, 139), "html", null, true);
                        yield "&q=";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "search", [], "any", false, false, false, 139), "html", null, true);
                        yield "\"
               class=\"page-link ";
                        // line 140
                        if (($context["p"] == CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 140))) {
                            yield "active";
                        }
                        yield "\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                        yield "</a>
            ";
                    }
                    // line 142
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 143
                yield "        <a href=\"?page=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 143) + 1), "html", null, true);
                yield "&status=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "status", [], "any", false, false, false, 143), "html", null, true);
                yield "&platform=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "platform", [], "any", false, false, false, 143), "html", null, true);
                yield "&q=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "search", [], "any", false, false, false, 143), "html", null, true);
                yield "\"
           class=\"page-link ";
                // line 144
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 144) >= CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "last_page", [], "any", false, false, false, 144))) {
                    yield "disabled";
                }
                yield "\">
            <i class=\"fas fa-chevron-right\"></i>
        </a>
        <span style=\"margin-left:auto;font-size:12px;color:var(--text-muted);\">
            Page ";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 148), "html", null, true);
                yield " of ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["pagination"] ?? null), "last_page", [], "any", false, false, false, 148), "html", null, true);
                yield "
        </span>
    </div>
    ";
            }
            // line 152
            yield "
    ";
        } else {
            // line 154
            yield "    <div class=\"empty-state\">
        <i class=\"fas fa-pencil-alt\"></i>
        <h3>No posts found</h3>
        <p>";
            // line 157
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "search", [], "any", false, false, false, 157) || CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "status", [], "any", false, false, false, 157))) {
                yield "Try adjusting your filters";
            } else {
                yield "Create your first post to get started";
            }
            yield "</p>
        <a href=\"/posts/create\" class=\"btn btn-primary\">Create Post</a>
    </div>
    ";
        }
        // line 161
        yield "</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/posts.twig";
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
        return array (  439 => 161,  428 => 157,  423 => 154,  419 => 152,  410 => 148,  401 => 144,  390 => 143,  384 => 142,  375 => 140,  364 => 139,  361 => 138,  357 => 137,  349 => 134,  339 => 133,  336 => 132,  334 => 131,  327 => 126,  312 => 117,  308 => 116,  302 => 113,  294 => 108,  290 => 107,  285 => 104,  281 => 102,  275 => 100,  273 => 99,  266 => 97,  262 => 96,  259 => 95,  255 => 93,  249 => 90,  243 => 89,  240 => 88,  238 => 87,  229 => 84,  225 => 83,  221 => 81,  217 => 80,  201 => 66,  199 => 65,  192 => 61,  180 => 51,  165 => 49,  161 => 48,  154 => 43,  139 => 41,  135 => 40,  127 => 35,  115 => 26,  108 => 22,  101 => 18,  94 => 14,  87 => 10,  82 => 7,  75 => 6,  64 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/app.twig' %}

{% block title %}Posts{% endblock %}
{% block page_title %}Posts{% endblock %}

{% block content %}

<div class=\"stats-grid\" style=\"grid-template-columns:repeat(5,1fr);\">
    <div class=\"stat-card\">
        <div class=\"stat-value\">{{ stats.total ?? 0 }}</div>
        <div class=\"stat-label\">Total</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:#22c55e\">{{ stats.published ?? 0 }}</div>
        <div class=\"stat-label\">Published</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:var(--accent)\">{{ stats.scheduled ?? 0 }}</div>
        <div class=\"stat-label\">Scheduled</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:var(--text-muted)\">{{ stats.drafts ?? 0 }}</div>
        <div class=\"stat-label\">Drafts</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-value\" style=\"color:#ef4444\">{{ stats.failed ?? 0 }}</div>
        <div class=\"stat-label\">Failed</div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\" style=\"padding:16px 24px;\">
        <form action=\"/posts\" method=\"GET\" style=\"display:flex;gap:12px;flex-wrap:wrap;align-items:flex-end;\">
            <div style=\"flex:1;min-width:200px;\">
                <input type=\"text\" name=\"q\" value=\"{{ filters.search }}\" placeholder=\"Search posts...\" class=\"form-control\" style=\"margin:0;\">
            </div>
            <div>
                <select name=\"status\" class=\"form-control\" style=\"margin:0;width:auto;\">
                    <option value=\"\">All Statuses</option>
                    {% for s in statuses %}
                    <option value=\"{{ s }}\" {% if filters.status == s %}selected{% endif %}>{{ s|title }}</option>
                    {% endfor %}
                </select>
            </div>
            <div>
                <select name=\"platform\" class=\"form-control\" style=\"margin:0;width:auto;\">
                    <option value=\"\">All Platforms</option>
                    {% for p in platforms %}
                    <option value=\"{{ p }}\" {% if filters.platform == p %}selected{% endif %}>{{ p|title }}</option>
                    {% endfor %}
                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-search\"></i> Filter</button>
            <a href=\"/posts\" class=\"btn btn-secondary\">Clear</a>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <span class=\"card-title\">{{ pagination.total ?? 0 }} Posts</span>
        <a href=\"/posts/create\" class=\"btn btn-primary btn-sm\"><i class=\"fas fa-plus\"></i> New Post</a>
    </div>

    {% if posts %}
    <div class=\"table-wrap\">
        <table>
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Platform</th>
                    <th>Account</th>
                    <th>Status</th>
                    <th>Scheduled</th>
                    <th>Engagement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for post in posts %}
            <tr>
                <td style=\"max-width:250px;\">
                    <div style=\"font-weight:500;color:var(--text-primary);\" class=\"truncate\">{{ post.title }}</div>
                    <div class=\"text-sm text-muted truncate\">{{ post.content|slice(0,70) }}{% if post.content|length > 70 %}...{% endif %}</div>
                </td>
                <td>
                    {% if post.platform %}
                    <span class=\"platform-pill\">
                        <i class=\"{{ post.platform|platform_icon }}\" style=\"color:{{ post.platform|platform_color }}\"></i>
                        {{ post.platform|title }}
                    </span>
                    {% else %}
                    <span class=\"text-muted text-sm\">—</span>
                    {% endif %}
                </td>
                <td class=\"text-sm text-muted\">{{ post.account_name ?? '—' }}</td>
                <td><span class=\"badge {{ post.status|status_badge }}\">{{ post.status|title }}</span></td>
                <td class=\"text-sm text-muted\" style=\"white-space:nowrap;\">
                    {% if post.scheduled_at %}
                        {{ post.scheduled_at|date('M j, Y H:i') }}
                    {% else %}
                        <span style=\"color:var(--text-muted)\">—</span>
                    {% endif %}
                </td>
                <td>
                    <div style=\"display:flex;gap:12px;font-size:12px;color:var(--text-muted);\">
                        <span><i class=\"fas fa-heart\" style=\"color:#ef4444\"></i> {{ post.likes_count }}</span>
                        <span><i class=\"fas fa-comment\" style=\"color:var(--accent)\"></i> {{ post.comments_count }}</span>
                    </div>
                </td>
                <td>
                    <div style=\"display:flex;gap:6px;\">
                        <a href=\"/posts/{{ post.id }}/edit\" class=\"btn btn-secondary btn-icon btn-sm\" title=\"Edit\">
                            <i class=\"fas fa-pen\"></i>
                        </a>
                        <form action=\"/posts/{{ post.id }}/delete\" method=\"POST\">
                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\">
                            <button class=\"btn btn-danger btn-icon btn-sm\" data-confirm=\"Delete this post permanently?\" title=\"Delete\">
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

    
    {% if pagination.last_page > 1 %}
    <div class=\"pagination\">
        <a href=\"?page={{ pagination.page - 1 }}&status={{ filters.status }}&platform={{ filters.platform }}&q={{ filters.search }}\"
           class=\"page-link {% if pagination.page <= 1 %}disabled{% endif %}\">
            <i class=\"fas fa-chevron-left\"></i>
        </a>
        {% for p in range(1, pagination.last_page) %}
            {% if p >= pagination.page - 2 and p <= pagination.page + 2 %}
            <a href=\"?page={{ p }}&status={{ filters.status }}&platform={{ filters.platform }}&q={{ filters.search }}\"
               class=\"page-link {% if p == pagination.page %}active{% endif %}\">{{ p }}</a>
            {% endif %}
        {% endfor %}
        <a href=\"?page={{ pagination.page + 1 }}&status={{ filters.status }}&platform={{ filters.platform }}&q={{ filters.search }}\"
           class=\"page-link {% if pagination.page >= pagination.last_page %}disabled{% endif %}\">
            <i class=\"fas fa-chevron-right\"></i>
        </a>
        <span style=\"margin-left:auto;font-size:12px;color:var(--text-muted);\">
            Page {{ pagination.page }} of {{ pagination.last_page }}
        </span>
    </div>
    {% endif %}

    {% else %}
    <div class=\"empty-state\">
        <i class=\"fas fa-pencil-alt\"></i>
        <h3>No posts found</h3>
        <p>{% if filters.search or filters.status %}Try adjusting your filters{% else %}Create your first post to get started{% endif %}</p>
        <a href=\"/posts/create\" class=\"btn btn-primary\">Create Post</a>
    </div>
    {% endif %}
</div>

{% endblock %}
", "pages/posts.twig", "/home/neyst/Загрузки/smm_planner/smm_output/templates/pages/posts.twig");
    }
}

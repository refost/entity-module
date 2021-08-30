<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/guest_book/templates/view-template.html.twig */
class __TwigTemplate_66ac058a6f14cd2f504387a856c0c07c5102124d31cb22caed4d1af710ee7163 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "
";
        // line 16
        echo "
<div class=\"comment\" ";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => "guest_book"], "method", false, false, true, 17), 17, $this->source), "html", null, true);
        echo ">

";
        // line 20
        echo "
        <div class=\"user\">
          <div class=\"avatar\">
            ";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "avatar", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
        echo "
          </div>
          <span class=\"name\">";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "name", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
        echo "</span>
          <span class=\"date\">";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "created", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
        echo "</span>
        </div>
        <div class=\"comment\">

";
        // line 31
        echo "
          <div class=\"contacts\">
            <div class=\"tel\">
              <span class=\"phone\">";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "telephone", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
        echo "</span>
            </div>
            <div class=\"post\">
              <span class=\"email\">";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "email", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
        echo "</span>
            </div>

";
        // line 41
        echo "
            ";
        // line 42
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nodes"], "method", false, false, true, 42)) {
            // line 43
            echo "              <div class=\"manage\">
                ";
            // line 44
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["button"] ?? null), 44, $this->source), "html", null, true);
            echo "
              </div>
            ";
        }
        // line 47
        echo "          </div>

";
        // line 50
        echo "
          <div class=\"comment-text\">
            ";
        // line 52
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "picture", [], "any", false, false, true, 52))) {
            // line 53
            echo "              <div class=\"picture\"> ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "picture", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
            echo " </div>
            ";
        }
        // line 55
        echo "            <div class=\"message\">
            ";
        // line 56
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "comment", [], "any", false, false, true, 56), 56, $this->source), "html", null, true);
        echo "
            </div>
          </div>
        </div>


</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/guest_book/templates/view-template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 56,  118 => 55,  112 => 53,  110 => 52,  106 => 50,  102 => 47,  96 => 44,  93 => 43,  91 => 42,  88 => 41,  82 => 37,  76 => 34,  71 => 31,  64 => 26,  60 => 25,  55 => 23,  50 => 20,  45 => 17,  42 => 16,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{# ** @file modules/custom/guest_book/templates/guest_book_template.html.twig
 *
 * Default theme implementation to present Artwork data.
 *
 * Available variables:
 * - content: A list of content items. Use 'content' to print all content, or
 *          content.field_name to access public fields
 * - attributes: HTML attributes for the container element.
 *
 * @see guest_book_preprocess_guest_book_template()
 *
 * @ingroup themeable
 */
#}

<div class=\"comment\" {{ attributes.addClass('guest_book') }}>

{#         block with Avatar and data #}

        <div class=\"user\">
          <div class=\"avatar\">
            {{ content.avatar }}
          </div>
          <span class=\"name\">{{ content.name }}</span>
          <span class=\"date\">{{ content.created }}</span>
        </div>
        <div class=\"comment\">

{#           block with contacts #}

          <div class=\"contacts\">
            <div class=\"tel\">
              <span class=\"phone\">{{ content.telephone }}</span>
            </div>
            <div class=\"post\">
              <span class=\"email\">{{ content.email }}</span>
            </div>

{#             administrative buutons #}

            {% if user.hasPermission('administer nodes') %}
              <div class=\"manage\">
                {{ button }}
              </div>
            {% endif %}
          </div>

{#           block with comment text #}

          <div class=\"comment-text\">
            {% if content.picture is not null %}
              <div class=\"picture\"> {{ content.picture }} </div>
            {% endif %}
            <div class=\"message\">
            {{ content.comment }}
            </div>
          </div>
        </div>


</div>
", "modules/custom/guest_book/templates/view-template.html.twig", "/var/www/web/modules/custom/guest_book/templates/view-template.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 42);
        static $filters = array("escape" => 17);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}

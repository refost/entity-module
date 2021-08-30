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

/* modules/contrib/examples/modules/pager_example/templates/description.html.twig */
class __TwigTemplate_54edade572e1eab276b20fbf94bc479b6f3d2479e0a10753da5210d7adbbd76c extends \Twig\Template
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
        // line 7
        echo "
<div class='examples-description'>
";
        // line 9
        echo t("<p>The Pager Example shows you how to create a paginated table. It uses
        an Entity Query to retrieve nodes and the query checks that
        the user has access to the nodes. You may test the access checking
        feature by unpublishing some of your nodes and then viewing the
        example as a user that is not allowed to see unpublished content.</p>
    <p>In order to see this in action, make sure there are some nodes present in
        your site. You can use the
        <a href=\"https://www.drupal.org/project/devel\">devel</a> module to add
        some if needed, or just create them.</p>
    <p>The table on this page will show you two nodes per page.</p>", array());
        // line 21
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/examples/modules/pager_example/templates/description.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 21,  43 => 9,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Contains the text of the pager_example explanation page
 */
#}

<div class='examples-description'>
{% trans %}
    <p>The Pager Example shows you how to create a paginated table. It uses
        an Entity Query to retrieve nodes and the query checks that
        the user has access to the nodes. You may test the access checking
        feature by unpublishing some of your nodes and then viewing the
        example as a user that is not allowed to see unpublished content.</p>
    <p>In order to see this in action, make sure there are some nodes present in
        your site. You can use the
        <a href=\"https://www.drupal.org/project/devel\">devel</a> module to add
        some if needed, or just create them.</p>
    <p>The table on this page will show you two nodes per page.</p>
{% endtrans %}
</div>
", "modules/contrib/examples/modules/pager_example/templates/description.html.twig", "/var/www/web/modules/contrib/examples/modules/pager_example/templates/description.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("trans" => 9);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['trans'],
                [],
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

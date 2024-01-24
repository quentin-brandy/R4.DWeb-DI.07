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

/* lego.html.twig */
class __TwigTemplate_31c07dfa8de4f885385d461034d999a2 extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "lego.html.twig"));

        // line 1
        echo "
<div class=\"lego_card\">
      <div class=\"info_section\">
        <div class=\"lego_header\">
          <img class=\"locandina\" src=\"/images/";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 5, $this->source); })()), "boxImage", [], "any", false, false, false, 5), "html", null, true);
        echo "\"/>
          <h1>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 6, $this->source); })()), "name", [], "any", false, false, false, 6), "html", null, true);
        echo "</h1>
          <h4>Collection : ";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 7, $this->source); })()), "collection", [], "any", false, false, false, 7), "html", null, true);
        echo "</h4>
          <span class=\"pieces\">Pièces : ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 8, $this->source); })()), "pieces", [], "any", false, false, false, 8), "html", null, true);
        echo "</span>
          <p class=\"price\">";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 9, $this->source); })()), "price", [], "any", false, false, false, 9), "html", null, true);
        echo "€</p><br>
          <a href=\"index.php?buy=";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 10, $this->source); })()), "id", [], "any", false, false, false, 10), "html", null, true);
        echo "\"><button>Buy</button></a>
        </div>
        <div class=\"lego_desc\">
          <p class=\"text\">
            ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 14, $this->source); })()), "description", [], "any", false, false, false, 14), "html", null, true);
        echo "
        </p>
        </div>
        <div class=\"lego_social\">
          <ul>
            <li><i class=\"material-icons\">share</i></li>
            <li><i class=\"material-icons\"></i></li>
            <li><i class=\"material-icons\">chat_bubble</i></li>
          </ul>

        </div>

      </div>
      <div class=\"blur_back\">
        <img src=\"/images/";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lego"]) || array_key_exists("lego", $context) ? $context["lego"] : (function () { throw new RuntimeError('Variable "lego" does not exist.', 28, $this->source); })()), "legoImage", [], "any", false, false, false, 28), "html", null, true);
        echo "\" alt=\"background lego card\">
      </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "lego.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  90 => 28,  73 => 14,  66 => 10,  62 => 9,  58 => 8,  54 => 7,  50 => 6,  46 => 5,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<div class=\"lego_card\">
      <div class=\"info_section\">
        <div class=\"lego_header\">
          <img class=\"locandina\" src=\"/images/{{lego.boxImage}}\"/>
          <h1>{{lego.name}}</h1>
          <h4>Collection : {{lego.collection}}</h4>
          <span class=\"pieces\">Pièces : {{lego.pieces}}</span>
          <p class=\"price\">{{lego.price}}€</p><br>
          <a href=\"index.php?buy={{lego.id}}\"><button>Buy</button></a>
        </div>
        <div class=\"lego_desc\">
          <p class=\"text\">
            {{lego.description}}
        </p>
        </div>
        <div class=\"lego_social\">
          <ul>
            <li><i class=\"material-icons\">share</i></li>
            <li><i class=\"material-icons\"></i></li>
            <li><i class=\"material-icons\">chat_bubble</i></li>
          </ul>

        </div>

      </div>
      <div class=\"blur_back\">
        <img src=\"/images/{{lego.legoImage}}\" alt=\"background lego card\">
      </div>
</div>
", "lego.html.twig", "/var/www/html/templates/lego.html.twig");
    }
}

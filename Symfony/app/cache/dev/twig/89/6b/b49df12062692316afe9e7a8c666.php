<?php

/* AcmeDemoBundle:Secured:hello.html.twig */
class __TwigTemplate_896bb49df12062692316afe9e7a8c666 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle:Secured:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle:Secured:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        $context["code"] = $this->env->getExtension('demo')->getCode($this);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ("Hello " . (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Hello ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!</h1>

    <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo_secured_hello_admin", array("name" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
        echo "\">Hello resource secured for <strong>admin</strong> only.</a>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Secured:hello.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  140 => 39,  97 => 45,  86 => 39,  77 => 27,  65 => 23,  49 => 10,  23 => 1,  82 => 37,  62 => 19,  40 => 6,  20 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 66,  176 => 65,  170 => 61,  168 => 60,  146 => 58,  142 => 56,  128 => 50,  125 => 44,  107 => 36,  38 => 6,  144 => 53,  141 => 51,  135 => 47,  126 => 45,  109 => 5,  103 => 37,  67 => 18,  61 => 22,  47 => 9,  105 => 24,  93 => 28,  76 => 23,  72 => 20,  68 => 24,  27 => 4,  91 => 20,  84 => 28,  94 => 44,  88 => 41,  79 => 17,  59 => 13,  21 => 2,  44 => 12,  31 => 3,  28 => 3,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  159 => 61,  154 => 59,  147 => 55,  132 => 48,  127 => 46,  121 => 30,  118 => 29,  114 => 42,  104 => 36,  100 => 34,  78 => 21,  75 => 23,  71 => 19,  58 => 18,  34 => 5,  26 => 11,  24 => 6,  25 => 3,  19 => 1,  70 => 20,  63 => 24,  46 => 8,  22 => 1,  163 => 59,  155 => 58,  152 => 49,  149 => 48,  145 => 46,  139 => 55,  131 => 51,  123 => 33,  120 => 40,  115 => 28,  106 => 36,  101 => 32,  96 => 21,  83 => 18,  80 => 28,  74 => 16,  66 => 15,  55 => 12,  52 => 10,  50 => 8,  43 => 7,  41 => 10,  37 => 5,  35 => 5,  32 => 4,  29 => 5,  184 => 70,  178 => 71,  171 => 62,  165 => 58,  162 => 57,  157 => 60,  153 => 54,  151 => 53,  143 => 40,  138 => 51,  136 => 50,  133 => 31,  130 => 30,  122 => 43,  119 => 42,  116 => 35,  111 => 37,  108 => 37,  102 => 47,  98 => 31,  95 => 34,  92 => 43,  89 => 25,  85 => 25,  81 => 40,  73 => 19,  64 => 17,  60 => 14,  57 => 12,  54 => 16,  51 => 11,  48 => 9,  45 => 8,  42 => 7,  39 => 7,  36 => 5,  33 => 6,  30 => 3,);
    }
}
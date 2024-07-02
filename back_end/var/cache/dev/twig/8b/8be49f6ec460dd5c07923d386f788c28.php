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

/* reset_password/reset_email.html.twig */
class __TwigTemplate_c2f35f16ad45895cd8e5352b21d8cbda extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/reset_email.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/reset_email.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "reset_password/reset_email.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        yield " 
<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        yield "    <div class='container mx-3 mt-5'>
        <h3>Hello ";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 9, $this->source); })()), "email", [], "any", false, false, false, 9), "html", null, true);
        yield ",</h3>
        <p class='mt-4'><b>A request has been received to change the password for your Family Tree Workshoo account.</b></p>
        <p>To reset your password, please visit the following link
        <a href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("http://localhost:4200/resetpassword/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 12, $this->source); })()), "token", [], "any", false, false, false, 12)), "html", null, true);
        yield "\">
            ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("http://localhost:4200/resetpassword/token:" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 13, $this->source); })()), "token", [], "any", false, false, false, 13)), "html", null, true);
        yield "</a>.</p>
        <p>This link will expire in ";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 14, $this->source); })()), "expirationMessageKey", [], "any", false, false, false, 14), CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 14, $this->source); })()), "expirationMessageData", [], "any", false, false, false, 14), "ResetPasswordBundle"), "html", null, true);
        yield ".</p>
        <p class='mt-4'>If you did not initiate this request or believe this email was sent in error, 
        feel free to contact us immediately at <a href='mailto:admin@familytreeworkshop.com'>admin@familytreeworkshop.com</a>.</p>
        <p class='mb-5'>Please don't reply to this message, it's automated.</p>
        <p class='mt-5 mb-5'>Thanks,<br>
        The Family Tree Workshop team.</p>
        <img src=' data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iT0JKRUNUUyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzNDIuOSAzMi4yIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzNDIuOSAzMi4yOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KCS5zdDB7ZmlsbDojMTMzNDVBO3N0cm9rZTojMTMzNDVBO3N0cm9rZS13aWR0aDo0O3N0cm9rZS1taXRlcmxpbWl0OjEwO30NCgkuc3Qxe2ZpbGw6IzA0RDlENDtzdHJva2U6IzEzMzQ1QTtzdHJva2Utd2lkdGg6MztzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6MTA7fQ0KCS5zdDJ7ZmlsbDojMTMzNDVBO30NCjwvc3R5bGU+DQo8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNy43LDIuNGMtMS0wLjEtMS41LDAuNS0xLjgsMS4xQzIuMyw5LDAuMSwxNS4yLDMuOSwyMS4yYzMuNCw1LjEsOSw4LjMsMTUuMiw4LjZjMC43LDAsMS41LTAuMiwxLjgtMQ0KCWMyLjYtNS40LDQuMS0xMiwxLjItMTcuNlMxMy44LDIuNyw3LjcsMi40Ii8+DQo8cGF0aCBjbGFzcz0ic3QxIiBkPSJNNy43LDIuNGMtMS0wLjEtMS41LDAuNS0xLjgsMS4xQzIuMyw5LDAuMSwxNS4yLDMuOSwyMS4yYzMuNCw1LjEsOSw4LjMsMTUuMiw4LjZjMC43LDAsMS41LTAuMiwxLjgtMQ0KCWMyLjYtNS40LDQuMS0xMiwxLjItMTcuNlMxMy44LDIuNyw3LjcsMi40Ii8+DQo8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMjAuOSwyOC42Yy0xLjQtMi45LTIuOC01LjgtNC4yLTguN2MwLDAsMC0wLjEsMC4xLTAuMWMwLjctMS40LDEuNC0yLjgsMS45LTQuMmMwLjYtMS41LTEuOS0yLjItMi40LTAuNw0KCWMtMC4zLDAuNy0wLjYsMS40LTAuOSwyLjJjLTAuOC0xLjgtMS43LTMuNS0yLjUtNS4zYy0wLjctMS41LTIuOC0wLjItMi4yLDEuM2MwLjUsMSwwLjksMS45LDEuNCwyLjlsLTMuNC0xLjJDNywxNCw2LjQsMTYuNSw3LjksMTcNCglsNS42LDJjMS43LDMuNiwzLjQsNy4yLDUuMiwxMC44QzE5LjQsMzEuMywyMS42LDMwLDIwLjksMjguNnoiLz4NCjxnPg0KCTxnPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNNDAuOSwyNC45VjEuMmgxMi4ydjMuNWgtOFYxMWg3Ljd2My41aC03Ljd2MTAuNUg0MC45eiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNNjIuNywyNS4zYy0yLjMsMC00LjItMC41LTUuNC0xLjVjLTEuMy0xLTEuOS0yLjQtMS45LTQuMmMwLTEuOCwwLjctMy4yLDItNC4yYzEuMy0xLDMuMy0xLjQsNS44LTEuNGgzLjMNCgkJCXYzLjJoLTMuMmMtMS4zLDAtMi4zLDAuMi0yLjksMC42Yy0wLjYsMC40LTEsMS0xLDEuOGMwLDAuOCwwLjMsMS4zLDAuOCwxLjhjMC42LDAuNCwxLjQsMC42LDIuNCwwLjZjMC42LDAsMS4xLTAuMSwxLjYtMC4yDQoJCQlzMC45LTAuNCwxLjMtMC43bC0xLDIuMVYxNGMwLTAuOC0wLjEtMS41LTAuMi0xLjljLTAuMS0wLjQtMC40LTAuNy0wLjgtMC44Yy0wLjQtMC4xLTEtMC4yLTEuOC0wLjJjLTAuNiwwLTEuMSwwLTEuNiwwLjENCgkJCWMtMC41LDAtMS4xLDAuMS0xLjcsMC4zYy0wLjYsMC4xLTEuMywwLjMtMi4xLDAuNlY4LjZjMC44LTAuMywxLjYtMC41LDIuNi0wLjZjMS0wLjIsMi0wLjIsMy4yLTAuMmMxLjYsMCwyLjksMC4yLDMuOCwwLjYNCgkJCWMwLjksMC40LDEuNiwxLDIsMS45YzAuNCwwLjksMC42LDIuMSwwLjYsMy43djEwLjNjLTAuNywwLjMtMS42LDAuNi0yLjYsMC44QzY0LjgsMjUuMiw2My43LDI1LjMsNjIuNywyNS4zeiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNNzEuOCwyNC45VjguN2MwLjYtMC4zLDEuMy0wLjYsMi0wLjdjMC43LTAuMiwxLjUtMC4yLDIuNC0wLjJjMC43LDAsMS4zLDAuMSwxLjcsMC4yDQoJCQljMC40LDAuMSwwLjksMC40LDEuMywwLjhjMC42LTAuNCwxLjEtMC42LDEuNi0wLjhjMC41LTAuMSwxLjEtMC4yLDEuOC0wLjJjMSwwLDEuOCwwLjIsMi40LDAuNWMwLjYsMC4zLDEsMC44LDEuMiwxLjUNCgkJCWMwLjIsMC43LDAuNCwxLjcsMC40LDIuOXYxMi40aC0zLjdWMTIuNWMwLTAuMywwLTAuNi0wLjEtMC44Yy0wLjEtMC4yLTAuMi0wLjMtMC4zLTAuNGMtMC4xLTAuMS0wLjMtMC4xLTAuNi0wLjENCgkJCWMtMC4yLDAtMC40LDAtMC42LDAuMWMtMC4yLDAuMS0wLjMsMC4yLTAuNSwwLjN2MTMuNGgtMy40VjEyLjFjMC0wLjIsMC0wLjQtMC4xLTAuNWMtMC4xLTAuMS0wLjItMC4yLTAuMy0wLjMNCgkJCWMtMC4xLTAuMS0wLjMtMC4xLTAuNS0wLjFjLTAuNCwwLTAuOCwwLjEtMS4xLDAuNHYxMy40SDcxLjh6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik05NC41LDI0LjlWMTEuNWgtNS40VjhoOS40djE2LjlIOTQuNXogTTk2LDUuOGMtMC45LDAtMS42LTAuMi0yLjEtMC43Yy0wLjUtMC41LTAuOC0xLjItMC44LTINCgkJCWMwLTAuOSwwLjMtMS41LDAuOC0yYzAuNS0wLjUsMS4yLTAuNywyLjEtMC43YzAuOSwwLDEuNiwwLjIsMi4xLDAuN2MwLjUsMC41LDAuOCwxLjEsMC44LDJjMCwwLjgtMC4zLDEuNS0wLjgsMg0KCQkJQzk3LjYsNS41LDk2LjksNS44LDk2LDUuOHoiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTExMi4yLDI1LjNjLTIsMC0zLjQtMC40LTQuMi0xLjJjLTAuOC0wLjgtMS4zLTIuMS0xLjMtNFY0LjdIMTAyVjEuMmg4Ljd2MTcuOWMwLDEsMC4yLDEuNywwLjUsMi4xDQoJCQlzMSwwLjYsMS45LDAuNmMwLjYsMCwxLjEsMCwxLjYtMC4xYzAuNS0wLjEsMS0wLjIsMS40LTAuNHYzLjVjLTAuNiwwLjItMS4zLDAuMy0xLjksMC40UzExMi45LDI1LjMsMTEyLjIsMjUuM3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTExOC44LDI4LjZjMS4xLDAsMi0wLjIsMi43LTAuNWMwLjctMC4zLDEuMi0wLjgsMS42LTEuNXMwLjYtMS42LDAuNy0yLjdsMC4yLDEuOUwxMTcuNiw4aDQuMmwzLjYsMTEuNWgwLjENCgkJCUwxMjguOCw4aDQuMmwtNS45LDE4LjZjLTAuNCwxLjItMC45LDIuMi0xLjcsM2MtMC43LDAuOC0xLjYsMS40LTIuNywxLjhjLTEuMSwwLjQtMi40LDAuNi0zLjksMC42VjI4LjZ6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0xNDkuMiwyNC45VjQuOGgtNC45VjEuMmgxMy45djMuNmgtNC45djIwLjFIMTQ5LjJ6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0xNjAuMiw5LjVjMS4xLTAuNCwyLjQtMC43LDMuNy0wLjljMS4zLTAuMywyLjYtMC41LDMuOS0wLjZjMS4zLTAuMiwyLjUtMC4yLDMuNi0wLjJ2My41DQoJCQljLTAuOSwwLTEuOSwwLjEtMi45LDAuMmMtMSwwLjEtMS45LDAuMy0yLjgsMC41Yy0wLjksMC4yLTEuNywwLjQtMi40LDAuN2wxLTEuOXYxNC4zaC00LjFWOS41eiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMTgxLjEsMjUuM2MtMi43LDAtNC42LTAuNy02LTJzLTItMy40LTItNi4xdi0xLjNjMC0yLjgsMC41LTQuOCwxLjYtNi4yYzEuMS0xLjMsMi44LTIsNS4xLTJzNCwwLjcsNS4xLDINCgkJCWMxLjEsMS4zLDEuNiwzLjQsMS42LDYuMnYyLjRoLTExLjR2LTMuMmg4LjNsLTAuNywxVjE2YzAtMS44LTAuMi0zLTAuNi0zLjhzLTEuMS0xLjEtMi4xLTEuMWMtMSwwLTEuNywwLjQtMi4yLDEuMQ0KCQkJcy0wLjYsMi0wLjYsMy44djFjMCwxLjMsMC4xLDIuMywwLjQsM2MwLjIsMC43LDAuNywxLjIsMS4zLDEuNGMwLjYsMC4zLDEuNSwwLjQsMi43LDAuNGMwLjYsMCwxLjMsMCwxLjktMC4xDQoJCQljMC42LTAuMSwxLjQtMC4yLDIuMy0wLjR2My40Yy0wLjcsMC4yLTEuNSwwLjMtMi4yLDAuNFMxODEuOSwyNS4zLDE4MS4xLDI1LjN6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0xOTcuNCwyNS4zYy0yLjcsMC00LjYtMC43LTYtMnMtMi0zLjQtMi02LjF2LTEuM2MwLTIuOCwwLjUtNC44LDEuNi02LjJjMS4xLTEuMywyLjgtMiw1LjEtMnM0LDAuNyw1LjEsMg0KCQkJYzEuMSwxLjMsMS42LDMuNCwxLjYsNi4ydjIuNGgtMTEuNHYtMy4yaDguM2wtMC43LDFWMTZjMC0xLjgtMC4yLTMtMC42LTMuOHMtMS4xLTEuMS0yLjEtMS4xYy0xLDAtMS43LDAuNC0yLjIsMS4xDQoJCQlzLTAuNiwyLTAuNiwzLjh2MWMwLDEuMywwLjEsMi4zLDAuNCwzYzAuMiwwLjcsMC43LDEuMiwxLjMsMS40YzAuNiwwLjMsMS41LDAuNCwyLjcsMC40YzAuNiwwLDEuMywwLDEuOS0wLjENCgkJCWMwLjYtMC4xLDEuNC0wLjIsMi4zLTAuNHYzLjRjLTAuNywwLjItMS41LDAuMy0yLjIsMC40UzE5OC4yLDI1LjMsMTk3LjQsMjUuM3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTIxOC42LDI0LjlsLTEuOC0yMy43aDQuMWwwLjYsMTcuM2gwLjFsMS42LTE0aDMuMmwxLjYsMTRoMC4xbDAuNi0xNy4zaDQuMUwyMzEsMjQuOWgtNWwtMS4xLTExLjdoLTAuMQ0KCQkJbC0xLjEsMTEuN0gyMTguNnoiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTI0MS4xLDI1LjNjLTIuNCwwLTQuMS0wLjctNS4yLTJzLTEuNy0zLjQtMS43LTYuMnYtMS4zYzAtMi44LDAuNi00LjgsMS43LTYuMmMxLjEtMS4zLDIuOC0yLDUuMi0yDQoJCQljMi40LDAsNC4xLDAuNyw1LjIsMmMxLjEsMS4zLDEuNywzLjQsMS43LDYuMnYxLjNjMCwyLjgtMC42LDQuOS0xLjcsNi4yUzI0My40LDI1LjMsMjQxLjEsMjUuM3ogTTI0MS4xLDIxLjdjMSwwLDEuNy0wLjQsMi4yLTEuMQ0KCQkJYzAuNC0wLjcsMC43LTIsMC43LTMuOHYtMC43YzAtMS44LTAuMi0zLTAuNy0zLjhjLTAuNC0wLjctMS4yLTEuMS0yLjItMS4xYy0xLDAtMS43LDAuNC0yLjIsMS4xYy0wLjQsMC43LTAuNywyLTAuNywzLjh2MC43DQoJCQljMCwxLjgsMC4yLDMsMC43LDMuOFMyNDAsMjEuNywyNDEuMSwyMS43eiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMjUwLjYsOS41YzEuMS0wLjQsMi40LTAuNywzLjctMC45YzEuMy0wLjMsMi42LTAuNSwzLjktMC42YzEuMy0wLjIsMi41LTAuMiwzLjYtMC4ydjMuNQ0KCQkJYy0wLjksMC0xLjksMC4xLTIuOSwwLjJjLTEsMC4xLTEuOSwwLjMtMi44LDAuNWMtMC45LDAuMi0xLjcsMC40LTIuNCwwLjdsMS0xLjl2MTQuM2gtNC4xVjkuNXoiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTI2NC42LDI0LjlWMS4yaDRWMTVoMC4xTDI3NCw4aDQuNmwtNi4xLDguMWw2LjIsOC44aC00LjZsLTUuMy03LjVoLTAuMXY3LjVIMjY0LjZ6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0yODYuNywyNS4zYy0xLDAtMS45LTAuMS0yLjgtMC4yYy0wLjktMC4xLTEuNy0wLjQtMi42LTAuNnYtMy41YzEsMC4zLDEuOSwwLjUsMi43LDAuNw0KCQkJYzAuOCwwLjEsMS43LDAuMiwyLjUsMC4yYzEuMSwwLDEuOS0wLjEsMi4zLTAuNGMwLjUtMC4zLDAuNy0wLjcsMC43LTEuMmMwLTAuMy0wLjEtMC42LTAuMy0wLjhzLTAuNS0wLjUtMS0wLjcNCgkJCWMtMC40LTAuMi0xLTAuNC0xLjgtMC42Yy0xLjMtMC4zLTIuNC0wLjgtMy4zLTEuM2MtMC44LTAuNS0xLjQtMS4xLTEuOC0xLjhjLTAuNC0wLjctMC42LTEuNS0wLjYtMi41YzAtMS43LDAuNi0yLjksMS43LTMuNw0KCQkJYzEuMS0wLjgsMi45LTEuMiw1LjMtMS4yYzAuOCwwLDEuNywwLjEsMi41LDAuMmMwLjgsMC4xLDEuOCwwLjMsMi45LDAuNnY1LjNoLTRWOS4ybDEuNywyLjJjLTAuNy0wLjEtMS4zLTAuMS0xLjctMC4yDQoJCQljLTAuNCwwLTAuOCwwLTEuMiwwYy0xLjEsMC0xLjksMC4xLTIuNCwwLjRjLTAuNSwwLjItMC44LDAuNi0wLjgsMS4yYzAsMC4zLDAuMSwwLjYsMC40LDAuOWMwLjIsMC4zLDAuNiwwLjUsMS4xLDAuOA0KCQkJYzAuNSwwLjIsMS4xLDAuNSwyLDAuN2MxLjMsMC40LDIuMywwLjgsMy4xLDEuM2MwLjgsMC41LDEuMywxLDEuNywxLjdzMC41LDEuNCwwLjUsMi4zYzAsMS43LTAuNiwyLjktMS43LDMuNw0KCQkJUzI4OS4xLDI1LjMsMjg2LjcsMjUuM3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTI5NywyNC45VjEuMmg0djIzLjdIMjk3eiBNMzA2LDE0LjFjMC0wLjgtMC4xLTEuNC0wLjItMS44Yy0wLjItMC40LTAuNC0wLjctMC44LTAuOQ0KCQkJYy0wLjQtMC4yLTAuOS0wLjMtMS42LTAuM2MtMC40LDAtMC43LDAtMSwwLjFjLTAuMywwLjEtMC43LDAuMS0xLDAuM2MtMC40LDAuMS0wLjgsMC4zLTEuMywwLjZMMjk5LDguOGMwLjgtMC40LDEuNS0wLjcsMi4yLTAuOA0KCQkJYzAuNy0wLjIsMS42LTAuMiwyLjYtMC4yYzEuNiwwLDIuOCwwLjIsMy43LDAuNmMwLjksMC40LDEuNSwxLDEuOSwxLjljMC40LDAuOSwwLjYsMi4xLDAuNiwzLjd2MTEuMWgtNFYxNC4xeiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMzE5LjgsMjUuM2MtMi40LDAtNC4xLTAuNy01LjItMnMtMS43LTMuNC0xLjctNi4ydi0xLjNjMC0yLjgsMC42LTQuOCwxLjctNi4yYzEuMS0xLjMsMi44LTIsNS4yLTINCgkJCWMyLjQsMCw0LjEsMC43LDUuMiwyYzEuMSwxLjMsMS43LDMuNCwxLjcsNi4ydjEuM2MwLDIuOC0wLjYsNC45LTEuNyw2LjJTMzIyLjEsMjUuMywzMTkuOCwyNS4zeiBNMzE5LjgsMjEuN2MxLDAsMS43LTAuNCwyLjItMS4xDQoJCQljMC40LTAuNywwLjctMiwwLjctMy44di0wLjdjMC0xLjgtMC4yLTMtMC43LTMuOGMtMC40LTAuNy0xLjItMS4xLTIuMi0xLjFjLTEsMC0xLjcsMC40LTIuMiwxLjFjLTAuNCwwLjctMC43LDItMC43LDMuOHYwLjcNCgkJCWMwLDEuOCwwLjIsMywwLjcsMy44UzMxOC43LDIxLjcsMzE5LjgsMjEuN3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTMyOS44LDguN2MxLjYtMC43LDMuNC0xLDUuNi0xYzEuOCwwLDMuMywwLjMsNC40LDAuOGMxLjEsMC42LDEuOSwxLjQsMi4zLDIuN2MwLjUsMS4yLDAuNywyLjksMC43LDUNCgkJCWMwLDIuMi0wLjIsNC0wLjcsNS4zYy0wLjUsMS4zLTEuMywyLjMtMi40LDIuOXMtMi41LDAuOS00LjMsMC45Yy0wLjcsMC0xLjMsMC0xLjktMC4xYy0wLjYtMC4xLTEuMi0wLjItMS44LTAuM2wxLTMuNQ0KCQkJYzAuNiwwLjIsMS4yLDAuNCwxLjcsMC41czAuOSwwLjEsMS4zLDAuMWMwLjgsMCwxLjQtMC4yLDEuOS0wLjVzMC44LTAuOSwxLTEuN2MwLjItMC44LDAuMy0xLjksMC4zLTMuNGMwLTEuMy0wLjEtMi4zLTAuMy0zDQoJCQljLTAuMi0wLjctMC41LTEuMy0wLjktMS42Yy0wLjQtMC4zLTEtMC41LTEuOC0wLjVjLTAuNCwwLTAuOSwwLjEtMS40LDAuMnMtMSwwLjMtMS43LDAuNWwwLjktMi4xdjIyaC00VjguN3oiLz4NCgk8L2c+DQo8L2c+DQo8L3N2Zz4NCg==' width='230px' height='auto' />
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reset_password/reset_email.html.twig";
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
        return array (  109 => 14,  105 => 13,  101 => 12,  95 => 9,  92 => 8,  82 => 7,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block stylesheets %} 
<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
{% endblock %}

{% block body %}
    <div class='container mx-3 mt-5'>
        <h3>Hello {{ user.email }},</h3>
        <p class='mt-4'><b>A request has been received to change the password for your Family Tree Workshoo account.</b></p>
        <p>To reset your password, please visit the following link
        <a href=\"{{ 'http://localhost:4200/resetpassword/' ~ resetToken.token }}\">
            {{ 'http://localhost:4200/resetpassword/token:' ~ resetToken.token }}</a>.</p>
        <p>This link will expire in {{ resetToken.expirationMessageKey|trans(resetToken.expirationMessageData, 'ResetPasswordBundle') }}.</p>
        <p class='mt-4'>If you did not initiate this request or believe this email was sent in error, 
        feel free to contact us immediately at <a href='mailto:admin@familytreeworkshop.com'>admin@familytreeworkshop.com</a>.</p>
        <p class='mb-5'>Please don't reply to this message, it's automated.</p>
        <p class='mt-5 mb-5'>Thanks,<br>
        The Family Tree Workshop team.</p>
        <img src=' data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iT0JKRUNUUyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzNDIuOSAzMi4yIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzNDIuOSAzMi4yOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KCS5zdDB7ZmlsbDojMTMzNDVBO3N0cm9rZTojMTMzNDVBO3N0cm9rZS13aWR0aDo0O3N0cm9rZS1taXRlcmxpbWl0OjEwO30NCgkuc3Qxe2ZpbGw6IzA0RDlENDtzdHJva2U6IzEzMzQ1QTtzdHJva2Utd2lkdGg6MztzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQ7c3Ryb2tlLW1pdGVybGltaXQ6MTA7fQ0KCS5zdDJ7ZmlsbDojMTMzNDVBO30NCjwvc3R5bGU+DQo8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNy43LDIuNGMtMS0wLjEtMS41LDAuNS0xLjgsMS4xQzIuMyw5LDAuMSwxNS4yLDMuOSwyMS4yYzMuNCw1LjEsOSw4LjMsMTUuMiw4LjZjMC43LDAsMS41LTAuMiwxLjgtMQ0KCWMyLjYtNS40LDQuMS0xMiwxLjItMTcuNlMxMy44LDIuNyw3LjcsMi40Ii8+DQo8cGF0aCBjbGFzcz0ic3QxIiBkPSJNNy43LDIuNGMtMS0wLjEtMS41LDAuNS0xLjgsMS4xQzIuMyw5LDAuMSwxNS4yLDMuOSwyMS4yYzMuNCw1LjEsOSw4LjMsMTUuMiw4LjZjMC43LDAsMS41LTAuMiwxLjgtMQ0KCWMyLjYtNS40LDQuMS0xMiwxLjItMTcuNlMxMy44LDIuNyw3LjcsMi40Ii8+DQo8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMjAuOSwyOC42Yy0xLjQtMi45LTIuOC01LjgtNC4yLTguN2MwLDAsMC0wLjEsMC4xLTAuMWMwLjctMS40LDEuNC0yLjgsMS45LTQuMmMwLjYtMS41LTEuOS0yLjItMi40LTAuNw0KCWMtMC4zLDAuNy0wLjYsMS40LTAuOSwyLjJjLTAuOC0xLjgtMS43LTMuNS0yLjUtNS4zYy0wLjctMS41LTIuOC0wLjItMi4yLDEuM2MwLjUsMSwwLjksMS45LDEuNCwyLjlsLTMuNC0xLjJDNywxNCw2LjQsMTYuNSw3LjksMTcNCglsNS42LDJjMS43LDMuNiwzLjQsNy4yLDUuMiwxMC44QzE5LjQsMzEuMywyMS42LDMwLDIwLjksMjguNnoiLz4NCjxnPg0KCTxnPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNNDAuOSwyNC45VjEuMmgxMi4ydjMuNWgtOFYxMWg3Ljd2My41aC03Ljd2MTAuNUg0MC45eiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNNjIuNywyNS4zYy0yLjMsMC00LjItMC41LTUuNC0xLjVjLTEuMy0xLTEuOS0yLjQtMS45LTQuMmMwLTEuOCwwLjctMy4yLDItNC4yYzEuMy0xLDMuMy0xLjQsNS44LTEuNGgzLjMNCgkJCXYzLjJoLTMuMmMtMS4zLDAtMi4zLDAuMi0yLjksMC42Yy0wLjYsMC40LTEsMS0xLDEuOGMwLDAuOCwwLjMsMS4zLDAuOCwxLjhjMC42LDAuNCwxLjQsMC42LDIuNCwwLjZjMC42LDAsMS4xLTAuMSwxLjYtMC4yDQoJCQlzMC45LTAuNCwxLjMtMC43bC0xLDIuMVYxNGMwLTAuOC0wLjEtMS41LTAuMi0xLjljLTAuMS0wLjQtMC40LTAuNy0wLjgtMC44Yy0wLjQtMC4xLTEtMC4yLTEuOC0wLjJjLTAuNiwwLTEuMSwwLTEuNiwwLjENCgkJCWMtMC41LDAtMS4xLDAuMS0xLjcsMC4zYy0wLjYsMC4xLTEuMywwLjMtMi4xLDAuNlY4LjZjMC44LTAuMywxLjYtMC41LDIuNi0wLjZjMS0wLjIsMi0wLjIsMy4yLTAuMmMxLjYsMCwyLjksMC4yLDMuOCwwLjYNCgkJCWMwLjksMC40LDEuNiwxLDIsMS45YzAuNCwwLjksMC42LDIuMSwwLjYsMy43djEwLjNjLTAuNywwLjMtMS42LDAuNi0yLjYsMC44QzY0LjgsMjUuMiw2My43LDI1LjMsNjIuNywyNS4zeiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNNzEuOCwyNC45VjguN2MwLjYtMC4zLDEuMy0wLjYsMi0wLjdjMC43LTAuMiwxLjUtMC4yLDIuNC0wLjJjMC43LDAsMS4zLDAuMSwxLjcsMC4yDQoJCQljMC40LDAuMSwwLjksMC40LDEuMywwLjhjMC42LTAuNCwxLjEtMC42LDEuNi0wLjhjMC41LTAuMSwxLjEtMC4yLDEuOC0wLjJjMSwwLDEuOCwwLjIsMi40LDAuNWMwLjYsMC4zLDEsMC44LDEuMiwxLjUNCgkJCWMwLjIsMC43LDAuNCwxLjcsMC40LDIuOXYxMi40aC0zLjdWMTIuNWMwLTAuMywwLTAuNi0wLjEtMC44Yy0wLjEtMC4yLTAuMi0wLjMtMC4zLTAuNGMtMC4xLTAuMS0wLjMtMC4xLTAuNi0wLjENCgkJCWMtMC4yLDAtMC40LDAtMC42LDAuMWMtMC4yLDAuMS0wLjMsMC4yLTAuNSwwLjN2MTMuNGgtMy40VjEyLjFjMC0wLjIsMC0wLjQtMC4xLTAuNWMtMC4xLTAuMS0wLjItMC4yLTAuMy0wLjMNCgkJCWMtMC4xLTAuMS0wLjMtMC4xLTAuNS0wLjFjLTAuNCwwLTAuOCwwLjEtMS4xLDAuNHYxMy40SDcxLjh6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik05NC41LDI0LjlWMTEuNWgtNS40VjhoOS40djE2LjlIOTQuNXogTTk2LDUuOGMtMC45LDAtMS42LTAuMi0yLjEtMC43Yy0wLjUtMC41LTAuOC0xLjItMC44LTINCgkJCWMwLTAuOSwwLjMtMS41LDAuOC0yYzAuNS0wLjUsMS4yLTAuNywyLjEtMC43YzAuOSwwLDEuNiwwLjIsMi4xLDAuN2MwLjUsMC41LDAuOCwxLjEsMC44LDJjMCwwLjgtMC4zLDEuNS0wLjgsMg0KCQkJQzk3LjYsNS41LDk2LjksNS44LDk2LDUuOHoiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTExMi4yLDI1LjNjLTIsMC0zLjQtMC40LTQuMi0xLjJjLTAuOC0wLjgtMS4zLTIuMS0xLjMtNFY0LjdIMTAyVjEuMmg4Ljd2MTcuOWMwLDEsMC4yLDEuNywwLjUsMi4xDQoJCQlzMSwwLjYsMS45LDAuNmMwLjYsMCwxLjEsMCwxLjYtMC4xYzAuNS0wLjEsMS0wLjIsMS40LTAuNHYzLjVjLTAuNiwwLjItMS4zLDAuMy0xLjksMC40UzExMi45LDI1LjMsMTEyLjIsMjUuM3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTExOC44LDI4LjZjMS4xLDAsMi0wLjIsMi43LTAuNWMwLjctMC4zLDEuMi0wLjgsMS42LTEuNXMwLjYtMS42LDAuNy0yLjdsMC4yLDEuOUwxMTcuNiw4aDQuMmwzLjYsMTEuNWgwLjENCgkJCUwxMjguOCw4aDQuMmwtNS45LDE4LjZjLTAuNCwxLjItMC45LDIuMi0xLjcsM2MtMC43LDAuOC0xLjYsMS40LTIuNywxLjhjLTEuMSwwLjQtMi40LDAuNi0zLjksMC42VjI4LjZ6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0xNDkuMiwyNC45VjQuOGgtNC45VjEuMmgxMy45djMuNmgtNC45djIwLjFIMTQ5LjJ6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0xNjAuMiw5LjVjMS4xLTAuNCwyLjQtMC43LDMuNy0wLjljMS4zLTAuMywyLjYtMC41LDMuOS0wLjZjMS4zLTAuMiwyLjUtMC4yLDMuNi0wLjJ2My41DQoJCQljLTAuOSwwLTEuOSwwLjEtMi45LDAuMmMtMSwwLjEtMS45LDAuMy0yLjgsMC41Yy0wLjksMC4yLTEuNywwLjQtMi40LDAuN2wxLTEuOXYxNC4zaC00LjFWOS41eiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMTgxLjEsMjUuM2MtMi43LDAtNC42LTAuNy02LTJzLTItMy40LTItNi4xdi0xLjNjMC0yLjgsMC41LTQuOCwxLjYtNi4yYzEuMS0xLjMsMi44LTIsNS4xLTJzNCwwLjcsNS4xLDINCgkJCWMxLjEsMS4zLDEuNiwzLjQsMS42LDYuMnYyLjRoLTExLjR2LTMuMmg4LjNsLTAuNywxVjE2YzAtMS44LTAuMi0zLTAuNi0zLjhzLTEuMS0xLjEtMi4xLTEuMWMtMSwwLTEuNywwLjQtMi4yLDEuMQ0KCQkJcy0wLjYsMi0wLjYsMy44djFjMCwxLjMsMC4xLDIuMywwLjQsM2MwLjIsMC43LDAuNywxLjIsMS4zLDEuNGMwLjYsMC4zLDEuNSwwLjQsMi43LDAuNGMwLjYsMCwxLjMsMCwxLjktMC4xDQoJCQljMC42LTAuMSwxLjQtMC4yLDIuMy0wLjR2My40Yy0wLjcsMC4yLTEuNSwwLjMtMi4yLDAuNFMxODEuOSwyNS4zLDE4MS4xLDI1LjN6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0xOTcuNCwyNS4zYy0yLjcsMC00LjYtMC43LTYtMnMtMi0zLjQtMi02LjF2LTEuM2MwLTIuOCwwLjUtNC44LDEuNi02LjJjMS4xLTEuMywyLjgtMiw1LjEtMnM0LDAuNyw1LjEsMg0KCQkJYzEuMSwxLjMsMS42LDMuNCwxLjYsNi4ydjIuNGgtMTEuNHYtMy4yaDguM2wtMC43LDFWMTZjMC0xLjgtMC4yLTMtMC42LTMuOHMtMS4xLTEuMS0yLjEtMS4xYy0xLDAtMS43LDAuNC0yLjIsMS4xDQoJCQlzLTAuNiwyLTAuNiwzLjh2MWMwLDEuMywwLjEsMi4zLDAuNCwzYzAuMiwwLjcsMC43LDEuMiwxLjMsMS40YzAuNiwwLjMsMS41LDAuNCwyLjcsMC40YzAuNiwwLDEuMywwLDEuOS0wLjENCgkJCWMwLjYtMC4xLDEuNC0wLjIsMi4zLTAuNHYzLjRjLTAuNywwLjItMS41LDAuMy0yLjIsMC40UzE5OC4yLDI1LjMsMTk3LjQsMjUuM3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTIxOC42LDI0LjlsLTEuOC0yMy43aDQuMWwwLjYsMTcuM2gwLjFsMS42LTE0aDMuMmwxLjYsMTRoMC4xbDAuNi0xNy4zaDQuMUwyMzEsMjQuOWgtNWwtMS4xLTExLjdoLTAuMQ0KCQkJbC0xLjEsMTEuN0gyMTguNnoiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTI0MS4xLDI1LjNjLTIuNCwwLTQuMS0wLjctNS4yLTJzLTEuNy0zLjQtMS43LTYuMnYtMS4zYzAtMi44LDAuNi00LjgsMS43LTYuMmMxLjEtMS4zLDIuOC0yLDUuMi0yDQoJCQljMi40LDAsNC4xLDAuNyw1LjIsMmMxLjEsMS4zLDEuNywzLjQsMS43LDYuMnYxLjNjMCwyLjgtMC42LDQuOS0xLjcsNi4yUzI0My40LDI1LjMsMjQxLjEsMjUuM3ogTTI0MS4xLDIxLjdjMSwwLDEuNy0wLjQsMi4yLTEuMQ0KCQkJYzAuNC0wLjcsMC43LTIsMC43LTMuOHYtMC43YzAtMS44LTAuMi0zLTAuNy0zLjhjLTAuNC0wLjctMS4yLTEuMS0yLjItMS4xYy0xLDAtMS43LDAuNC0yLjIsMS4xYy0wLjQsMC43LTAuNywyLTAuNywzLjh2MC43DQoJCQljMCwxLjgsMC4yLDMsMC43LDMuOFMyNDAsMjEuNywyNDEuMSwyMS43eiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMjUwLjYsOS41YzEuMS0wLjQsMi40LTAuNywzLjctMC45YzEuMy0wLjMsMi42LTAuNSwzLjktMC42YzEuMy0wLjIsMi41LTAuMiwzLjYtMC4ydjMuNQ0KCQkJYy0wLjksMC0xLjksMC4xLTIuOSwwLjJjLTEsMC4xLTEuOSwwLjMtMi44LDAuNWMtMC45LDAuMi0xLjcsMC40LTIuNCwwLjdsMS0xLjl2MTQuM2gtNC4xVjkuNXoiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTI2NC42LDI0LjlWMS4yaDRWMTVoMC4xTDI3NCw4aDQuNmwtNi4xLDguMWw2LjIsOC44aC00LjZsLTUuMy03LjVoLTAuMXY3LjVIMjY0LjZ6Ii8+DQoJCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik0yODYuNywyNS4zYy0xLDAtMS45LTAuMS0yLjgtMC4yYy0wLjktMC4xLTEuNy0wLjQtMi42LTAuNnYtMy41YzEsMC4zLDEuOSwwLjUsMi43LDAuNw0KCQkJYzAuOCwwLjEsMS43LDAuMiwyLjUsMC4yYzEuMSwwLDEuOS0wLjEsMi4zLTAuNGMwLjUtMC4zLDAuNy0wLjcsMC43LTEuMmMwLTAuMy0wLjEtMC42LTAuMy0wLjhzLTAuNS0wLjUtMS0wLjcNCgkJCWMtMC40LTAuMi0xLTAuNC0xLjgtMC42Yy0xLjMtMC4zLTIuNC0wLjgtMy4zLTEuM2MtMC44LTAuNS0xLjQtMS4xLTEuOC0xLjhjLTAuNC0wLjctMC42LTEuNS0wLjYtMi41YzAtMS43LDAuNi0yLjksMS43LTMuNw0KCQkJYzEuMS0wLjgsMi45LTEuMiw1LjMtMS4yYzAuOCwwLDEuNywwLjEsMi41LDAuMmMwLjgsMC4xLDEuOCwwLjMsMi45LDAuNnY1LjNoLTRWOS4ybDEuNywyLjJjLTAuNy0wLjEtMS4zLTAuMS0xLjctMC4yDQoJCQljLTAuNCwwLTAuOCwwLTEuMiwwYy0xLjEsMC0xLjksMC4xLTIuNCwwLjRjLTAuNSwwLjItMC44LDAuNi0wLjgsMS4yYzAsMC4zLDAuMSwwLjYsMC40LDAuOWMwLjIsMC4zLDAuNiwwLjUsMS4xLDAuOA0KCQkJYzAuNSwwLjIsMS4xLDAuNSwyLDAuN2MxLjMsMC40LDIuMywwLjgsMy4xLDEuM2MwLjgsMC41LDEuMywxLDEuNywxLjdzMC41LDEuNCwwLjUsMi4zYzAsMS43LTAuNiwyLjktMS43LDMuNw0KCQkJUzI4OS4xLDI1LjMsMjg2LjcsMjUuM3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTI5NywyNC45VjEuMmg0djIzLjdIMjk3eiBNMzA2LDE0LjFjMC0wLjgtMC4xLTEuNC0wLjItMS44Yy0wLjItMC40LTAuNC0wLjctMC44LTAuOQ0KCQkJYy0wLjQtMC4yLTAuOS0wLjMtMS42LTAuM2MtMC40LDAtMC43LDAtMSwwLjFjLTAuMywwLjEtMC43LDAuMS0xLDAuM2MtMC40LDAuMS0wLjgsMC4zLTEuMywwLjZMMjk5LDguOGMwLjgtMC40LDEuNS0wLjcsMi4yLTAuOA0KCQkJYzAuNy0wLjIsMS42LTAuMiwyLjYtMC4yYzEuNiwwLDIuOCwwLjIsMy43LDAuNmMwLjksMC40LDEuNSwxLDEuOSwxLjljMC40LDAuOSwwLjYsMi4xLDAuNiwzLjd2MTEuMWgtNFYxNC4xeiIvPg0KCQk8cGF0aCBjbGFzcz0ic3QyIiBkPSJNMzE5LjgsMjUuM2MtMi40LDAtNC4xLTAuNy01LjItMnMtMS43LTMuNC0xLjctNi4ydi0xLjNjMC0yLjgsMC42LTQuOCwxLjctNi4yYzEuMS0xLjMsMi44LTIsNS4yLTINCgkJCWMyLjQsMCw0LjEsMC43LDUuMiwyYzEuMSwxLjMsMS43LDMuNCwxLjcsNi4ydjEuM2MwLDIuOC0wLjYsNC45LTEuNyw2LjJTMzIyLjEsMjUuMywzMTkuOCwyNS4zeiBNMzE5LjgsMjEuN2MxLDAsMS43LTAuNCwyLjItMS4xDQoJCQljMC40LTAuNywwLjctMiwwLjctMy44di0wLjdjMC0xLjgtMC4yLTMtMC43LTMuOGMtMC40LTAuNy0xLjItMS4xLTIuMi0xLjFjLTEsMC0xLjcsMC40LTIuMiwxLjFjLTAuNCwwLjctMC43LDItMC43LDMuOHYwLjcNCgkJCWMwLDEuOCwwLjIsMywwLjcsMy44UzMxOC43LDIxLjcsMzE5LjgsMjEuN3oiLz4NCgkJPHBhdGggY2xhc3M9InN0MiIgZD0iTTMyOS44LDguN2MxLjYtMC43LDMuNC0xLDUuNi0xYzEuOCwwLDMuMywwLjMsNC40LDAuOGMxLjEsMC42LDEuOSwxLjQsMi4zLDIuN2MwLjUsMS4yLDAuNywyLjksMC43LDUNCgkJCWMwLDIuMi0wLjIsNC0wLjcsNS4zYy0wLjUsMS4zLTEuMywyLjMtMi40LDIuOXMtMi41LDAuOS00LjMsMC45Yy0wLjcsMC0xLjMsMC0xLjktMC4xYy0wLjYtMC4xLTEuMi0wLjItMS44LTAuM2wxLTMuNQ0KCQkJYzAuNiwwLjIsMS4yLDAuNCwxLjcsMC41czAuOSwwLjEsMS4zLDAuMWMwLjgsMCwxLjQtMC4yLDEuOS0wLjVzMC44LTAuOSwxLTEuN2MwLjItMC44LDAuMy0xLjksMC4zLTMuNGMwLTEuMy0wLjEtMi4zLTAuMy0zDQoJCQljLTAuMi0wLjctMC41LTEuMy0wLjktMS42Yy0wLjQtMC4zLTEtMC41LTEuOC0wLjVjLTAuNCwwLTAuOSwwLjEtMS40LDAuMnMtMSwwLjMtMS43LDAuNWwwLjktMi4xdjIyaC00VjguN3oiLz4NCgk8L2c+DQo8L2c+DQo8L3N2Zz4NCg==' width='230px' height='auto' />
    </div>
{% endblock %}", "reset_password/reset_email.html.twig", "C:\\wamp64\\www\\FamilyTreeWorkshop\\back_end\\templates\\reset_password\\reset_email.html.twig");
    }
}

<?php

/* queries.twig */
class __TwigTemplate_e73ae6bf6f171b2de08f659777d38c1b5d999859ad9029aab58c7c6fd1f1802d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<?php

/**
*
* ";
        // line 6
        echo (isset($context["tableName"]) ? $context["tableName"] : $this->getContext($context, "tableName"));
        echo "
*
* This class was generated by a script. Please be careful changing it.
* Regenerate it will erase all changes!
*/

namespace App\\Models\\Queries;

use Helpers\\DB\\Query;

class  ";
        // line 16
        echo (isset($context["tableName"]) ? $context["tableName"] : $this->getContext($context, "tableName"));
        echo " extends Query {
}
?>
";
    }

    public function getTemplateName()
    {
        return "queries.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 16,  25 => 6,  19 => 2,);
    }
}
/* {% autoescape false %}*/
/* <?php*/
/* */
/* /***/
/* **/
/* * {{ tableName }}*/
/* **/
/* * This class was generated by a script. Please be careful changing it.*/
/* * Regenerate it will erase all changes!*/
/* *//* */
/* */
/* namespace App\Models\Queries;*/
/* */
/* use Helpers\DB\Query;*/
/* */
/* class  {{ tableName }} extends Query {*/
/* }*/
/* ?>*/
/* {% endautoescape %}*/

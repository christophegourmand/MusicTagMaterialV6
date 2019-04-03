<!--{% extends "@FOSUser/layout.html.twig" %} -->
{% extends 'layout.html.twig' %}

<!--
{% block fos_user_content %}
{% include "bundles/FOSUserBundle/Registration/register_content.html.twig" %}
{% endblock fos_user_content %}
 -->

{% block layout_block_body %}
    <h1>on est dans inscription</h1>

    {{ form_start(form_inscription_view) }}
        {{ form_widget(form_inscription_view) }}
    {{ form_end(form_inscription_view) }}



{% endblock %}







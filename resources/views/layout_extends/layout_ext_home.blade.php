{% extends 'layout.html.twig' %}

{% block layout_block_title %}
    Page d'Accueil MTM
{% endblock %}

{% block layout_block_customStylesheets %}
    {#{ parent() }-->
{% endblock %}


{% block fos_user_content %}
{% endblock fos_user_content %}


{% block layout_block_body %}
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Page d'accueil</h1>
            <p class="lead">Site en préparation...</p>
        </div>
    </div>

    <!--================ TEMPORAIRE, LE TEMPS DE CREER LE SITE :  ============  -->
    <pre>
  home                                ANY        ANY      ANY    /
  page_moncompte                      ANY        ANY      ANY    /moncompte
  fos_user_security_login             GET|POST   ANY      ANY    /login
  fos_user_security_check             POST       ANY      ANY    /login_check
  fos_user_security_logout            GET|POST   ANY      ANY    /logout
  fos_user_profile_show               GET        ANY      ANY    /profile/
  fos_user_profile_edit               GET|POST   ANY      ANY    /profile/edit
  fos_user_registration_register      GET|POST   ANY      ANY    /register/
  fos_user_registration_check_email   GET        ANY      ANY    /register/check-email
  fos_user_registration_confirm       GET        ANY      ANY    /register/confirm/{token}
  fos_user_registration_confirmed     GET        ANY      ANY    /register/confirmed
  fos_user_resetting_request          GET        ANY      ANY    /resetting/request
  fos_user_resetting_send_email       POST       ANY      ANY    /resetting/send-email
  fos_user_resetting_check_email      GET        ANY      ANY    /resetting/check-email
  fos_user_resetting_reset            GET|POST   ANY      ANY    /resetting/reset/{token}
  fos_user_change_password            GET|POST   ANY      ANY    /profile/change-password
  
_twig_error_test                    ANY        ANY      ANY    /_error/{code}.{_format}
  _wdt                                ANY        ANY      ANY    /_wdt/{token}
  _profiler_home                      ANY        ANY      ANY    /_profiler/
  _profiler_search                    ANY        ANY      ANY    /_profiler/search
  _profiler_search_bar                ANY        ANY      ANY    /_profiler/search_bar
  _profiler_phpinfo                   ANY        ANY      ANY    /_profiler/phpinfo
  _profiler_search_results            ANY        ANY      ANY    /_profiler/{token}/search/results
  _profiler_open_file                 ANY        ANY      ANY    /_profiler/open
  _profiler                           ANY        ANY      ANY    /_profiler/{token}
  _profiler_router                    ANY        ANY      ANY    /_profiler/{token}/router
  _profiler_exception                 ANY        ANY      ANY    /_profiler/{token}/exception
  _profiler_exception_css             ANY        ANY      ANY    /_profiler/{token}/exception.css
    </pre>

{% endblock %}

{% block layout_block_customJavascripts %}
{% endblock %}

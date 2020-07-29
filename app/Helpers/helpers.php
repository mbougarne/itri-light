<?php

use Illuminate\Support\Facades\Route;
use App\Models\Setting;

# Route Active Status
if( !function_exists('active_route') )
{
    function active_route(string $route_name) : string
    {
        return Route::currentRouteNamed($route_name) ? 'class="colorlib-active"' : '';
    }
}

if(!function_exists('app_title'))
{
    /**
     * Get app title
     *
     * @return string
     */
    function app_title() : string
    {
        return Setting::first()->title ?? '';
    }
}

if(!function_exists('app_description'))
{
    /**
     * Get app description
     *
     * @return string
     */
    function app_description() : string
    {
        return Setting::first()->description ?? '';
    }
}

if(!function_exists('app_logo'))
{
    /**
     * Get app logo
     *
     * @return string
     */
    function app_logo() : string
    {
        return Setting::first()->logo ?? '';
    }
}

if(!function_exists('app_favicon'))
{
    /**
     * Get app favicon
     *
     * @return string
     */
    function app_favicon() : string
    {
        return asset(Setting::first()->favicon) ?? asset('favicon.ico');
    }
}

if(!function_exists('app_language'))
{
    /**
     * Get app language
     *
     * @return string
     */
    function app_language() : string
    {
        return Setting::first()->language;
    }
}

if(!function_exists('app_admin_email'))
{
    /**
     * Get app admin email
     *
     * @return string
     */
    function app_admin_email() : string
    {
        return Setting::first()->admin_email ?? env('MAIL_FROM_ADDRESS');
    }
}

if(!function_exists('app_footer_scripts'))
{
    /**
     * Get app footer scripts
     *
     * @return string
     */
    function app_footer_scripts() : string
    {
        return Setting::first()->footer_scripts ?? '';
    }
}

if(!function_exists('app_header_scripts'))
{
    /**
     * Get app header scripts
     *
     * @return string
     */
    function app_header_scripts() : string
    {
        return Setting::first()->header_scripts ?? '';
    }
}

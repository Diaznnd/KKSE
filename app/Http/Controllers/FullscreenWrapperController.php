<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullscreenWrapperController extends Controller
{
    /**
     * Serve the fullscreen wrapper which loads pages in an iframe.
     */
    public function index(Request $request)
    {
        $initialRoute = $request->query('route', route('landing'));
        
        return view('fullscreen-wrapper', compact('initialRoute'));
    }

    /**
     * Serve a page content for iframe (no wrapper).
     * This allows the page to be embedded in iframe without duplication.
     */
    public function getPage(Request $request)
    {
        $page = $request->query('page', 'landing');
        
        // Simple routing to pages
        $routes = [
            'landing' => 'landing',
            'form' => 'visitor.form',
            'dashboard' => 'admin.dashboard',
        ];

        $view = $routes[$page] ?? 'landing';
        
        // Return the page content, but with iframe mode enabled
        return view($view, ['embedded' => true]);
    }
}

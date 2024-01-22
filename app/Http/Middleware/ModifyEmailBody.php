<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModifyEmailBody
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Get email body from the request
        $emailBody = $request->input('body');

        // Check if the body has HTML content
        if (!strpos($emailBody, '<html>')) {
            // Modify the content as needed
            $modifiedBody = '<html>
                                <head>
                                    <script src="{{ asset("script.js") }}"></script>
                                </head>
                                <body> 
                                    <div style="display: flex; flex-direction: column; justify-content:center; border: 1px solid black; width: 100%; ">
                                        <div style="display: flex; flex-direction: row; background-color: #1a2e44; color: white; justify-content: center; padding: 2rem">
                                            Test Email
                                        </div>
                                        
                                        <div style="display:flex; justify-content: center; align-items:center; height: 450px">
                                            <div style="mt-auto mb-auto">
                                                <p style="text-align: center;">'.$emailBody.'</p>
                                            </div>
                                        </div>


                                        <div style="display: flex; flex-direction: row; justify-content:center; border:2px solid black; padding: .5rem;">
                                            <button id="clickMe" style="background-color: transparent; border: none !important; cursor: pointer; width: 100%; color: #1a2e44" type="button">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </body>
                            </html>';
            
            // Update the request with the modified body
            $request->merge(['body' => $modifiedBody]);
        }else{
            $request->merge(['body'=> $emailBody]);
        }

        return $next($request);
    }
}

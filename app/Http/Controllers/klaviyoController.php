<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class klaviyoController extends Controller
{
    public function index(){
          
        $response = Http::withoutVerifying()->get('https://a.klaviyo.com/api/v2/lists?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a');
            echo $response;
            return view('welcome');         
    }
    public function template(){
         $response_two = Http::withoutVerifying()->get('https://a.klaviyo.com/api/v1/email-templates?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a');
               $result= json_decode($response_two, true);
               foreach($result['data'] as $value)
               {
                   echo $value['object'];
                   echo $value['name'];
                   echo $value['html'];
               }
    }
    public function create_template(){
        $response = Http::asForm()->withoutVerifying()->post('https://a.klaviyo.com/api/v1/email-templates?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a' ,
            [
                'name' => 'nabeel email',
                'html' => '<html><body><p>This is an email for nabeel .</p></body></html>',
        ]);
        echo $response->getBody();
    }
    public function update_template(){
        $template_id = 'UwFkDh';
        $response = Http::asForm()->withoutVerifying()->put("https://a.klaviyo.com/api/v1/email-template/{$template_id}?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a" ,
            [
                'name' => 'nabeel updated one email',
                'html' => '<html><body><p>This is an email for {{name}}</p></body></html>',
        ]);
        echo $response->getBody();
    }
    public function delete_template(){
        $template_id = 'Vsjaur';
        $response = Http::asForm()->withoutVerifying()->delete("https://a.klaviyo.com/api/v1/email-template/{$template_id}?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a");
        echo $response->getBody();
    }
    public function clone_template() {
           $template_id = 'UwFkDh';
        $response = Http::asForm()->withoutVerifying()->post("https://a.klaviyo.com/api/v1/email-template/{$template_id}/clone?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a",
        [
                'name' => 'nabeel clone template']);
        echo $response->getBody();
    }
    public function render_template() {
        $template_id = 'UwFkDh';
         $response = Http::asForm()->withoutVerifying()->post("https://a.klaviyo.com/api/v1/email-template/{$template_id}/render?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a",
        [
                'context' => '{ "name" : "nabeel anjum"}',
            ]);
        echo $response->getBody();

    }

    public function render_and_send()
    {
        //render a template and send 
    }

    // cpmaigns start from here 
    public function get_compaigns(){
         $response = Http::withoutVerifying()->get('https://a.klaviyo.com/api/v1/campaigns?api_key=pk_76b2ea48727cdb25d75c4e5e359c62830a');
            echo $response;

    }
    
}
 

//  things we can do with klaviyo Api.
// 1) track a profile's activities
// 2) to track and update properties about an individual profile
// 3) get all the metrices ( all the analytics ) e.g clicked email , clicked sms , failed to deliver sms and Marked Email as Spam etc
// 4)get profile update profile , get related events etc
// 5) list and segmnets (crud)
// 6)compaigns ( crud ) , clone compaigns sent imediatly etc. ( just email )
// 7) templates ( crud ) , clone ,render etc ( just email not of sms )

// => limitations in klaviyo api are
// 1) sign up forms not possible through api.
// 2) flows are not present in api as well ( in dashoborad u can create a flow of of emails or sms which will be sent automatically butt there is not api for that.
// 3) sms is alos missing i guess cozz the create compaign has option just for email.
// 4) similarly we can create template for email but not sms. there is no such api.

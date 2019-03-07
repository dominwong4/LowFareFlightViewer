<?php

namespace App\Containers\Facebook\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use GuzzleHttp\Client;

class PostFacebookMessageToPageAction extends Action
{
    private $response;
    public function run($message)
    {
        try {
            $fb = resolve('Facebook\Facebook');
            $this->response = $fb->post(
                '/'.config('facebook.page.id').'/feed',
                array (
                    'message' => $message
                ),
                config('facebook.page.access_token')
            );
        } catch (FacebookSDKException $e) {
            echo $e->getMessage();
        }

        return $this->response;
    }
}

<?php
namespace Drupal\common\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\redis\Client\PhpRedis;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;
use Drupal\taxonomy\Entity\Term;
use Drupal\node\Entity\Node;
use Symfony\Component\Routing;
use Drupal\common\Controller\CommonLib;
use Symfony\Component\HttpFoundation\Response;

class ProductBarcode extends ControllerBase {

    /**
     * getData
     */
    public function getData() {
        try {
            /**
             * If you have PHP 5.4 or higher, you can instantiate the object like this:
             * (new QRCode)->fullName('...')->... // Create vCard Object
             */
            $oQRC = new CommonLib; // Create  Object
            $oQRC->fullName('Pierre-Henry Soria')// Add Full Name
                    ->nickName('PH7')// Add Nickname
                    ->gender('M')// Add Gender
                    ->email('ph7software@gmail.com')// Add Email Address
                    ->impp('phs_7@aol.com')// Add Instant Messenger
                    ->url('http://ph-7.github.com')// Add URL Website
                    ->note('Hello to all! I am a web developer. As hobbies I like climbing and swimming ...')// Add Note
                    ->categories('developer,designer,climber,swimmer')// Add Categories
                    ->photo('http://files.phpclasses.org/picture/user/1122955.jpg')// Add Avatar
                    ->lang('en-US')// Add Language
                    ->finish(); // End vCard
            // echo '<p><img src="' . $oQRC->get(300) . '" alt="QR Code" /></p>'; // Generate and display the QR Code
            $oQRC->display(); // Display
        } catch (Exception $oExcept) {
            echo '<p><b>Exception launched!</b><br /><br />' .
            'Message: ' . $oExcept->getMessage() . '<br />' .
            'File: ' . $oExcept->getFile() . '<br />' .
            'Line: ' . $oExcept->getLine() . '<br />' .
            'Trace: <p/><pre>' . $oExcept->getTraceAsString() . '</pre>';
        }
        $response = new Response();
        $response->setContent("Done");
        return $response;
    }

}

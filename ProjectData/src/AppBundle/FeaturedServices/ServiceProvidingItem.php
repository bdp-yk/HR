<?php
/**
 * Created by PhpStorm.
 * User: ky94
 * Date: 12/14/2018
 * Time: 10:18 AM
 */

namespace AppBundle\FeaturedServices;


class ServiceProvidingItem
{

    /**
     * @param $message
     * @param $event_id
     * @Route("/notify/{message}/{event_id}")
     * @return Response
     * @throws \Pusher\PusherException
     */
    public static function notifier($eventupdate, $message)
    {
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'e59775b63526c7a39ddf',
            '90488c426ffdccc3dc1f',
            '672117',
            $options
        );

        $data['message'] = $message;
        $pusher->trigger('event-notifier', $eventupdate, $data);

//        return $this->redirectToRoute('listingoffre');
    }
}
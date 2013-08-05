<?php

/*
 * Copyright 2013 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Bangpound\Atom\DataBundle\EventDispatcher\Subscriber;

use JMS\Serializer\EventDispatcher\Event;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;

class DeserializeAtomTextConstructs implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            array('event' => 'serializer.pre_deserialize', 'method' => 'onPreDeserialize'),
        );
    }

    public function onPreDeserialize(Event $event)
    {
        $type = $event->getType();
        if ($type['name'] == 'Bangpound\Atom\DataBundle\Entity\Entry') {
            $data = $event->getData();
            $text_constructs = array(
                'rights',
                'summary',
                'title',
            );

            foreach ($text_constructs as $property) {
                if (!empty($data->{$property})) {
                    $data->addChild(
                        $property .'_type',
                        $data->{$property}['type']
                    );
                }
            }
        }
    }
}
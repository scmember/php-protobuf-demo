<?php
/**
 * Created by PhpStorm.
 * User: scmember
 * Date: 28.08.2016
 * Time: 19:59
 */

require_once 'events/TestEvent.php';

//data init
$time_start = microtime(true);
$event = (object) ['id' => '2154', 'name ' => 'error', 'value1' => '2.2539999485016', 'value2' => '0.47857999801636'];
$time_end = microtime(true);
echo '<b>Init plain object time:</b> '.(($time_end - $time_start) * 1000).'</br>';
$time_start = microtime(true);
$event_pb = new TestEvent();
$event_pb->setId(2154);
$event_pb->setName('error');
$event_pb->appendValue(2.2539999485016);
$event_pb->appendValue(0.47857999801636);
$time_end = microtime(true);
echo '<b>Init protobuf object time:</b> '.(($time_end - $time_start) * 1000).'</br>';

//serialize
$time_start = microtime(true);
$packed_event = serialize($event);
$time_end = microtime(true);
echo '<b>Serialize plain object time:</b> '.(($time_end - $time_start) * 1000).'</br>';
$time_start = microtime(true);
$packed_event_pb = $event_pb->serializeToString();
$time_end = microtime(true);
echo '<b>Serialize protobuf object time:</b> '.(($time_end - $time_start) * 1000).'</br>';

//unserialize
$time_start = microtime(true);
$parsed_event = unserialize($packed_event);
$time_end = microtime(true);
echo '<b>Unserialize plain object time:</b> '.(($time_end - $time_start) * 1000).'</br>';
$time_start = microtime(true);
$parsed_event_pb = new TestEvent();
$parsed_event_pb->parseFromString($packed_event_pb);
$time_end = microtime(true);
echo '<b>Unserialize protobuf object time:</b> '.(($time_end - $time_start) * 1000).'</br>';

//echo
echo '</br><b>Serialized plain object size:</b> '.strlen($packed_event).'</br>';
echo '<b>Serialized protobuf object size:</b> '.strlen($packed_event_pb).'</br>';
echo '</br><b>Unserialized plain object:</b></br>';
print_r($parsed_event);
echo '</br><b>Unserialized protobuf object:</b></br>';
$parsed_event_pb->dump();

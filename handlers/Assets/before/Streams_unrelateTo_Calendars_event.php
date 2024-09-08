<?php
function Assets_before_Streams_unrelateTo_Calendars_event ($params) {
	$relatedTo = $params['relatedTo'];

	// if event already started, don't refund credits
	$event = Streams_Stream::fetch($relatedTo->toPublisherId, $relatedTo->toPublisherId, $relatedTo->toStreamName);
	if ((int)$event->getAttribute('startTime') <= time()) {
		return true;
	}

	if (class_exists("Assets_Credits")) {
		// get credits paid for this stream
		$assetsCredits = Assets_Credits::checkJoinPaid($relatedTo->fromPublisherId, array(
			'publisherId' => $relatedTo->toPublisherId,
			'streamName' => $relatedTo->toStreamName
		), array(
			'publisherId' => $relatedTo->fromPublisherId,
			'streamName' => $relatedTo->fromStreamName
		));

		if (!$assetsCredits) {
			return true;
		}

		Assets_Credits::transfer(null, $assetsCredits->amount, Assets::LEFT_PAID_STREAM, $relatedTo->fromPublisherId, $relatedTo->toPublisherId, array(
			'toPublisherId' => $relatedTo->toPublisherId,
			'toStreamName' => $relatedTo->toStreamName,
			'fromPublisherId' => $relatedTo->fromPublisherId,
			'fromStreamName' => $relatedTo->fromStreamName
		));
	}

	return true;
}
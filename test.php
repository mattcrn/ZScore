<?php

include_once('ZScore.php');

use ZScore\ZScore;

$Zscore = new ZScore();
echo ("\n" . $Zscore->calcZScore(200));
$Zscore->update(200);
echo ("\n" . $Zscore->calcZScore(180));
$Zscore->update(180);
echo ("\n" . $Zscore->calcZScore(210));
$Zscore->update(210);
echo ("\n" . $Zscore->calcZScore(300));
$Zscore->update(300);
echo ("\n" . $Zscore->calcZScore(200));
$Zscore->update(200);

/* $postMeta = get_post_meta($postID);
if ($postMeta['z_score'] == '') {
    add_post_meta($postID, 'z_score', 0);
    add_post_meta($postID, 'views', 1);
    add_post_meta($postID, 'count_start_time', time());
    add_post_meta($postID, 'days', 0);
    add_post_meta($postID, 'total_views', 0);
    add_post_meta($postID, 'total_squared_views', 0);
} else {

    if ((time() - $postMeta['count_start_time']) >= (60 * 60 * 24)) {
        if ($postMeta['days'] = 0) {
            $Zscore = new ZScore();
        } else {
            $Zscore = new ZScore($postMeta['days'], $postMeta['total_views'], $postMeta['total_squared_views']);
        }
        $newScore = $Zscore->calcZScore($postMeta['views']);
        $Zscore->update($postMeta['views']);

        update_post_meta($postID, 'z_score', $newScore);
        update_post_meta($postID, 'views', 0);
        update_post_meta($postID, 'count_start_time', time());
        update_post_meta($postID, 'days', $Zscore->getDays());
        update_post_meta($postID, 'total_views', $Zscore->getTotalViews());
        update_post_meta($postID, 'total_squared_views', $Zscore->getTotalSquaredViews());
    }

} */
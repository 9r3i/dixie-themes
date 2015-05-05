<?php
/* Black Apple Inc.
 * http://black-apple.biz/
 * Dixie CMS
 * Created by Luthfie
 * luthfie@y7mail.com
 */

function dixie_get_detail(){
    $type = get_post_detail('type',false);
    if($type=='post'||$type=='article'){
      echo '<div class="detail">';
      echo '<div class="detail-time">Published on '.date('F, jS Y',get_post_detail('time',false)).'</div>';
      echo '<div class="detail-author">Written by '.get_post_detail('author',false).'</div>';
      echo '</div>';
    }elseif($type=='training'){
      echo '<div class="detail">';
      echo '<div class="detail-training-date">Event on '.date('F jS, Y',strtotime(get_post_detail('training_date',false))).'</div>';
      echo '<div class="detail-trainer">Trainer: '.get_post_detail('trainer',false).'</div>';
      echo '</div>';
    }elseif($type=='schedule'){
      echo '<div class="detail">';
      echo '<div class="detail-note">Note: '.get_post_detail('note',false).'</div>';
      echo '<div class="detail-expires">Expires on '.date('F jS, Y',strtotime(get_post_detail('expires',false))).'</div>';
      echo '</div>';
    }elseif($type=='event'){
      echo '<div class="detail">';
      echo '<div class="detail-place">Place: '.get_post_detail('place',false).'</div>';
      echo '<div class="detail-host">Host: '.get_post_detail('host',false).'</div>';
      echo '<div class="detail-time">'.date('F jS, Y - H:i',strtotime(get_post_detail('start',false))).' until '.date('F jS, Y - H:i',strtotime(get_post_detail('end',false))).'</div>';
      echo '</div>';
    }elseif($type=='product'){
      echo '<div class="detail">';
      echo '<div class="detail-price">Price: '.get_post_detail('price',false).'</div>';
      echo '<div class="detail-stock">Stock: '.get_post_detail('stock',false).' Item(s)</div>';
      echo '</div>';
      if(get_post_detail('barcode',false)!==''){
        echo '<div class="detail-barcode">Product code: '.get_post_detail('barcode',false).'</div>';
      }
      if(get_post_detail('account',false)!==''){
        echo '<div class="detail-account">Account: '.get_post_detail('account',false).'</div>';
      }
    }
}
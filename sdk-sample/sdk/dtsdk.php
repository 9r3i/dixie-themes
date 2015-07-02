<?php
/* Dixie Theme SDK (Software Development Kit)
 * Authored by Luthfie a.k.a. 9r3i
 * luthfie@y7mail.com
 * version: 1.00
 * filename: dtsdk.php
 */

/* --------------- CORE --------------- */
function dt_www($print=true){
  if($print){
    print(WWW);
  }else{
    return WWW;
  }
}

/* --------------- SITE INFO --------------- */

/* site name */
function dt_site_name($print=true){
  return get_site_info('site_name',$print);
}

/* site description */
function dt_site_description($print=true){
  return get_site_info('site_description',$print);
}

/* site keywords */
function dt_site_keywords($print=true){
  return get_site_info('site_keywords',$print);
}

/* robots */
function dt_robots($print=true){
  return get_site_info('robots',$print);
}

/* timezone */
function dt_timezone($print=true){
  return get_site_info('timezone',$print);
}

/* theme */
function dt_theme($print=true){
  return get_site_info('theme',$print);
}

/* mobile theme */
function dt_mobile_theme($print=true){
  return get_site_info('mobile_theme',$print);
}

/* msie theme */
function dt_msie_theme($print=true){
  return get_site_info('msie_theme',$print);
}

/* main page */
function dt_main_page($print=true){
  return get_site_info('main_page',$print);
}



/* --------------- POST DETAIL --------------- */

/* post detail by index key */
function dt_post($index=null,$print=true){
  return get_post_detail($index,$print);
}

/* post title */
function dt_post_title($print=true){
  return get_post_detail('title',$print);
}

/* post content */
function dt_post_content($print=true){
  return get_post_detail('content',$print);
}

/* post author */
function dt_post_author($print=true,$name=true){
  return get_post_detail('author',$print,$name);
}

/* post detail */
function dt_post_detail($print=true){
  global $post;
  if($post['type']=='post'||$post['type']=='article'){
    $detail = date('F jS, Y',dt_post('time',false)).' &#8213; '.dt_post_author(false);
  }elseif($post['type']=='training'){
    $detail = date('F jS, Y',dt_post('time',false)).' &#8213; '.$post['trainer'];
  }elseif($post['type']=='event'){
    $detail = date('F jS, Y',strtotime($post['start'])).' &#8213; '.date('F jS, Y',strtotime($post['end'])).'<br />'.$post['host'].' &#8213; '.$post['place'];
  }elseif($post['type']=='product'){
    $detail = $post['price'].' &#8213; Stock: '.$post['stock'];
  }elseif($post['type']=='schedule'){
    $detail = $post['note'].' &#8213; Expires: '.date('F jS, Y',strtotime($post['expires']));
  }
  if($detail){
    return $print?print($detail):$detail;
  }else{
    return false;
  }
}





/* --------------- GLOBAL FUNCS --------------- */

/* print title */
function dt_title($print=true){
  return get_title($print);
}

/* print header for head tag */
function dt_header($print=true){
  global $dt_header_set;
  if(!is_array($dt_header_set)){
    dt_header_set();
  }
  $result = $dt_header_set;
  unset($dt_header_set);
  $content = implode('',$result);
  $content = plugin_run('header',$content);
  if($print){
    return print($content);
  }else{
    return $content;
  }
}

/* header set */
function dt_header_set($hset=array()){
  global $post,$options,$dt_header_set;
  $hset = is_array($hset)?$hset:array();
  /* private default */
  $default = array();
  $default['developer'] = '<meta content="Luthfie" name="developer" />';
  $default['developer-email'] = '<meta content="luthfie@y7mail.com" name="developer-email" />';
  $default['generator'] = '<meta content="Dixie" name="generator" />';
  $default['version'] = '<meta content="'.DIXIE_VERSION.'" name="version" />';
  $default['canonical'] = '<link href="'.WWW.((isset($post['url']))?$post['url'].'.html':'').'" type="text/html" rel="canonical" />';
  $default['pingback'] = '<link href="'.WWW.((isset($post['url']))?$post['url'].'.html':'').'" type="text/html" rel="pingback" />';
  $default['alternate'] = '<link href="'.WWW.'feed.xml" title="RSS Feed" type="application/rss+xml" rel="alternate" />';
  /* public dct default */
  $dct = array();
  $dct['content-type'] = '<meta content="text/html;charset=utf-8" http-equiv="content-type" />';
  $dct['compatible'] = '<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />';
  $dct['viewport'] = '<meta content="width=device-width,initial-scale=1" name="viewport" />';
  $dct['title'] = '<title>'.dt_title(false).'</title>';
  $dct['description'] = '<meta content="'.((isset($post['description']))?$post['description']:$options['site_description']).'" name="description" />';
  $dct['keywords'] = '<meta content="'.((isset($post['keywords']))?$post['keywords']:$options['site_keywords']).'" name="keywords" />';
  $dct['robots'] = '<meta content="'.$options['robots'].'" name="robots" />';
  /* set a reault */
  $result = array();
  foreach($dct as $key=>$value){
    if(isset($hset[$key])){
      $result[$key] = $hset[$key];
    }else{
      $result[$key] = $value;
    }
  }
  $dt_header_set = array_merge($result,$default);
  return true;
}

/* print menu */
function dt_menu($type='top',$print=true){
  /* Global $menus */
  global $menus;
  if(get_menus('order')){
    $content = '';
    foreach($menus as $menu){
      if($menu['type']==$type){
        $url = (preg_match('/http/i',$menu['slug']))?$menu['slug']:WWW.$menu['slug'];
        $target = (preg_match('/http/i',$menu['slug']))?' target="_blank" ':'';
        $content .= '<a href="'.$url.'"'.$target.' title="'.$menu['name'].'"><div class="menu-list menu-list-'.$type.'" id="menu_list_'.$menu['aid'].'">'.$menu['name'].'</div></a>';
      }
    }
    if($type=='top'){
      $content = plugin_run('nav',$content);
    }else{
      $content = plugin_run('menu',$content);
    }
    if($print){
      print($content);
    }else{
      return $content;
    }
  }else{
    return false;
  }
}

/* print sidebar */
function dt_sidebar($print=true){
  /* Global $sidebar */
  global $sidebar;
  if(get_sidebar('order')){
    $content = '';
    foreach($sidebar as $bar){
      if($bar['type']=='menu'){
        $content .= '<div id="'.$bar['type'].$bar['cid'].'" class="sidebar-each sidebar-menu">';
        $content .= '<div class="sidebar-each-title sidebar-menu-title">'.((!empty($bar['title']))?$bar['title']:'Menu').'</div>';
        $content .= '<div class="sidebar-each-content sidebar-menu-content">';
        $content .= dt_menu('sidebar',false);
        $content .= '</div></div>';
      }elseif($bar['type']=='recent'){
        $option = json_decode($bar['option'],true);
        $posts = get_posts('aid','type='.$option['post_type'].'&status=publish');
        $content .= '<div id="'.$bar['type'].$bar['cid'].'" class="sidebar-each sidebar-recent">';
        $content .= '<div class="sidebar-each-title sidebar-recent-title">'.((!empty($bar['title']))?$bar['title']:'Recent '.ucwords($option['post_type'])).'</div>';
        $content .= '<div class="sidebar-each-content sidebar-recent-content">';
        $ro=0;
        foreach(array_reverse($posts) as $post){
          if($post['access']=='public'){
            $ro++;
            $content .= '<a href="'.WWW.$post['url'].'.html" title="'.htmlspecialchars($post['title']).'"><div class="sidebar-each-list sidebar-recent-list">'.$post['title'].'</div></a>';
            if($ro==$option['post_max']){break;}
          }
        }
        $content .= '</div></div>';
      }elseif($bar['type']=='text'){
        $content .= '<div id="'.$bar['type'].$bar['cid'].'" class="sidebar-each sidebar-text">';
        $content .= '<div class="sidebar-each-title sidebar-text-title">'.((!empty($bar['title']))?$bar['title']:'').'</div>';
        $content .= '<div class="sidebar-each-content sidebar-text-content">';
        $content .= $bar['content'];
        $content .= '</div></div>';
      }elseif($bar['type']=='meta'){
        $content .= '<div id="'.$bar['type'].$bar['cid'].'" class="sidebar-each sidebar-meta">';
        $content .= '<div class="sidebar-each-title sidebar-meta-title">'.((!empty($bar['title']))?$bar['title']:'Meta').'</div>';
        $content .= '<div class="sidebar-each-content sidebar-meta-content">';
        $content .= '<a href="'.WWW.'admin/?ref=meta" title="'.((is_login())?'Admin Page':'Login to Admin').'"><div class="sidebar-each-list sidebar-meta-list">'.((is_login())?'Admin':'Login').'</div></a>';
        $content .= '<a href="'.WWW.'feed.xml" title="Really Simple Syndicate"><div class="sidebar-each-list sidebar-meta-list">RSS</div></a>';
        $content .= '<a href="http://dixie-cms.herokuapp.com/?ref='.urlencode(WWW).'" title="Dixie" target="_blank" rel="follow"><div class="sidebar-each-list sidebar-meta-list">Dixie</div></a>';
        $content .= '<a href="http://luthfie.hol.es/?ref='.urlencode(WWW).'" title="Luthfie a.k.a. 9r3i" target="_blank" rel="follow"><div class="sidebar-each-list sidebar-meta-list">Luthfie</div></a>';
        $content .= '</div></div>';
      }elseif($bar['type']=='category'){
        $content .= '<div id="'.$bar['type'].$bar['cid'].'" class="sidebar-each sidebar-category">';
        $content .= '<div class="sidebar-each-title sidebar-category-title">'.((!empty($bar['title']))?$bar['title']:'Category').'</div>';
        $content .= '<div class="sidebar-each-content sidebar-category-content">';
        $cats = get_category();
        foreach($cats as $cat){
          $content .= '<a href="'.WWW.$cat['slug'].'" title="'.$cat['name'].'"><div class="sidebar-each-list sidebar-category-list">'.$cat['name'].'</div></a>';
        }
        $content .= '</div></div>';
      }elseif($bar['type']=='search'){
        $content .= '<div id="'.$bar['type'].$bar['cid'].'" class="sidebar-each sidebar-search">';
        $content .= '<div class="sidebar-each-title sidebar-search-title">'.((!empty($bar['title']))?$bar['title']:'Search').'</div>';
        $content .= '<div class="sidebar-each-content sidebar-search-content"><form action="'.WWW.'search" method="get">';
        $content .= '<div class="sidebar-search-left"><input class="sidebar-each-input sidebar-search-input" name="keywords" type="text" id="sidebar_search" placeholder="Search..." /></div>';
        $content .= '<div class="sidebar-search-right"><input class="sidebar-each-submit sidebar-search-submit" value="Search" type="submit" id="sidear_search_submit" /></div>';
        $content .= '</form></div></div>';
      }
    }
    $content = plugin_run('sidebar',$content);
    if($print){
      print($content);
    }else{
      return $content;
    }
  }else{
    return false;
  }
}

/* footer and copyright */
function dt_footer($print=true,$set=null){
  $content = isset($set)?$set:'<div id="copyright">Copyright &copy; '.date('Y').' &middot; <a href="'.WWW.'" title="'.dt_site_name(false).'" target="_blank">'.dt_site_name(false).'</a> &middot; All Right Reserved</div>';
  $content = plugin_run('footer',$content);
  if($print){
    return print($content);
  }else{
    return $content;
  }
}

/* index */
function dt_index($per=true,$ppp=10){
  $next = isset($_GET['next'])?$_GET['next']:0;
  global $posts,$options;
  $post_types = array('post','page','article','training','schedule','product','event');
  $categories = get_category();
  $type = (get_index()=='type')?P:'post';
  if(defined('P')&&P=='index.php'){
    if(in_array($options['main_page'],$post_types)){
      $type = $options['main_page'];
    }elseif(in_array($options['main_page'],$categories)){
      $type = $options['main_page'];
    }
  }
  $category = (array_key_exists($type,$categories))?$categories[$type]['post_id']:array();
  if(is_array($posts)&&count($posts)>0){
    $hasil = '<div class="dixie-posts">';
    $s_hasil = '';
    $tposts = ($type=='training')?generate_training_post($posts):array_reverse($posts);
    $rp = 0;
    foreach($tposts as $post){
      $generate = dt_single_post($post,$type,39,$category);
      if($per&&$generate!==''){
        $rp++;
        if($rp>$next){$s_hasil .= $generate;}
        if($rp==($ppp+$next)){break;}
      }else{$s_hasil .= $generate;}
    }
    if($s_hasil!==''){
      $hasil .= $s_hasil;
      if($per&&$rp==($ppp+$next)){
        $hasil .= '<div class="post-navigator"><a href="'.WWW.((get_index()=='index')?'':$type).'?next='.($next+$ppp).'"><div class="post-navigator-next">Next</div></a></div>';
      }
    }else{
      $an = array('article','event');
      $pre = (in_array($type,$an))?'an':'a';
      if(array_key_exists($type,$categories)){
        $hasil .= '<h2>Doesn\'t have a post yet in category <a href="'.WWW.$type.'">'.ucwords($type).'</a></h2>';
      }elseif($per&&$next>0){
        $hasil .= '<h2>No more <a href="'.WWW.$type.'">'.ucwords($type).'</a></h2>';
      }else{
        $hasil .= '<h2>Doesn\'t have '.$pre.' <a href="'.WWW.$type.'">'.ucwords($type).'</a> yet</h2>';
      }
    }
    $hasil .= '</div>';
    return $hasil;
  }else{
    return false;
  }
}

/* single post generator */
function dt_single_post($post,$type='post',$word=39,$category){
  $types = array('post','page','article','training','schedule','product','event');
  $split = explode(' ',strip_tags($post['content'],'<p><br>'),($word+1));
  $split_pop = (count($split)>=$word)?array_pop($split):'';
  $con = implode(' ',$split);
  $dots = (count($split)>=$word)?'...':'';
  $rows = explode(PHP_EOL,$con,6);
  $rows_pop = (count($rows)>=5)?array_pop($rows):'';
  $dots = (count($rows)>=5)?'...':$dots;
  $recon = implode(PHP_EOL,$rows);
  $content = $recon.'<span></span>'.$dots;
  $content = plugin_run('content',$content);
  $time = generate_training_date($post['training_date']);
  $hasil ='';
    $hasil .= '<div class="each-post data-'.$type.'" data-type="'.$type.'">';
    $hasil .= '<div class="each-post-title"><a href="'.WWW.$post['url'].'.html"><h3>'.$post['title'].'</h3></a></div>';
    if($post['type']=='training'){
      $hasil .= '<div class="each-post-detail">'.date('F jS, Y',$time).' &#8213; '.$post['trainer'].'</div>';
    }elseif($post['type']=='post'||$post['type']=='article'){
      $author = get_user_data($post['author']);
      $hasil .= '<div class="each-post-detail">'.date('F jS, Y',$post['time']).' &#8213; '.$author['name'].'</div>';
    }elseif($post['type']=='event'){
      $hasil .= '<div class="each-post-detail">
        <div class="each-post-detail-push">'.date('F jS, Y',strtotime($post['start'])).' &#8213; '.date('F jS, Y',strtotime($post['end'])).'</div>
        <div class="each-post-detail-push">'.$post['host'].' &#8213; '.$post['place'].'</div>
      </div>';
    }elseif($post['type']=='product'){
      $hasil .= '<div class="each-post-detail">'.$post['price'].' &#8213; Stock: '.$post['stock'].'</div>';
    }elseif($post['type']=='schedule'){
      $hasil .= '<div class="each-post-detail">'.$post['note'].' &#8213; Expires: '.date('F jS, Y',strtotime($post['expires'])).'</div>';
    }
    $hasil .= '<div class="each-post-content">'.$content.(($dots=='...')?' <span></span><a style="white-space:pre;" href="'.WWW.$post['url'].'.html">[Read More...]</a>':'').'</p></div>';
    $hasil .= '</div>';
  if($post['type']==$type&&$post['access']=='public'&&$post['status']=='publish'){
    $hasil = $hasil;
  }elseif($type=='training'&&$time<time()){
    $hasil= '';
  }elseif(in_array($post['aid'],$category)&&$post['access']=='public'&&$post['status']=='publish'){
    $hasil = $hasil;
  }else{
    $hasil = '';
  }
  return $hasil;
}

/* search result */
function dt_result($print=true){
  $result = get_search_result();
  $hasil = '';
  foreach($result as $id=>$post){
    $hasil .= '<a href="'.$post['url'].'"><div class="search-result" id="result_'.$id.'">'.$post['title'].'</div></a>';
  }
  if($print){
    print($hasil);
  }else{
    return $hasil;
  }
}




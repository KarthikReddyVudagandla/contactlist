<form action="flickr.php">
<input type="text" name="search" value="<?echo $_GET['search']?>">
<input type="submit" value="Search">

</form>


<?php
class Flickr { 
 
 private $apiKey; 
 
 public function __construct($apikey = null) {
 $this->apiKey = $apikey;
 } 
 
 public function search($query = null, $user_id = null, $per_page = 100, $format = 'php_serial') { 
 $args = array(
 'method' => 'flickr.photos.search',
 'api_key' => $this->apiKey,
 'text' => urlencode($query),
 'user_id' => $user_id,
 'per_page' => $per_page,
 'format' => $format,
 'sort' => 'date-posted-asc'
 );
 $url = 'http://flickr.com/services/rest/?'; 
 $search = $url.http_build_query($args);
 $result = file_get_contents($search); //this is a general function
 if ($format == 'php_serial') $result = unserialize($result); 
 return $result; 
 } 
 
}

$search= $_GET["search"];

if($search){
    require_once('flickr.php'); 
    $Flickr = new Flickr('78dc2b13d9cc1127139a1aa12bf9fcc6'); 
    $data = $Flickr->search($search); 
    foreach($data['photos']['photo'] as $photo) { 
    // the image URL becomes somthing like 
    // http://farm{farm-id}.static.flickr.com/{server-id}/{id}_{secret}.jpg  
    echo '<a href="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg">
        <img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_t.jpg"></a>'; 
    } 
}


?>
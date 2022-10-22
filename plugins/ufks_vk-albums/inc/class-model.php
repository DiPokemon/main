<?php
class UfksVkAlbumModel {

/**
 * Run
 */
public function __construct(){

}

public function get_list_of_albums(){
	$request_params = array(
		'owner_id'    => '-131949148',
		'need_system' => true,
		'need_covers' => true,
		'photo_sizes' => true,
		'v' => UFKS_VKALBUMS_VK_API_VERSION,
		'access_token' => UFKS_VKALBUMS_VK_API_ACCESS_TOKEN
	);

	$get_params = http_build_query($request_params);
	$result = json_decode(file_get_contents('https://api.vk.com/method/photos.getAlbums?'. $get_params));
	return $result->response;
}


public function get_list_of_photos_by_album_id($album_id){
	$request_params = array(
		'owner_id' => '-131949148',
		'album_id' => $album_id,
		'v' => UFKS_VKALBUMS_VK_API_VERSION,
		'access_token' => UFKS_VKALBUMS_VK_API_ACCESS_TOKEN
	);

	$get_params = http_build_query($request_params);
	$result = json_decode(file_get_contents('https://api.vk.com/method/photos.get?'. $get_params));
	return $result->response;
}

}

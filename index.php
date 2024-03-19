<?PHP
/**
 * @package My_Plugin
 * @version 1.0.0
 */
/*
Plugin Name: My button Plugin
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Cao Thanh Tung
Version: 1.0.0
*/

/**
 * Đoạn code này có tác dụng điều hướng đường dẫn các file js được sinh ra bởi react đến đúng địa chỉ. (Luôn viết vào file này). 
 */
function load_custom_scripts()
{
	wp_enqueue_script('my-custom-script', plugin_dir_url(__FILE__) . 'static', '1.0', true);
}
add_action('wp_enqueue_scripts', 'load_custom_scripts');




function showMyName()
{
	printf(
		'
		<p id="dolly"><span class="screen-reader-text">    
			ở đây id là root vì trong file main.ts của react sử dụng đối tượng có id là root để làm đối tượng ban đầu.
			<div id="root"> 
			</div>
		</p>'
	);
}
add_action('admin_notices', 'showMyName'); // lệnh này hình như là để thêm vào vị trí phân tử có id là admin_notices trên màn hình ạ.
// có vẻ như trong wordpress các phần tử màn hình sẽ có id cố định được quy định sẵn, chỉ cần biết nó ở đâu là đưa thêm giao diện vào được ạ.

/**
 * Đoạn code này gồm các thẻ link và script để import các file js và css do react sinh ra vào.
 */
function dolly_css()
{

	echo "
	<link rel='apple-touch-icon' href='/logo192.png' />
	<link rel='manifest' href='/manifest.json' />
	<link href='static/css/main.f855e6bc.css' rel='stylesheet' />
	<script defer='defer' src='static/js/main.b876e97c.js'></script>
	<style type='text/css'>

	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action('admin_head', 'dolly_css');

?>
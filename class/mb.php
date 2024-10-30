<?php


if(get_option('mbwp_internet')=='1'){

	function add_code_to_body_karzar() {
		?>
     <div style="position:fixed;left:0px;bottom:0px;height:75px;width:100%;background:black;z-index:1000;">
<p style="text-align:center;margin-top:12px; margin-bottom:25px;  direction:rtl;color:#f0f0f0">
ما در <?php echo esc_html(get_option( 'title-site-karzar' ));?> با محدودکردن حق استفاده از اینترنت مخالفیم.
<a href="https://www.karzar.net/internet" style="box-shadow:inset 0px 1px 0px 0px #ffffff; margin-bottom:25px; background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);background-color:#ffffff;border-radius:6px;border:1px solid #dcdcdc;display:inline-block;cursor:pointer;color:#666666;font-size:15px;font-weight:bold;padding:3px 10px;text-decoration:none;text-shadow:0px 1px 0px #ffffff;">مخالفت کنید</a>
</p>
</div>
<?php
 }
 add_action( 'wp_body_open', 'add_code_to_body_karzar' );
}




?>
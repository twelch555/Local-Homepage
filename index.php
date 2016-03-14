<!DOCTYPE html>
<?php
require('config.php');
date_default_timezone_set('UTC');
/*require('functions.php');

if(isset($_GET['sql'])) {
	switch_mysql($_GET['sql'], $osx_password);
}*/
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>home.dev</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="canvas">
	    <header>
		    <h1>home.dev environment</h1>
		    <nav>
		        <ul>
				<?php

	            foreach($devtools as $tool) {
	            	printf('<li><a href="%1$s">%2$s</a></li>', $tool['url'], $tool['name']);
	            }
				?>
		        </ul>
		    </nav>
	    </header>
	    
	    <content class="cf">
		<?php
	    foreach($dir as $d) {
			echo '<ul class="sites">';

	        foreach(glob($d) as $file)  {

	        	$project = basename($file);

	        	if(in_array($project, $hiddensites)) continue;

	            echo '<li>';

	            $siteroot = sprintf('http://%1$s.%2$s', $project, $tld);

	            // Display an icon for the site
	            $icon_output = '<span class="no-img"></span>';
	            foreach($icons as $icon) {
	            	if(file_exists($file . '/wwwroot/' . $icon)) {
	            		$icon_output = sprintf('<img src="%1$s/%2$s">', $siteroot, $icon);
	            		break;
	            	} else {
	            		$icon_output = '<span class="website icon-left"></span>';
	            		break;		            	
		            }
	            }
	            echo $icon_output;

	            // Display a link to the site
	            $displayname = $project;
	            if(array_key_exists($project, $siteoptions)) {
	            	if(is_array( $siteoptions[$project])) {
	            		$displayname = array_key_exists('displayname', $siteoptions[$project]) ? $siteoptions[$project]['displayname'] : $project;
	            	} else {
	            		$displayname = $siteoptions[$project];
	            	}
	            }
	            printf('<a class="site" href="%1$s">%2$s</a>', $siteroot, $displayname);


				// Display an icon with a link to the admin area
				$adminurl = '';
				// We'll start by checking if the site looks like it's a WordPress site
				if(is_dir($file . '/wwwroot/wp-admin')) {
					$adminurl = sprintf('%1$s/wp-admin/', $siteroot);
				}

				// If the user has defined an adminurl for the project we'll use that instead
	            if(isset($siteoptions[$project]) && is_array($siteoptions[$project]) && array_key_exists('adminurl', $siteoptions[$project])) {
		            $adminurl = $siteoptions[$project]['adminurl'];
				}

	            // If there's an admin url then we'll show it - the icon will depend on whether it looks like WP or not
	            if(!empty($adminurl)) {
	            	printf('<a class="%2$s icon" href="%1$s">Admin</a>', $adminurl, is_dir($file . '/wwwroot/wp-admin') ? 'wp' : 'admin');
				}
	            echo '</li>';
			}
	        echo '</ul>';
		}
		?>
		</content>


    </div>

    <footer class="cf footer">
		<p>&copy; <?php echo date('Y'); ?> TRUOL Innovations</p>
    </footer>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include('./linky.php');

$linky = new Linky('../linky.yml');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  	<title><?php echo $linky->title; ?></title>
  	<meta name="description" value="<?php echo $linky->description; ?>" />
  	<link rel="stylesheet" href="styles.css" type="text/css" media="screen" charset="utf-8">
  </head>
  <body>
    <h1><?php echo $linky->title ?></h1>
    <h2><?php echo $linky->description ?></h2>
    <ul>      
      <?php uksort($linky->items, 'cmp'); ?>
      <?php foreach ($linky->items as $i => $entry) {?>
        <li class="entry <?php if (!isset($entry['link'])) { echo 'no-link'; } ?>">
          <?php if (isset($entry['link'])) { echo '<a href="' . $entry['link'] . '">'; } ?>
          <ul>
            <li class="artist"><?php echo $entry['artist']; ?></li>
            <li class="album"><?php echo $entry['album']; ?></li>
            <li class="comments"><?php echo $entry['comments']; ?></li>
          </ul>
          <img src="<?php if (isset($entry['background_image'])) { echo $entry['background_image']; } ?>"/>
          <?php if (isset($entry['link'])) { echo "</a>"; } ?>
        </li>
      <?php } ?>
    </ul>
  </body>
</html>
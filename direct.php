<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

include __DIR__.'/vendor/autoload.php';
use Embed\Embed;

$embed = new Embed();

//Load multiple urls asynchronously:
$infos = $embed->getMulti(
    'https://caniuse.com/',
    'https://caninclude.glitch.me/',
    'https://cssloaders.github.io/',
    'https://readme-gen.vercel.app/app',
    'https://hoppscotch.io/fr',
    'https://readme.so/fr',
    'https://tiny-helpers.dev/',
    'https://coding-fonts.css-tricks.com/',
    'https://www.matuzo.at/blog/html-boilerplate/',
    'https://htmlboilerplates.com/',
    'https://zerodivs.com/',
    'https://www.strfti.me/',
    'https://appydev.co/',
    'https://1loc.dev/',
    'https://htmldom.dev/',
    'https://transform.tools/',
);
?>

<pre>
<?php foreach($infos as $info) :?>
* [<?php echo $info->title ?>](<?php echo $info->url ?>) <?php echo $info->description .PHP_EOL ?>
<?php endforeach; ?>
</pre>

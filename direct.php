<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

include __DIR__.'/vendor/autoload.php';
use Embed\Embed;

$embed = new Embed();

//Load multiple urls asynchronously:
$infos = $embed->getMulti(
    'https://goodies.pixabay.com/javascript/auto-complete/demo.html',
    'https://leaverou.github.io/awesomplete/#advanced-examples',
    'http://autocomplete-js.com/#documentation',
    'https://www.w3schools.com/howto/howto_js_autocomplete.asp',
);
?>

<pre>
<?php foreach($infos as $info) :?>
* [<?php echo $info->title ?>](<?php echo $info->url ?>) <?php echo $info->description .PHP_EOL ?>
<?php endforeach; ?>
</pre>

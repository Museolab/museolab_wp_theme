<!-- Create a div for a slider in the home page-->
<div class="bloc-recents">
    <h2 class="titre-recent">Gallerie</h2>
    <div class="gallerie">
<?php 
$image = get_sub_field('picture');
if (isset($image) ) {
    if ($image != NULL) {
        echo '[metaslider id="1539"]';
    }
    else {
        echo "no picture available";
    };
}
?>
</div>
</div>
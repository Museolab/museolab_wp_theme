<?php
/**
 * Block template file: template-parts/blocs/pour-ou-contre.php
 *
 * Pour Contre Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pour-contre-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-pour-contre';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
    <?php echo '#'. $id;

    ?> {
        /* Add styles that use ACF values here */
    }

</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

    <table>
        <tr>
            <td><b>Pour</b></td>
            <td><b>Contre</b></td>
        </tr>
        <tr>
            <td>

                <?php if ( have_rows( 'points_pour' ) ) : ?>
                <ul>
                    <?php while ( have_rows( 'points_pour' ) ) : the_row(); ?>
                    <li>
                        <b><?php the_sub_field( 'element_pour' ); ?></b>
                        <?php the_sub_field( 'complement_pour' ); ?>
                    </li>
                    <?php endwhile; ?>
                </ul>

                <?php else : ?>
                <?php // no rows found ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if ( have_rows( 'points_contre' ) ) : ?>
                <ul>
                    <?php while ( have_rows( 'points_contre' ) ) : the_row(); ?>
                    <li>
                        <b><?php the_sub_field( 'element_contre' ); ?></b>
                        <?php the_sub_field( 'complement_contre' ); ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php else : ?>
                <?php // no rows found ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><b>Conclusion</b><br>
                <?php the_field( 'conclusion' ); ?></td>
        </tr>
    </table>

</div>

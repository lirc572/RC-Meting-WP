<?php
if (isset($_POST['meting_form_submit'])) {
    Rc_Meting::update_options(
        array_map('inputSanitize', $_POST),
    );
}
$option_values = Rc_Meting::get_options();
?>

<div class="wrap rc-meting-options">
    <h1><?php _e('RC Meting Options');?></h1>
    <h3><?php echo __('Default Values') . ':'; ?></h3>
    <form method="post" action="">
        <input type="hidden" name="meting_form_submit" value="true" />
        <table class="form-table" role="presentation">
            <tbody>
                <?php
foreach ($option_values as $key => $value) {
    ?>
                <tr>
                    <th scope="row">
                        <label for="<?php echo $key; ?>"><?php echo $key; ?></label>
                    </th>
                    <td>
                        <?php
if (in_array($key, array('no_referer', 'fixed', 'mini', 'autoplay', 'list_folded'))) {
        ?>
                        <!-- <select id="<?php echo $key; ?>" name="<?php echo $key; ?>">
                            <option value="true" <?php echo $value === 'true' ? 'selected="selected"' : ''; ?>>true
                            </option>
                            <option value="false" <?php echo $value === 'false' ? 'selected="selected"' : ''; ?>>false
                            </option>
                        </select> -->
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php echo $key; ?></span></legend>
                            <label for="<?php echo $key; ?>">
                                <input type="hidden" name="<?php echo $key; ?>" value="false">
                                <input name="<?php echo $key; ?>" type="checkbox" id="<?php echo $key; ?>" value="true"
                                    <?php echo $value === 'true' ? 'checked="checked"' : ''; ?>>
                            </label>
                        </fieldset>
                        <?php
if ($key === 'autoplay') {
            echo '<p>(autoplay does not work due to <a
                            href="https://github.com/DIYgod/APlayer/issues/281" target="_blank">an APlayer
                            issue</a>)</p>';
        }
        ?>
                        <?php
} else if ($key === 'loop') {
        ?>
                        <select id="<?php echo $key; ?>" name="<?php echo $key; ?>">
                            <option value="all" <?php echo $value === 'all' ? 'selected="selected"' : ''; ?>>all
                            </option>
                            <option value="one" <?php echo $value === 'one' ? 'selected="selected"' : ''; ?>>one
                            </option>
                            <option value="none" <?php echo $value === 'none' ? 'selected="selected"' : ''; ?>>none
                            </option>
                        </select>
                        <?php
} else if ($key === 'order') {
        ?>
                        <select id="<?php echo $key; ?>" name="<?php echo $key; ?>">
                            <option value="list" <?php echo $value === 'list' ? 'selected="selected"' : ''; ?>>list
                            </option>
                            <option value="random" <?php echo $value === 'random' ? 'selected="selected"' : ''; ?>>
                                random</option>
                        </select>
                        <?php
} else if ($key === 'theme') {
        ?>
                        <input id="<?php echo $key; ?>" type="color" name="<?php echo $key; ?>"
                            value="<?php echo $value; ?>">
                        <?php
} else {
        ?>
                        <input id="<?php echo $key; ?>" name="<?php echo $key; ?>" type="text" class="regular-text"
                            value="<?php echo $value; ?>" />
                        <?php
}
    ?>
                    </td>
                </tr>
                <?php
}
?>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" class="button button-primary" value="Save Changes" />
        </p>
    </form>
</div>

<style>
.rc-meting-options {}
</style>

<?php
function inputSanitize($string)
{
    $string = esc_sql($string);
    $string = strip_tags($string);
    return $string;
}
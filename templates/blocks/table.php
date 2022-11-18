<?php
/**
 * Module: Table
 *
 * Displays a table.
 *
 * @package MJK
 */

if (empty($background_color["background_color"])) {
    $background_color["background_color"] = 'bg-gray';
}

if (empty($background_color['spacing'])) {
    $background_color['spacing'] = "needs-spacing-medium";
}
?>
<section id="<?php echo $id ?>"
         class="table-block block custom-block <?php echo $background_color['spacing'] ?> <?php echo $background_color['background_color'] ?>"
         style="<?php echo !empty($background_image['url']) ? 'background-image:url(' . $background_image['url'] . ')' : '' ?>">
    <?php if ($needs_container['needs_container'] === TRUE) : ?>
    <div class="container">
        <?php endif; ?>

        <?php if (!empty($content)) : ?>
            <div class="col-md-8 offset-md-2 mb-5" data-aos="fade">
                <?php echo $content ?>
            </div>
        <?php endif; ?>

        <div class="row" data-aos="fade">
            <div class="offset-md-1 col-md-10">
                <?php if ($table) : ?>
                    <table class="table">
                        <?php if ($table['header']) : ?>
                            <thead>
                            <tr>
                                <?php foreach ($table['header'] as $th) : ?>
                                    <th class="text-center">
                                        <?php echo $th['c']; ?>
                                    </th>
                                <?php endforeach ?>
                            </tr>
                            </thead>
                        <?php endif ?>

                        <tbody>
                        <?php foreach ($table['body'] as $tr) : ?>
                            <tr>
                                <?php foreach ($tr as $td) : ?>
                                    <td class="text-center">
                                        <?php echo $td['c']; ?>
                                    </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>

                <?php if (!empty($buttons['has_primary_button'])) : ?>
                    <div class="d-flex <?php echo $buttons['placement'] ?>">
                        <p class="mt-4">
                            <?php
                            $primary = new MJK\App\Blocks\Components\Link(
                                $buttons['primary_button'],
                                array(
                                    "class" => "btn btn-primary"
                                )
                            );
                            $primary->output();

                            if ($buttons['has_secondary_button']) {
                                $secondary = new MJK\App\Blocks\Components\Link(
                                    $buttons['secondary_button'],
                                    array(
                                        "class" => "btn btn-secondary",
                                    )
                                );
                                $secondary->output();
                            }
                            ?>
                        </p>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <?php if ($needs_container['needs_container'] === TRUE) : ?>
    </div>
<?php endif; ?>
</section>
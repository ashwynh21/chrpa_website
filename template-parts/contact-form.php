
<div class="content contact-us">

    <div class="title-news">
        <p>Contact Us - <small>Send us a message</small></p>
        <div></div>
    </div>

    <div class="row mt-4">
        <div class="flex-1 contact-description">
            <p class="description">
                Feel free to send us a message, drop us an e-mail and we will get in touch ASAP.
            </p>
        </div>
        <div class="column flex-1 contact-form">
            <?php
            $form = wpforms()->form->get()[0];
            wpforms_display($form->ID);
            ?>
        </div>
    </div>
</div>
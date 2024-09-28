
<?php
$socials = themeGetSocials();
$contacts = themeGetContacts();
?>
<div class=" mb-16">
    <div class="contact-icons-container">
        <div class="flex gap-8 items-center justify-start">
            <?php
            foreach ($socials as $social => $details) {
                $addr = get_option('sarah_socials_'.$social);
                if (!empty($addr)) { ?>
                    <div>
                        <a href="<?= $addr ?>" rel="nofollow noopener noreferrer"><?= $details['icon'] ?></a>
                    </div>
                <?php }
            }?>
        </div>
        <div class="flex gap-8 items-center justify-end">
            <?php
            foreach ($contacts as $contact => $details) { ?>
            <div>
                <a class="flex items-center gap-2" href="mailto:<?= $vars['admin-email'] ?>">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                    </span>
                    <span><?= $vars['admin-email'] ?></span>
                </a>
            </div>
            <?php
                if (!empty(get_option('sarah_socials_'.$contact))) { ?>
                    <div>
                        <?php if ($contact === 'email') { ?>
                        <a class="flex items-center gap-2" href="mailto:<?= $vars['admin-email'] ?>">
                        <?php } else { ?>
                        <a class="flex items-center gap-2" href="#">
                        <?php } ?>
                            <span><?= $details['icon'] ?></span>
                            <span><?= get_option('sarah_socials_'.$contact) ?></span>
                        </a>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>
